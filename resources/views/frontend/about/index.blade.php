@extends('frontend.layouts.app')

@section('title', __('frontend.about.title') . ' - Liva Luxury Skincare')

@section('content')
<div class="space-y-16 sm:space-y-24 py-8 sm:py-16">

    <!-- Hero Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Breadcrumb -->
        <nav class="flex items-center justify-center gap-2 text-xs text-stone-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-[#B58E3E] transition-colors">{{ __('frontend.nav.home') }}</a>
            <span>/</span>
            <span class="text-[#B58E3E] font-bold">{{ __('frontend.nav.about') }}</span>
        </nav>



        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black font-brand text-stone-900 tracking-tight max-w-3xl mx-auto leading-tight">
            {{ __('frontend.about.title') }}
        </h1>
        <p class="text-sm sm:text-base text-stone-600 max-w-2xl mx-auto mt-4 leading-relaxed">
            {{ __('frontend.about.subtitle') }}
        </p>
    </section>

    <!-- Brand Story Showcase -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center  rounded-3xl p-6 sm:p-10 lg:p-14">
            
            <!-- Left: Text Story -->
            <div class="lg:col-span-7 space-y-6">
                <div class="inline-block px-3 py-1 rounded-full bg-[#FAF7F2] border border-[#EADFC7] text-[#B58E3E] text-xs font-bold uppercase tracking-wider">
                    {{ __('frontend.brand.name') }} {{ __('frontend.brand.subtitle') }}
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold font-brand text-stone-900 leading-snug">
                    {{ __('frontend.about.story_title') }}
                </h2>
                <div class="space-y-4 text-xs sm:text-sm text-stone-600 leading-relaxed">
                    <p>{{ __('frontend.about.story_p1') }}</p>
                    <p>{{ __('frontend.about.story_p2') }}</p>
                </div>

                <div class="pt-4 border-t border-[#F5EFEB] flex flex-wrap items-center gap-6 sm:gap-10">
                    <div>
                        <div class="text-2xl font-black font-brand text-[#B58E3E]">100%</div>
                        <div class="text-[11px] font-bold text-stone-500 uppercase tracking-wider">Botanical Actives</div>
                    </div>
                    <div>
                        <div class="text-2xl font-black font-brand text-[#B58E3E]">0%</div>
                        <div class="text-[11px] font-bold text-stone-500 uppercase tracking-wider">Harmful Sulfates</div>
                    </div>
                    <div>
                        <div class="text-2xl font-black font-brand text-[#B58E3E]">24H</div>
                        <div class="text-[11px] font-bold text-stone-500 uppercase tracking-wider">Cellular Hydration</div>
                    </div>
                </div>
            </div>

            <!-- Right: Luxury Imagery -->
            <div class="lg:col-span-5 relative">
                <div class="aspect-4/5 rounded-3xl bg-[#FAF7F2] overflow-hidden border border-[#EADFC7] shadow-lg relative group">
                    <img src="{{ asset('img/hero.png') }}" 
                         alt="Liva Luxury Skincare Botanical Heritage" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/70 via-transparent to-transparent flex items-end p-6">
                        <div class="text-white">
                            <span class="text-xs uppercase tracking-widest text-[#EADFC7] font-bold">Liva Radiance</span>
                            <p class="font-brand text-lg font-bold">Golden Botanical Formulation</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


  
</div>
@endsection

