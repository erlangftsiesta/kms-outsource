<?php

use App\Livewire\AboutPage;
use App\Livewire\Admin\JobForm;
use App\Livewire\Admin\JobList;
use App\Livewire\CareerPage;
use App\Livewire\HomePage;
use App\Livewire\JobDetailPage;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', HomePage::class)->name('home');
Route::get('/about', AboutPage::class)->name('about');
Route::get('/career', CareerPage::class)->name('career');
Route::get('/career/{id}', JobDetailPage::class)->name('job.detail');

// Admin routes dengan auth middleware
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/jobs', JobList::class)->name('jobs.index');
    Route::get('/jobs/create', JobForm::class)->name('jobs.create');
    Route::get('/jobs/{jobId}/edit', JobForm::class)->name('jobs.edit');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


require __DIR__.'/auth.php';