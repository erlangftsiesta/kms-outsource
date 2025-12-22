<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Job;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        $categories = Category::active()
            ->withCount(['activeJobs'])
            ->get()
            ->map(function ($category) {
                // Add active_jobs_count attribute for consistency
                $category->active_jobs_count = $category->active_jobs_count;
                return $category;
            });

        $urgentJobs = Job::with(['category', 'locations'])
            ->active()
            ->notClosed()
            ->where('is_urgent', true)
            ->latest()
            ->take(6)
            ->get();

        return view('livewire.home-page', [
            'categories' => $categories,
            'urgentJobs' => $urgentJobs,
        ])->layout('layouts.guest');
    }
}