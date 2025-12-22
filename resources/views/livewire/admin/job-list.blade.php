<div class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm">
            <div class="p-8">
                <!-- Header -->
                <div class="flex justify-between items-center mb-8 pb-6 border-b-2 border-slate-200">
                    <h2 class="text-3xl font-light text-slate-800 tracking-wide" style="font-family: 'Montserrat', sans-serif;">Job Management</h2>
                    <a href="{{ route('admin.jobs.create') }}" 
                       class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-3 inline-flex items-center transition-all duration-300 font-light tracking-wide" 
                       style="font-family: 'Montserrat', sans-serif;">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add New Job
                    </a>
                </div>

                <!-- Flash Message -->
                @if (session()->has('message'))
                    <div class="bg-green-50 border-l-4 border-green-600 text-green-800 px-6 py-4 mb-6 flex justify-between items-center" style="font-family: 'Montserrat', sans-serif;">
                        <span class="font-light">{{ session('message') }}</span>
                        <button onclick="this.parentElement.remove()" class="text-green-800 hover:text-green-900 text-2xl leading-none">&times;</button>
                    </div>
                @endif

                <!-- Filters -->
                <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <input type="text" 
                               wire:model.live.debounce.300ms="search" 
                               placeholder="Search jobs by title, position, or location..."
                               class="w-full px-4 py-3 border border-slate-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 font-light tracking-wide transition-all" 
                               style="font-family: 'Montserrat', sans-serif;">
                    </div>
                    <div>
                        <select wire:model.live="filterCategory" 
                                class="w-full px-4 py-3 border border-slate-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 font-light tracking-wide transition-all" 
                                style="font-family: 'Montserrat', sans-serif;">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Jobs Table -->
                <div class="overflow-x-auto border border-slate-200">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-800">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider" style="font-family: 'Montserrat', sans-serif;">Job Details</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider" style="font-family: 'Montserrat', sans-serif;">Category</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider" style="font-family: 'Montserrat', sans-serif;">Locations</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider" style="font-family: 'Montserrat', sans-serif;">Salary Range</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider" style="font-family: 'Montserrat', sans-serif;">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider" style="font-family: 'Montserrat', sans-serif;">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200">
                            @forelse ($jobs as $job)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-start">
                                            <div>
                                                <div class="text-sm font-medium text-slate-900 flex items-center gap-3" style="font-family: 'Montserrat', sans-serif;">
                                                    {{ $job->title }}
                                                    @if($job->is_urgent)
                                                        <span class="px-3 py-1 text-xs bg-red-600 text-white font-light tracking-wide" style="font-family: 'Montserrat', sans-serif;">URGENT</span>
                                                    @endif
                                                </div>
                                                <div class="text-sm text-slate-600 mt-1 font-light" style="font-family: 'Montserrat', sans-serif;">{{ $job->position }}</div>
                                                <div class="text-xs text-slate-400 mt-2 font-light" style="font-family: 'Montserrat', sans-serif;">
                                                    Deadline: {{ $job->closed_at ? $job->closed_at->format('d M Y') : 'No deadline' }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs leading-5 font-light bg-amber-100 text-amber-900 border-l-2 border-amber-600" style="font-family: 'Montserrat', sans-serif;">
                                            {{ $job->category->name }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-slate-700 font-light" style="font-family: 'Montserrat', sans-serif;">
                                            @foreach($job->locations as $location)
                                                <div class="flex items-center gap-2 mb-1">
                                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    </svg>
                                                    {{ $location->full_location }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-slate-900 font-light" style="font-family: 'Montserrat', sans-serif;">
                                            {{ $job->salary_range ?? 'Negotiable' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex flex-col gap-2">
                                            <button wire:click="toggleStatus('{{ $job->id }}')" 
                                                    class="px-3 py-1 text-xs leading-5 font-light tracking-wide transition-all {{ $job->is_active ? 'bg-green-600 text-white hover:bg-green-700' : 'bg-slate-300 text-slate-700 hover:bg-slate-400' }}" 
                                                    style="font-family: 'Montserrat', sans-serif;">
                                                {{ $job->is_active ? 'Active' : 'Inactive' }}
                                            </button>
                                            <button wire:click="toggleUrgent('{{ $job->id }}')" 
                                                    class="px-3 py-1 text-xs leading-5 font-light tracking-wide transition-all {{ $job->is_urgent ? 'bg-amber-600 text-white hover:bg-amber-700' : 'bg-slate-200 text-slate-700 hover:bg-slate-300' }}" 
                                                    style="font-family: 'Montserrat', sans-serif;">
                                                {{ $job->is_urgent ? 'Urgent' : 'Normal' }}
                                            </button>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-light">
                                        <div class="flex items-center gap-4" style="font-family: 'Montserrat', sans-serif;">
                                            <a href="{{ route('admin.jobs.edit', $job->id) }}" 
                                               class="text-amber-600 hover:text-amber-800 flex items-center gap-1 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                Edit
                                            </a>
                                            <button wire:click="confirmDelete('{{ $job->id }}')" 
                                                    class="text-red-600 hover:text-red-800 flex items-center gap-1 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center justify-center text-slate-500">
                                            <svg class="w-20 h-20 mb-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                            </svg>
                                            <p class="text-lg font-light tracking-wide" style="font-family: 'Montserrat', sans-serif;">No jobs found</p>
                                            <p class="text-sm mt-2 font-light" style="font-family: 'Montserrat', sans-serif;">Try adjusting your search or filter to find what you're looking for.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    @if ($confirmingDeletion)
        <div class="fixed z-50 inset-0 overflow-y-auto" x-data>
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                <div class="fixed inset-0 bg-slate-900 bg-opacity-75 transition-opacity" wire:click="$set('confirmingDeletion', false)"></div>
                <div class="inline-block align-bottom bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-6 pt-6 pb-4 sm:p-8">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-slate-900 tracking-wide" style="font-family: 'Montserrat', sans-serif;">Delete Job</h3>
                                <div class="mt-3">
                                    <p class="text-sm text-slate-600 font-light leading-relaxed" style="font-family: 'Montserrat', sans-serif;">Are you sure you want to delete this job? This action cannot be undone. All data including locations and requirements will be permanently removed.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-slate-50 px-6 py-4 sm:px-8 sm:flex sm:flex-row-reverse gap-3">
                        <button wire:click="deleteJob" 
                                class="w-full inline-flex justify-center px-6 py-3 bg-red-600 text-base font-light text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:w-auto sm:text-sm tracking-wide transition-all" 
                                style="font-family: 'Montserrat', sans-serif;">
                            Delete
                        </button>
                        <button wire:click="$set('confirmingDeletion', false)" 
                                class="mt-3 w-full inline-flex justify-center border border-slate-300 px-6 py-3 bg-white text-base font-light text-slate-700 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 sm:mt-0 sm:w-auto sm:text-sm tracking-wide transition-all" 
                                style="font-family: 'Montserrat', sans-serif;">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
