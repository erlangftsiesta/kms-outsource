<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'TalentPro') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <!-- Public Navigation -->
<nav
    x-data="{ open: false }"
    class="sticky top-0 z-50 bg-white border-b border-slate-200"
    style="font-family: 'Montserrat', sans-serif;"
>

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" wire:navigate class="flex items-center space-x-3 group">
                        <x-application-logo class="block h-10 w-auto fill-current text-slate-800 group-hover:text-amber-600 transition-colors duration-300" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-12 sm:flex items-center">
                    @auth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate class="px-4 py-2 text-sm font-light tracking-wide text-slate-700 hover:text-amber-600 transition-colors duration-300 {{ request()->routeIs('dashboard') ? 'text-amber-600 font-medium' : '' }}">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.jobs.index')" :active="request()->routeIs('admin.jobs.*')" wire:navigate class="px-4 py-2 text-sm font-light tracking-wide text-slate-700 hover:text-amber-600 transition-colors duration-300 {{ request()->routeIs('admin.jobs.*') ? 'text-amber-600 font-medium' : '' }}">
                            {{ __('Jobs') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate class="px-4 py-2 text-sm font-light tracking-wide text-slate-700 hover:text-amber-600 transition-colors duration-300 {{ request()->routeIs('home') ? 'text-amber-600 font-medium' : '' }}">
                            {{ __('Home') }}
                        </x-nav-link>
                        <x-nav-link :href="route('about')" :active="request()->routeIs('about')" wire:navigate class="px-4 py-2 text-sm font-light tracking-wide text-slate-700 hover:text-amber-600 transition-colors duration-300 {{ request()->routeIs('about') ? 'text-amber-600 font-medium' : '' }}">
                            {{ __('About') }}
                        </x-nav-link>
                        <x-nav-link :href="route('career')" :active="request()->routeIs('career')" wire:navigate class="px-4 py-2 text-sm font-light tracking-wide text-slate-700 hover:text-amber-600 transition-colors duration-300 {{ request()->routeIs('career') ? 'text-amber-600 font-medium' : '' }}">
                            {{ __('Career') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown - ONLY VISIBLE WHEN LOGGED IN -->
            @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-slate-300 text-sm font-light tracking-wide text-slate-700 bg-white hover:border-amber-600 hover:text-amber-600 focus:outline-none transition-all duration-300">
                            <div>{{ auth()->user()->name }}</div>

                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate class="text-sm font-light tracking-wide text-slate-700 hover:bg-slate-50 hover:text-amber-600 transition-colors duration-200">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link class="text-sm font-light tracking-wide text-slate-700 hover:bg-slate-50 hover:text-amber-600 transition-colors duration-200">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>
            @else
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <a href="{{ route('login') }}" class="px-6 py-2 text-sm font-light tracking-wide text-slate-700 border border-slate-300 hover:border-amber-600 hover:text-amber-600 transition-all duration-300">
                    Login
                </a>
            </div>
            @endauth

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-slate-600 hover:text-amber-600 hover:bg-slate-50 focus:outline-none focus:bg-slate-50 focus:text-amber-600 transition duration-300 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="square" stroke-linejoin="miter" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="square" stroke-linejoin="miter" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-slate-200">
        <div class="pt-2 pb-3 space-y-1">
            @auth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate class="block px-4 py-3 text-sm font-light tracking-wide text-slate-700 hover:bg-slate-50 hover:text-amber-600 transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'bg-slate-50 text-amber-600 font-medium border-l-2 border-amber-600' : '' }}">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.jobs.index')" :active="request()->routeIs('admin.jobs.*')" wire:navigate class="block px-4 py-3 text-sm font-light tracking-wide text-slate-700 hover:bg-slate-50 hover:text-amber-600 transition-colors duration-200 {{ request()->routeIs('admin.jobs.*') ? 'bg-slate-50 text-amber-600 font-medium border-l-2 border-amber-600' : '' }}">
                    {{ __('Jobs') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate class="block px-4 py-3 text-sm font-light tracking-wide text-slate-700 hover:bg-slate-50 hover:text-amber-600 transition-colors duration-200 {{ request()->routeIs('home') ? 'bg-slate-50 text-amber-600 font-medium border-l-2 border-amber-600' : '' }}">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')" wire:navigate class="block px-4 py-3 text-sm font-light tracking-wide text-slate-700 hover:bg-slate-50 hover:text-amber-600 transition-colors duration-200 {{ request()->routeIs('about') ? 'bg-slate-50 text-amber-600 font-medium border-l-2 border-amber-600' : '' }}">
                    {{ __('About') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('career')" :active="request()->routeIs('career')" wire:navigate class="block px-4 py-3 text-sm font-light tracking-wide text-slate-700 hover:bg-slate-50 hover:text-amber-600 transition-colors duration-200 {{ request()->routeIs('career') ? 'bg-slate-50 text-amber-600 font-medium border-l-2 border-amber-600' : '' }}">
                    {{ __('Career') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        <!-- Responsive Settings Options - ONLY WHEN LOGGED IN -->
        @auth
        <div class="pt-4 pb-1 border-t border-slate-200">
            <div class="px-4 py-2">
                <div class="font-medium text-base text-slate-800 tracking-wide">{{ auth()->user()->name }}</div>
                <div class="font-light text-sm text-slate-500 tracking-wide">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate class="block px-4 py-3 text-sm font-light tracking-wide text-slate-700 hover:bg-slate-50 hover:text-amber-600 transition-colors duration-200">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link class="block px-4 py-3 text-sm font-light tracking-wide text-slate-700 hover:bg-slate-50 hover:text-amber-600 transition-colors duration-200">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
        @else
        <div class="pt-4 pb-1 border-t border-slate-200">
            <div class="px-4">
                <x-responsive-nav-link :href="route('login')" wire:navigate class="block px-4 py-3 text-sm font-light tracking-wide text-slate-700 hover:bg-slate-50 hover:text-amber-600 transition-colors duration-200">
                    {{ __('Login') }}
                </x-responsive-nav-link>
            </div>
        </div>
        @endauth
    </div>
</nav>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">TalentPro</h3>
                        <p class="text-gray-400">
                            Connecting exceptional talent with leading organizations.
                        </p>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Quick Links</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="/" wire:navigate class="hover:text-white transition">Home</a></li>
                            <li><a href="/about" wire:navigate class="hover:text-white transition">About</a></li>
                            <li><a href="/career" wire:navigate class="hover:text-white transition">Careers</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Contact</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li>Email: info@talentpro.com</li>
                            <li>Phone: +62 813 7456 5175</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Follow Us</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; {{ date('Y') }} TalentPro. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>