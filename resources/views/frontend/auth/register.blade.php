@extends('frontend.layouts.app')

@section('title', __('frontend.auth.register_title') . ' - Liva Luxury Skincare')

@section('content')
<div class="min-h-[75vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-3xl border border-[#EADFC7] shadow-xl p-8 sm:p-10 relative overflow-hidden">
        
        <!-- Luxury Top Accent -->
        <div class="absolute top-0 inset-x-0 h-1.5 bg-gradient-to-r from-[#B58E3E] via-[#EADFC7] to-[#B58E3E]"></div>

        <!-- Brand Icon / Header -->
        <div class="text-center mb-8">
            <div class="w-14 h-14 rounded-2xl bg-[#F5EFEB] border border-[#EADFC7] text-[#B58E3E] flex items-center justify-center mx-auto mb-3 shadow-xs">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            </div>
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
