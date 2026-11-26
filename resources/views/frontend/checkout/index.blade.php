@extends('frontend.layouts.app')

@section('title', __('frontend.checkout.step_payment') . ' - Liva Luxury Skincare')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pb-24 sm:pb-12">

        <!-- 3-Step Breadcrumb Progress Bar in Luxury Gold -->
        <div class="max-w-md mx-auto mb-10 px-4">
            <div class="flex items-center justify-between">

                <!-- Step 1: Shipping (Done) -->
                <div class="flex flex-col items-center text-center shrink-0">
                    <div
                        class="w-10 h-10 rounded-full bg-gradient-to-r from-[#B58E3E] to-[#C5A059] text-white flex items-center justify-center font-bold text-xs shadow-md shadow-[#B58E3E]/25">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span
                        class="text-xs font-bold text-stone-800 mt-2 tracking-wide whitespace-nowrap">{{ __('frontend.checkout.step_shipping') }}</span>
                </div>

                <!-- Connecting Line 1 (Step 1 -> Step 2: Completed / Active) -->
                <div
                    class="flex-1 mx-2 sm:mx-3 h-0.5 bg-gradient-to-r from-[#B58E3E] to-[#C5A059] rounded-full self-start mt-5">
                </div>

                <!-- Step 2: Payment (Active) -->
                <div class="flex flex-col items-center text-center shrink-0">
                    <div
                        class="w-10 h-10 rounded-full bg-gradient-to-r from-[#B58E3E] to-[#997528] text-white flex items-center justify-center font-extrabold text-xs ring-4 ring-[#EADFC7] shadow-lg shadow-[#B58E3E]/30">
                        2
                    </div>
                    <span
                        class="text-xs font-black text-[#997528] mt-2 tracking-wide whitespace-nowrap">{{ __('frontend.checkout.step_payment') }}</span>
                </div>

                <!-- Connecting Line 2 (Step 2 -> Step 3: Pending) -->
                <div class="flex-1 mx-2 sm:mx-3 h-0.5 bg-[#EADFC7] rounded-full self-start mt-5"></div>

                <!-- Step 3: Confirm (Pending) -->
                <div class="flex flex-col items-center text-center shrink-0">
                    <div
                        class="w-10 h-10 rounded-full bg-white border-2 border-[#EADFC7] text-stone-400 flex items-center justify-center font-bold text-xs shadow-xs">
                        3
                    </div>
                    <span
                        class="text-xs font-semibold text-stone-400 mt-2 tracking-wide whitespace-nowrap">{{ __('frontend.checkout.step_confirm') }}</span>
                </div>

            </div>
        </div>

        <!-- Main Checkout Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            <!-- Left: Customer Info & Payment Methods -->
            <div class="lg:col-span-8 space-y-6">

                <!-- Delivery Information Form -->
                <div class=" p-6 sm:p-8  space-y-4">
                    <div class="pb-3 border-b border-[#F5EFEB]">
                        <h3 class="font-extrabold font-brand text-base sm:text-lg text-stone-900 flex items-center gap-2">
                            <span class="w-2 h-5 rounded-full bg-[#B58E3E]"></span>
                            <span>{{ __('frontend.checkout.shipping_details') }}</span>
                        </h3>
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label for="phone"
                            class="block text-xs font-bold text-stone-700 mb-1.5 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-[#B58E3E]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{ __('frontend.checkout.phone') }}</span>
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" id="phone" name="phone" value="+855 12 345 678" required
                            placeholder="e.g. +855 12 345 678"
                            class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl px-4 py-2.5 text-xs sm:text-sm text-stone-900 focus:outline-none focus:border-[#B58E3E] focus:bg-white transition-all font-medium">
                    </div>

                    <!-- Delivery Address -->
                    <div>
                        <label for="address"
                            class="block text-xs font-bold text-stone-700 mb-1.5 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-[#B58E3E]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>{{ __('frontend.checkout.address') }}</span>
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="address" name="address" value="#45, St. 214, Daun Penh, Phnom Penh"
                            required placeholder="House / Building No., Street, Sangkat, Khan, City"
                            class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl px-4 py-2.5 text-xs sm:text-sm text-stone-900 focus:outline-none focus:border-[#B58E3E] focus:bg-white transition-all">
                    </div>

                    <!-- Description / Note -->
                    <div>
                        <label for="delivery_note"
                            class="block text-xs font-bold text-stone-700 mb-1.5 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-[#B58E3E]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            <span>{{ __('frontend.checkout.order_note') }}</span>
                        </label>
                        <textarea id="delivery_note" name="order_note" rows="2"
                            placeholder="{{ app()->getLocale() === 'km' ? 'ចំណាំបន្ថែមសម្រាប់អ្នកដឹកជញ្ជូន ដូចជា ទីតាំងសម្គាល់ ឬវេលាដឹកជញ្ជូន...' : 'e.g. Leave with reception/guard, call before arriving, landmark...' }}"
                            class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl px-4 py-2.5 text-xs sm:text-sm text-stone-900 focus:outline-none focus:border-[#B58E3E] focus:bg-white transition-all resize-none"></textarea>
                    </div>
                </div>

                <!-- Payment Method Form -->
                <div class="  p-6 sm:p-8  space-y-5">
                    <h3
                        class="font-extrabold font-brand text-base sm:text-lg text-stone-900 flex items-center gap-2 pb-3 border-b border-[#F5EFEB]">
                        <span class="w-2 h-5 rounded-full bg-[#B58E3E]"></span>
                        <span>{{ __('frontend.checkout.payment_method') }}</span>
                    </h3>

                    <!-- Options -->
                    <div class="space-y-3">

                        <!-- Bank Transfer (KHQR / ABA Bank) - Primary Default -->
                        <label class="block cursor-pointer">
                            <div class="payment-method-card p-4 rounded-2xl transition-all">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="payment_method" value="bank_transfer" checked
                                            class="text-[#B58E3E] focus:ring-[#B58E3E]">
                                        <div>
                                            <span
                                                class="font-bold text-sm text-stone-900 block">{{ __('frontend.checkout.bank_transfer') }}</span>
                                            <span
                                                class="text-[11px] text-stone-500 hidden sm:block">{{ __('frontend.checkout.bank_transfer_desc') }}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-1.5 shrink-0">
                                        <!-- ABA Bank Badge -->
                                        <div
                                            class="h-7 px-2.5 rounded-lg bg-[#015F7A] flex items-center justify-center gap-1.5 shadow-xs">
                                            <img src="{{ asset('img/payments/aba.png') }}" alt="ABA Bank"
                                                class="w-4 h-4 object-contain rounded-xs">
                                            <span class="text-[11px] font-black text-white tracking-wider">ABA</span>
                                        </div>
                                        <span
                                            class="px-2 py-0.5 bg-red-50 text-red-700 border border-red-200 rounded text-[11px] font-black">KHQR</span>
                                    </div>
                                </div>

                                <!-- Expandable Bank Transfer Details (Visible when Bank Transfer is Selected) -->
                                <div id="bank-transfer-details"
                                    class="mt-4 pt-4 border-t border-[#EADFC7] space-y-4 animate-in fade-in">

                                    <!-- Bank Tabs: ABA Bank (Default) vs Canadia Bank -->
                                    <div class="flex items-center gap-2 pb-1">
                                        <button type="button" id="tab-bank-aba" onclick="switchBankTab('aba')"
                                            class="px-4 py-2 rounded-xl text-xs font-bold transition-all bg-[#015F7A] text-white shadow-sm flex items-center gap-2 cursor-pointer">
                                            <img src="{{ asset('img/payments/aba.png') }}" alt=""
                                                class="w-4 h-4 object-contain rounded-xs">
                                            <span>ABA Bank</span>
                                        </button>
                                        <button type="button" id="tab-bank-canadia" onclick="switchBankTab('canadia')"
                                            class="px-4 py-2 rounded-xl text-xs font-bold transition-all bg-white border border-[#EADFC7] text-stone-600 hover:border-[#B58E3E] hover:text-stone-900 flex items-center gap-2 cursor-pointer">
                                            <img src="{{ asset('img/payments/canadia-logo.png') }}" alt=""
                                                class="w-4 h-4 object-contain">
                                            <span>Bakong Bank</span>
                                        </button>
                                    </div>

                                    <!-- ABA Bank Details Panel (Active Default) -->
                                    <div id="panel-bank-aba"
                                        class="rounded-2xl p-4 sm:p-5 bg-[#FAF7F2] border border-[#EADFC7]">
                                        <div class="flex flex-col md:flex-row items-center gap-6">

                                            <!-- QR Code Box -->
                                            <div class="flex flex-col items-center shrink-0">
                                                <div class="relative p-2 flex flex-col items-center">
                                                    <div
                                                        class="flex items-center gap-1.5 mb-2 pb-1.5 border-b border-[#EADFC7]/60 w-full justify-center">
                                                        <img src="{{ asset('img/payments/aba.png') }}" alt="ABA Bank"
                                                            class="w-4 h-4 object-contain rounded-xs">
                                                        <span
                                                            class="text-[11px] font-black text-[#015F7A] tracking-wider">ABA
                                                            BANK KHQR</span>
                                                    </div>
                                                    <img src="{{ asset('img/payments/aba-khqr.png') }}"
                                                        alt="ABA Bank KHQR Code"
                                                        class="w-36 h-36 sm:w-40 sm:h-40 object-contain rounded-lg">
                                                    <span class="text-[10px] font-bold text-stone-400 mt-1">Bakong KHQR
                                                        Standard</span>
                                                </div>

                                                <!-- Download QR Code Button -->
                                                <a href="{{ asset('img/payments/aba-khqr.png') }}"
                                                    download="ABA-KHQR-Liva.png"
                                                    class="mt-2.5 inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-white hover:bg-[#FAF7F2] border border-[#EADFC7] hover:border-[#B58E3E] text-[#997528] hover:text-[#B58E3E] font-bold text-xs shadow-xs hover:shadow-sm transition-all active:scale-95">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                    </svg>
                                                    <span>{{ __('frontend.checkout.download_qr') }}</span>
                                                </a>
                                            </div>

                                            <!-- Bank Account Info Details -->
                                            <div class="w-full space-y-3 text-xs sm:text-sm">

                                                <!-- Bank Name -->
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-[#EADFC7]/60 gap-1">
                                                    <span
                                                        class="text-stone-500 font-medium">{{ __('frontend.checkout.bank_name') }}:</span>
                                                    <span class="font-bold text-stone-900 flex items-center gap-1.5">
                                                        <img src="{{ asset('img/payments/aba.png') }}" alt=""
                                                            class="w-4 h-4 object-contain rounded-xs">
                                                        <span>{{ __('frontend.checkout.bank_name_val') }}</span>
                                                    </span>
                                                </div>

                                                <!-- Account Name -->
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-[#EADFC7]/60 gap-1">
                                                    <span
                                                        class="text-stone-500 font-medium">{{ __('frontend.checkout.account_name') }}:</span>
                                                    <span
                                                        class="font-bold text-stone-900 tracking-wide">{{ __('frontend.checkout.account_name_val') }}</span>
                                                </div>

                                                <!-- Account / Code Number with Copy Button -->
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-[#EADFC7]/60 gap-1">
                                                    <span
                                                        class="text-stone-500 font-medium">{{ __('frontend.checkout.account_number') }}:</span>
                                                    <div class="flex items-center gap-2">
                                                        <span id="aba-acc-num"
                                                            class="font-mono font-black text-sm text-[#015F7A] tracking-wider">{{ __('frontend.checkout.account_number_val') }}</span>
                                                        <button type="button"
                                                            onclick="event.preventDefault(); event.stopPropagation(); navigator.clipboard.writeText('002918345'); showToast('{{ __('frontend.checkout.copied') }}', '002 918 345');"
                                                            class="px-2.5 py-1 rounded-lg bg-white border border-[#EADFC7] hover:border-[#B58E3E] text-stone-700 hover:text-[#B58E3E] text-[11px] font-bold shadow-xs active:scale-95 transition-all flex items-center gap-1 cursor-pointer">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                            </svg>
                                                            <span>{{ __('frontend.checkout.copy') }}</span>
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Amount to Transfer -->
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-1 gap-1">
                                                    <span
                                                        class="text-stone-500 font-medium">{{ __('frontend.cart.total') }}:</span>
                                                    <span
                                                        class="font-black text-base text-[#B58E3E]">${{ number_format($total, 2) }}</span>
                                                </div>

                                                <!-- Scan instruction note -->
                                                <div
                                                    class="p-2.5 rounded-xl bg-white/80 border border-[#EADFC7] text-[11px] text-stone-600 flex items-start gap-2">
                                                    <svg class="w-4 h-4 text-[#015F7A] shrink-0 mt-0.5" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <span>{{ __('frontend.checkout.scan_to_pay') }}</span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <!-- Canadia Bank Details Panel (Optional Alternate Tab) -->
                                    <div id="panel-bank-canadia"
                                        class="hidden bg-[#FAF7F2] rounded-2xl p-4 sm:p-5 border border-[#EADFC7]">
                                        <div class="flex flex-col md:flex-row items-center gap-6">

                                            <!-- QR Code Box -->
                                            <div class="flex flex-col items-center shrink-0">
                                                <div class="relative p-2 flex flex-col items-center">
                                                    <div
                                                        class="flex items-center gap-1.5 mb-2 pb-1.5 border-b border-[#EADFC7]/60 w-full justify-center">
                                                        <img src="{{ asset('img/payments/canadia-logo.png') }}"
                                                            alt="Canadia Bank" class="w-4 h-4 object-contain">
                                                        <span
                                                            class="text-[11px] font-black text-red-600 tracking-wider">CANADIA
                                                            BANK KHQR</span>
                                                    </div>
                                                    <img src="{{ asset('img/payments/canadia-khqr.png') }}"
                                                        alt="Canadia KHQR Code"
                                                        class="w-36 h-36 sm:w-40 sm:h-40 object-contain rounded-lg">
                                                    <span class="text-[10px] font-bold text-stone-400 mt-1">Bakong KHQR
                                                        Standard</span>
                                                </div>

                                                <!-- Download QR Code Button -->
                                                <a href="{{ asset('img/payments/canadia-khqr.png') }}"
                                                    download="Canadia-KHQR-Liva.png"
                                                    class="mt-2.5 inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-white hover:bg-[#FAF7F2] border border-[#EADFC7] hover:border-[#B58E3E] text-[#997528] hover:text-[#B58E3E] font-bold text-xs shadow-xs hover:shadow-sm transition-all active:scale-95">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                    </svg>
                                                    <span>{{ __('frontend.checkout.download_qr') }}</span>
                                                </a>
                                            </div>

                                            <!-- Bank Account Info Details -->
                                            <div class="w-full space-y-3 text-xs sm:text-sm">
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-[#EADFC7]/60 gap-1">
                                                    <span
                                                        class="text-stone-500 font-medium">{{ __('frontend.checkout.bank_name') }}:</span>
                                                    <span class="font-bold text-stone-900 flex items-center gap-1.5">
                                                        <img src="{{ asset('img/payments/canadia-logo.png') }}"
                                                            alt="" class="w-4 h-4 object-contain">
                                                        <span>{{ app()->getLocale() === 'km' ? 'ធនាគារ កាណាឌីយ៉ា (Canadia Bank PLC)' : 'Canadia Bank PLC' }}</span>
                                                    </span>
                                                </div>
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-[#EADFC7]/60 gap-1">
                                                    <span
                                                        class="text-stone-500 font-medium">{{ __('frontend.checkout.account_name') }}:</span>
                                                    <span
                                                        class="font-bold text-stone-900 tracking-wide">{{ __('frontend.checkout.account_name_val') }}</span>
                                                </div>
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-[#EADFC7]/60 gap-1">
                                                    <span
                                                        class="text-stone-500 font-medium">{{ __('frontend.checkout.account_number') }}:</span>
                                                    <div class="flex items-center gap-2">
                                                        <span
                                                            class="font-mono font-black text-sm text-[#997528] tracking-wider">001
                                                            800 234 5678</span>
                                                        <button type="button"
                                                            onclick="event.preventDefault(); event.stopPropagation(); navigator.clipboard.writeText('0018002345678'); showToast('{{ __('frontend.checkout.copied') }}', '001 800 234 5678');"
                                                            class="px-2.5 py-1 rounded-lg bg-white border border-[#EADFC7] hover:border-[#B58E3E] text-stone-700 hover:text-[#B58E3E] text-[11px] font-bold shadow-xs active:scale-95 transition-all flex items-center gap-1 cursor-pointer">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                            </svg>
                                                            <span>{{ __('frontend.checkout.copy') }}</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-1 gap-1">
                                                    <span
                                                        class="text-stone-500 font-medium">{{ __('frontend.cart.total') }}:</span>
                                                    <span
                                                        class="font-black text-base text-[#B58E3E]">${{ number_format($total, 2) }}</span>
                                                </div>
                                                <div
                                                    class="p-2.5 rounded-xl bg-white/80 border border-[#EADFC7] text-[11px] text-stone-600 flex items-start gap-2">
                                                    <svg class="w-4 h-4 text-red-600 shrink-0 mt-0.5" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <span>{{ __('frontend.checkout.scan_to_pay') }}</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </label>

                        <!-- Option 3: Cash on Delivery -->
                        <label class="block cursor-pointer">
                            <div
                                class="payment-method-card p-4 rounded-2xl border border-[#EADFC7] hover:border-[#B58E3E] bg-white flex items-center justify-between transition-all">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="payment_method" value="cod"
                                        class="text-[#B58E3E] focus:ring-[#B58E3E]">
                                    <span
                                        class="font-bold text-sm text-stone-800">{{ __('frontend.checkout.cod') }}</span>
                                </div>
                                <span class="text-emerald-700 font-bold text-xs">💵 COD</span>
                            </div>
                        </label>

                    </div>

                </div>

            </div>

            <!-- Right: Order Summary Sidebar -->
            <div class="lg:col-span-4">
                <div class="bg-white  p-6 sm:p-8 border border-[#EADFC7] shadow-sm space-y-6">

                    <h3
                        class="font-extrabold font-brand text-base sm:text-lg text-stone-900 pb-3 border-b border-[#F5EFEB]">
                        {{ __('frontend.cart.order_summary') }}
                    </h3>

                    <!-- Mini Items Preview -->
                    <div class="space-y-3 pb-4 border-b border-[#F5EFEB]">
                        @foreach ($items as $it)
                            <div class="flex items-center justify-between text-xs sm:text-sm">
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ $it['image'] }}" alt="{{ $it['name'] }}"
                                        class="w-10 h-10 object-contain">
                                    <div>
                                        <span class="font-bold text-stone-800 block line-clamp-1">
                                            {{ app()->getLocale() === 'km' && !empty($it['name_km']) ? $it['name_km'] : $it['name'] }}
                                        </span>
                                        <span class="text-[11px] text-stone-400">Qty: {{ $it['quantity'] }}</span>
                                    </div>
                                </div>
                                <span class="font-bold text-stone-800">${{ number_format($it['price'], 2) }}</span>
                            </div>
                        @endforeach
                    </div>

                    <!-- Price Calculations -->
                    <div class="space-y-2.5 text-xs sm:text-sm text-stone-600">
                        <div class="flex items-center justify-between">
                            <span>{{ __('frontend.cart.subtotal') }}</span>
                            <span class="font-bold text-stone-800">${{ number_format($subtotal, 2) }}</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span>{{ __('frontend.cart.shipping') }}</span>
                            <span class="font-bold text-emerald-700">{{ __('frontend.cart.free') }}</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="pt-3 border-t border-[#EADFC7] flex items-baseline justify-between">
                        <span class="font-black text-base text-stone-900">{{ __('frontend.cart.total') }}</span>
                        <span class="text-2xl font-black text-[#B58E3E]">${{ number_format($total, 2) }}</span>
                    </div>

                    <!-- Place Order Button -->
                    <a href="{{ route('order.success') }}"
                        class="w-full py-3.5 px-6  bg-gradient-to-r from-[#B58E3E] to-[#C5A059] hover:from-[#997528] hover:to-[#B58E3E] text-white font-extrabold text-sm shadow-md shadow-stone-800/15 active:scale-95 transition-all flex items-center justify-center gap-2">
                        <span>{{ __('frontend.checkout.place_order') }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>

                    <div class="text-[11px] text-stone-400 text-center">
                        <span>{{ __('frontend.features.secure_payment_sub') }}</span>
                    </div>

                </div>
            </div>

        </div>

    </div>

    @push('scripts')
        <script>
            function switchBankTab(bank) {
                const tabAba = document.getElementById('tab-bank-aba');
                const tabCanadia = document.getElementById('tab-bank-canadia');
                const panelAba = document.getElementById('panel-bank-aba');
                const panelCanadia = document.getElementById('panel-bank-canadia');

                if (bank === 'canadia') {
                    if (panelAba) panelAba.classList.add('hidden');
                    if (panelCanadia) panelCanadia.classList.remove('hidden');
                    if (tabCanadia) tabCanadia.className =
                        'px-4 py-2 rounded-xl text-xs font-bold transition-all bg-red-600 text-white shadow-sm flex items-center gap-2 cursor-pointer';
                    if (tabAba) tabAba.className =
                        'px-4 py-2 rounded-xl text-xs font-bold transition-all bg-white border border-[#EADFC7] text-stone-600 hover:border-[#B58E3E] hover:text-stone-900 flex items-center gap-2 cursor-pointer';
                } else {
                    if (panelCanadia) panelCanadia.classList.add('hidden');
                    if (panelAba) panelAba.classList.remove('hidden');
                    if (tabAba) tabAba.className =
                        'px-4 py-2 rounded-xl text-xs font-bold transition-all bg-[#015F7A] text-white shadow-sm flex items-center gap-2 cursor-pointer';
                    if (tabCanadia) tabCanadia.className =
                        'px-4 py-2 rounded-xl text-xs font-bold transition-all bg-white border border-[#EADFC7] text-stone-600 hover:border-[#B58E3E] hover:text-stone-900 flex items-center gap-2 cursor-pointer';
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                const radios = document.querySelectorAll('input[name="payment_method"]');
                const bankDetails = document.getElementById('bank-transfer-details');

                function updatePaymentUI() {
                    radios.forEach(radio => {
                        const card = radio.closest('.payment-method-card');
                        if (!card) return;
                        if (radio.checked) {
                            card.classList.remove('border-[#EADFC7]', 'bg-white');
                            card.classList.add('border-2', 'border-[#B58E3E]', 'bg-[#FAF7F2]');
                        } else {
                            card.classList.remove('border-2', 'border-[#B58E3E]', 'bg-[#FAF7F2]');
                            card.classList.add('border', 'border-[#EADFC7]', 'bg-white');
                        }
                    });

                    const selectedRadio = document.querySelector('input[name="payment_method"]:checked');
                    if (bankDetails) {
                        if (selectedRadio && selectedRadio.value === 'bank_transfer') {
                            bankDetails.classList.remove('hidden');
                        } else {
                            bankDetails.classList.add('hidden');
                        }
                    }
                }

                radios.forEach(radio => {
                    radio.addEventListener('change', updatePaymentUI);
                });

                updatePaymentUI();
            });
        </script>
    @endpush
@endsection
