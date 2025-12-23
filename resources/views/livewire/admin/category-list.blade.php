<div class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex justify-between items-start mb-8">
            <div>
                <h1 class="text-4xl font-light text-slate-900" style="font-family: 'Montserrat', sans-serif;">Category Management</h1>
                <p class="text-sm text-slate-500 mt-2" style="font-family: 'Montserrat', sans-serif;">Organize and manage job categories</p>
            </div>
            <a href="{{ route('admin.categories.create') }}" 
               class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-3 border border-amber-600 transition-colors duration-200"
               style="font-family: 'Montserrat', sans-serif; font-weight: 500;">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    New Category
                </div>
            </a>
        </div>

        <!-- Flash Messages -->
        @if (session()->has('message'))
            <div class="bg-slate-50 border border-slate-200 text-slate-900 px-6 py-4 mb-6 flex justify-between items-center" style="font-family: 'Montserrat', sans-serif;">
                <span class="text-sm">{{ session('message') }}</span>
                <button onclick="this.parentElement.remove()" class="text-slate-400 hover:text-slate-600">×</button>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="bg-red-50 border border-red-200 text-red-900 px-6 py-4 mb-6 flex justify-between items-center" style="font-family: 'Montserrat', sans-serif;">
                <span class="text-sm">{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600">×</button>
            </div>
        @endif

        <!-- Search -->
        <div class="mb-8">
            <input type="text" 
                   wire:model.live.debounce.300ms="search" 
                   placeholder="Search categories..."
                   class="w-full px-4 py-3 border border-slate-200 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-amber-600 focus:ring-0 transition-colors"
                   style="font-family: 'Montserrat', sans-serif;">
        </div>

        <!-- Categories Table -->
        <div class="border border-slate-200 overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="px-6 py-4 text-left text-xs font-medium text-slate-600 uppercase tracking-wide" style="font-family: 'Montserrat', sans-serif;">Order</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-slate-600 uppercase tracking-wide" style="font-family: 'Montserrat', sans-serif;">Category</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-slate-600 uppercase tracking-wide" style="font-family: 'Montserrat', sans-serif;">Description</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-slate-600 uppercase tracking-wide" style="font-family: 'Montserrat', sans-serif;">Jobs</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-slate-600 uppercase tracking-wide" style="font-family: 'Montserrat', sans-serif;">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-slate-600 uppercase tracking-wide" style="font-family: 'Montserrat', sans-serif;">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse ($categories as $category)
                        <tr class="hover:bg-slate-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-light text-slate-900" style="font-family: 'Montserrat', sans-serif;">{{ $category->order }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <span class="text-lg">{{ $category->icon }}</span>
                                    <div>
                                        <div class="text-sm font-medium text-slate-900" style="font-family: 'Montserrat', sans-serif;">{{ $category->name }}</div>
                                        <div class="text-xs text-slate-500" style="font-family: 'Montserrat', sans-serif;">{{ $category->slug }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-slate-700 line-clamp-2" style="font-family: 'Montserrat', sans-serif;">{{ $category->description }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-light text-slate-900" style="font-family: 'Montserrat', sans-serif;">{{ $category->jobs_count }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button wire:click="toggleStatus('{{ $category->id }}')" 
                                        class="px-3 py-1 text-xs border transition-colors" 
                                        style="font-family: 'Montserrat', sans-serif; font-weight: 500;"
                                        :class="$category->is_active ? 'border-amber-600 text-amber-600 hover:bg-amber-50' : 'border-slate-300 text-slate-600 hover:bg-slate-50'">
                                    {{ $category->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-4">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" 
                                       class="text-amber-600 hover:text-amber-700 transition-colors flex items-center gap-1"
                                       style="font-family: 'Montserrat', sans-serif; font-weight: 500;">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <button wire:click="confirmDelete('{{ $category->id }}')" 
                                            class="text-red-600 hover:text-red-700 transition-colors flex items-center gap-1"
                                            style="font-family: 'Montserrat', sans-serif; font-weight: 500;">
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
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 mb-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    <p class="text-sm font-light text-slate-500" style="font-family: 'Montserrat', sans-serif;">No categories found</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $categories->links() }}
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    @if ($confirmingDeletion)
        <div class="fixed z-50 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 py-8">
                <div class="fixed inset-0 bg-slate-900 bg-opacity-50 transition-opacity" wire:click="$set('confirmingDeletion', false)"></div>
                <div class="relative inline-block w-full max-w-md bg-white text-left overflow-hidden">
                    <div class="px-8 py-8">
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 bg-red-50">
                                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-slate-900" style="font-family: 'Montserrat', sans-serif;">Delete Category</h3>
                                <p class="mt-2 text-sm text-slate-600" style="font-family: 'Montserrat', sans-serif;">Are you sure? This action cannot be undone.</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-slate-50 px-8 py-4 flex justify-end gap-3 border-t border-slate-200">
                        <button wire:click="$set('confirmingDeletion', false)" 
                                class="px-4 py-2 border border-slate-300 text-slate-700 hover:bg-slate-50 transition-colors"
                                style="font-family: 'Montserrat', sans-serif; font-weight: 500;">
                            Cancel
                        </button>
                        <button wire:click="deleteCategory" 
                                class="px-4 py-2 bg-red-600 text-white hover:bg-red-700 transition-colors border border-red-600"
                                style="font-family: 'Montserrat', sans-serif; font-weight: 500;">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
