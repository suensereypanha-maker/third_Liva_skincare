@extends('frontend.layouts.app')

@php
    $isKm = app()->getLocale() === 'km';
    $name = $isKm && !empty($product['name_km']) ? $product['name_km'] : $product['name'];
    $desc = $isKm && !empty($product['description_km']) ? $product['description_km'] : $product['description'];
    $features = $isKm && !empty($product['features_km']) ? $product['features_km'] : $product['features'] ?? [];
@endphp

@section('title', $name . ' - Liva Luxury Skincare')

@section('meta')
    <meta property="og:type" content="product">
    <meta property="og:title" content="{{ $name }} - Liva Luxury Skincare">
    <meta property="og:description" content="{{ $desc }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $product['image'] }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 pb-20 sm:pb-12">

        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs text-stone-500 mb-6 font-medium">
            <a href="{{ route('home') }}"
                class="hover:text-[#B58E3E] transition-colors">{{ __('frontend.product_detail.breadcrumb_home') }}</a>
            <svg class="w-3.5 h-3.5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <a href="{{ route('products.index', ['category' => $product['category'] ?? 'skincare']) }}"
                class="hover:text-[#B58E3E] transition-colors">
                {{ __('frontend.product_detail.breadcrumb_skincare') }}
            </a>
            <svg class="w-3.5 h-3.5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <span class="text-stone-900 font-bold truncate max-w-xs">{{ $name }}</span>
        </nav>

        <!-- Product Showcase Top Card (Luxury Gold & Cream Theme) -->
        <div class=" rounded-3xl p-6 sm:p-10   mb-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">

                <!-- Left: Product Gallery (Thumbnails + Main Stage) -->
                <div class="lg:col-span-6 flex flex-col-reverse sm:flex-row gap-4 items-center">

                    @php
                        $gallery = !empty($product['gallery'])
                            ? $product['gallery']
                            : [
                                $product['image'],
                                asset('img/daily-edit.png'),
                                asset('img/result-3.jpg'),
                                asset('img/ritual-duo.png'),
                            ];
                    @endphp

                    <!-- Vertical Thumbnails (Pure Edge-to-Edge Product Photos, No Card BG) -->
                    <div class="flex sm:flex-col gap-3 justify-center">
                        @foreach ($gallery as $index => $imgUrl)
                            <button type="button" onclick="switchProductImage('{{ $imgUrl }}', this)"
                                class="gallery-thumb-btn w-16 h-16 sm:w-20 sm:h-20 rounded-2xl overflow-hidden cursor-pointer transition-all duration-300 hover:opacity-100 hover:border-[#B58E3E] {{ $index === 0 ? 'border-2 border-[#B58E3E] ring-2 ring-[#B58E3E]/30 scale-105 shadow-md' : 'border border-[#EADFC7] opacity-80' }}"
                                title="View angle {{ $index + 1 }}">
                                <img src="{{ $imgUrl }}" alt="{{ $name }} angle {{ $index + 1 }}"
                                    class="w-full h-full object-cover">
                            </button>
                        @endforeach

                        <!-- Video Thumbnail directly UNDER images (User Request) -->
                        <button type="button" id="thumb-video-btn"
                            onclick="switchProductVideo('{{ asset('videos/product-commercial.mp4') }}', this)"
                            class="gallery-thumb-btn relative w-16 h-16 sm:w-20 sm:h-20 rounded-2xl overflow-hidden cursor-pointer transition-all duration-300 hover:opacity-100 hover:border-[#B58E3E] border border-[#EADFC7] opacity-80 group/vthumb"
                            title="Play Video Commercial">
                            <img src="{{ asset('videos/video-thumbnail.jpg') }}"
                                alt="{{ $name }} commercial video"
                                class="w-full h-full object-cover group-hover/vthumb:scale-105 transition-transform duration-300">
                            <div
                                class="absolute inset-0 bg-black/30 flex items-center justify-center transition-colors group-hover/vthumb:bg-black/15">
                                <span
                                    class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 text-[#B58E3E] flex items-center justify-center shadow-md shadow-black/25 pl-0.5 group-hover/vthumb:scale-110 group-hover/vthumb:bg-[#B58E3E] group-hover/vthumb:text-white transition-all">
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 fill-current" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z" />
                                    </svg>
                                </span>
                            </div>
                            <span
                                class="absolute bottom-1 right-1 bg-black/75 text-[9px] font-bold text-white px-1.5 py-0.5 rounded-md leading-none tracking-tight">
                                VIDEO
                            </span>
                        </button>
                    </div>

                    <!-- Main Showcase Display (Full-Width Image Frame) -->
                    <div
                        class="relative w-full aspect-square max-w-md mx-auto rounded-3xl bg-stone-100 border border-[#EADFC7] flex items-center justify-center overflow-hidden group shadow-lg">
                        <img id="main-product-img" src="{{ $gallery[0] ?? $product['image'] }}" alt="{{ $name }}"
                            class="w-full h-full object-cover group-hover:scale-106 transition-all duration-500"
                            onerror="this.src='{{ asset('img/daily-edit-detail.png') }}'">

                        <!-- Main Product Video Element (Shows and plays when video thumbnail is clicked) -->
                        <video id="main-product-video" class="hidden w-full h-full object-cover rounded-3xl"
                            src="{{ asset('videos/product-commercial.mp4') }}"
                            poster="{{ asset('videos/video-thumbnail.jpg') }}" playsinline loop muted controls>
                        </video>

                        @if (!empty($product['discount']))
                            <span id="main-product-discount"
                                class="absolute top-5 right-5 text-dark text-xs font-black px-3.5 py-1 rounded-full z-10">
                                {{ $product['discount'] }}
                            </span>
                        @endif
                    </div>

                </div>

                <!-- Right: Product Information & Purchase Options -->
                <div class="lg:col-span-6 space-y-6">

                    <div>
                        <span
                            class="text-xs font-bold uppercase tracking-wider text-[#B58E3E] bg-[#FAF7F2] px-3.5 py-1 rounded-full border border-[#EADFC7]">
                            {{ $product['category_name'] ?? 'Skincare' }}
                        </span>
                        <h1
                            class="text-2xl sm:text-3xl lg:text-4xl font-black font-brand text-stone-900 mt-2.5 tracking-tight">
                            {{ $name }}
                        </h1>

                        <!-- Rating & Reviews -->
                        <div class="flex items-center gap-3 mt-2">
                            <div class="flex text-[#C5A059] text-sm">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <span class="text-xs font-bold text-stone-800">{{ $product['rating'] ?? '4.8' }}</span>
                            <span class="text-xs text-stone-400">({{ $product['reviews_count'] ?? '2.5k' }}
                                {{ __('frontend.catalog.reviews') }})</span>
                        </div>
                    </div>

                    <!-- Price Row -->
                    <div class="flex items-baseline gap-3 pb-4 border-b border-[#F5EFEB]">
                        <span class="text-3xl font-black text-[#B58E3E]" id="product-detail-price">
                            ${{ number_format($product['price'], 2) }}
                        </span>
                        @if (!empty($product['original_price']))
                            <span class="text-base text-stone-400 line-through">
                                ${{ number_format($product['original_price'], 2) }}
                            </span>
                        @endif
                    </div>

                    <!-- Description Paragraph -->
                    <p class="text-sm text-stone-600 leading-relaxed font-normal">
                        {{ $desc }}
                    </p>

                    <!-- Key Benefits Checklist with Gold Checkmarks -->
                    <div class="space-y-2 py-1">
                        @foreach ($features as $feat)
                            <div class="flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-stone-800">
                                <span
                                    class="w-5 h-5 rounded-full  text-[#B58E3E]  flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span>
                                <span>{{ $feat }}</span>
                            </div>
                        @endforeach
                    </div>

                    <!-- Size / Volume Selector (Image 3 explicit annotation: "size volum") -->
                    <div class="pt-2 pb-1 space-y-2 border-t border-[#F5EFEB]">
                        <div class="flex items-center justify-between">
                            <label class="text-xs font-extrabold uppercase tracking-wider text-stone-700">
                                {{ __('frontend.product_detail.size_volume') }}
                            </label>
                            <span class="text-xs text-[#B58E3E] font-bold" id="selected-size-label">50ml (Standard)</span>
                        </div>
                        <div class="grid grid-cols-3 gap-2.5" id="size-selector-group">
                            <!-- 30ml -->
                            <button type="button" onclick="selectSize('30ml', 12.00, this)"
                                class="size-pill py-2.5 px-3 rounded-2xl border border-[#EADFC7] hover:border-[#B58E3E] bg-[#FAF7F2] text-xs font-bold text-stone-700 text-center transition-all">
                                <span>30ml</span>
                                <span class="block text-[10px] text-stone-400 font-normal">$12.00</span>
                            </button>
                            <!-- 50ml (Active) -->
                            <button type="button" onclick="selectSize('50ml', 16.00, this)"
                                class="size-pill py-2.5 px-3 rounded-2xl border-2 border-[#B58E3E] bg-[#F5EFEB] text-xs font-bold text-[#B58E3E] text-center shadow-xs transition-all">
                                <span>50ml</span>
                                <span class="block text-[10px] text-stone-500 font-semibold">$16.00</span>
                            </button>
                            <!-- 100ml -->
                            <button type="button" onclick="selectSize('100ml', 28.00, this)"
                                class="size-pill py-2.5 px-3 rounded-2xl border border-[#EADFC7] hover:border-[#B58E3E] bg-[#FAF7F2] text-xs font-bold text-stone-700 text-center transition-all">
                                <span>100ml</span>
                                <span class="block text-[10px] text-stone-400 font-normal">$28.00</span>
                            </button>
                        </div>
                    </div>

                    <!-- Quantity Stepper & Action Buttons -->
                    <div class="pt-2 space-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4">
                            <!-- Stepper -->
                            <div
                                class="flex items-center justify-between sm:justify-center border border-[#EADFC7] bg-[#FAF7F2] p-1 w-full sm:w-auto shrink-0">
                                <button type="button"
                                    onclick="let q = document.getElementById('product-qty'); if(parseInt(q.value) > 1) q.value = parseInt(q.value) - 1;"
                                    class="w-9 h-9 bg-white text-stone-700 hover:text-[#B58E3E] shadow-xs flex items-center justify-center font-bold text-sm cursor-pointer active:scale-95 transition-all">
                                    -
                                </button>
                                <input type="number" id="product-qty" value="1" min="1" readonly
                                    class="no-spinner w-12 text-center bg-transparent border-0 font-bold text-sm text-stone-800 focus:outline-none focus:ring-0 p-0">
                                <button type="button"
                                    onclick="let q = document.getElementById('product-qty'); q.value = parseInt(q.value) + 1;"
                                    class="w-9 h-9 bg-white text-stone-700 hover:text-[#B58E3E] shadow-xs flex items-center justify-center font-bold text-sm cursor-pointer active:scale-95 transition-all">
                                    +
                                </button>
                            </div>

                            <!-- Action Buttons Group (Add to Cart + Wishlist side-by-side on mobile) -->
                            <div class="flex items-center gap-2.5 sm:gap-3 flex-1 w-full">
                                <!-- Add to Cart (Brushed Luxury Gold) -->
                                <button type="button"
                                    onclick="showToast('{{ __('frontend.header.cart') }}', 'Added {{ $name }}'); if (document.getElementById('cart-badge-count')) { let b = document.getElementById('cart-badge-count'); b.textContent = (parseInt(b.textContent || '0', 10) + parseInt(document.getElementById('product-qty').value || '1', 10)); }"
                                    class="flex-1 py-3.5 px-4 sm:px-6 bg-gradient-to-r from-[#B58E3E] to-[#C5A059] hover:from-[#997528] hover:to-[#B58E3E] text-white font-bold text-xs sm:text-sm shadow-md shadow-stone-800/15 active:scale-95 transition-all flex items-center justify-center gap-2 whitespace-nowrap">
                                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    <span>{{ __('frontend.catalog.add_to_cart') }}</span>
                                </button>

                                <!-- Add to Wishlist / Favorite Button -->
                                <button type="button" data-wishlist-slug="{{ $product['slug'] }}"
                                    onclick="toggleWishlist('{{ $product['slug'] }}', '{{ addslashes($name) }}', this);"
                                    title="{{ __('frontend.header.wishlist') }}"
                                    class="wishlist-toggle-btn w-12 h-12 rounded-none   hover:border-[#B58E3E] text-stone-500 hover:text-[#B58E3E] flex items-center justify-center shrink-0  transition-all">
                                    <svg class="w-5 h-5 pointer-events-none" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    @php
                        $shareUrl = url()->current();
                        $shareTitle = $name;
                        $facebookShareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($shareUrl);
                        $telegramShareUrl =
                            'https://t.me/share/url?url=' .
                            urlencode($shareUrl) .
                            '&text=' .
                            urlencode($shareTitle . ' - $' . number_format($product['price'], 2));
                    @endphp

                    <!-- Share Product (Facebook, Instagram, Telegram) -->
                    <div class="pt-4 border-t border-[#F5EFEB] flex flex-wrap items-center gap-3">
                        <span class="text-xs font-extrabold uppercase tracking-wider text-stone-500">
                            {{ __('frontend.product_detail.share') }}:
                        </span>
                        <div class="flex items-center gap-2.5">
                            <!-- Facebook -->
                            <a href="{{ $facebookShareUrl }}" target="_blank" rel="noopener noreferrer"
                                aria-label="{{ __('frontend.product_detail.share_facebook') }}"
                                title="{{ __('frontend.product_detail.share_facebook') }}"
                                class="inline-flex items-center gap-2 px-3.5 py-2 rounded-full  bg-[#FAF7F2] text-xs font-bold text-stone-700 hover:border-[#1877F2] hover:bg-[#1877F2] hover:text-white transition-all ">
                                <svg class="w-3.5 h-3.5 fill-current shrink-0" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>

                            </a>

                            <!-- Instagram -->
                            <button type="button" onclick="shareToInstagram('{{ addslashes($shareTitle) }}')"
                                aria-label="{{ __('frontend.product_detail.share_instagram') }}"
                                title="{{ __('frontend.product_detail.share_instagram') }}"
                                class="inline-flex items-center gap-2 px-3.5 py-2 rounded-full  bg-[#FAF7F2] text-xs font-bold text-stone-700 hover:border-[#E4405F] hover:bg-gradient-to-tr hover:from-[#F58529] hover:via-[#DD2A7B] hover:to-[#8134AF] hover:text-white transition-all  cursor-pointer">
                                <svg class="w-3.5 h-3.5 fill-current shrink-0" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>

                            </button>

                            <!-- Telegram -->
                            <a href="{{ $telegramShareUrl }}" target="_blank" rel="noopener noreferrer"
                                aria-label="{{ __('frontend.product_detail.share_telegram') }}"
                                title="{{ __('frontend.product_detail.share_telegram') }}"
                                class="inline-flex items-center gap-2 px-3.5 py-2 rounded-full  bg-[#FAF7F2] text-xs font-bold text-stone-700 hover:border-[#229ED9] hover:bg-[#229ED9] hover:text-white transition-all ">
                                <svg class="w-3.5 h-3.5 fill-current shrink-0" viewBox="0 0 24 24">
                                    <path
                                        d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.196 1.006.128.832.942z" />
                                </svg>

                            </a>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Tabs Section: Description, Reviews, and 'How to Use' (Image 3: replace to how to use) -->
            <div class="mt-12 pt-8 border-t border-[#EADFC7]">
                <div
                    class="flex items-center gap-6 sm:gap-8 border-b border-[#EADFC7] text-sm font-bold overflow-x-auto scrollbar-none whitespace-nowrap">
                    <button type="button" id="tab-btn-desc" onclick="switchTab('desc')"
                        class="tab-btn pb-3 text-[#B58E3E] border-b-2 border-[#B58E3E]">
                        {{ __('frontend.product_detail.description') }}
                    </button>
                    <button type="button" id="tab-btn-reviews" onclick="switchTab('reviews')"
                        class="tab-btn pb-3 text-stone-400 hover:text-stone-700 transition-colors">
                        {{ __('frontend.product_detail.reviews_tab') }} (2.5k)
                    </button>
                    <!-- Replaced to 'How to Use' per Image 3 annotation -->
                    <button type="button" id="tab-btn-how-to-use" onclick="switchTab('how-to-use')"
                        class="tab-btn pb-3 text-stone-400 hover:text-[#B58E3E] transition-colors">
                        {{ __('frontend.product_detail.how_to_use') }}
                    </button>
                </div>

                <!-- Tab Content: Description -->
                <div id="tab-pane-desc" class="py-5 text-sm text-stone-600 leading-relaxed space-y-3">
                    <p>{{ __('frontend.product_detail.detail_desc') }}</p>
                    <p class="text-xs text-stone-500">
                        Formulated with precious golden chamomile, niacinamide, fermented botanical oils, and biomimetic
                        peptides to restore skin elasticity and illuminate dull complexions. Dermatologist tested,
                        non-comedogenic, paraben-free.
                    </p>
                </div>

                <!-- Tab Content: Reviews -->
                <div id="tab-pane-reviews" class="hidden py-5 space-y-4">
                    <div class="p-4 rounded-none bg-[#FAF7F2] border border-[#EADFC7]">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-bold text-xs text-stone-800">Sophea C.</span>
                            <span class="text-[11px] text-[#C5A059]">★★★★★</span>
                        </div>
                        <p class="text-xs text-stone-600">The texture is heavenly! Absorbs quickly without any greasiness,
                            and my skin feels deeply nourished every morning.</p>
                    </div>
                    <div class="p-4 rounded-none bg-[#FAF7F2] border border-[#EADFC7]">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-bold text-xs text-stone-800">Jessica L.</span>
                            <span class="text-[11px] text-[#C5A059]">★★★★★</span>
                        </div>
                        <p class="text-xs text-stone-600">Pure luxury in a jar. Visible brightness in just 10 days of
                            regular use.</p>
                    </div>
                </div>

                <!-- Tab Content: How to Use (Image 3) -->
                <div id="tab-pane-how-to-use" class="hidden py-5 space-y-4">
                    <p class="text-sm text-stone-700 leading-relaxed">
                        {{ __('frontend.product_detail.how_to_use_desc') }}
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
                        <div class="p-3.5 rounded-none bg-[#FAF7F2] border border-[#EADFC7]">
                            <span
                                class="w-6 h-6 rounded-none bg-[#B58E3E] text-white flex items-center justify-center text-xs font-bold mb-2">1</span>
                            <h5 class="text-xs font-bold text-stone-800">
                                {{ app()->getLocale() === 'km' ? 'សម្អាតផ្ទៃមុខ' : 'Purify & Tone' }}</h5>
                            <p class="text-[11px] text-stone-500 mt-1">
                                {{ app()->getLocale() === 'km' ? 'លាងសម្អាតមុខ និងជូតទឹក Toner' : 'Start with clean, toned skin.' }}
                            </p>
                        </div>
                        <div class="p-3.5 rounded-none bg-[#FAF7F2] border border-[#EADFC7]">
                            <span
                                class="w-6 h-6 rounded-none bg-[#B58E3E] text-white flex items-center justify-center text-xs font-bold mb-2">2</span>
                            <h5 class="text-xs font-bold text-stone-800">
                                {{ app()->getLocale() === 'km' ? 'កម្ដៅគ្រីម' : 'Warm & Activate' }}</h5>
                            <p class="text-[11px] text-stone-500 mt-1">
                                {{ app()->getLocale() === 'km' ? 'ត្រដុសលើចុងម្រាមដៃថ្នមៗ' : 'Warm a pea-sized amount between fingertips.' }}
                            </p>
                        </div>
                        <div class="p-3.5 rounded-none bg-[#FAF7F2] border border-[#EADFC7]">
                            <span
                                class="w-6 h-6 rounded-none bg-[#B58E3E] text-white flex items-center justify-center text-xs font-bold mb-2">3</span>
                            <h5 class="text-xs font-bold text-stone-800">
                                {{ app()->getLocale() === 'km' ? 'ម៉ាស្សាជារង្វង់' : 'Gently Massage' }}</h5>
                            <p class="text-[11px] text-stone-500 mt-1">
                                {{ app()->getLocale() === 'km' ? 'ម៉ាស្សាឡើងលើរហូតដល់ជ្រាបសព្វ' : 'Smooth in gentle upward motions over face & neck.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Related Products -->
        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-black font-brand text-stone-900 tracking-tight">
                    {{ app()->getLocale() === 'km' ? 'ផលិតផលស្រដៀងគ្នា' : 'You May Also Like' }}
                </h3>
                <a href="{{ route('products.index') }}" class="text-xs font-bold text-[#B58E3E] hover:underline">
                    {{ __('frontend.dashboard.view_all') }} →
                </a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6">
                @foreach ($relatedProducts as $rel)
                    @include('frontend.components.product-card', ['product' => $rel])
                @endforeach
            </div>
        </div>

    </div>

    @push('scripts')
        <script>
            function switchProductImage(src, btn) {
                const mainImg = document.getElementById('main-product-img');
                const mainVideo = document.getElementById('main-product-video');
                if (mainVideo) {
                    mainVideo.pause();
                    mainVideo.classList.add('hidden');
                }
                if (mainImg) {
                    mainImg.classList.remove('hidden');
                    mainImg.classList.add('opacity-40');
                    setTimeout(() => {
                        mainImg.src = src;
                        mainImg.classList.remove('opacity-40');
                    }, 120);
                }
                document.querySelectorAll('.gallery-thumb-btn').forEach(b => {
                    b.classList.remove('border-2', 'border-[#B58E3E]', 'ring-2', 'ring-[#B58E3E]/30', 'scale-105',
                        'shadow-md');
                    b.classList.add('border', 'border-[#EADFC7]', 'opacity-80');
                });
                if (btn) {
                    btn.classList.remove('border', 'border-[#EADFC7]', 'opacity-80');
                    btn.classList.add('border-2', 'border-[#B58E3E]', 'ring-2', 'ring-[#B58E3E]/30', 'scale-105', 'shadow-md');
                }
            }

            function switchProductVideo(videoSrc, btn) {
                const mainImg = document.getElementById('main-product-img');
                const mainVideo = document.getElementById('main-product-video');
                if (mainImg) {
                    mainImg.classList.add('hidden');
                }
                if (mainVideo) {
                    mainVideo.classList.remove('hidden');
                    mainVideo.currentTime = 0;
                    const playPromise = mainVideo.play();
                    if (playPromise !== undefined) {
                        playPromise.catch(e => {
                            console.log('Video autoplay prevented, ready to play on user click:', e);
                        });
                    }
                }
                document.querySelectorAll('.gallery-thumb-btn').forEach(b => {
                    b.classList.remove('border-2', 'border-[#B58E3E]', 'ring-2', 'ring-[#B58E3E]/30', 'scale-105',
                        'shadow-md');
                    b.classList.add('border', 'border-[#EADFC7]', 'opacity-80');
                });
                if (btn) {
                    btn.classList.remove('border', 'border-[#EADFC7]', 'opacity-80');
                    btn.classList.add('border-2', 'border-[#B58E3E]', 'ring-2', 'ring-[#B58E3E]/30', 'scale-105', 'shadow-md');
                }
            }

            function selectSize(size, price, btn) {
                document.querySelectorAll('.size-pill').forEach(el => {
                    el.classList.remove('border-2', 'border-[#B58E3E]', 'bg-[#F5EFEB]', 'text-[#B58E3E]');
                    el.classList.add('border', 'border-[#EADFC7]', 'bg-[#FAF7F2]', 'text-stone-700');
                });
                btn.classList.remove('border', 'border-[#EADFC7]', 'bg-[#FAF7F2]', 'text-stone-700');
                btn.classList.add('border-2', 'border-[#B58E3E]', 'bg-[#F5EFEB]', 'text-[#B58E3E]');

                document.getElementById('selected-size-label').textContent = size + (size === '50ml' ? ' (Standard)' : (size ===
                    '30ml' ? ' (Travel)' : ' (Value)'));
                document.getElementById('product-detail-price').textContent = '$' + price.toFixed(2);
            }

            function switchTab(tab) {
                document.querySelectorAll('.tab-btn').forEach(b => {
                    b.classList.remove('text-[#B58E3E]', 'border-b-2', 'border-[#B58E3E]');
                    b.classList.add('text-stone-400');
                });
                document.getElementById('tab-pane-desc').classList.add('hidden');
                document.getElementById('tab-pane-reviews').classList.add('hidden');
                document.getElementById('tab-pane-how-to-use').classList.add('hidden');

                if (tab === 'desc') {
                    document.getElementById('tab-btn-desc').classList.add('text-[#B58E3E]', 'border-b-2', 'border-[#B58E3E]');
                    document.getElementById('tab-pane-desc').classList.remove('hidden');
                } else if (tab === 'reviews') {
                    document.getElementById('tab-btn-reviews').classList.add('text-[#B58E3E]', 'border-b-2',
                        'border-[#B58E3E]');
                    document.getElementById('tab-pane-reviews').classList.remove('hidden');
                } else if (tab === 'how-to-use') {
                    document.getElementById('tab-btn-how-to-use').classList.add('text-[#B58E3E]', 'border-b-2',
                        'border-[#B58E3E]');
                    document.getElementById('tab-pane-how-to-use').classList.remove('hidden');
                }
            }

            async function shareToInstagram(productName) {
                const url = window.location.href;
                if (navigator.share && /Mobi|Android|iPhone|iPad/i.test(navigator.userAgent)) {
                    try {
                        await navigator.share({
                            title: productName,
                            text: productName,
                            url: url
                        });
                        return;
                    } catch (err) {
                        if (err && err.name === 'AbortError') return;
                    }
                }
                try {
                    await navigator.clipboard.writeText(url);
                } catch (e) {
                    const temp = document.createElement('textarea');
                    temp.value = url;
                    temp.setAttribute('readonly', '');
                    temp.style.position = 'absolute';
                    temp.style.left = '-9999px';
                    document.body.appendChild(temp);
                    temp.select();
                    document.execCommand('copy');
                    document.body.removeChild(temp);
                }
                showToast('Instagram', @json(__('frontend.product_detail.instagram_copied')));
            }
        </script>
    @endpush
@endsection
