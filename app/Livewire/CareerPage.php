<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

class CareerPage extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCategory = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedCategory' => ['except' => '', 'as' => 'category'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->resetPage();
    }

    public function clearFilter()
    {
        $this->selectedCategory = '';
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::active()
            ->withCount(['activeJobs'])
            ->get()
            ->map(function ($category) {
                $category->active_jobs_count = $category->active_jobs_count;
                return $category;
            });

        $query = Job::with(['category', 'locations'])
            ->active()
            ->notClosed();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('position', 'like', '%' . $this->search . '%')
                  ->orWhereHas('locations', function ($q) {
                      $q->where('city', 'like', '%' . $this->search . '%');
                  });
            });
        }

        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        $jobs = $query->latest()->paginate(12);

        return view('livewire.career-page', [
            'categories' => $categories,
            'jobs' => $jobs,
        ])->layout('layouts.guest');
    }
}