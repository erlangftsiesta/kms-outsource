<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    // Relasi ke jobs yang aktif dan belum closed
    public function activeJobs(): HasMany
    {
        return $this->hasMany(Job::class)
            ->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('closed_at')
                  ->orWhere('closed_at', '>=', now());
            });
    }

    // Scope untuk filter active categories
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    // Scope untuk filter inactive categories
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    // Get active jobs count (accessor)
    public function getActiveJobsCountAttribute(): int
    {
        return $this->activeJobs()->count();
    }

    // Get total jobs count
    public function getTotalJobsCountAttribute(): int
    {
        return $this->jobs()->count();
    }
}