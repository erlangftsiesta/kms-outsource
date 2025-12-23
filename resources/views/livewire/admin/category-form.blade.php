<div class="py-16 bg-slate-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white border border-slate-200">
            <!-- Header -->
            <div class="px-8 py-8 bg-slate-900 border-b border-slate-200">
                <h2 class="text-2xl font-light text-white tracking-tight" style="font-family: 'Montserrat', sans-serif;">
                    {{ $categoryId ? 'Edit Category' : 'Create New Category' }}
                </h2>
            </div>

            <!-- Form Content -->
            <div class="p-8">
                <form wire:submit="save" class="space-y-8">
                    <div class="space-y-8">
                        <!-- Category Name -->
                        <div>
                            <label class="block text-sm font-medium text-slate-900 mb-3" style="font-family: 'Montserrat', sans-serif; letter-spacing: 0.5px;">
                                Category Name
                            </label>
                            <input type="text" wire:model="name" 
                                   class="w-full px-4 py-3 border border-slate-300 bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 transition"
                                   style="font-family: 'Montserrat', sans-serif; font-weight: 300;"
                                   placeholder="e.g., Marketing">
                            @error('name') <span class="text-red-600 text-sm mt-2 block" style="font-family: 'Montserrat', sans-serif;">{{ $message }}</span> @enderror
                        </div>

                        <!-- Icon -->
                        <div>
                            <!-- <label class="block text-sm font-medium text-slate-900 mb-3" style="font-family: 'Montserrat', sans-serif; letter-spacing: 0.5px;">
                                Icon Class or Symbol
                            </label> -->
                            <!-- <input type="text" wire:model="icon" 
                                   class="w-full px-4 py-3 border border-slate-300 bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 transition"
                                   style="font-family: 'Montserrat', sans-serif; font-weight: 300;"
                                   placeholder="briefcase"> -->
                            <!-- <p class="text-xs text-slate-600 mt-2" style="font-family: 'Montserrat', sans-serif; font-weight: 300;">Icon class name or symbol</p> -->
                        </div>

                        <!-- Display Order -->
                        <div>
                            <label class="block text-sm font-medium text-slate-900 mb-3" style="font-family: 'Montserrat', sans-serif; letter-spacing: 0.5px;">
                                Display Order
                            </label>
                            <input type="number" wire:model="order" 
                                   class="w-full px-4 py-3 border border-slate-300 bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 transition"
                                   style="font-family: 'Montserrat', sans-serif; font-weight: 300;"
                                   min="0">
                            @error('order') <span class="text-red-600 text-sm mt-2 block" style="font-family: 'Montserrat', sans-serif;">{{ $message }}</span> @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-slate-900 mb-3" style="font-family: 'Montserrat', sans-serif; letter-spacing: 0.5px;">
                                Description
                            </label>
                            <textarea wire:model="description" rows="4" 
                                      class="w-full px-4 py-3 border border-slate-300 bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 transition resize-none"
                                      style="font-family: 'Montserrat', sans-serif; font-weight: 300;"
                                      placeholder="Brief description of this category"></textarea>
                            @error('description') <span class="text-red-600 text-sm mt-2 block" style="font-family: 'Montserrat', sans-serif;">{{ $message }}</span> @enderror
                        </div>

                        <!-- Active Status -->
                        <div class="flex items-center pt-4">
                            <input type="checkbox" wire:model="is_active" id="is_active" class="w-4 h-4 border border-slate-300 accent-amber-500 cursor-pointer">
                            <label for="is_active" class="ml-3 text-sm font-light text-slate-900 cursor-pointer" style="font-family: 'Montserrat', sans-serif;">
                                Active
                            </label>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end gap-4 pt-8 border-t border-slate-200">
                        <a href="{{ route('admin.categories.index') }}" 
                           class="px-6 py-3 border border-slate-300 text-slate-900 hover:bg-slate-50 transition font-light"
                           style="font-family: 'Montserrat', sans-serif; letter-spacing: 0.5px;">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white transition font-light"
                                style="font-family: 'Montserrat', sans-serif; letter-spacing: 0.5px;">
                            {{ $categoryId ? 'Update' : 'Create' }} Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
