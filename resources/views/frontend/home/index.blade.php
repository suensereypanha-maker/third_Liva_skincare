@extends('frontend.layouts.app')

@section('title', __('frontend.hero.title') . ' - Liva Luxury Skincare')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-7 pb-20 sm:pb-8">

        <!-- Hero Promotional Auto-Slide Banner Carousel (2 Banners with Auto-Slide, Touch Swipe, and Controls) -->
        <div id="hero-banner-carousel"
            class="relative -mx-4 w-[calc(100%+2rem)] -mt-5 sm:mt-0 sm:mx-0 sm:w-full overflow-hidden rounded-none sm:rounded-3xl mb-6 sm:mb-8 border-b sm:border border-[#EADFC7] shadow-lg bg-[#FAF7F2] select-none group"
            aria-roledescription="carousel" aria-label="{{ __('frontend.hero.title') }}">

            <!-- Visually Hidden Heading for SEO & Screen Readers -->
            <h1 class="sr-only">{{ __('frontend.hero.title') }} - {{ __('frontend.hero.subtitle') }}</h1>

            <!-- Carousel Slides Track -->
            <div id="carousel-track" class="flex w-full transition-transform duration-700 ease-out"
                style="transform: translateX(0%);">

                <!-- Slide 1: Reveal Your Natural Beauty -->
                <div class="w-full shrink-0 relative aspect-[16/9] overflow-hidden" role="group"
                    aria-roledescription="slide" aria-label="1 of 2">
                    <a href="#catalog" class="block w-full h-full relative cursor-pointer group/slide"
                        title="{{ __('frontend.hero.shop_now') }}">
                        <picture>
                            <source srcset="{{ asset('img/banners/banner-1.webp') }}" type="image/webp">
                            <img src="{{ asset('img/banners/banner-1.jpg') }}"
                                alt="Liva Skincare - Reveal Your Natural Beauty, Healthy Skin. Confident You."
                                class="w-full h-full object-cover transition-transform duration-700 group-hover/slide:scale-[1.01]"
                                loading="eager" fetchpriority="high">
                        </picture>
                    </a>
                </div>

                <!-- Slide 2: Healthy Skin, Natural Glow -->
                <div class="w-full shrink-0 relative aspect-[16/9] overflow-hidden" role="group"
                    aria-roledescription="slide" aria-label="2 of 2">
                    <a href="#catalog" class="block w-full h-full relative cursor-pointer group/slide"
                        title="{{ __('frontend.hero.shop_now') }}">
                        <picture>
                            <source srcset="{{ asset('img/banners/banner-2.webp') }}" type="image/webp">
                            <img src="{{ asset('img/banners/banner-2.jpg') }}"
                                alt="Liva Skincare - Healthy Skin, Natural Glow, Care today, more beautiful tomorrow"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover/slide:scale-[1.01]"
                                loading="lazy">
                        </picture>
                    </a>
                </div>

            </div>

            <!-- Previous Button -->
            <button type="button" id="carousel-prev-btn" aria-label="Previous Slide"
                class="hidden sm:flex absolute left-6 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-white/85 hover:bg-white text-stone-700 hover:text-[#B58E3E] backdrop-blur-md border border-[#EADFC7] shadow-md items-center justify-center transition-all duration-300 hover:scale-110 active:scale-95 opacity-0 group-hover:opacity-100 cursor-pointer">
                <svg class="w-5 h-5 -ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Next Button -->
            <button type="button" id="carousel-next-btn" aria-label="Next Slide"
                class="hidden sm:flex absolute right-6 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-white/85 hover:bg-white text-stone-700 hover:text-[#B58E3E] backdrop-blur-md border border-[#EADFC7] shadow-md items-center justify-center transition-all duration-300 hover:scale-110 active:scale-95 opacity-0 group-hover:opacity-100 cursor-pointer">
                <svg class="w-5 h-5 -mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Carousel Indicators (Dots & Active Pill) -->
            <div
                class="absolute bottom-3 sm:bottom-5 left-1/2 -translate-x-1/2 z-20 flex items-center gap-2 sm:gap-2.5 px-3 py-1.5 rounded-full bg-black/25 backdrop-blur-md border border-white/25">
                <button type="button"
                    class="carousel-indicator w-7 sm:w-8 h-2 rounded-full bg-gradient-to-r from-[#B58E3E] to-[#C5A059] shadow-sm transition-all duration-300 cursor-pointer"
                    data-slide="0" aria-label="Go to slide 1"></button>
                <button type="button"
                    class="carousel-indicator w-2 h-2 rounded-full bg-white/70 hover:bg-white transition-all duration-300 cursor-pointer"
                    data-slide="1" aria-label="Go to slide 2"></button>
            </div>

        </div>

        <!-- Mobile Horizontal Category Chips Carousel (Screens < 1024px) -->
        <div id="mobile-category-chips"
            class="lg:hidden mb-6 overflow-x-auto scrollbar-none -mx-4 px-4 flex items-center gap-2 pb-1">
            @php
                $isAllActive = $currentCategory === 'all' || empty($currentCategory);
            @endphp
            <a href="{{ route('home', array_merge(request()->except('category', 'page'), ['category' => 'all'])) }}"
                class="px-3.5 py-1.5 text-xs font-bold whitespace-nowrap shrink-0 transition-all border-b-2 {{ $isAllActive ? 'border-[#B58E3E] text-[#B58E3E]' : 'border-transparent text-stone-700 hover:text-[#B58E3E]' }}">
                {{ __('frontend.categories.all') }} (48)
            </a>

            @foreach ($categories as $cat)
                @if (!empty($cat['children']))
                    @php
                        $isCatActive = $currentCategory === $cat['id'];
                        $cName =
                            app()->getLocale() === 'km' && !empty($cat['name_km']) ? $cat['name_km'] : $cat['name'];
                    @endphp
                    <a href="{{ route('home', array_merge(request()->except('category', 'page'), ['category' => $cat['id']])) }}"
                        class="px-3.5 py-1.5 text-xs font-bold whitespace-nowrap shrink-0 transition-all border-b-2 {{ $isCatActive ? 'border-[#B58E3E] text-[#B58E3E]' : 'border-transparent text-stone-700 hover:text-[#B58E3E]' }}">
                        {{ $cName }} ({{ $cat['count'] }})
                    </a>
                    @foreach ($cat['children'] as $sub)
                        @php
                            $isSubActive = $currentCategory === $sub['id'];
                            $subName =
                                app()->getLocale() === 'km' && !empty($sub['name_km']) ? $sub['name_km'] : $sub['name'];
                        @endphp
                        <a href="{{ route('home', array_merge(request()->except('category', 'page'), ['category' => $sub['id']])) }}"
                            class="px-3 py-1.5 text-xs whitespace-nowrap shrink-0 transition-all border-b-2 {{ $isSubActive ? 'border-[#B58E3E] text-[#B58E3E] font-bold' : 'border-transparent text-stone-600 hover:text-[#B58E3E]' }}">
                            ↳ {{ $subName }} ({{ $sub['count'] }})
                        </a>
                    @endforeach
                @endif
            @endforeach
        </div>

        <!-- Main Catalog 2-Column Section -->
        <div id="catalog" class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            <!-- Left Sidebar: Categories with Slide-Down Accordions -->
            <aside class="hidden lg:block lg:col-span-3 space-y-6">

                <!-- Category Box -->
                <div class="rounded-3xl p-5 ">
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-[#F5EFEB]">
                        <div class="flex items-center gap-2">

                            <h3 class="font-extrabold text-stone-900 text-sm tracking-wide">
                                {{ __('frontend.categories.title') }}
                            </h3>
                        </div>
                    </div>

                    <!-- Categories Tree -->
                    <div class="space-y-1.5" id="categories-tree">


                        @php
                            $isAll = empty($currentCategory) || $currentCategory === 'all';
                        @endphp
                        <a href="{{ route('home', array_merge(request()->except('category', 'page'), ['category' => 'all'])) }}"
                            class="flex items-center justify-between px-3 py-2 text-xs sm:text-sm transition-all duration-200 border-b-2 {{ $isAll ? 'border-[#B58E3E] text-[#B58E3E] font-bold' : 'border-transparent text-stone-700 hover:text-[#B58E3E] hover:border-[#B58E3E]/30' }}">
                            <span class="flex items-center gap-2.5">
                                <span class="w-2 h-2 rounded-full {{ $isAll ? 'bg-[#B58E3E]' : 'bg-[#EADFC7]' }}"></span>
                                <span>{{ __('frontend.categories.all') }}</span>
                            </span>
                            <span
                                class="text-[11px] {{ $isAll ? 'text-[#B58E3E] font-bold' : 'text-stone-400 font-semibold' }}">
                                (48)
                            </span>
                        </a>

                        @foreach ($categories as $cat)
                            @if ($cat['id'] !== 'all')
                                @php
                                    $hasChildren = !empty($cat['children']);
                                    $childrenIds = $hasChildren ? array_column($cat['children'], 'id') : [];
                                    $isParentActive = $currentCategory === $cat['id'];
                                    $isChildActive = in_array($currentCategory, $childrenIds);
                                    $isOpen = $isParentActive || $isChildActive;
                                    $catName =
                                        app()->getLocale() === 'km' && !empty($cat['name_km'])
                                            ? $cat['name_km']
                                            : $cat['name'];
                                @endphp

                                <div class="rounded-2xl transition-colors">
                                    <!-- Parent Row with Accordion Chevron -->
                                    <div
                                        class="flex items-center justify-between px-3 py-2 text-xs sm:text-sm font-semibold transition-all duration-200 border-b-2 {{ $isParentActive ? 'border-[#B58E3E] text-[#B58E3E] font-bold' : ($isChildActive ? 'border-transparent text-[#B58E3E]' : 'border-transparent text-stone-700 hover:text-[#B58E3E] hover:border-[#B58E3E]/30') }}">

                                        <a href="{{ route('home', array_merge(request()->except('category', 'page'), ['category' => $cat['id']])) }}"
                                            class="flex-1 flex items-center gap-2.5">
                                            <span
                                                class="w-2 h-2 rounded-full {{ $isParentActive || $isChildActive ? 'bg-[#B58E3E]' : 'bg-[#EADFC7]' }}"></span>
                                            <span>{{ $catName }}</span>
                                        </a>

                                        <div class="flex items-center gap-1.5">
                                            <span
                                                class="text-[11px] font-bold {{ $isParentActive ? 'text-[#B58E3E]' : 'text-stone-400' }}">
                                                ({{ $cat['count'] }})
                                            </span>

                                            @if ($hasChildren)
                                                <button type="button"
                                                    onclick="toggleSubcategories('sub-{{ $cat['id'] }}', this)"
                                                    title="Toggle subcategories"
                                                    class="p-1 rounded-lg text-stone-400 hover:text-[#B58E3E] transition-transform">
                                                    <svg class="w-3.5 h-3.5 transform transition-transform duration-300 {{ $isOpen ? 'rotate-180 text-[#B58E3E]' : '' }}"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7" />
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Subcategories Slide-down Container -->
                                    @if ($hasChildren)
                                        <div id="sub-{{ $cat['id'] }}"
                                            class="overflow-hidden transition-all duration-300 ease-in-out pl-6 pr-2 {{ $isOpen ? 'max-h-96 py-1 opacity-100' : 'max-h-0 py-0 opacity-0 pointer-events-none' }}">
                                            <div class="space-y-1 border-l-2 border-[#EADFC7] pl-3 py-1">
                                                @foreach ($cat['children'] as $child)
                                                    @php
                                                        $isSub = $currentCategory === $child['id'];
                                                        $childName =
                                                            app()->getLocale() === 'km' && !empty($child['name_km'])
                                                                ? $child['name_km']
                                                                : $child['name'];
                                                    @endphp
                                                    <a href="{{ route('home', array_merge(request()->except('category', 'page'), ['category' => $child['id']])) }}"
                                                        class="flex items-center justify-between py-1.5 px-1 text-xs transition-all duration-200 border-b-2 {{ $isSub ? 'border-[#B58E3E] text-[#B58E3E] font-bold' : 'border-transparent text-stone-600 hover:text-[#B58E3E] hover:border-[#B58E3E]/30 font-medium' }}">
                                                        <span>{{ $childName }}</span>
                                                        <span
                                                            class="text-[10px] {{ $isSub ? 'text-[#B58E3E] font-bold' : 'text-stone-400 font-medium' }}">({{ $child['count'] }})</span>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>

                <!-- Filter Box (Price & Skin Type) -->
                <div class=" rounded-3xl p-5  space-y-6">
                    <div class="flex items-center gap-2 pb-3 border-b border-[#F5EFEB]">

                        <h3 class="font-extrabold text-stone-900 text-sm tracking-wide">
                            {{ __('frontend.filter.title') }}
                        </h3>
                    </div>

                    <!-- Price Range Slider -->
                    <div>
                        <div class="flex items-center justify-between text-xs font-bold text-stone-700 mb-2">
                            <span>{{ __('frontend.filter.price_range') }}</span>
                            <span class="text-[#B58E3E]" id="price-display">$0 –
                                ${{ number_format($currentMaxPrice ?? 50, 0) }}</span>
                        </div>
                        <input type="range" min="0" max="50" value="{{ $currentMaxPrice ?? 50 }}"
                            id="price-range"
                            class="w-full h-1.5 bg-[#EADFC7] rounded-lg appearance-none cursor-pointer accent-[#B58E3E]">
                        <div class="flex items-center justify-between mt-3">
                            <span class="text-xs text-stone-400 font-medium">$0 – $50</span>
                            <button type="button" id="price-apply-btn"
                                class="px-3.5 py-1 text-xs font-bold rounded-full bg-[#B58E3E] text-white hover:bg-[#997528] transition-colors cursor-pointer active:scale-95">
                                {{ __('frontend.filter.apply') }}
                            </button>
                        </div>
                    </div>

                    <!-- Skin Type Checkboxes (Instant Filter without Page Reload) -->
                    <div class="pt-4 border-t border-[#F5EFEB] space-y-2.5">
                        <h4 class="font-bold text-xs uppercase tracking-wider text-stone-700">
                            {{ __('frontend.filter.skin_type') }}
                        </h4>
                        <div class="space-y-2 text-xs text-stone-600" id="skin-type-filters">
                            @foreach ([
            'all' => __('frontend.filter.all_skin_types'),
            'normal' => __('frontend.filter.normal'),
            'dry' => __('frontend.filter.dry'),
            'oily' => __('frontend.filter.oily'),
            'sensitive' => __('frontend.filter.sensitive'),
        ] as $key => $label)
                                <label class="flex items-center gap-2.5 cursor-pointer hover:text-stone-900">
                                    <input type="checkbox" name="skin_type" value="{{ $key }}"
                                        data-url="{{ route('home', array_merge(request()->except('skin_type', 'page'), ['skin_type' => $key])) }}"
                                        {{ $currentSkinType === $key ? 'checked' : '' }}
                                        class="skin-type-checkbox rounded text-[#B58E3E] focus:ring-[#B58E3E] border-stone-300 cursor-pointer">
                                    <span>{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Reset Filters (Instant without Page Reload) -->
                    <div class="pt-2">
                        <a href="{{ route('home') }}" id="reset-filters-btn"
                            class="w-full py-2 px-4 rounded-2xl border border-[#EADFC7] text-stone-600 hover:text-[#B58E3E] hover:bg-[#FAF7F2] text-xs font-bold flex items-center justify-center gap-2 transition-all">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            <span>{{ __('frontend.filter.clear_all') }}</span>
                        </a>
                    </div>

                </div>

            </aside>

            <!-- Right Main Products Grid Column (Image 2: 4 cards per row for bigger spacious cards!) -->
            <main class="lg:col-span-9 space-y-6">

                <!-- Products Header Bar -->

                <style>
                    #products-catalog-container.list-view-mode {
                        display: flex !important;
                        flex-direction: column !important;
                        gap: 1.25rem !important;
                    }

                    #products-catalog-container.list-view-mode .product-card-item {
                        flex-direction: row !important;
                        align-items: stretch !important;
                        min-height: 150px !important;
                    }

                    #products-catalog-container.list-view-mode .product-card-image-wrapper {
                        width: 140px !important;
                        height: auto !important;
                        min-height: 140px !important;
                        flex-shrink: 0 !important;
                    }

                    @media (min-width: 640px) {
                        #products-catalog-container.list-view-mode .product-card-image-wrapper {
                            width: 190px !important;
                            height: auto !important;
                            min-height: 170px !important;
                        }
                    }

                    #products-catalog-container.list-view-mode .product-card-content {
                        flex-grow: 1 !important;
                        display: flex !important;
                        flex-direction: column !important;
                        justify-content: space-between !important;
                        padding: 1.25rem !important;
                    }
                </style>

                <!-- Product Cards Container: supports Grid and List views -->
                <div id="products-catalog-container"
                    class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-5 lg:gap-6 transition-all duration-300">
                    @forelse($products as $prod)
                        @include('frontend.components.product-card', ['product' => $prod])
                    @empty
                        <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-[#EADFC7] p-8">
                            <div
                                class="w-16 h-16 mx-auto mb-4 rounded-full bg-[#FAF7F2] text-[#B58E3E] border border-[#EADFC7] flex items-center justify-center">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-stone-800 text-lg">
                                {{ app()->getLocale() === 'km' ? 'មិនមានផលិតផលក្នុងប្រភេទនេះទេ' : 'No products found' }}
                            </h3>
                            <p class="text-xs sm:text-sm text-stone-500 mt-1">
                                {{ app()->getLocale() === 'km' ? 'សូមជ្រើសរើសប្រភេទផលិតផលផ្សេង ឬសម្អាតតម្រង' : 'Try resetting your filters or search keywords.' }}
                            </p>
                            <a href="{{ route('home') }}"
                                class="inline-block mt-4 px-5 py-2 rounded-full bg-[#B58E3E] text-white text-xs font-bold shadow-md shadow-stone-800/10">
                                {{ __('frontend.filter.clear_all') }}
                            </a>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination Bar -->
                <div
                    class="bg-transparent rounded-none border-0 shadow-none py-6 px-0 flex flex-col sm:flex-row items-center justify-between gap-3">
                    <span class="text-xs sm:text-sm text-stone-500 font-medium">
                        {{ __('frontend.catalog.showing') }}
                    </span>

                    <div class="flex items-center gap-1.5">
                        <button
                            class="w-8 h-8 rounded-none border border-[#EADFC7] text-stone-500 hover:bg-[#FAF7F2] flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button
                            class="w-8 h-8 rounded-none bg-[#B58E3E] text-white font-bold text-xs flex items-center justify-center">1</button>
                        <button
                            class="w-8 h-8 rounded-none border border-[#EADFC7] text-stone-700 hover:bg-[#FAF7F2] font-bold text-xs flex items-center justify-center">2</button>
                        <button
                            class="w-8 h-8 rounded-none border border-[#EADFC7] text-stone-700 hover:bg-[#FAF7F2] font-bold text-xs flex items-center justify-center">3</button>
                        <button
                            class="w-8 h-8 rounded-none border border-[#EADFC7] text-stone-700 hover:bg-[#FAF7F2] font-bold text-xs flex items-center justify-center">4</button>
                        <button
                            class="w-8 h-8 rounded-none border border-[#EADFC7] text-stone-500 hover:bg-[#FAF7F2] flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

            </main>

        </div>

        <!-- Features Highlight Bar (Complimentary Delivery, Secure Payment, etc.) -->
        @include('frontend.components.features-bar')

    </div>

    @push('scripts')
        <script>
            function toggleSubcategories(id, btn) {
                const el = document.getElementById(id);
                const svg = btn.querySelector('svg');
                if (!el) return;

                if (el.classList.contains('max-h-0')) {
                    el.classList.remove('max-h-0', 'py-0', 'opacity-0', 'pointer-events-none');
                    el.classList.add('max-h-96', 'py-1', 'opacity-100');
                    if (svg) svg.classList.add('rotate-180', 'text-[#B58E3E]');
                } else {
                    el.classList.add('max-h-0', 'py-0', 'opacity-0', 'pointer-events-none');
                    el.classList.remove('max-h-96', 'py-1', 'opacity-100');
                    if (svg) svg.classList.remove('rotate-180', 'text-[#B58E3E]');
                }
            }

            // Auto-Slide Banner Carousel Logic
            document.addEventListener('DOMContentLoaded', function() {
                const carousel = document.getElementById('hero-banner-carousel');
                if (!carousel) return;

                const track = document.getElementById('carousel-track');
                const prevBtn = document.getElementById('carousel-prev-btn');
                const nextBtn = document.getElementById('carousel-next-btn');
                const indicators = carousel.querySelectorAll('.carousel-indicator');
                const totalSlides = 2;
                let currentIndex = 0;
                let autoSlideTimer = null;
                const slideInterval = 5000; // 5 seconds per slide

                function goToSlide(index) {
                    currentIndex = (index + totalSlides) % totalSlides;
                    if (track) {
                        track.style.transform = `translateX(-${currentIndex * 100}%)`;
                    }
                    indicators.forEach((indicator, i) => {
                        if (i === currentIndex) {
                            indicator.className =
                                'carousel-indicator w-7 sm:w-8 h-2 rounded-full bg-gradient-to-r from-[#B58E3E] to-[#C5A059] shadow-sm transition-all duration-300 cursor-pointer';
                        } else {
                            indicator.className =
                                'carousel-indicator w-2 h-2 rounded-full bg-white/70 hover:bg-white transition-all duration-300 cursor-pointer';
                        }
                    });
                }

                function startAutoSlide() {
                    stopAutoSlide();
                    autoSlideTimer = setInterval(() => {
                        goToSlide(currentIndex + 1);
                    }, slideInterval);
                }

                function stopAutoSlide() {
                    if (autoSlideTimer) {
                        clearInterval(autoSlideTimer);
                        autoSlideTimer = null;
                    }
                }

                function resetAutoSlide() {
                    stopAutoSlide();
                    startAutoSlide();
                }

                // Navigation button listeners
                if (prevBtn) {
                    prevBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        goToSlide(currentIndex - 1);
                        resetAutoSlide();
                    });
                }

                if (nextBtn) {
                    nextBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        goToSlide(currentIndex + 1);
                        resetAutoSlide();
                    });
                }

                // Indicator dot listeners
                indicators.forEach((indicator, idx) => {
                    indicator.addEventListener('click', function(e) {
                        e.preventDefault();
                        goToSlide(idx);
                        resetAutoSlide();
                    });
                });

                // Pause auto-sliding when user hovers over the carousel
                carousel.addEventListener('mouseenter', stopAutoSlide);
                carousel.addEventListener('mouseleave', startAutoSlide);

                // Touch swipe support for mobile/tablets
                let touchStartX = 0;
                let touchEndX = 0;

                carousel.addEventListener('touchstart', function(e) {
                    touchStartX = e.changedTouches[0].screenX;
                    stopAutoSlide();
                }, {
                    passive: true
                });

                carousel.addEventListener('touchend', function(e) {
                    touchEndX = e.changedTouches[0].screenX;
                    const diffX = touchEndX - touchStartX;
                    if (Math.abs(diffX) > 40) {
                        if (diffX < 0) {
                            goToSlide(currentIndex + 1); // Swiped left -> Next
                        } else {
                            goToSlide(currentIndex - 1); // Swiped right -> Previous
                        }
                    }
                    startAutoSlide();
                }, {
                    passive: true
                });

                // Keyboard arrow navigation
                carousel.setAttribute('tabindex', '0');
                carousel.addEventListener('keydown', function(e) {
                    if (e.key === 'ArrowLeft') {
                        goToSlide(currentIndex - 1);
                        resetAutoSlide();
                    } else if (e.key === 'ArrowRight') {
                        goToSlide(currentIndex + 1);
                        resetAutoSlide();
                    }
                });

                // Initialize auto-slide
                startAutoSlide();

                // Custom Luxury Sort Dropdown Toggle
                const sortToggle = document.getElementById('sort-dropdown-toggle');
                const sortMenu = document.getElementById('sort-dropdown-menu');
                const sortChevron = document.getElementById('sort-chevron');

                if (sortToggle && sortMenu) {
                    sortToggle.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const isOpen = !sortMenu.classList.contains('hidden');
                        if (isOpen) {
                            sortMenu.classList.add('hidden');
                            if (sortChevron) sortChevron.classList.remove('rotate-180');
                        } else {
                            sortMenu.classList.remove('hidden');
                            if (sortChevron) sortChevron.classList.add('rotate-180');
                        }
                    });

                    document.addEventListener('click', function(e) {
                        if (!sortMenu.contains(e.target) && !sortToggle.contains(e.target)) {
                            sortMenu.classList.add('hidden');
                            if (sortChevron) sortChevron.classList.remove('rotate-180');
                        }
                    });
                }

                // Grid / List View Switcher Functionality
                const btnGrid = document.getElementById('btn-view-grid');
                const btnList = document.getElementById('btn-view-list');
                const catalogContainer = document.getElementById('products-catalog-container');

                function setCatalogView(mode) {
                    if (!catalogContainer || !btnGrid || !btnList) return;
                    if (mode === 'list') {
                        catalogContainer.classList.add('list-view-mode');
                        btnList.className =
                            'p-1.5 rounded-xl bg-white text-[#B58E3E] shadow-xs cursor-pointer transition-all';
                        btnGrid.className =
                            'p-1.5 rounded-xl text-stone-400 hover:text-stone-700 cursor-pointer transition-all';
                        try {
                            localStorage.setItem('liva_view_mode', 'list');
                        } catch (err) {}
                    } else {
                        catalogContainer.classList.remove('list-view-mode');
                        btnGrid.className =
                            'p-1.5 rounded-xl bg-white text-[#B58E3E] shadow-xs cursor-pointer transition-all';
                        btnList.className =
                            'p-1.5 rounded-xl text-stone-400 hover:text-stone-700 cursor-pointer transition-all';
                        try {
                            localStorage.setItem('liva_view_mode', 'grid');
                        } catch (err) {}
                    }
                }

                if (btnGrid && btnList) {
                    btnGrid.addEventListener('click', function() {
                        setCatalogView('grid');
                    });
                    btnList.addEventListener('click', function() {
                        setCatalogView('list');
                    });

                    // Restore saved view preference
                    try {
                        const savedMode = localStorage.getItem('liva_view_mode');
                        if (savedMode === 'list') {
                            setCatalogView('list');
                        }
                    } catch (err) {}
                }

                // Non-reloading AJAX filter function
                async function filterProductsAjax(url, updatePushState = true) {
                    const catalogContainer = document.getElementById('products-catalog-container');
                    if (!catalogContainer) return;

                    catalogContainer.classList.add('opacity-40', 'pointer-events-none');

                    try {
                        const res = await fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });
                        if (!res.ok) throw new Error('Network error');
                        const html = await res.text();
                        const doc = new DOMParser().parseFromString(html, 'text/html');

                        // 1. Swap product cards
                        const newProducts = doc.getElementById('products-catalog-container');
                        if (newProducts) {
                            catalogContainer.innerHTML = newProducts.innerHTML;
                        }

                        // 2. Swap header bar count & current active tag
                        const newHeader = doc.getElementById('products-header-count');
                        const oldHeader = document.getElementById('products-header-count');
                        if (newHeader && oldHeader) {
                            oldHeader.innerHTML = newHeader.innerHTML;
                        }

                        // 3. Swap categories tree in sidebar
                        const newTree = doc.getElementById('categories-tree');
                        const oldTree = document.getElementById('categories-tree');
                        if (newTree && oldTree) {
                            oldTree.innerHTML = newTree.innerHTML;
                        }

                        // 4. Swap mobile chips
                        const newMobile = doc.getElementById('mobile-category-chips');
                        const oldMobile = document.getElementById('mobile-category-chips');
                        if (newMobile && oldMobile) {
                            oldMobile.innerHTML = newMobile.innerHTML;
                        }

                        // 5. Swap skin type checkboxes
                        const newSkin = doc.getElementById('skin-type-filters');
                        const oldSkin = document.getElementById('skin-type-filters');
                        if (newSkin && oldSkin) {
                            oldSkin.innerHTML = newSkin.innerHTML;
                        }

                        // 6. Swap sort dropdown
                        const newSortToggle = doc.getElementById('sort-dropdown-toggle');
                        const oldSortToggle = document.getElementById('sort-dropdown-toggle');
                        if (newSortToggle && oldSortToggle) {
                            oldSortToggle.innerHTML = newSortToggle.innerHTML;
                        }
                        const newSortMenu = doc.getElementById('sort-dropdown-menu');
                        const oldSortMenu = document.getElementById('sort-dropdown-menu');
                        if (newSortMenu && oldSortMenu) {
                            oldSortMenu.innerHTML = newSortMenu.innerHTML;
                        }

                        // 7. Update browser history without full page reload
                        if (updatePushState) {
                            history.pushState({
                                url: url
                            }, '', url);
                        }

                        // Re-bind listeners on newly injected DOM elements
                        attachFilterListeners();

                        // Re-apply view mode
                        try {
                            const savedMode = localStorage.getItem('liva_view_mode');
                            if (savedMode === 'list') {
                                catalogContainer.classList.add('list-view-mode');
                            } else {
                                catalogContainer.classList.remove('list-view-mode');
                            }
                        } catch (err) {}

                    } catch (err) {
                        console.error('AJAX filter failed, fallback to reload:', err);
                        window.location.href = url;
                    } finally {
                        catalogContainer.classList.remove('opacity-40', 'pointer-events-none');
                    }
                }

                function attachFilterListeners() {
                    // Mobile Category Chips
                    const mobileContainer = document.getElementById('mobile-category-chips');
                    if (mobileContainer) {
                        mobileContainer.querySelectorAll('a').forEach(link => {
                            link.onclick = function(e) {
                                e.preventDefault();
                                filterProductsAjax(this.href);
                            };
                        });
                    }

                    // Sidebar Category Links
                    const tree = document.getElementById('categories-tree');
                    if (tree) {
                        tree.querySelectorAll('a').forEach(link => {
                            link.onclick = function(e) {
                                e.preventDefault();
                                filterProductsAjax(this.href);
                            };
                        });
                    }

                    // Category Filter Badge 'x' button in header
                    const headerCount = document.getElementById('products-header-count');
                    if (headerCount) {
                        headerCount.querySelectorAll('a').forEach(link => {
                            link.onclick = function(e) {
                                e.preventDefault();
                                filterProductsAjax(this.href);
                            };
                        });
                    }

                    // Sort Dropdown Links
                    const sortMenu = document.getElementById('sort-dropdown-menu');
                    if (sortMenu) {
                        sortMenu.querySelectorAll('a').forEach(link => {
                            link.onclick = function(e) {
                                e.preventDefault();
                                sortMenu.classList.add('hidden');
                                const chevron = document.getElementById('sort-chevron');
                                if (chevron) chevron.classList.remove('rotate-180');
                                filterProductsAjax(this.href);
                            };
                        });
                    }

                    // Skin Type Checkboxes
                    const skinFilters = document.getElementById('skin-type-filters');
                    if (skinFilters) {
                        skinFilters.querySelectorAll('input[type="checkbox"]').forEach(box => {
                            box.onchange = function(e) {
                                e.preventDefault();
                                const url = this.dataset.url;
                                if (url) {
                                    filterProductsAjax(url);
                                }
                            };
                        });
                    }

                    // Reset Filters Button
                    const resetBtn = document.getElementById('reset-filters-btn');
                    if (resetBtn) {
                        resetBtn.onclick = function(e) {
                            e.preventDefault();
                            filterProductsAjax(this.href);
                        };
                    }
                }

                // Attach listeners initially
                attachFilterListeners();

                // Browser Back / Forward buttons handling
                window.addEventListener('popstate', function(e) {
                    if (e.state && e.state.url) {
                        filterProductsAjax(e.state.url, false);
                    } else {
                        filterProductsAjax(window.location.href, false);
                    }
                });

                // Price range slider live filtering & Apply button without reload
                const priceRange = document.getElementById('price-range');
                const priceDisplay = document.getElementById('price-display');
                const priceApplyBtn = document.getElementById('price-apply-btn');

                if (priceRange && priceDisplay) {
                    priceRange.addEventListener('input', function() {
                        priceDisplay.textContent = '$0 – $' + this.value;
                        const maxVal = parseFloat(this.value);
                        const cards = document.querySelectorAll('.product-card-item');
                        let count = 0;
                        cards.forEach(card => {
                            const price = parseFloat(card.dataset.price) || 0;
                            if (price <= maxVal) {
                                card.style.display = '';
                                count++;
                            } else {
                                card.style.display = 'none';
                            }
                        });
                        const countHeading = document.querySelector('#products-header-count h2');
                        if (countHeading) {
                            countHeading.textContent = `${count} Products Found`;
                        }
                    });
                }

                if (priceApplyBtn && priceRange) {
                    priceApplyBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const currentUrl = new URL(window.location.href);
                        currentUrl.searchParams.set('max_price', priceRange.value);
                        filterProductsAjax(currentUrl.toString());
                        showToast('Filter Applied', `Max price: $${priceRange.value}`);
                    });
                }
            });
        </script>
    @endpush
@endsection
