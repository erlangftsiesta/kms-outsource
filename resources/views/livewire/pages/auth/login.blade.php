<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('admin.jobs.index', absolute: false), navigate: true);
    }
}; ?>

<div class="min-h-screen flex bg-gray-50" style="font-family: 'Montserrat', sans-serif;">
    <!-- Left Side - Login Form -->
    <div class="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-20 xl:px-24">
        <div class="max-w-md w-full space-y-12">
            <!-- Logo & Header -->
            <div class="space-y-4">
                <a href="/" wire:navigate class="inline-block">
                    <h1 class="text-3xl font-bold text-slate-900" style="font-weight: 600; letter-spacing: -0.5px;">
                        TalentPro
                    </h1>
                </a>
                <div class="space-y-2">
                    <h2 class="text-2xl font-light text-slate-900" style="font-weight: 300;">
                        Welcome back
                    </h2>
                    <p class="text-sm text-slate-500" style="font-weight: 300;">
                        Sign in to access your admin panel
                    </p>
                </div>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="border-l-4 border-amber-500 bg-white px-6 py-4">
                    <p class="text-sm text-slate-700" style="font-weight: 300;">{{ session('status') }}</p>
                </div>
            @endif

            <!-- Login Form -->
            <form wire:submit="login" class="space-y-6">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm text-slate-900 mb-3" style="font-weight: 500; letter-spacing: 0.3px;">
                        Email Address
                    </label>
                    <input 
                        wire:model="form.email" 
                        id="email" 
                        type="email" 
                        name="email"
                        required 
                        autofocus 
                        autocomplete="username"
                        class="block w-full px-4 py-3 border border-slate-200 bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:border-amber-500 transition"
                        style="font-weight: 300;"
                        placeholder="you@example.com">
                    @error('form.email') 
                        <p class="mt-2 text-sm text-red-600" style="font-weight: 300;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm text-slate-900 mb-3" style="font-weight: 500; letter-spacing: 0.3px;">
                        Password
                    </label>
                    <div class="relative" x-data="{ show: false }">
                        <input 
                            wire:model="form.password" 
                            id="password" 
                            :type="show ? 'text' : 'password'"
                            name="password"
                            required 
                            autocomplete="current-password"
                            class="block w-full px-4 py-3 border border-slate-200 bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:border-amber-500 transition pr-10"
                            style="font-weight: 300;"
                            placeholder="••••••••">
                        <button 
                            type="button"
                            @click="show = !show"
                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 transition">
                            <svg x-show="!show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg x-show="show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                            </svg>
                        </button>
                    </div>
                    @error('form.password') 
                        <p class="mt-2 text-sm text-red-600" style="font-weight: 300;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between pt-2">
                    <label for="remember" class="flex items-center cursor-pointer">
                        <input 
                            wire:model="form.remember" 
                            id="remember" 
                            type="checkbox" 
                            class="w-4 h-4 border border-slate-200 bg-white checked:bg-amber-500 checked:border-amber-500 cursor-pointer"
                            name="remember">
                        <span class="ml-3 text-sm text-slate-600" style="font-weight: 300;">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" 
                           wire:navigate
                           class="text-sm text-amber-600 hover:text-amber-700 transition" style="font-weight: 300;">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button 
                        type="submit"
                        class="w-full py-3 px-4 bg-slate-900 text-white hover:bg-slate-800 focus:outline-none transition border border-slate-900"
                        style="font-weight: 500; letter-spacing: 0.3px;">
                        <span wire:loading.remove wire:target="login">Sign in to Admin Panel</span>
                        <span wire:loading wire:target="login" class="inline-flex items-center">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Signing in...
                        </span>
                    </button>
                </div>

                <!-- Back to Home -->
                <div class="text-center pt-4">
                    <a href="/" 
                       wire:navigate
                       class="inline-flex items-center text-sm text-slate-600 hover:text-slate-900 transition" style="font-weight: 300;">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Home
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Right Side - Branding (Hidden on small screens) -->
    <div class="hidden lg:flex flex-1 bg-slate-900 items-center justify-center px-12">
        <div class="max-w-md space-y-8">
            <div class="space-y-4">
                <h2 class="text-4xl text-white" style="font-weight: 300; line-height: 1.3;">
                    Manage your<br/>talent pool
                </h2>
                <p class="text-slate-300 text-sm leading-relaxed" style="font-weight: 300;">
                    Access your admin dashboard to manage job listings, categories, and connect with top talent across multiple industries.
                </p>
            </div>
            
            <div class="space-y-3 pt-4">
                <div class="flex items-center text-amber-500">
                    <div class="w-1 h-1 bg-amber-500 mr-3"></div>
                    <span class="text-sm text-slate-200" style="font-weight: 300;">Job Management</span>
                </div>
                <div class="flex items-center text-amber-500">
                    <div class="w-1 h-1 bg-amber-500 mr-3"></div>
                    <span class="text-sm text-slate-200" style="font-weight: 300;">Analytics & Reporting</span>
                </div>
                <div class="flex items-center text-amber-500">
                    <div class="w-1 h-1 bg-amber-500 mr-3"></div>
                    <span class="text-sm text-slate-200" style="font-weight: 300;">Category Management</span>
                </div>
            </div>
        </div>
    </div>
</div>
