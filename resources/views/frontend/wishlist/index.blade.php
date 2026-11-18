@extends('frontend.layouts.app')

@section('title', __('frontend.wishlist.title') . ' - Liva Luxury Skincare')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">

    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-xs text-stone-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-[#B58E3E] transition-colors">{{ __('frontend.nav.home') }}</a>
        <span>/</span>
        <span class="text-[#B58E3E] font-bold">{{ __('frontend.wishlist.title') }}</span>
    </nav>

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 pb-6 border-b border-[#EADFC7] mb-8">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#F5EFEB] border border-[#EADFC7] text-[#997528] text-[11px] font-bold uppercase tracking-wider mb-2">
                <svg class="w-3.5 h-3.5 fill-[#B58E3E]" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                <span>{{ __('frontend.header.wishlist') }}</span>
            </div>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold font-brand text-stone-900">
                {{ __('frontend.wishlist.title') }}
            </h1>
            <p class="text-xs sm:text-sm text-stone-600 mt-1 max-w-xl">
                {{ __('frontend.wishlist.subtitle') }}
            </p>
        </div>

        <div class="flex items-center gap-3">
            <button type="button" 
                    id="add-all-wishlist-btn"
                    onclick="addAllWishlistToCart()"
                    class="px-5 py-2.5 rounded-none bg-gradient-to-r from-[#B58E3E] to-[#C5A059] text-white text-xs font-bold shadow-md shadow-[#B58E3E]/20 hover:from-[#997528] hover:to-[#B58E3E] transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <span>{{ __('frontend.wishlist.add_all_to_cart') }}</span>
            </button>
        </div>
    </div>

    <!-- Wishlist Grid -->
    <div id="wishlist-items-grid" class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-5 lg:gap-6">
        @foreach($allProducts ?? $wishlistProducts as $product)
            @php
                $name = app()->getLocale() === 'km' && !empty($product['name_km']) ? $product['name_km'] : $product['name'];
                $isInitialDefault = in_array($product['slug'], ['liva-night-cream', 'liva-brightening-serum']);
            @endphp
            <div id="wishlist-item-{{ $product['slug'] }}" 
                 data-wishlist-card="{{ $product['slug'] }}"
                 class="wishlist-card-item product-card-item group bg-transparent transition-all duration-300 flex flex-col justify-between relative h-full"
                 style="{{ $isInitialDefault ? '' : 'display: none;' }}">
                
                <!-- Top Product Image: FULL WIDTH (Edge-to-Edge across card) -->
                <a href="{{ route('products.show', $product['slug'] ?? 'liva-night-cream') }}" 
                   class="product-card-image-wrapper block relative w-full aspect-square overflow-hidden bg-gradient-to-b from-[#FAF7F2] to-[#F5EFEB]">
                    
                    <img src="{{ $product['image'] }}" 
                         alt="{{ $name }}" 
                         loading="lazy" 
                         class="w-full h-full object-cover group-hover:scale-106 transition-transform duration-500 ease-out" 
                         onerror="this.src='{{ asset('img/daily-edit-detail.png') }}'">

                    <!-- Top Badges & Wishlist: Floating Over the Full Width Image -->
                    <div class="absolute top-3 left-3 right-3 flex items-center justify-between pointer-events-none z-10">
                        @if(!empty($product['discount']))
                            @if($product['discount'] === 'Best Seller' || !empty($product['is_bestseller']))
                                <span class="inline-flex items-center gap-1 bg-gradient-to-r from-[#997528] to-[#B58E3E] text-white font-extrabold text-[10px] sm:text-xs px-2.5 py-1 rounded-none shadow-md whitespace-nowrap pointer-events-auto">
                                    <span>✦</span>
                                    <span>{{ __('frontend.catalog.best_seller') }}</span>
                                </span>
                            @else
                                <span class="inline-flex items-center bg-[#B58E3E] text-white font-extrabold text-[10px] sm:text-xs px-2.5 py-1 rounded-none shadow-md whitespace-nowrap pointer-events-auto">
                                    {{ $product['discount'] }}
                                </span>
                            @endif
                        @else
                            <span></span>
                        @endif

                        <button type="button" 
                                data-wishlist-slug="{{ $product['slug'] ?? 'liva-night-cream' }}"
                                onclick="event.preventDefault(); event.stopPropagation(); toggleWishlist('{{ $product['slug'] ?? 'liva-night-cream' }}', '{{ addslashes($name) }}', this);" 
                                title="{{ __('frontend.header.wishlist') }}" 
                                class="wishlist-toggle-btn w-8 h-8 text-[#B58E3E] flex items-center justify-center transition-all hover:scale-110 pointer-events-auto">
                            <svg class="w-5 h-5 drop-shadow-sm pointer-events-none fill-current" fill="currentColor" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                    </div>

                </a>

                <!-- Product Details Content Area with comfortable padding -->
                <div class="product-card-content pt-3.5 pb-1 px-0 flex flex-col flex-grow justify-between">
                    <!-- Title with clamp and clean line height -->
                    <a href="{{ route('products.show', $product['slug'] ?? 'liva-night-cream') }}" 
                       class="font-bold text-xs sm:text-sm text-stone-900 hover:text-[#B58E3E] transition-colors line-clamp-2 leading-snug min-h-[2.4rem]">
                        {{ $name }}
                    </a>

                    <!-- Pricing -->
                    <div class="flex items-baseline gap-2 mt-2.5">
                        <span class="text-base sm:text-lg font-black text-[#B58E3E] leading-none">
                            ${{ number_format($product['price'], 2) }}
                        </span>
                        @if(!empty($product['original_price']))
                            <span class="text-xs text-stone-400 line-through leading-none">
                                ${{ number_format($product['original_price'], 2) }}
                            </span>
                        @endif
                    </div>

                    <!-- Add to Cart Button -->
                    <div class="mt-4 pt-1">
                        <button type="button" 
                                onclick="addWishlistItemToCart({{ $product['id'] }}, '{{ addslashes($name) }}');" 
                                class="w-full py-2.5 px-3 rounded-none bg-gradient-to-r from-[#B58E3E] to-[#C5A059] hover:from-[#997528] hover:to-[#B58E3E] text-white text-xs font-bold flex items-center justify-center gap-1.5 shadow-md shadow-stone-800/10 active:scale-95 transition-all whitespace-nowrap">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span class="truncate">{{ __('frontend.catalog.add_to_cart') }}</span>
                        </button>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

    <!-- Empty State (Shown if no items or after user clears all) -->
    <div id="wishlist-empty-state" class="{{ count($wishlistProducts) > 0 ? 'hidden' : '' }} text-center py-16 sm:py-24 max-w-md mx-auto">
        <div class="w-20 h-20 rounded-full bg-[#F5EFEB] border border-[#EADFC7] flex items-center justify-center mx-auto mb-4 text-[#B58E3E] shadow-sm">
            <svg class="w-10 h-10 fill-current opacity-80" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
        </div>
        <h3 class="text-xl font-extrabold text-stone-900 mb-2 font-brand">
            {{ __('frontend.wishlist.empty_title') }}
        </h3>
        <p class="text-xs sm:text-sm text-stone-500 mb-6 leading-relaxed">
            {{ __('frontend.wishlist.empty_desc') }}
        </p>
        <a href="{{ route('products.index') }}" 
           class="inline-flex items-center gap-2 px-6 py-3 rounded-none bg-gradient-to-r from-[#B58E3E] to-[#C5A059] text-white text-xs sm:text-sm font-bold shadow-md shadow-[#B58E3E]/20 hover:from-[#997528] hover:to-[#B58E3E] transition-all">
            <span>{{ __('frontend.wishlist.explore_catalog') }}</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
    </div>

</div>

@push('scripts')
<script>
    window.syncWishlistPage = function(animateSlug = null) {
        const list = getWishlist();
        const cards = document.querySelectorAll('.wishlist-card-item');
        
        cards.forEach(card => {
            const slug = card.getAttribute('data-wishlist-card');
            if (list.includes(slug)) {
                card.style.display = 'flex';
                card.style.opacity = '1';
                card.style.transform = 'none';
            } else if (animateSlug && slug === animateSlug) {
                card.style.transition = 'all 0.3s ease';
                card.style.opacity = '0';
                card.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    card.style.display = 'none';
                    checkEmptyState();
                }, 300);
            } else {
                card.style.display = 'none';
            }
        });

        function checkEmptyState() {
            const curList = getWishlist();
            const emptyState = document.getElementById('wishlist-empty-state');
            const addAllBtn = document.getElementById('add-all-wishlist-btn');
            if (curList.length === 0) {
                if (emptyState) emptyState.classList.remove('hidden');
                if (addAllBtn) addAllBtn.classList.add('hidden');
            } else {
                if (emptyState) emptyState.classList.add('hidden');
                if (addAllBtn) addAllBtn.classList.remove('hidden');
            }
            updateWishlistBadges(curList.length);
        }

        checkEmptyState();
    };

    function removeWishlistItem(slug, name) {
        const item = document.getElementById('wishlist-item-' + slug);
        if (item) {
            item.style.transition = 'all 0.3s ease';
            item.style.opacity = '0';
            item.style.transform = 'scale(0.9)';
            setTimeout(() => {
                let list = getWishlist();
                const idx = list.indexOf(slug);
                if (idx !== -1) {
                    list.splice(idx, 1);
                    saveWishlist(list);
                }
                item.style.display = 'none';
                item.style.opacity = '1';
                item.style.transform = 'none';
                window.syncWishlistPage();
            }, 300);
            showToast('{{ __('frontend.header.wishlist') }}', '{{ __('frontend.wishlist.removed_toast') }}: ' + name);
        }
    }

    function addWishlistItemToCart(id, name) {
        const badge = document.getElementById('cart-badge-count');
        if (badge) {
            let count = parseInt(badge.textContent || '0', 10);
            badge.textContent = count + 1;
        }
        showToast('{{ __('frontend.header.cart') }}', '{{ __('frontend.wishlist.added_toast') }}: ' + name);
    }

    function addAllWishlistToCart() {
        const list = getWishlist();
        const badge = document.getElementById('cart-badge-count');
        if (badge) {
            let count = parseInt(badge.textContent || '0', 10);
            badge.textContent = count + list.length;
        }
        showToast('{{ __('frontend.header.cart') }}', 'Added all ' + list.length + ' saved items to your bag!');
    }

    document.addEventListener('DOMContentLoaded', function () {
        window.syncWishlistPage();
    });
</script>
@endpush
@endsection

