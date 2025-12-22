<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'city',
        'province',
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function getFullLocationAttribute(): string
    {
        if ($this->province) {
            return "{$this->city}, {$this->province}";
        }
        return $this->city;
    }
}