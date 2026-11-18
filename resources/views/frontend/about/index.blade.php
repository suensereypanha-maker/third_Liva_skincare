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

        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#F5EFEB] border border-[#EADFC7] text-[#997528] text-xs font-bold uppercase tracking-wider mb-4">
            <span>✨</span>
            <span>{{ __('frontend.about.story_badge') }}</span>
        </div>

        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black font-brand text-stone-900 tracking-tight max-w-3xl mx-auto leading-tight">
            {{ __('frontend.about.title') }}
        </h1>
        <p class="text-sm sm:text-base text-stone-600 max-w-2xl mx-auto mt-4 leading-relaxed">
            {{ __('frontend.about.subtitle') }}
        </p>
    </section>

    <!-- Brand Story Showcase -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center bg-white rounded-3xl p-6 sm:p-10 lg:p-14 border border-[#EADFC7] shadow-sm">
            
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

    <!-- 4 Core Pillars -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-xl mx-auto mb-10">
            <span class="text-xs font-bold uppercase tracking-wider text-[#997528]">{{ __('frontend.brand.tagline') }}</span>
            <h2 class="text-2xl sm:text-3xl font-black font-brand text-stone-900 mt-2">
                Four Pillars of Liva Excellence
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Pillar 1 -->
            <div class="bg-white rounded-3xl p-6 border border-[#EADFC7] hover:border-[#B58E3E] transition-all hover:shadow-lg flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-[#F5EFEB] border border-[#EADFC7] text-[#B58E3E] flex items-center justify-center mb-4 text-xl shadow-xs">
                        ✨
                    </div>
                    <h3 class="font-extrabold text-stone-900 text-base mb-2 font-brand">
                        {{ __('frontend.about.pillar_1_title') }}
                    </h3>
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                        {{ __('frontend.about.pillar_1_desc') }}
                    </p>
                </div>
            </div>

            <!-- Pillar 2 -->
            <div class="bg-white rounded-3xl p-6 border border-[#EADFC7] hover:border-[#B58E3E] transition-all hover:shadow-lg flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-[#F5EFEB] border border-[#EADFC7] text-[#B58E3E] flex items-center justify-center mb-4 text-xl shadow-xs">
                        🌿
                    </div>
                    <h3 class="font-extrabold text-stone-900 text-base mb-2 font-brand">
                        {{ __('frontend.about.pillar_2_title') }}
                    </h3>
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                        {{ __('frontend.about.pillar_2_desc') }}
                    </p>
                </div>
            </div>

            <!-- Pillar 3 -->
            <div class="bg-white rounded-3xl p-6 border border-[#EADFC7] hover:border-[#B58E3E] transition-all hover:shadow-lg flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-[#F5EFEB] border border-[#EADFC7] text-[#B58E3E] flex items-center justify-center mb-4 text-xl shadow-xs">
                        ☀️
                    </div>
                    <h3 class="font-extrabold text-stone-900 text-base mb-2 font-brand">
                        {{ __('frontend.about.pillar_3_title') }}
                    </h3>
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                        {{ __('frontend.about.pillar_3_desc') }}
                    </p>
                </div>
            </div>

            <!-- Pillar 4 -->
            <div class="bg-white rounded-3xl p-6 border border-[#EADFC7] hover:border-[#B58E3E] transition-all hover:shadow-lg flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-[#F5EFEB] border border-[#EADFC7] text-[#B58E3E] flex items-center justify-center mb-4 text-xl shadow-xs">
                        ♻️
                    </div>
                    <h3 class="font-extrabold text-stone-900 text-base mb-2 font-brand">
                        {{ __('frontend.about.pillar_4_title') }}
                    </h3>
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                        {{ __('frontend.about.pillar_4_desc') }}
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- Founder Quote -->
    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="p-8 sm:p-12 rounded-3xl bg-gradient-to-br from-[#292524] to-[#1c1917] text-white relative overflow-hidden shadow-2xl">
            <div class="text-[#B58E3E] text-4xl sm:text-5xl font-serif mb-4">“</div>
            <p class="text-base sm:text-xl font-brand font-medium italic text-[#FAF7F2] leading-relaxed max-w-2xl mx-auto">
                {{ __('frontend.about.founder_quote') }}
            </p>
            <div class="mt-6 flex flex-col items-center justify-center">
                <span class="text-xs uppercase tracking-widest text-[#B58E3E] font-bold">Liva Botanical Atelier</span>
                <span class="text-xs text-stone-400 mt-0.5">Phnom Penh & Paris Design Laboratories</span>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('products.index') }}" 
               class="px-8 py-3.5 rounded-full bg-gradient-to-r from-[#B58E3E] to-[#C5A059] text-white text-xs sm:text-sm font-bold shadow-lg shadow-[#B58E3E]/20 hover:from-[#997528] hover:to-[#B58E3E] transition-all">
                {{ __('frontend.hero.shop_now') }}
            </a>
            <a href="{{ route('contact.index') }}" 
               class="px-8 py-3.5 rounded-full bg-white text-stone-800 border border-[#EADFC7] hover:border-[#B58E3E] hover:text-[#B58E3E] text-xs sm:text-sm font-bold transition-all shadow-xs">
                {{ __('frontend.contact.title') }}
            </a>
        </div>
    </section>

</div>
@endsection
