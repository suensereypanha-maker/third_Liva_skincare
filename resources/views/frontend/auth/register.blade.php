@extends('frontend.layouts.app')

@section('title', __('frontend.auth.register_title') . ' - Liva Luxury Skincare')

@section('content')
<div class="min-h-[75vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-3xl border border-[#EADFC7] shadow-xl p-8 sm:p-10 relative overflow-hidden">
        
        <!-- Luxury Top Accent -->
        <div class="absolute top-0 inset-x-0 h-1.5 bg-gradient-to-r from-[#B58E3E] via-[#EADFC7] to-[#B58E3E]"></div>

        <!-- Brand Icon / Header -->
        <div class="text-center mb-8">
       
            <h1 class="text-2xl font-black font-brand text-stone-900">
                {{ __('frontend.auth.register_title') }}
            </h1>
            <p class="text-xs text-stone-500 mt-1">
                {{ __('frontend.auth.register_subtitle') }}
            </p>
        </div>

        <!-- Tab Toggle (Sign In / Register) -->
        <div class="grid grid-cols-2 p-1 bg-[#FAF7F2] rounded-2xl border border-[#EADFC7] mb-6">
            <a href="{{ route('login') }}" class="py-2 text-center text-xs font-bold rounded-xl text-stone-500 hover:text-stone-800 transition-colors">
                {{ __('frontend.auth.sign_in') }}
            </a>
            <a href="{{ route('register') }}" class="py-2 text-center text-xs font-bold rounded-xl bg-white text-[#B58E3E] shadow-xs">
                {{ __('frontend.auth.create_account') }}
            </a>
        </div>

        <!-- Form -->
        <form onsubmit="handleAuthRegister(event)" class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-stone-700 mb-1.5">
                    {{ __('frontend.auth.full_name') }} *
                </label>
                <div class="relative">
                    <input type="text" 
                           required 
                           id="reg-name"
                           placeholder="Serey Panha" 
                           class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl pl-10 pr-4 py-2.5 text-xs text-stone-900 focus:outline-none focus:border-[#B58E3E] focus:bg-white transition-all">
                    <svg class="w-4 h-4 text-stone-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-stone-700 mb-1.5">
                    {{ __('frontend.auth.email_or_phone') }} *
                </label>
                <div class="relative">
                    <input type="text" 
                           required 
                           id="reg-identity"
                           placeholder="panha@gmail.com or 012 345 678" 
                           class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl pl-10 pr-4 py-2.5 text-xs text-stone-900 focus:outline-none focus:border-[#B58E3E] focus:bg-white transition-all">
                    <svg class="w-4 h-4 text-stone-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-bold text-stone-700 mb-1.5">
                        {{ __('frontend.auth.password') }} *
                    </label>
                    <input type="password" 
                           required 
                           id="reg-pass"
                           placeholder="••••••••" 
                           class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl px-3.5 py-2.5 text-xs text-stone-900 focus:outline-none focus:border-[#B58E3E] focus:bg-white transition-all">
                </div>
                <div>
                    <label class="block text-xs font-bold text-stone-700 mb-1.5">
                        {{ __('frontend.auth.confirm_password') }} *
                    </label>
                    <input type="password" 
                           required 
                           id="reg-pass-confirm"
                           placeholder="••••••••" 
                           class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl px-3.5 py-2.5 text-xs text-stone-900 focus:outline-none focus:border-[#B58E3E] focus:bg-white transition-all">
                </div>
            </div>

            <div class="flex items-start pt-1">
                <input id="terms-agree" type="checkbox" required class="w-4 h-4 mt-0.5 rounded text-[#B58E3E] focus:ring-[#B58E3E] border-[#EADFC7]">
                <label for="terms-agree" class="ml-2 text-[11px] text-stone-600 leading-tight">
                    I agree to the <a href="javascript:void(0)" class="text-[#B58E3E] font-bold hover:underline">Terms of Service</a> & <a href="javascript:void(0)" class="text-[#B58E3E] font-bold hover:underline">Privacy Policy</a>
                </label>
            </div>

            <button type="submit" 
                    class="w-full py-3 rounded-full bg-gradient-to-r from-[#B58E3E] to-[#C5A059] text-white text-xs sm:text-sm font-bold shadow-md shadow-[#B58E3E]/20 hover:from-[#997528] hover:to-[#B58E3E] transition-all">
                {{ __('frontend.auth.register_btn') }}
            </button>
        </form>

        <!-- Divider -->
        <div class="relative my-6 text-center">
            <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-[#F5EFEB]"></div></div>
            <span class="relative px-3 bg-white text-[10px] font-bold uppercase tracking-wider text-stone-400">
                {{ __('frontend.auth.or_continue') }}
            </span>
        </div>

        <!-- Social Register Grid -->
        <div class="grid grid-cols-2 gap-3 mb-6">
            <button type="button" 
                    onclick="showToast('Google Sign Up', 'Connecting to Google registration...')"
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
                    onclick="showToast('Facebook Sign Up', 'Connecting to Facebook registration...')"
                    class="py-2.5 px-3 rounded-2xl border border-[#EADFC7] hover:border-[#1877F2]/60 bg-[#FAF7F2] hover:bg-white text-xs font-bold text-stone-700 flex items-center justify-center gap-2.5 transition-all shadow-xs hover:shadow-md group">
                <svg class="w-4 h-4 fill-[#1877F2] shrink-0" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
                <span class="group-hover:text-[#1877F2]">Facebook</span>
            </button>
        </div>

        <!-- Footer link -->
        <div class="text-center text-xs text-stone-500 mt-6 pt-6 border-t border-[#F5EFEB]">
            <span>{{ __('frontend.auth.have_account') }}</span>
            <a href="{{ route('login') }}" class="font-bold text-[#B58E3E] hover:underline ml-1">
                {{ __('frontend.auth.sign_in') }}
            </a>
        </div>

    </div>
</div>

@push('scripts')
<script>
    function handleAuthRegister(e) {
        e.preventDefault();
        const p1 = document.getElementById('reg-pass').value;
        const p2 = document.getElementById('reg-pass-confirm').value;
        if (p1 !== p2) {
            alert('Passwords do not match. Please re-enter.');
            return;
        }
        const name = document.getElementById('reg-name').value || 'Member';
        showToast('{{ __('frontend.auth.welcome_title') }}', 'Account created successfully! Welcome, ' + name);
        setTimeout(() => {
            window.location.href = '{{ route('account.dashboard') }}';
        }, 1200);
    }
</script>
@endpush
@endsection

