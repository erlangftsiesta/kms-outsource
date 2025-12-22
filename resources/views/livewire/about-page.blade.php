<!-- resources/views/livewire/about-page.blade.php -->
<div class="font-sans">
    <!-- Hero Section -->
    <section class="relative py-24 md:py-32 bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: linear-gradient(45deg, rgba(203,166,105,0.1) 25%, transparent 25%, transparent 75%, rgba(203,166,105,0.1) 75%), linear-gradient(45deg, rgba(203,166,105,0.1) 25%, transparent 25%, transparent 75%, rgba(203,166,105,0.1) 75%); background-size: 60px 60px; background-position: 0 0, 30px 30px;"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl md:text-6xl font-light text-white mb-6 tracking-tight">About TalentPro</h1>
            <div class="w-24 h-1 bg-amber-500 mx-auto mb-8"></div>
            <p class="text-xl md:text-2xl text-slate-300 font-light max-w-3xl mx-auto leading-relaxed">
                Transforming businesses through strategic talent acquisition and workforce excellence
            </p>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-20 md:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Mission Card -->
                <div class="border border-slate-200 p-10 md:p-12 hover:border-amber-500 transition-colors">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="w-12 h-12 border-2 border-amber-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-light text-slate-900 tracking-tight">Our Mission</h2>
                    </div>
                    <p class="text-lg text-slate-600 font-light leading-relaxed">
                        To connect exceptional talent with leading organizations, creating lasting partnerships 
                        that drive innovation, growth, and success. We believe in empowering both candidates 
                        and companies to reach their full potential through strategic workforce solutions.
                    </p>
                </div>

                <!-- Vision Card -->
                <div class="border border-slate-200 p-10 md:p-12 hover:border-amber-500 transition-colors">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="w-12 h-12 border-2 border-amber-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-light text-slate-900 tracking-tight">Our Vision</h2>
                    </div>
                    <p class="text-lg text-slate-600 font-light leading-relaxed">
                        To be the most trusted talent solutions partner in the industry, recognized for our 
                        commitment to excellence, innovation, and integrity. We envision a future where every 
                        professional finds their perfect career path and every organization builds dream teams.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="py-20 md:py-28 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-light text-slate-900 mb-4 tracking-tight">Core Values</h2>
                <div class="w-24 h-1 bg-amber-500 mx-auto mb-6"></div>
                <p class="text-xl text-slate-600 font-light">The principles that guide everything we do</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Excellence -->
                <div class="bg-white border border-slate-200 p-8 hover:border-amber-500 transition-colors">
                    <div class="w-14 h-14 border-2 border-amber-500 flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-slate-900 mb-3 tracking-tight">Excellence</h3>
                    <p class="text-slate-600 font-light leading-relaxed">
                        We strive for excellence in every interaction, delivering quality that exceeds expectations
                    </p>
                </div>

                <!-- Integrity -->
                <div class="bg-white border border-slate-200 p-8 hover:border-amber-500 transition-colors">
                    <div class="w-14 h-14 border-2 border-amber-500 flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-slate-900 mb-3 tracking-tight">Integrity</h3>
                    <p class="text-slate-600 font-light leading-relaxed">
                        Transparency and honesty form the foundation of all our relationships
                    </p>
                </div>

                <!-- Innovation -->
                <div class="bg-white border border-slate-200 p-8 hover:border-amber-500 transition-colors">
                    <div class="w-14 h-14 border-2 border-amber-500 flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-slate-900 mb-3 tracking-tight">Innovation</h3>
                    <p class="text-slate-600 font-light leading-relaxed">
                        We embrace cutting-edge solutions to stay ahead in the evolving talent landscape
                    </p>
                </div>

                <!-- Care -->
                <div class="bg-white border border-slate-200 p-8 hover:border-amber-500 transition-colors">
                    <div class="w-14 h-14 border-2 border-amber-500 flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-slate-900 mb-3 tracking-tight">Care</h3>
                    <p class="text-slate-600 font-light leading-relaxed">
                        We genuinely care about the success and wellbeing of everyone we work with
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- What We Do -->
    <section class="py-20 md:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-light text-slate-900 mb-4 tracking-tight">What We Do</h2>
                <div class="w-24 h-1 bg-amber-500 mx-auto mb-6"></div>
                <p class="text-xl text-slate-600 font-light">Comprehensive talent solutions tailored to your needs</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Talent Acquisition -->
                <div class="border border-slate-200 p-10 hover:border-amber-500 transition-colors">
                    <div class="w-16 h-16 border-2 border-slate-900 flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-medium text-slate-900 mb-4 tracking-tight">Talent Acquisition</h3>
                    <p class="text-slate-600 font-light leading-relaxed">
                        We identify, attract, and secure top-tier professionals who align perfectly with your 
                        organizational culture and requirements. Our rigorous screening process ensures quality matches.
                    </p>
                </div>

                <!-- Workforce Solutions -->
                <div class="border border-slate-200 p-10 hover:border-amber-500 transition-colors">
                    <div class="w-16 h-16 border-2 border-slate-900 flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-medium text-slate-900 mb-4 tracking-tight">Workforce Solutions</h3>
                    <p class="text-slate-600 font-light leading-relaxed">
                        From temporary staffing to permanent placements, we provide flexible workforce solutions 
                        that adapt to your business needs and growth trajectory.
                    </p>
                </div>

                <!-- Strategic Consulting -->
                <div class="border border-slate-200 p-10 hover:border-amber-500 transition-colors">
                    <div class="w-16 h-16 border-2 border-slate-900 flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-medium text-slate-900 mb-4 tracking-tight">Strategic Consulting</h3>
                    <p class="text-slate-600 font-light leading-relaxed">
                        Our expert consultants provide strategic guidance on workforce planning, organizational 
                        development, and talent management to optimize your human capital.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics -->
    <section class="py-20 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-12">
                <div class="text-center border-r border-slate-700 last:border-r-0">
                    <div class="text-5xl md:text-6xl font-light text-amber-500 mb-2">500+</div>
                    <p class="text-lg text-slate-300 font-light">Successful Placements</p>
                </div>
                <div class="text-center border-r border-slate-700 md:border-r last:border-r-0">
                    <div class="text-5xl md:text-6xl font-light text-amber-500 mb-2">200+</div>
                    <p class="text-lg text-slate-300 font-light">Partner Companies</p>
                </div>
                <div class="text-center border-r border-slate-700 last:border-r-0">
                    <div class="text-5xl md:text-6xl font-light text-amber-500 mb-2">95%</div>
                    <p class="text-lg text-slate-300 font-light">Client Satisfaction</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-light text-amber-500 mb-2">10+</div>
                    <p class="text-lg text-slate-300 font-light">Industry Sectors</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-20 md:py-28 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-light text-slate-900 mb-4 tracking-tight">Why Choose TalentPro</h2>
                <div class="w-24 h-1 bg-amber-500 mx-auto mb-6"></div>
                <p class="text-xl text-slate-600 font-light">Experience the difference of working with industry leaders</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex gap-6 bg-white border border-slate-200 p-8">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 border-2 border-amber-500 flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-medium text-slate-900 mb-2 tracking-tight">Proven Track Record</h3>
                        <p class="text-slate-600 font-light leading-relaxed">
                            Years of experience delivering exceptional results across diverse industries and roles
                        </p>
                    </div>
                </div>

                <div class="flex gap-6 bg-white border border-slate-200 p-8">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 border-2 border-amber-500 flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-medium text-slate-900 mb-2 tracking-tight">Speed & Efficiency</h3>
                        <p class="text-slate-600 font-light leading-relaxed">
                            Rapid deployment of qualified candidates without compromising on quality
                        </p>
                    </div>
                </div>

                <div class="flex gap-6 bg-white border border-slate-200 p-8">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 border-2 border-amber-500 flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-medium text-slate-900 mb-2 tracking-tight">Quality Assurance</h3>
                        <p class="text-slate-600 font-light leading-relaxed">
                            Rigorous vetting and assessment processes ensure only the best candidates reach you
                        </p>
                    </div>
                </div>

                <div class="flex gap-6 bg-white border border-slate-200 p-8">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 border-2 border-amber-500 flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-medium text-slate-900 mb-2 tracking-tight">Personalized Service</h3>
                        <p class="text-slate-600 font-light leading-relaxed">
                            Dedicated account managers who understand your unique needs and culture
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 md:py-28 bg-white">
        <div class="max-w-4xl mx-auto text-center px-4">
            <h2 class="text-4xl md:text-5xl font-light text-slate-900 mb-6 tracking-tight">Ready to Build Your Dream Team?</h2>
            <div class="w-24 h-1 bg-amber-500 mx-auto mb-8"></div>
            <p class="text-xl text-slate-600 font-light mb-12 leading-relaxed">
                Let's discuss how we can help you achieve your talent acquisition goals
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="/career" 
                   wire:navigate
                   class="inline-block bg-slate-900 text-white px-10 py-4 font-medium hover:bg-slate-800 transition-colors tracking-wide border-2 border-slate-900">
                    VIEW OPEN POSITIONS
                </a>
                <a href="tel:+6281374565175" 
                   class="inline-block bg-white text-slate-900 border-2 border-slate-900 px-10 py-4 font-medium hover:bg-slate-50 transition-colors tracking-wide">
                    CONTACT US TODAY
                </a>
            </div>
        </div>
    </section>
</div>
