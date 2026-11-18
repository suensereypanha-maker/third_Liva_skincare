@extends('frontend.layouts.app')

@section('title', __('frontend.auth.login_title') . ' - Liva Luxury Skincare')

@section('content')
<div class="min-h-[75vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-3xl border border-[#EADFC7] shadow-xl p-8 sm:p-10 relative overflow-hidden">
        
        <!-- Luxury Top Accent -->
        <div class="absolute top-0 inset-x-0 h-1.5 bg-gradient-to-r from-[#B58E3E] via-[#EADFC7] to-[#B58E3E]"></div>

        <!-- Brand Icon / Header -->
        <div class="text-center mb-8">
            <div class="w-14 h-14 rounded-2xl bg-[#F5EFEB] border border-[#EADFC7] text-[#B58E3E] flex items-center justify-center mx-auto mb-3 shadow-xs">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <h1 class="text-2xl font-black font-brand text-stone-900">
                {{ __('frontend.auth.login_title') }}
            </h1>
            <p class="text-xs text-stone-500 mt-1">
                {{ __('frontend.auth.login_subtitle') }}
            </p>
        </div>

        <!-- Tab Toggle (Sign In / Register) -->
        <div class="grid grid-cols-2 p-1 bg-[#FAF7F2] rounded-2xl border border-[#EADFC7] mb-6">
            <a href="{{ route('login') }}" class="py-2 text-center text-xs font-bold rounded-xl bg-white text-[#B58E3E] shadow-xs">
                {{ __('frontend.auth.sign_in') }}
            </a>
            <a href="{{ route('register') }}" class="py-2 text-center text-xs font-bold rounded-xl text-stone-500 hover:text-stone-800 transition-colors">
                {{ __('frontend.auth.create_account') }}
            </a>
        </div>

        <!-- Form -->
        <form onsubmit="handleAuthLogin(event)" class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-stone-700 mb-1.5">
                    {{ __('frontend.auth.email_or_phone') }}
                </label>
                <div class="relative">
                    <input type="text" 
                           required 
                           id="login-identity"
                           placeholder="panha@gmail.com or 012 345 678" 
                           class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl pl-10 pr-4 py-2.5 text-xs text-stone-900 focus:outline-none focus:border-[#B58E3E] focus:bg-white transition-all">
                    <svg class="w-4 h-4 text-stone-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label class="block text-xs font-bold text-stone-700">
                        {{ __('frontend.auth.password') }}
                    </label>
                    <a href="javascript:void(0)" onclick="showToast('Password Recovery', 'Password reset instructions have been simulated to your contact!')" class="text-[11px] font-bold text-[#B58E3E] hover:underline">
                        {{ __('frontend.auth.forgot_password') }}
                    </a>
                </div>
                <div class="relative">
                    <input type="password" 
                           required 
                           id="login-password"
                           placeholder="••••••••" 
                           class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl pl-10 pr-10 py-2.5 text-xs text-stone-900 focus:outline-none focus:border-[#B58E3E] focus:bg-white transition-all">
                    <svg class="w-4 h-4 text-stone-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    <button type="button" onclick="togglePasswordVisibility('login-password', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-stone-400 hover:text-stone-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center">
                <input id="remember-me" type="checkbox" checked class="w-4 h-4 rounded text-[#B58E3E] focus:ring-[#B58E3E] border-[#EADFC7]">
                <label for="remember-me" class="ml-2 text-xs text-stone-600">
                    {{ __('frontend.auth.remember_me') }}
                </label>
            </div>

            <button type="submit" 
                    class="w-full py-3 rounded-full bg-gradient-to-r from-[#B58E3E] to-[#C5A059] text-white text-xs sm:text-sm font-bold shadow-md shadow-[#B58E3E]/20 hover:from-[#997528] hover:to-[#B58E3E] transition-all">
                {{ __('frontend.auth.login_btn') }}
            </button>
        </form>

        <!-- Divider -->
        <div class="relative my-6 text-center">
            <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-[#F5EFEB]"></div></div>
            <span class="relative px-3 bg-white text-[10px] font-bold uppercase tracking-wider text-stone-400">
                {{ __('frontend.auth.or_continue') }}
            </span>
        </div>

        <!-- Social Login Grid -->
        <div class="grid grid-cols-2 gap-3 mb-6">
            <button type="button" 
                    onclick="showToast('Google Sign In', 'Connecting to Google authentication...')"
                    class="py-2.5 px-3 rounded-2xl border border-[#EADFC7] hover:border-stone-400 bg-[#FAF7F2] hover:bg-white text-xs font-bold text-stone-700 flex items-center justify-center gap-2.5 transition-all shadow-xs hover:shadow-md group">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                </svg>
                <span class="group-hover:text-stone-900">Google</span>
            </button>
            <button type="button" 
                    onclick="showToast('Facebook Sign In', 'Connecting to Facebook authentication...')"
                    class="py-2.5 px-3 rounded-2xl border border-[#EADFC7] hover:border-[#1877F2]/60 bg-[#FAF7F2] hover:bg-white text-xs font-bold text-stone-700 flex items-center justify-center gap-2.5 transition-all shadow-xs hover:shadow-md group">
                <svg class="w-4 h-4 fill-[#1877F2] shrink-0" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
                <span class="group-hover:text-[#1877F2]">Facebook</span>
            </button>
        </div>

        <!-- Footer link -->
        <div class="text-center text-xs text-stone-500">
            <span>{{ __('frontend.auth.no_account') }}</span>
            <a href="{{ route('register') }}" class="font-bold text-[#B58E3E] hover:underline ml-1">
                {{ __('frontend.auth.create_account') }}
            </a>
        </div>

    </div>
</div>

@push('scripts')
<script>
    function togglePasswordVisibility(inputId, btn) {
        const input = document.getElementById(inputId);
        if (!input) return;
        if (input.type === 'password') {
            input.type = 'text';
            btn.classList.add('text-[#B58E3E]');
        } else {
            input.type = 'password';
            btn.classList.remove('text-[#B58E3E]');
        }
    }

    function handleAuthLogin(e) {
        e.preventDefault();
        const identity = document.getElementById('login-identity').value || 'Member';
        showToast('{{ __('frontend.auth.welcome_title') }}', 'Signed in successfully as ' + identity);
        setTimeout(() => {
            window.location.href = '{{ route('account.dashboard') }}';
        }, 1000);
    }
</script>
@endpush
@endsection

