<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'position',
        'salary_min',
        'salary_max',
        'requirements',
        'descriptions',
        'is_urgent',
        'is_active',
        'closed_at',
    ];

    protected $casts = [
        'requirements' => 'array',
        'descriptions' => 'array',
        'is_urgent' => 'boolean',
        'is_active' => 'boolean',
        'closed_at' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($job) {
            if (empty($job->slug)) {
                $job->slug = Str::slug($job->title . '-' . Str::random(6));
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function locations(): HasMany
    {
        return $this->hasMany(JobLocation::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeNotClosed($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('closed_at')
              ->orWhere('closed_at', '>=', now());
        });
    }

    public function scopeUrgent($query)
    {
        return $query->where('is_urgent', true);
    }

    public function getSalaryRangeAttribute(): ?string
    {
        if (!$this->salary_min && !$this->salary_max) {
            return null;
        }

        if ($this->salary_min && $this->salary_max) {
            return 'Rp ' . number_format($this->salary_min, 0, ',', '.') . ' - Rp ' . number_format($this->salary_max, 0, ',', '.');
        }

        if ($this->salary_min) {
            return 'Mulai dari Rp ' . number_format($this->salary_min, 0, ',', '.');
        }

        return 'Hingga Rp ' . number_format($this->salary_max, 0, ',', '.');
    }

    public function isClosed(): bool
    {
        return $this->closed_at && $this->closed_at->isPast();
    }
}