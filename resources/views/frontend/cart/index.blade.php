@extends('frontend.layouts.app')

@section('title', __('frontend.cart.title') . ' - Liva Luxury Skincare')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pb-24 sm:pb-12">

    <!-- Header Section with Continue Shopping -->
    <div class="flex items-center justify-between pb-6 border-b border-[#EADFC7] mb-8">
        <div>
            <h1 class="text-2xl sm:text-3xl font-black font-brand text-stone-900 tracking-tight flex items-center gap-3">
                <span class="w-2.5 h-7 rounded-full bg-[#B58E3E]"></span>
                <span>{{ __('frontend.cart.title') }}</span>
            </h1>
            <p class="text-xs text-stone-500 mt-1">
                {{ app()->getLocale() === 'km' ? 'អ្នកមាន ៣ មុខទំនិញក្នុងកន្ត្រករបស់អ្នក' : 'You have 3 items in your shopping bag' }}
            </p>
        </div>

        <a href="{{ route('home') }}" class="text-xs sm:text-sm font-bold text-[#B58E3E] hover:text-[#997528] flex items-center gap-1 transition-colors">
            <span>{{ __('frontend.cart.continue_shopping') }}</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
        </a>
    </div>

    <!-- Main Grid: Items List + Order Summary -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left: Cart Items List -->
        <div class="lg:col-span-8 space-y-4">
            
            @foreach($cartItems as $item)
                @php
                    $isKm = app()->getLocale() === 'km';
                    $itemName = $isKm && !empty($item['name_km']) ? $item['name_km'] : $item['name'];
                @endphp
                <div class="cart-item-row   p-4 sm:p-6  flex flex-col sm:flex-row items-center justify-between gap-4 transition-all duration-300"
                     data-price="{{ $item['price'] }}">
                    
                    <!-- Product Info & Thumb -->
                    <div class="flex items-center gap-4 w-full sm:w-auto">
                        <div class="w-20 h-20 rounded-2xl bg-[#FAF7F2] border border-[#EADFC7] p-2 flex items-center justify-center shrink-0">
                            <img src="{{ $item['image'] }}" alt="{{ $itemName }}" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <a href="{{ route('products.show', $item['slug'] ?? 'liva-night-cream') }}" class="font-bold text-sm sm:text-base text-stone-900 hover:text-[#B58E3E] transition-colors">
                                {{ $itemName }}
                            </a>
                            <div class="flex items-baseline gap-2 mt-1">
                                <span class="text-sm font-black text-[#B58E3E]">
                                    ${{ number_format($item['price'], 2) }}
                                </span>
                                @if(!empty($item['original_price']))
                                    <span class="text-xs text-stone-400 line-through">
                                        ${{ number_format($item['original_price'], 2) }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Quantity Stepper & Remove Action -->
                    <div class="flex items-center justify-between sm:justify-end gap-6 w-full sm:w-auto pt-3 sm:pt-0 border-t sm:border-t-0 border-[#F5EFEB]">
                        
                        <!-- Stepper -->
                        <div class="flex items-center border border-[#EADFC7] rounded-xl bg-[#FAF7F2] p-0.5">
                            <button type="button" 
                                    onclick="changeCartQty(this, -1)"
                                    class="w-7 h-7 rounded-lg bg-white text-stone-600 hover:text-[#B58E3E] flex items-center justify-center font-bold text-xs shadow-xs cursor-pointer active:scale-95 transition-all">
                                -
                            </button>
                            <input type="number" 
                                   value="{{ $item['quantity'] }}" 
                                   min="1" 
                                   readonly 
                                   class="cart-item-qty w-10 text-center bg-transparent border-0 font-bold text-xs text-stone-800 focus:outline-none focus:ring-0">
                            <button type="button" 
                                    onclick="changeCartQty(this, 1)"
                                    class="w-7 h-7 rounded-lg bg-white text-stone-600 hover:text-[#B58E3E] flex items-center justify-center font-bold text-xs shadow-xs cursor-pointer active:scale-95 transition-all">
                                +
                            </button>
                        </div>

                        <!-- Subtotal per Item -->
                        <span class="cart-item-line-total font-bold text-sm text-stone-900 min-w-16 text-right">
                            ${{ number_format($item['price'] * $item['quantity'], 2) }}
                        </span>

                        <!-- Actions: Favorite & Trash -->
                        <div class="flex items-center gap-1.5 shrink-0">
                            <!-- Favorite / Wishlist Button -->
                            <button type="button" 
                                    data-wishlist-slug="{{ $item['slug'] ?? 'liva-night-cream' }}"
                                    onclick="toggleWishlist('{{ $item['slug'] ?? 'liva-night-cream' }}', '{{ addslashes($itemName) }}', this);"
                                    title="{{ __('frontend.header.wishlist') }}" 
                                    class="wishlist-toggle-btn w-8 h-8 text-stone-400 hover:text-[#B58E3E] flex items-center justify-center transition-all hover:scale-110 cursor-pointer">
                                <svg class="w-5 h-5 pointer-events-none drop-shadow-xs" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>

                            <!-- Trash Button -->
                            <button type="button" 
                                    onclick="removeCartItemRow(this)"
                                    title="Remove item" 
                                    class="w-8 h-8 text-stone-400 hover:text-red-600 flex items-center justify-center transition-colors cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>
            @endforeach

            <!-- Continue Shopping Outline Button -->
            <div class="pt-4">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl border border-[#EADFC7] text-stone-700 hover:text-[#B58E3E] hover:bg-[#FAF7F2] text-xs sm:text-sm font-bold transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    <span>{{ __('frontend.cart.continue_shopping') }}</span>
                </a>
            </div>

        </div>

        <!-- Right: Order Summary Card -->
        <div class="lg:col-span-4">
            <div class="bg-white  p-6 sm:p-8 border border-[#EADFC7] shadow-sm space-y-6">
                
                <h3 class="font-extrabold font-brand text-base sm:text-lg text-stone-900 pb-3 border-b border-[#F5EFEB]">
                    {{ __('frontend.cart.order_summary') }}
                </h3>

                <!-- Subtotals -->
                <div class="space-y-3 text-xs sm:text-sm text-stone-600">
                    <div class="flex items-center justify-between">
                        <span>{{ __('frontend.cart.subtotal') }}</span>
                        <span class="font-bold text-stone-800" id="cart-subtotal-val">${{ number_format($subtotal, 2) }}</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span>{{ __('frontend.cart.shipping') }}</span>
                        <span class="font-bold text-emerald-700" id="cart-shipping-val">{{ __('frontend.cart.free') }}</span>
                    </div>

                    <div class="flex items-center justify-between {{ $discount > 0 ? '' : 'hidden' }}" id="cart-discount-row">
                        <span id="cart-discount-label">{{ __('frontend.cart.discount') }}</span>
                        <span class="font-bold text-[#B58E3E]" id="cart-discount-val">-${{ number_format($discount, 2) }}</span>
                    </div>
                </div>

                <!-- Promo Code Box (Reactive & Instant without reloading the page) -->
                <div class="pt-2">
                    <form onsubmit="event.preventDefault(); applyCartCoupon();" class="relative flex items-center">
                        <input type="text" 
                               id="cart-coupon-input"
                               placeholder="{{ __('frontend.cart.coupon_placeholder') }}" 
                               value="LIVAGLOW"
                               class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl px-3.5 py-2.5 text-xs text-stone-800 focus:outline-none focus:border-[#B58E3E] pr-20 uppercase font-semibold">
                        <button type="submit" 
                                id="cart-coupon-btn"
                                class="absolute right-1 px-3 py-1.5 rounded-lg bg-[#B58E3E] text-white text-[11px] font-bold hover:bg-[#997528] transition-colors cursor-pointer active:scale-95">
                            {{ __('frontend.cart.apply_coupon') }}
                        </button>
                    </form>
                    <!-- Inline Feedback Message -->
                    <p id="coupon-feedback" class="text-[11px] font-bold mt-1.5 hidden"></p>
                </div>

                <!-- Total -->
                <div class="pt-4 border-t border-[#EADFC7] flex items-baseline justify-between">
                    <span class="font-extrabold text-base text-stone-900">{{ __('frontend.cart.total') }}</span>
                    <span class="text-2xl font-black text-[#B58E3E]" id="cart-total-val">${{ number_format($total, 2) }}</span>
                </div>

                <!-- Checkout Button -->
                <a href="{{ route('checkout.index') }}" 
                   class="w-full py-3.5 px-6  bg-gradient-to-r from-[#B58E3E] to-[#C5A059] hover:from-[#997528] hover:to-[#B58E3E] text-white font-extrabold text-sm shadow-md shadow-stone-800/15 active:scale-95 transition-all flex items-center justify-center gap-2">
                    <span>{{ __('frontend.cart.checkout') }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                </a>

                <!-- Security notes -->
                <div class="flex items-center justify-center gap-2 text-[11px] text-stone-400 text-center">
                    <span class="text-[#B58E3E]">✦</span>
                    <span>{{ __('frontend.features.secure_payment_sub') }}</span>
                </div>

            </div>
        </div>

    </div>

    <!-- From Your Favorites Section -->
    @if(!empty($allProducts))
        <div id="cart-favorites-section" class="mt-12 pt-8 border-t border-[#EADFC7] space-y-5" style="display: none;">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl sm:text-2xl font-black font-brand text-stone-900 tracking-tight flex items-center gap-2.5">
                        <span class="w-2.5 h-6 rounded-none bg-[#B58E3E]"></span>
                        <span>{{ app()->getLocale() === 'km' ? 'ទំនិញដែលអ្នកចូលចិត្ត' : 'From Your Favorites' }}</span>
                    </h2>
                    <p class="text-xs text-stone-500 mt-1">
                        {{ app()->getLocale() === 'km' ? 'ផលិតផលដែលអ្នកបានរក្សាទុកក្នុងបញ្ជីចូលចិត្ត' : 'Items you have saved in your personal wishlist' }}
                    </p>
                </div>
                <a href="{{ route('wishlist.index') }}" class="text-xs sm:text-sm font-bold text-[#B58E3E] hover:text-[#997528] transition-colors flex items-center gap-1">
                    <span>{{ __('frontend.header.wishlist') }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-5 lg:gap-6" id="cart-favorites-grid">
                @foreach($allProducts as $p)
                    <div class="cart-fav-card" data-fav-slug="{{ $p['slug'] }}" style="display: none;">
                        @include('frontend.components.product-card', ['product' => $p])
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</div>

@push('scripts')
<script>
    let activeCoupon = 'LIVAGLOW';
    let baseDiscount = 5.00;

    function recalculateCartTotals() {
        let subtotal = 0;
        const rows = document.querySelectorAll('.cart-item-row');
        rows.forEach(row => {
            const price = parseFloat(row.dataset.price) || 0;
            const qtyInput = row.querySelector('.cart-item-qty');
            const qty = parseInt(qtyInput ? qtyInput.value : 1) || 1;
            const lineTotal = price * qty;
            const lineEl = row.querySelector('.cart-item-line-total');
            if (lineEl) lineEl.textContent = '$' + lineTotal.toFixed(2);
            subtotal += lineTotal;
        });

        const subtotalEl = document.getElementById('cart-subtotal-val');
        if (subtotalEl) subtotalEl.textContent = '$' + subtotal.toFixed(2);

        // Calculate discount
        let discount = 0;
        if (activeCoupon === 'LIVAGLOW') {
            discount = subtotal > 0 ? 5.00 : 0.00;
        } else if (activeCoupon === 'SAVE10' || activeCoupon === 'LIVA10') {
            discount = subtotal * 0.10;
        } else if (activeCoupon === 'LIVA20' || activeCoupon === 'GLOW20') {
            discount = subtotal * 0.20;
        } else if (activeCoupon) {
            discount = baseDiscount;
        }

        if (discount > subtotal) discount = subtotal;

        const discountRow = document.getElementById('cart-discount-row');
        const discountVal = document.getElementById('cart-discount-val');
        if (discountVal) discountVal.textContent = '-$' + discount.toFixed(2);
        if (discountRow) {
            if (discount > 0) {
                discountRow.classList.remove('hidden');
            } else {
                discountRow.classList.add('hidden');
            }
        }

        const total = Math.max(0, subtotal - discount);
        const totalEl = document.getElementById('cart-total-val');
        if (totalEl) totalEl.textContent = '$' + total.toFixed(2);
    }

    function changeCartQty(btn, delta) {
        const row = btn.closest('.cart-item-row');
        if (!row) return;
        const qtyInput = row.querySelector('.cart-item-qty');
        if (!qtyInput) return;
        let qty = parseInt(qtyInput.value) || 1;
        qty += delta;
        if (qty < 1) qty = 1;
        qtyInput.value = qty;
        recalculateCartTotals();
    }

    function removeCartItemRow(btn) {
        const row = btn.closest('.cart-item-row');
        if (!row) return;
        row.classList.add('opacity-0', 'scale-95');
        setTimeout(() => {
            row.remove();
            recalculateCartTotals();
            showToast('Shopping Bag', 'Item removed');
        }, 200);
    }

    function applyCartCoupon() {
        const input = document.getElementById('cart-coupon-input');
        const feedback = document.getElementById('coupon-feedback');
        if (!input) return;
        const code = input.value.trim().toUpperCase();

        if (!code) {
            activeCoupon = '';
            baseDiscount = 0;
            recalculateCartTotals();
            if (feedback) {
                feedback.textContent = 'Please enter a coupon code';
                feedback.className = 'text-[11px] font-bold mt-1.5 text-stone-500';
                feedback.classList.remove('hidden');
            }
            return;
        }

        const validCoupons = {
            'LIVAGLOW': { name: 'VIP Privilege ($5.00 Off)', amount: 5.00 },
            'SAVE10': { name: '10% Discount', percent: 10 },
            'LIVA10': { name: '10% Discount', percent: 10 },
            'LIVA20': { name: '20% Gold Member Special', percent: 20 },
            'GLOW20': { name: '20% Gold Member Special', percent: 20 },
        };

        if (validCoupons[code]) {
            activeCoupon = code;
            recalculateCartTotals();
            const promo = validCoupons[code];
            const msg = promo.amount 
                ? `✓ Code ${code} applied: -$${promo.amount.toFixed(2)} VIP Discount` 
                : `✓ Code ${code} applied: -${promo.percent}% OFF`;
            
            if (feedback) {
                feedback.textContent = msg;
                feedback.className = 'text-[11px] font-bold mt-1.5 text-emerald-600 animate-in fade-in';
                feedback.classList.remove('hidden');
            }
            showToast('Coupon Applied', msg);
        } else {
            if (feedback) {
                feedback.textContent = '✕ Invalid coupon code. Try LIVAGLOW or SAVE10';
                feedback.className = 'text-[11px] font-bold mt-1.5 text-red-500 animate-in fade-in';
                feedback.classList.remove('hidden');
            }
            showToast('Invalid Coupon', 'Code not recognized. Try LIVAGLOW');
        }
    }

    window.syncCartFavorites = function() {
        if (typeof getWishlist !== 'function') return;
        const list = getWishlist();
        const section = document.getElementById('cart-favorites-section');
        let shownCount = 0;
        document.querySelectorAll('.cart-fav-card').forEach(card => {
            const slug = card.getAttribute('data-fav-slug');
            if (list.includes(slug)) {
                card.style.display = 'block';
                shownCount++;
            } else {
                card.style.display = 'none';
            }
        });
        if (section) {
            section.style.display = shownCount > 0 ? 'block' : 'none';
        }
        if (typeof syncWishlistIcons === 'function') {
            syncWishlistIcons();
        }
    };

    document.addEventListener('DOMContentLoaded', function () {
        if (typeof window.syncCartFavorites === 'function') {
            window.syncCartFavorites();
        }
    });
</script>
@endpush
@endsection
