<!-- resources/views/livewire/career-page.blade.php -->
<div class="min-h-screen bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Redesigned header with Montserrat and elegant spacing -->
        <div class="mb-16 text-center border-b border-slate-200 pb-12">
            <h1 class="text-5xl md:text-6xl font-light text-slate-900 mb-6 tracking-tight" style="font-family: 'Montserrat', sans-serif;">Career Opportunities</h1>
            <p class="text-lg text-slate-600 font-light tracking-wide" style="font-family: 'Montserrat', sans-serif;">Discover Your Next Professional Chapter</p>
        </div>

        <!-- Refined search and filters with clean, sharp styling -->
        <div class="mb-12 space-y-6">
            <!-- Search Bar -->
            <div class="relative">
                <input 
                    type="text" 
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search positions by title or keyword..."
                    class="w-full px-6 py-4 border border-slate-300 focus:border-amber-600 focus:ring-1 focus:ring-amber-600 transition-all text-slate-900 placeholder-slate-400"
                    style="font-family: 'Montserrat', sans-serif;">
                <svg class="absolute right-4 top-4 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>

            <!-- Category filter with elegant button styling -->
            <div class="flex flex-wrap gap-2">
                <button 
                    wire:click="clearFilter"
                    class="px-6 py-2.5 border transition-all duration-200 {{ !$selectedCategory ? 'bg-slate-900 text-white border-slate-900' : 'bg-white text-slate-700 border-slate-300 hover:border-slate-900' }}"
                    style="font-family: 'Montserrat', sans-serif; font-size: 0.875rem; letter-spacing: 0.025em;">
                    All Positions
                </button>
                @foreach($categories as $category)
                <button 
                    wire:click="selectCategory('{{ $category->id }}')"
                    class="px-6 py-2.5 border transition-all duration-200 {{ $selectedCategory == $category->id ? 'bg-slate-900 text-white border-slate-900' : 'bg-white text-slate-700 border-slate-300 hover:border-slate-900' }}"
                    style="font-family: 'Montserrat', sans-serif; font-size: 0.875rem; letter-spacing: 0.025em;">
                    {{ $category->name }} <span class="ml-1 opacity-60">({{ $category->active_jobs_count }})</span>
                </button>
                @endforeach
            </div>
        </div>

        <!-- Jobs grid with clean card design and sharp borders -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @forelse($jobs as $job)
            <a href="/career/{{ $job->id }}" 
               wire:navigate
               class="block bg-white border border-slate-200 p-8 hover:border-amber-600 hover:shadow-lg transition-all duration-300 group">
                
                <!-- Category and urgent tags with refined styling -->
                <div class="flex items-start justify-between mb-6 pb-6 border-b border-slate-100">
                    <span class="bg-slate-100 text-slate-900 px-4 py-1.5 text-xs font-medium tracking-wider uppercase" style="font-family: 'Montserrat', sans-serif;">
                        {{ $job->category->name }}
                    </span>
                    @if($job->is_urgent)
                    <span class="bg-amber-100 text-amber-800 px-3 py-1.5 text-xs font-bold tracking-wider uppercase border border-amber-300" style="font-family: 'Montserrat', sans-serif;">
                        Urgent
                    </span>
                    @endif
                </div>

                <!-- Job title and position with elegant typography -->
                <h3 class="text-xl font-semibold text-slate-900 mb-2 line-clamp-2 group-hover:text-amber-700 transition-colors" style="font-family: 'Montserrat', sans-serif; letter-spacing: -0.01em;">
                    {{ $job->title }}
                </h3>
                <p class="text-slate-600 mb-6 font-light" style="font-family: 'Montserrat', sans-serif;">{{ $job->position }}</p>

                <!-- Job details with refined icons and spacing -->
                <div class="space-y-3 text-sm text-slate-600" style="font-family: 'Montserrat', sans-serif;">
                    <div class="flex items-start">
                        <svg class="w-4 h-4 mr-3 mt-0.5 flex-shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        <span class="line-clamp-1">{{ $job->locations->pluck('city')->join(', ') }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-3 flex-shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="font-medium">{{ $job->salary_range }}</span>
                    </div>
                    @if($job->closed_at)
                    <div class="flex items-center text-amber-700 pt-3 border-t border-slate-100">
                        <svg class="w-4 h-4 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs uppercase tracking-wide">Closes {{ $job->closed_at->format('d M Y') }}</span>
                    </div>
                    @endif
                </div>
            </a>
            @empty
            <!-- Empty state with refined styling -->
            <div class="col-span-full text-center py-20 border border-dashed border-slate-300">
                <svg class="w-16 h-16 mx-auto text-slate-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <p class="text-xl text-slate-500 font-light" style="font-family: 'Montserrat', sans-serif;">No Positions Available</p>
                <p class="text-sm text-slate-400 mt-2" style="font-family: 'Montserrat', sans-serif;">Please adjust your search criteria</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination with matching style -->
        <div class="mt-12 pt-8 border-t border-slate-200">
            {{ $jobs->links() }}
        </div>
    </div>
</div>
