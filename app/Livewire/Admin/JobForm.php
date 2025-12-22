<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\CommonRequirement;
use App\Models\Job;
use App\Models\JobLocation;
use Livewire\Component;

class JobForm extends Component
{
    public $jobId;
    public $category_id = '';
    public $title = '';
    public $position = '';
    public $salary_min;
    public $salary_max;
    public $closed_at;
    public $is_urgent = false;
    public $is_active = true;

    // Arrays
    public $locations = [];
    public $requirements = [];
    public $descriptions = [];

    // Inputs
    public $locationInput = '';
    public $requirementInput = '';
    public $descriptionInput = '';

    public $categories;
    public $commonRequirements;

    public function mount($jobId = null)
    {
        $this->categories = Category::active()->get();
        $this->commonRequirements = CommonRequirement::mostUsed(15)->get();

        if ($jobId) {
            $this->jobId = $jobId;
            $job = Job::with('locations')->findOrFail($jobId);
            
            $this->category_id = $job->category_id;
            $this->title = $job->title;
            $this->position = $job->position;
            $this->salary_min = $job->salary_min;
            $this->salary_max = $job->salary_max;
            $this->closed_at = $job->closed_at?->format('Y-m-d');
            $this->is_urgent = $job->is_urgent;
            $this->is_active = $job->is_active;
            
            $this->locations = $job->locations->pluck('city')->toArray();
            $this->requirements = $job->requirements ?? [];
            $this->descriptions = $job->descriptions ?? [];
        }
    }

    // Location methods
    public function addLocation()
    {
        $city = trim($this->locationInput);
        if ($city && !in_array($city, $this->locations)) {
            $this->locations[] = $city;
            $this->locationInput = '';
        }
    }

    public function removeLocation($index)
    {
        unset($this->locations[$index]);
        $this->locations = array_values($this->locations);
    }

    // Requirement methods
    public function addRequirement()
    {
        $requirement = trim($this->requirementInput);
        if ($requirement && !in_array($requirement, $this->requirements)) {
            $this->requirements[] = $requirement;
            $this->requirementInput = '';
        }
    }

    public function addCommonRequirement($text)
    {
        if (!in_array($text, $this->requirements)) {
            $this->requirements[] = $text;
        }
    }

    public function removeRequirement($index)
    {
        unset($this->requirements[$index]);
        $this->requirements = array_values($this->requirements);
    }

    // Description methods
    public function addDescription()
    {
        $description = trim($this->descriptionInput);
        if ($description && !in_array($description, $this->descriptions)) {
            $this->descriptions[] = $description;
            $this->descriptionInput = '';
        }
    }

    public function removeDescription($index)
    {
        unset($this->descriptions[$index]);
        $this->descriptions = array_values($this->descriptions);
    }

    protected function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary_min' => 'nullable|integer|min:0',
            'salary_max' => 'nullable|integer|min:0|gte:salary_min',
            'closed_at' => 'nullable|date|after:today',
            'is_urgent' => 'boolean',
            'is_active' => 'boolean',
            'locations' => 'required|array|min:1',
            'requirements' => 'nullable|array',
            'descriptions' => 'nullable|array',
        ];
    }

    protected $messages = [
        'category_id.required' => 'Please select a category',
        'title.required' => 'Job title is required',
        'position.required' => 'Position is required',
        'salary_max.gte' => 'Max salary must be greater than or equal to min salary',
        'closed_at.after' => 'Deadline must be in the future',
        'locations.required' => 'At least one location is required',
        'locations.min' => 'At least one location is required',
    ];

    public function save()
    {
        $this->validate();

        $jobData = [
            'category_id' => $this->category_id,
            'title' => $this->title,
            'position' => $this->position,
            'salary_min' => $this->salary_min,
            'salary_max' => $this->salary_max,
            'closed_at' => $this->closed_at,
            'is_urgent' => $this->is_urgent,
            'is_active' => $this->is_active,
            'requirements' => $this->requirements,
            'descriptions' => $this->descriptions,
        ];

        if ($this->jobId) {
            $job = Job::findOrFail($this->jobId);
            $job->update($jobData);
            
            // Update locations
            $job->locations()->delete();
            foreach ($this->locations as $city) {
                JobLocation::create([
                    'job_id' => $job->id,
                    'city' => $city,
                ]);
            }
            
            session()->flash('message', 'Job updated successfully.');
        } else {
            $job = Job::create($jobData);
            
            // Create locations
            foreach ($this->locations as $city) {
                JobLocation::create([
                    'job_id' => $job->id,
                    'city' => $city,
                ]);
            }
            
            session()->flash('message', 'Job created successfully.');
        }

        // Update usage count for common requirements
        foreach ($this->requirements as $req) {
            $common = CommonRequirement::where('text', $req)->first();
            if ($common) {
                $common->incrementUsage();
            } else {
                CommonRequirement::create(['text' => $req, 'usage_count' => 1]);
            }
        }

        return redirect()->route('admin.jobs.index');
    }

    public function render()
    {
        return view('livewire.admin.job-form')
            ->layout('layouts.app');
    }
}