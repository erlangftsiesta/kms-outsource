<div class="font-sans">
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wMiI+PHBhdGggZD0iTTM2IDM0djItaDJ2LTJoLTJ6bTAgNGgtMnYyaDJ2LTJ6bTAtOGgtMnYyaDJ2LTJ6bTQgNHYtMmgydjJoLTJ6bS00IDB2Mmgydi0yaC0yem0tNCAwaC0ydjJoMnYtMnptOC00aDJ2LTJoLTJ2MnptLTggMGgtMnYyaDJ2LTJ6Ii8+PC9nPjwvZz48L3N2Zz4=')] opacity-30"></div>
        
        <div class="relative z-10 max-w-5xl mx-auto text-center px-6">
            <div class="inline-block mb-6">
                <span class="text-amber-400 text-sm font-semibold tracking-[0.3em] uppercase">Excellence in Recruitment</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 tracking-tight leading-tight">
                Transform Your Business<br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-200">with Top Talent</span>
            </h1>
            <p class="text-xl md:text-2xl text-slate-300 mb-12 font-light max-w-3xl mx-auto leading-relaxed">
                Strategic workforce solutions for forward-thinking organizations
            </p>
            <a href="/career" 
               wire:navigate
               class="inline-flex items-center gap-3 bg-amber-400 text-slate-900 px-10 py-4 rounded-none font-semibold hover:bg-amber-300 transition-all duration-300 uppercase tracking-wider text-sm">
                Explore Opportunities
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <div class="absolute bottom-12 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-3xl mb-20">
                <span class="text-amber-500 text-sm font-semibold tracking-[0.3em] uppercase mb-4 block">Our Expertise</span>
                <h2 class="text-5xl font-bold text-slate-900 mb-6 tracking-tight leading-tight">
                    Comprehensive Talent Solutions
                </h2>
                <p class="text-xl text-slate-600 font-light leading-relaxed">
                    Connecting exceptional professionals with organizations across multiple industries
                </p>
            </div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($categories as $category)
    <div class="group bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl border border-gray-200 hover:border-blue-500 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
        <!-- Icon SVG -->
        <div class="mb-4 text-amber-600">
            {!! $category->renderIcon('w-12 h-12') !!}
        </div>
        <h3 class="text-2xl font-bold mb-3 text-gray-900 group-hover:text-amber-600 transition">
            {{ $category->name }}
        </h3>
        <p class="text-gray-600 mb-4">{{ $category->description }}</p>
        <div class="flex items-center justify-between">
            <span class="text-sm text-gray-500">{{ $category->active_jobs_count }} open positions</span>
            <a href="/career?category={{ $category->id }}" 
               wire:navigate
               class="text-amber-600 font-semibold hover:text-amber-700 flex items-center group-hover:translate-x-2 transition">
                View Jobs
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
    @endforeach
</div>
        </div>
    </section>

    <!-- Urgent Jobs -->
    @if($urgentJobs->count() > 0)
    <section class="py-32 bg-slate-900">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-3xl mb-20">
                <div class="flex items-center gap-3 mb-4">
                    <span class="inline-block h-px w-12 bg-amber-400"></span>
                    <span class="text-amber-400 text-sm font-semibold tracking-[0.3em] uppercase">Immediate Openings</span>
                </div>
                <h2 class="text-5xl font-bold text-white mb-6 tracking-tight leading-tight">
                    Priority Positions
                </h2>
                <p class="text-xl text-slate-400 font-light leading-relaxed">
                    Exclusive opportunities available now
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($urgentJobs as $job)
                <a href="/career/{{ $job->id }}" 
                   wire:navigate
                   class="group block bg-slate-800 p-8 hover:bg-slate-750 transition-all duration-300 border border-slate-700 hover:border-amber-400">
                    <div class="flex items-start justify-between mb-6">
                        <span class="text-slate-400 text-xs font-semibold uppercase tracking-wider">
                            {{ $job->category->name }}
                        </span>
                        <span class="bg-amber-400 text-slate-900 px-3 py-1 text-xs font-bold uppercase tracking-wider">
                            Urgent
                        </span>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-white mb-2 tracking-tight group-hover:text-amber-400 transition-colors">
                        {{ $job->title }}
                    </h3>
                    <p class="text-slate-400 mb-6 font-light">{{ $job->position }}</p>
                    
                    <div class="space-y-3 pt-6 border-t border-slate-700">
                        <div class="flex items-center gap-3 text-sm text-slate-400">
                            <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>{{ $job->locations->pluck('city')->join(', ') }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-slate-400">
                            <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ $job->salary_range }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="py-32 bg-white">
        <div class="max-w-4xl mx-auto text-center px-6">
            <div class="inline-block mb-6">
                <span class="text-amber-500 text-sm font-semibold tracking-[0.3em] uppercase">Join Us</span>
            </div>
            <h2 class="text-5xl font-bold text-slate-900 mb-6 tracking-tight leading-tight">
                Ready to Elevate Your Career?
            </h2>
            <p class="text-xl text-slate-600 mb-12 font-light leading-relaxed max-w-2xl mx-auto">
                Join hundreds of professionals who've found their perfect role through our platform
            </p>
            <a href="/career" 
               wire:navigate
               class="inline-flex items-center gap-3 bg-slate-900 text-white px-10 py-4 rounded-none font-semibold hover:bg-slate-800 transition-all duration-300 uppercase tracking-wider text-sm">
                Browse All Positions
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>
</div>
<div class="hidden">
    <p>Develop with ♥️ by erlangftsiesta</p>
</div>

<!-- <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap');
    
    .font-sans {
        font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }
</style> -->
