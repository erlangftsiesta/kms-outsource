<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white border-b border-slate-200" style="font-family: 'Montserrat', sans-serif;">
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
