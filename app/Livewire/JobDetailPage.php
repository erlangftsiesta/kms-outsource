<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;

class JobDetailPage extends Component
{
    public $job;
    public $relatedJobs;

    public function mount($id)
    {
        $this->job = Job::with(['category', 'locations'])
            ->findOrFail($id);

        // Get related jobs from same category
        $this->relatedJobs = Job::with(['category', 'locations'])
            ->where('category_id', $this->job->category_id)
            ->where('id', '!=', $this->job->id)
            ->active()
            ->notClosed()
            ->latest()
            ->take(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.job-detail-page')
            ->layout('layouts.guest');
    }
}