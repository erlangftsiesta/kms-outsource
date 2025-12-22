<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'usage_count',
    ];

    public function scopeMostUsed($query, $limit = 20)
    {
        return $query->orderBy('usage_count', 'desc')->limit($limit);
    }

    public function incrementUsage(): void
    {
        $this->increment('usage_count');
    }
}