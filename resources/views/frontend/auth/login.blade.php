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
                    onclick="showToast('Telegram Login', 'Connected to Telegram authorization')"
                    class="py-2.5 px-3 rounded-xl border border-[#EADFC7] hover:border-[#229ED9] bg-[#FAF7F2] hover:bg-white text-xs font-bold text-stone-700 flex items-center justify-center gap-2 transition-all">
                <span class="text-[#229ED9]">✈️</span>
                <span>Telegram</span>
            </button>
            <button type="button" 
                    onclick="showToast('Google Login', 'Google OAuth initialized')"
                    class="py-2.5 px-3 rounded-xl border border-[#EADFC7] hover:border-stone-400 bg-[#FAF7F2] hover:bg-white text-xs font-bold text-stone-700 flex items-center justify-center gap-2 transition-all">
                <span>🌐</span>
                <span>Google</span>
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
