<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;

    public $search = '';
    public $confirmingDeletion = false;
    public $categoryToDelete = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($categoryId)
    {
        $this->categoryToDelete = $categoryId;
        $this->confirmingDeletion = true;
    }

    public function deleteCategory()
    {
        if ($this->categoryToDelete) {
            $category = Category::find($this->categoryToDelete);
            
            // Check if category has jobs
            if ($category->jobs()->count() > 0) {
                session()->flash('error', 'Cannot delete category with existing jobs.');
            } else {
                $category->delete();
                session()->flash('message', 'Category deleted successfully.');
            }
            
            $this->confirmingDeletion = false;
            $this->categoryToDelete = null;
        }
    }

    public function toggleStatus($categoryId)
    {
        $category = Category::find($categoryId);
        $category->is_active = !$category->is_active;
        $category->save();
        session()->flash('message', 'Category status updated.');
    }

    public function render()
    {
        $categories = Category::where('name', 'like', '%' . $this->search . '%')
            ->withCount('jobs')
            ->orderBy('order')
            ->paginate(15);

        return view('livewire.admin.category-list', compact('categories'))
            ->layout('layouts.app');
    }
}