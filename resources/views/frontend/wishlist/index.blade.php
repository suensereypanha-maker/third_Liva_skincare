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
                    class="px-5 py-2.5 rounded-full bg-gradient-to-r from-[#B58E3E] to-[#C5A059] text-white text-xs font-bold shadow-md shadow-[#B58E3E]/20 hover:from-[#997528] hover:to-[#B58E3E] transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <span>{{ __('frontend.wishlist.add_all_to_cart') }}</span>
            </button>
        </div>
    </div>

    <!-- Wishlist Grid -->
    <div id="wishlist-items-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($wishlistProducts as $product)
            @php
                $name = app()->getLocale() === 'km' && !empty($product['name_km']) ? $product['name_km'] : $product['name'];
                $catName = app()->getLocale() === 'km' && !empty($product['category_name_km']) ? $product['category_name_km'] : ($product['category_name'] ?? 'Skincare');
            @endphp
            <div id="wishlist-item-{{ $product['id'] }}" 
                 class="group relative bg-white rounded-3xl p-4 border border-[#EADFC7] shadow-xs hover:shadow-xl hover:border-[#B58E3E]/50 transition-all flex flex-col justify-between">
                
                <!-- Remove from wishlist button -->
                <button type="button" 
                        onclick="removeWishlistItem({{ $product['id'] }}, '{{ addslashes($name) }}')"
                        title="{{ __('frontend.wishlist.remove') }}"
                        class="absolute top-3 right-3 z-10 w-8 h-8 rounded-full bg-white/90 backdrop-blur-xs text-stone-400 hover:text-rose-600 hover:bg-rose-50 border border-stone-200 hover:border-rose-200 flex items-center justify-center transition-all shadow-xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <!-- Product Image -->
                <a href="{{ route('products.show', $product['slug']) }}" class="block relative aspect-square rounded-2xl bg-[#FAF7F2] overflow-hidden mb-3.5">
                    <img src="{{ $product['image'] }}" 
                         alt="{{ $name }}" 
                         class="w-full h-full object-contain p-4 group-hover:scale-105 transition-transform duration-500">
                    
                    @if(!empty($product['discount']))
                        <span class="absolute top-2.5 left-2.5 bg-[#B58E3E] text-white text-[10px] font-black px-2 py-0.5 rounded-full shadow-xs">
                            {{ $product['discount'] }}
                        </span>
                    @endif
                </a>

                <!-- Product Details -->
                <div class="flex-grow flex flex-col">
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-[#997528] mb-1">
                        {{ $catName }}
                    </span>

                    <a href="{{ route('products.show', $product['slug']) }}" class="font-bold text-stone-900 text-sm hover:text-[#B58E3E] transition-colors line-clamp-2 mb-2">
                        {{ $name }}
                    </a>

                    <!-- Rating & Stock -->
                    <div class="flex items-center justify-between text-xs text-stone-500 mb-3">
                        <div class="flex items-center gap-1 text-[#B58E3E]">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <span class="font-bold text-stone-800 text-[11px]">{{ $product['rating'] ?? '4.8' }}</span>
                        </div>
                        <span class="inline-flex items-center gap-1 text-emerald-700 font-semibold text-[11px]">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            {{ __('frontend.wishlist.in_stock') }}
                        </span>
                    </div>

                    <!-- Price & Add to Cart -->
                    <div class="mt-auto pt-3 border-t border-[#F5EFEB] flex items-center justify-between gap-2">
                        <div>
                            <div class="text-base font-black text-stone-900 font-brand">
                                ${{ number_format($product['price'], 2) }}
                            </div>
                            @if(!empty($product['original_price']))
                                <div class="text-[11px] text-stone-400 line-through">
                                    ${{ number_format($product['original_price'], 2) }}
                                </div>
                            @endif
                        </div>

                        <button type="button"
                                onclick="addWishlistItemToCart({{ $product['id'] }}, '{{ addslashes($name) }}')"
                                class="px-3.5 py-2 rounded-xl bg-[#FAF7F2] hover:bg-[#B58E3E] text-stone-800 hover:text-white border border-[#EADFC7] hover:border-[#B58E3E] text-xs font-bold transition-all flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            <span>{{ __('frontend.wishlist.add_to_bag') }}</span>
                        </button>
                    </div>
                </div>

            </div>
        @empty
        @endforelse
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
           class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-gradient-to-r from-[#B58E3E] to-[#C5A059] text-white text-xs sm:text-sm font-bold shadow-md shadow-[#B58E3E]/20 hover:from-[#997528] hover:to-[#B58E3E] transition-all">
            <span>{{ __('frontend.wishlist.explore_catalog') }}</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
    </div>

</div>

@push('scripts')
<script>
    let wishlistCount = {{ count($wishlistProducts) }};

    function removeWishlistItem(id, name) {
        const item = document.getElementById('wishlist-item-' + id);
        if (item) {
            item.style.transition = 'all 0.3s ease';
            item.style.opacity = '0';
            item.style.transform = 'scale(0.9)';
            setTimeout(() => {
                item.remove();
                wishlistCount = Math.max(0, wishlistCount - 1);
                
                // Update header badge if exists
                const badge = document.querySelector('header a[href*="wishlist"] span');
                if (badge) badge.textContent = wishlistCount;

                if (wishlistCount === 0) {
                    const emptyState = document.getElementById('wishlist-empty-state');
                    if (emptyState) emptyState.classList.remove('hidden');
                    const addAllBtn = document.getElementById('add-all-wishlist-btn');
                    if (addAllBtn) addAllBtn.classList.add('hidden');
                }
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
        const badge = document.getElementById('cart-badge-count');
        if (badge) {
            let count = parseInt(badge.textContent || '0', 10);
            badge.textContent = count + wishlistCount;
        }
        showToast('{{ __('frontend.header.cart') }}', 'Added all ' + wishlistCount + ' saved items to your bag!');
    }
</script>
@endpush
@endsection

