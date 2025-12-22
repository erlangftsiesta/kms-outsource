<?php

namespace App\Livewire\Admin;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

class JobList extends Component
{
    use WithPagination;

    public $search = '';
    public $filterCategory = '';
    public $confirmingDeletion = false;
    public $jobToDelete = null;

    protected $queryString = ['search', 'filterCategory'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterCategory()
    {
        $this->resetPage();
    }

    public function confirmDelete($jobId)
    {
        $this->jobToDelete = $jobId;
        $this->confirmingDeletion = true;
    }

    public function deleteJob()
    {
        if ($this->jobToDelete) {
            Job::find($this->jobToDelete)->delete();
            $this->confirmingDeletion = false;
            $this->jobToDelete = null;
            session()->flash('message', 'Job deleted successfully.');
        }
    }

    public function toggleStatus($jobId)
    {
        $job = Job::find($jobId);
        $job->is_active = !$job->is_active;
        $job->save();
        session()->flash('message', 'Job status updated.');
    }

    public function toggleUrgent($jobId)
    {
        $job = Job::find($jobId);
        $job->is_urgent = !$job->is_urgent;
        $job->save();
        session()->flash('message', 'Job urgency updated.');
    }

    public function render()
    {
        $query = Job::with(['category', 'locations'])
            ->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('position', 'like', '%' . $this->search . '%')
                  ->orWhereHas('locations', function ($q) {
                      $q->where('city', 'like', '%' . $this->search . '%');
                  });
            });

        if ($this->filterCategory) {
            $query->where('category_id', $this->filterCategory);
        }

        $jobs = $query->latest()->paginate(10);
        $categories = \App\Models\Category::active()->get();

        return view('livewire.admin.job-list', compact('jobs', 'categories'))
            ->layout('layouts.app');
    }
}