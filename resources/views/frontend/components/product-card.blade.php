@props(['product'])

@php
    $isKm = app()->getLocale() === 'km';
    $name = $isKm && !empty($product['name_km']) ? $product['name_km'] : $product['name'];
    $reviewsCount = $product['reviews_count'] ?? '10k';
@endphp

<div class="product-card-item group bg-white rounded-3xl overflow-hidden border border-[#EADFC7]/90 hover:border-[#B58E3E] shadow-xs hover:shadow-xl hover:shadow-stone-900/10 transition-all duration-300 flex flex-col justify-between relative h-full"
     data-price="{{ $product['price'] }}"
     data-category="{{ $product['category'] ?? '' }}"
     data-parent-category="{{ $product['parent_category'] ?? '' }}">
    
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
                    <span class="inline-flex items-center gap-1 bg-gradient-to-r from-[#997528] to-[#B58E3E] text-white font-extrabold text-[10px] sm:text-xs px-2.5 py-1 rounded-full shadow-md whitespace-nowrap pointer-events-auto">
                        <span>✦</span>
                        <span>{{ __('frontend.catalog.best_seller') }}</span>
                    </span>
                @else
                    <span class="inline-flex items-center bg-[#B58E3E] text-white font-extrabold text-[10px] sm:text-xs px-2.5 py-1 rounded-full shadow-md whitespace-nowrap pointer-events-auto">
                        {{ $product['discount'] }}
                    </span>
                @endif
            @else
                <span></span>
            @endif

            <button type="button" 
                    onclick="event.preventDefault(); event.stopPropagation(); this.classList.toggle('text-[#B58E3E]'); this.classList.toggle('fill-current'); showToast('{{ __('frontend.header.wishlist') }}', '{{ $name }}');" 
                    title="{{ __('frontend.header.wishlist') }}" 
                    class="w-8 h-8 rounded-full bg-white/90 backdrop-blur-md hover:bg-white text-stone-500 hover:text-[#B58E3E] flex items-center justify-center transition-all shadow-md border border-[#EADFC7]/60 pointer-events-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </button>
        </div>

    </a>

    <!-- Product Details Content Area with comfortable padding -->
    <div class="product-card-content p-4 sm:p-5 flex flex-col flex-grow justify-between">
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
                    onclick="showToast('{{ __('frontend.header.cart') }}', 'Added {{ $name }}');" 
                    class="w-full py-2.5 px-3 rounded-2xl bg-gradient-to-r from-[#B58E3E] to-[#C5A059] hover:from-[#997528] hover:to-[#B58E3E] text-white text-xs font-bold flex items-center justify-center gap-1.5 shadow-md shadow-stone-800/10 active:scale-95 transition-all whitespace-nowrap">
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span class="truncate">{{ __('frontend.catalog.add_to_cart') }}</span>
            </button>
        </div>
    </div>

</div>
