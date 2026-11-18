@extends('frontend.layouts.app')

@section('title', __('frontend.success.title') . ' - Liva Luxury Skincare')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 pb-24 sm:pb-16">
    
    <div class="bg-white rounded-3xl p-8 sm:p-14 border border-[#EADFC7] shadow-xl text-center relative overflow-hidden">
        
        <!-- Background Soft Gold Glow -->
        <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-96 h-96 bg-[#EADFC7]/30 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Success Check Icon in Brushed Gold Circle -->
        <div class="relative z-10 w-20 h-20 mx-auto rounded-full bg-gradient-to-tr from-[#997528] via-[#B58E3E] to-[#C5A059] text-white flex items-center justify-center shadow-lg shadow-stone-800/15 mb-6 border-2 border-white">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <!-- Main Headline -->
        <h1 class="relative z-10 text-2xl sm:text-4xl font-black font-brand text-stone-900 tracking-tight mb-2">
            {{ __('frontend.success.title') }}
        </h1>

        <!-- Subheading -->
        <p class="relative z-10 text-sm sm:text-base text-stone-600 font-medium mb-1">
            {{ __('frontend.success.subtitle') }} <span class="text-[#B58E3E]">✦</span>
        </p>

        <!-- Order Number Notice -->
        <p class="relative z-10 text-xs sm:text-sm text-stone-500 mb-8">
            {{ __('frontend.success.order_number', ['number' => $order['number'] ?? '1001']) }}
        </p>

     

        <!-- Action Buttons -->
        <div class="relative z-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('account.dashboard') }}" 
               class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-gradient-to-r from-[#B58E3E] to-[#C5A059] hover:from-[#997528] hover:to-[#B58E3E] text-white font-extrabold text-sm shadow-md shadow-stone-800/15 active:scale-95 transition-all">
                {{ __('frontend.success.track_order') }}
            </a>

            <a href="{{ route('home') }}" 
               class="w-full sm:w-auto px-8 py-3.5 rounded-2xl border-2 border-[#EADFC7] text-stone-700 hover:text-[#B58E3E] hover:border-[#B58E3E] font-bold text-sm transition-all">
                {{ __('frontend.success.continue_shopping') }}
            </a>
        </div>

        <!-- Estimated Delivery Note -->
        <div class="relative z-10 mt-8 pt-6 border-t border-[#F5EFEB] flex items-center justify-center gap-2 text-xs text-stone-500 font-medium">
            <span class="text-[#B58E3E]">✦</span>
            <span>{{ __('frontend.success.estimated_delivery') }}</span>
        </div>

    </div>

</div>
@endsection
