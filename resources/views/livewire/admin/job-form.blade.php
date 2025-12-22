<!-- resources/views/livewire/admin/job-form.blade.php -->
<div class="min-h-screen bg-slate-50 py-12">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        
        .admin-form * {
            font-family: 'Montserrat', sans-serif;
        }
        
        .drag-handle {
            cursor: move;
        }
        
        .drag-handle:hover {
            color: #d97706;
        }
    </style>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white border-2 border-slate-200 p-8 admin-form">
            <!-- Header -->
            <div class="mb-8 pb-6 border-b-2 border-slate-200">
                <h1 class="text-3xl font-light text-slate-900 tracking-wide">
                    {{ $jobId ? 'Edit Job Posting' : 'Create Job Posting' }}
                </h1>
            </div>

            @if (session()->has('message'))
            <div class="mb-8 bg-emerald-50 border-l-4 border-emerald-600 text-emerald-800 px-6 py-4 font-light">
                {{ session('message') }}
            </div>
            @endif

            <form wire:submit="save" class="space-y-12">
                <!-- Basic Information -->
                <div class="space-y-6">
                    <h2 class="text-xl font-medium text-slate-900 pb-3 border-b border-slate-200 tracking-wide">
                        Basic Information
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2 tracking-wide">
                                Category <span class="text-amber-600">*</span>
                            </label>
                            <select wire:model="category_id" 
                                    class="w-full px-4 py-3 border-2 border-slate-200 focus:border-amber-500 focus:outline-none transition font-light">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-red-600 text-sm font-light">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2 tracking-wide">
                                Job Title <span class="text-amber-600">*</span>
                            </label>
                            <input type="text" 
                                   wire:model="title" 
                                   class="w-full px-4 py-3 border-2 border-slate-200 focus:border-amber-500 focus:outline-none transition font-light"
                                   placeholder="e.g., Marketing Manager">
                            @error('title') <span class="text-red-600 text-sm font-light">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2 tracking-wide">
                                Position <span class="text-amber-600">*</span>
                            </label>
                            <input type="text" 
                                   wire:model="position" 
                                   class="w-full px-4 py-3 border-2 border-slate-200 focus:border-amber-500 focus:outline-none transition font-light"
                                   placeholder="e.g., Staff">
                            @error('position') <span class="text-red-600 text-sm font-light">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2 tracking-wide">
                                Application Deadline
                            </label>
                            <input type="date" 
                                   wire:model="closed_at" 
                                   class="w-full px-4 py-3 border-2 border-slate-200 focus:border-amber-500 focus:outline-none transition font-light">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2 tracking-wide">
                                Minimum Salary (IDR)
                            </label>
                            <input type="number" 
                                   wire:model="salary_min" 
                                   class="w-full px-4 py-3 border-2 border-slate-200 focus:border-amber-500 focus:outline-none transition font-light"
                                   placeholder="4,000,000">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2 tracking-wide">
                                Maximum Salary (IDR)
                            </label>
                            <input type="number" 
                                   wire:model="salary_max" 
                                   class="w-full px-4 py-3 border-2 border-slate-200 focus:border-amber-500 focus:outline-none transition font-light"
                                   placeholder="7,000,000">
                        </div>
                    </div>

                    <div class="flex items-center pt-2">
                        <input type="checkbox" 
                               wire:model="is_urgent" 
                               id="is_urgent"
                               class="w-4 h-4 text-amber-600 border-2 border-slate-300 focus:ring-0 focus:ring-offset-0">
                        <label for="is_urgent" class="ml-3 text-sm font-medium text-slate-700 tracking-wide">
                            Mark as Urgent Position
                        </label>
                    </div>
                </div>

                <!-- Locations -->
                <div class="space-y-4">
                    <h2 class="text-xl font-medium text-slate-900 pb-3 border-b border-slate-200 tracking-wide">
                        Job Locations
                    </h2>
                    
                    <div class="flex gap-3">
                        <input type="text" 
                               wire:model="locationInput" 
                               wire:keydown.enter.prevent="addLocation"
                               class="flex-1 px-4 py-3 border-2 border-slate-200 focus:border-amber-500 focus:outline-none transition font-light"
                               placeholder="Enter city name and press Enter">
                        <button type="button" 
                                wire:click="addLocation"
                                class="px-8 py-3 bg-slate-800 text-white hover:bg-amber-600 transition font-medium tracking-wide">
                            Add
                        </button>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        @foreach($locations as $index => $location)
                        <span class="inline-flex items-center gap-3 bg-slate-100 text-slate-700 px-4 py-2 border border-slate-300 font-light">
                            {{ $location }}
                            <button type="button" 
                                    wire:click="removeLocation({{ $index }})"
                                    class="text-slate-400 hover:text-red-600 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </span>
                        @endforeach
                    </div>
                </div>

                <!-- Requirements -->
                <div class="space-y-4">
                    <h2 class="text-xl font-medium text-slate-900 pb-3 border-b border-slate-200 tracking-wide">
                        Requirements
                    </h2>
                    
                    <!-- Common Requirements -->
                    @if($commonRequirements->count() > 0)
                    <div class="bg-slate-50 p-5 border border-slate-200">
                        <p class="text-sm font-medium text-slate-700 mb-3 tracking-wide">Frequently Used:</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($commonRequirements as $common)
                            <button type="button"
                                    wire:click="addCommonRequirement('{{ $common->text }}')"
                                    class="px-4 py-2 bg-white border border-slate-300 text-slate-700 text-sm hover:border-amber-500 hover:text-amber-600 transition font-light">
                                {{ $common->text }}
                            </button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="flex gap-3">
                        <input type="text" 
                               wire:model="requirementInput" 
                               wire:keydown.enter.prevent="addRequirement"
                               class="flex-1 px-4 py-3 border-2 border-slate-200 focus:border-amber-500 focus:outline-none transition font-light"
                               placeholder="Type requirement and press Enter">
                        <button type="button" 
                                wire:click="addRequirement"
                                class="px-8 py-3 bg-slate-800 text-white hover:bg-amber-600 transition font-medium tracking-wide">
                            Add
                        </button>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        @foreach($requirements as $index => $requirement)
                        <span class="inline-flex items-center gap-3 bg-slate-100 text-slate-700 px-4 py-2 border border-slate-300 font-light">
                            {{ $requirement }}
                            <button type="button" 
                                    wire:click="removeRequirement({{ $index }})"
                                    class="text-slate-400 hover:text-red-600 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </span>
                        @endforeach
                    </div>
                </div>

                <!-- Job Descriptions with Drag & Drop -->
                <div class="space-y-4" x-data="{ 
                    items: @entangle('descriptions'),
                    init() {
                        this.$nextTick(() => {
                            if (this.$refs.sortable) {
                                new Sortable(this.$refs.sortable, {
                                    animation: 150,
                                    handle: '.drag-handle',
                                    onEnd: (evt) => {
                                        const newItems = Array.from(this.$refs.sortable.children).map(el => 
                                            el.querySelector('[data-description]').getAttribute('data-description')
                                        );
                                        this.items = newItems;
                                    }
                                });
                            }
                        });
                    }
                }">
                    <h2 class="text-xl font-medium text-slate-900 pb-3 border-b border-slate-200 tracking-wide">
                        Job Descriptions
                    </h2>
                    <p class="text-sm text-slate-600 font-light">Drag and drop to reorder descriptions (most important tasks first)</p>
                    
                    <div class="flex gap-3">
                        <input type="text" 
                               wire:model="descriptionInput" 
                               wire:keydown.enter.prevent="addDescription"
                               class="flex-1 px-4 py-3 border-2 border-slate-200 focus:border-amber-500 focus:outline-none transition font-light"
                               placeholder="Type job description and press Enter">
                        <button type="button" 
                                wire:click="addDescription"
                                class="px-8 py-3 bg-slate-800 text-white hover:bg-amber-600 transition font-medium tracking-wide">
                            Add
                        </button>
                    </div>

                    <div x-ref="sortable" class="space-y-2">
                        @foreach($descriptions as $index => $description)
                        <div class="flex items-center gap-4 bg-slate-50 p-4 border-2 border-slate-200 hover:border-amber-500 transition group">
                            <div class="drag-handle text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/>
                                </svg>
                            </div>
                            <span class="flex-1 text-slate-700 font-light" data-description="{{ $description }}">
                                {{ $index + 1 }}. {{ $description }}
                            </span>
                            <button type="button" 
                                    wire:click="removeDescription({{ $index }})"
                                    class="text-slate-400 hover:text-red-600 transition opacity-0 group-hover:opacity-100">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex gap-4 pt-8 border-t-2 border-slate-200">
                    <button type="submit" 
                            class="flex-1 bg-slate-800 text-white py-4 font-medium hover:bg-amber-600 transition tracking-wide">
                        {{ $jobId ? 'Update Job Posting' : 'Create Job Posting' }}
                    </button>
                    <a href="/admin/jobs" 
                       class="px-12 py-4 bg-slate-100 text-slate-700 border-2 border-slate-200 font-medium hover:border-slate-400 transition tracking-wide">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    @endpush
</div>
