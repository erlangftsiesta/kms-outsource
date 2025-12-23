<div class="font-sans">
    <div class="min-h-screen bg-gradient-to-b from-slate-50 to-slate-100">
    <div class="max-w-6xl mx-auto px-6 py-16">
        <!-- Back Navigation -->
        <a href="/career" 
           wire:navigate
           class="inline-flex items-center text-slate-600 hover:text-amber-600 mb-8 transition-colors duration-300 font-light tracking-wide">
            <svg class="w-4 h-4 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Careers
        </a>

        <!-- Job Header Section -->
        <div class="bg-white border border-slate-200 p-12 mb-8">
            <div class="mb-8">
                <div class="flex items-center gap-4 mb-6">
                    <span class="border border-slate-300 text-slate-700 px-6 py-2 text-sm font-light tracking-wider uppercase">
                        {{ $job->category->name }}
                    </span>
                    @if($job->is_urgent)
                    <span class="bg-amber-500 text-white px-6 py-2 text-sm font-medium tracking-wider uppercase">
                        Urgent Hiring
                    </span>
                    @endif
                </div>
                <h1 class="text-5xl font-light text-slate-900 mb-4 tracking-tight">{{ $job->title }}</h1>
                <p class="text-2xl text-slate-600 font-light">{{ $job->position }}</p>
            </div>

            <!-- Job Meta Information -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10 pt-8 border-t border-slate-200">
                <div class="flex items-start gap-4">
                    <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                    <div>
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Location</p>
                        <p class="font-light text-slate-900">{{ $job->locations->pluck('city')->join(', ') }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Salary Range</p>
                        <p class="font-light text-slate-900">{{ $job->salary_range ?? 'Negotiable' }}</p>
                    </div>
                </div>
                @if($job->closed_at)
                <div class="flex items-start gap-4">
                    <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Application Deadline</p>
                        <p class="font-light text-slate-900">{{ $job->closed_at->format('d M Y') }}</p>
                    </div>
                </div>
                @endif
            </div>

            <!-- Primary CTA -->
            <a href="https://wa.me/6281374565175?text=Halo,%20saya%20tertarik%20dengan%20posisi%20{{ urlencode($job->title) }}" 
               target="_blank"
               class="block w-full bg-slate-900 text-white text-center py-5 font-light tracking-widest uppercase hover:bg-amber-600 transition-colors duration-300">
                Apply via WhatsApp
            </a>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Job Details -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Requirements Section -->
                @if($job->requirements && count($job->requirements) > 0)
                <div class="bg-white border border-slate-200 p-10">
                    <h2 class="text-2xl font-light text-slate-900 mb-8 pb-4 border-b border-slate-200 tracking-wide">
                        Requirements
                    </h2>
                    <ul class="space-y-4">
                        @foreach($job->requirements as $requirement)
                        <li class="flex items-start gap-4">
                            <span class="inline-block w-1.5 h-1.5 bg-amber-600 mt-2.5 flex-shrink-0"></span>
                            <span class="text-slate-700 font-light leading-relaxed">{{ $requirement }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Job Description Section -->
<!-- Job Description Section -->
@if($job->descriptions && count($job->descriptions) > 0)
<div class="bg-white border border-slate-200 p-10">
    <h2 class="text-2xl font-light text-slate-900 mb-8 pb-4 border-b border-slate-200 tracking-wide">
        Job Description
    </h2>
    <ul class="space-y-4">
        @foreach($job->descriptions as $index => $description)
        <li class="flex items-start gap-4">
            <span class="inline-flex items-center justify-center w-7 h-7 border border-slate-300 text-slate-700 text-xs font-light flex-shrink-0 mt-0.5">
                {{ $index + 1 }}
            </span>
            <span class="text-slate-700 font-light leading-relaxed">{{ $description }}</span>
        </li>
        @endforeach
    </ul>
</div>
@endif

<!-- Important Notice Section -->
<div class="bg-gradient-to-br from-amber-50 to-orange-50 border-2 border-amber-500 p-10">
    <div class="flex items-start gap-4 mb-6">
        <svg class="w-8 h-8 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
        </svg>
        <div>
            <h3 class="text-2xl font-light text-slate-900 mb-4 tracking-wide">Important Notice</h3>
            <div class="space-y-3 text-slate-700 font-light leading-relaxed">
                <p class="text-lg">
                    <strong class="font-medium">This recruitment process is completely FREE OF CHARGE.</strong>
                </p>
                <p>
                    We never ask for any payment, fees, or deposits at any stage of the recruitment process. 
                    If anyone requests money from you claiming to represent our company, please report it immediately.
                </p>
            </div>
        </div>
    </div>
    
    <div class="mt-6 pt-6 border-t border-amber-200">
        <p class="text-slate-700 font-light mb-4 text-sm">
            Encountered suspicious activity? Report it now:
        </p>
        <a href="https://wa.me/6281374565175?text=Saya%20ingin%20melaporkan%20dugaan%20penipuan%20terkait%20rekrutmen%20{{ urlencode($job->title) }}" 
           target="_blank"
           class="inline-flex items-center gap-2 bg-red-600 text-white px-6 py-3 font-light tracking-wider uppercase text-sm hover:bg-red-700 transition-colors duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            Report Fraud Immediately
        </a>
    </div>
</div>
            </div>

            <!-- Right Column: Sidebar -->
            <div class="space-y-8">
                <!-- Quick Contact Card -->
                <div class="bg-slate-900 text-white p-8 border border-slate-800">
                    <h3 class="text-xl font-light mb-6 tracking-wide">Quick Contact</h3>
                    <p class="text-slate-300 font-light mb-6 leading-relaxed text-sm">Ready to join our team? Reach out to us directly.</p>
                    <div class="space-y-3">
                        <a href="https://wa.me/6281374565175?text=Halo,%20saya%20tertarik%20dengan%20posisi%20{{ urlencode($job->title) }}" 
                           target="_blank"
                           class="block w-full bg-white text-slate-900 text-center py-4 font-light tracking-wider uppercase text-sm hover:bg-amber-500 hover:text-white transition-colors duration-300">
                            WhatsApp
                        </a>
                        <a href="tel:+6281374565175" 
                           class="block w-full border border-white text-white text-center py-4 font-light tracking-wider uppercase text-sm hover:bg-white hover:text-slate-900 transition-colors duration-300">
                            Call Now
                        </a>
                    </div>
                    <p class="text-slate-400 text-sm font-light mt-6 text-center tracking-wide">+62 813-7456-5175</p>
                </div>

                <!-- Share Section -->
                <div class="bg-white border border-slate-200 p-8">
                    <h3 class="text-xl font-light text-slate-900 mb-6 tracking-wide">Share Position</h3>
                    <div class="space-y-3">
                        <a href="https://wa.me/?text=Check%20out%20this%20job:%20{{ urlencode($job->title) }}%20{{ url()->current() }}" 
                           target="_blank"
                           class="block w-full border border-slate-300 text-slate-700 text-center py-3 font-light tracking-wider uppercase text-sm hover:border-amber-600 hover:text-amber-600 transition-colors duration-300">
                            WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" 
                           target="_blank"
                           class="block w-full border border-slate-300 text-slate-700 text-center py-3 font-light tracking-wider uppercase text-sm hover:border-amber-600 hover:text-amber-600 transition-colors duration-300">
                            Facebook
                        </a>
                        <button onclick="navigator.clipboard.writeText('{{ url()->current() }}'); alert('Link copied!')" 
                                class="block w-full border border-slate-300 text-slate-700 text-center py-3 font-light tracking-wider uppercase text-sm hover:border-amber-600 hover:text-amber-600 transition-colors duration-300">
                            Copy Link
                        </button>
                    </div>
                </div>

                <!-- Related Jobs -->
                @if($relatedJobs->count() > 0)
                <div class="bg-white border border-slate-200 p-8">
                    <h3 class="text-xl font-light text-slate-900 mb-6 tracking-wide">Similar Positions</h3>
                    <div class="space-y-4">
                        @foreach($relatedJobs as $related)
                        <a href="/career/{{ $related->id }}" 
                           wire:navigate
                           class="block p-5 border border-slate-200 hover:border-amber-600 transition-colors duration-300 group">
                            <h4 class="font-light text-slate-900 mb-2 line-clamp-2 group-hover:text-amber-600 transition-colors">{{ $related->title }}</h4>
                            <p class="text-sm text-slate-600 font-light mb-3">{{ $related->position }}</p>
                            <div class="flex items-center gap-2 text-xs text-slate-500 font-light tracking-wide">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                                {{ $related->locations->first()->city ?? 'Multiple locations' }}
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

</div>