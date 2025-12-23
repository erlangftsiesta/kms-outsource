<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class CategoryForm extends Component
{
    public $categoryId;
    public $name = '';
    public $description = '';
    public $order = 0;
    public $is_active = true;

    public function mount($categoryId = null)
    {
        if ($categoryId) {
            $this->categoryId = $categoryId;
            $category = Category::findOrFail($categoryId);
            $this->fill($category->toArray());
        } else {
            // Set default order to last
            $this->order = Category::max('order') + 1;
        }
    }

    protected function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ];

        // Add unique rule for name, excluding current category if editing
        if ($this->categoryId) {
            $rules['name'] .= '|unique:categories,name,' . $this->categoryId;
        } else {
            $rules['name'] .= '|unique:categories,name';
        }

        return $rules;
    }

    public function save()
    {
        $this->validate();

        if ($this->categoryId) {
            Category::findOrFail($this->categoryId)->update([
                'name' => $this->name,
                'description' => $this->description,
                'order' => $this->order,
                'is_active' => $this->is_active,
            ]);
            session()->flash('message', 'Category updated successfully.');
        } else {
            Category::create([
                'name' => $this->name,
                'description' => $this->description,
                'order' => $this->order,
                'is_active' => $this->is_active,
            ]);
            session()->flash('message', 'Category created successfully.');
        }

        return redirect()->route('admin.categories.index');
    }

    public function render()
    {
        return view('livewire.admin.category-form')
            ->layout('layouts.app');
    }
}