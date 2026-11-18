<header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-[#EADFC7] shadow-xs transition-all duration-200">
    <!-- Announcement Micro Bar (Luxury Gold & Deep Espresso) -->
    <div class="bg-[#1C1917] text-[#EADFC7] text-[11px] sm:text-xs font-medium py-1.5 px-4 text-center tracking-wider flex items-center justify-center gap-2 border-b border-[#2E2822]">
        <span class="text-[#C5A059]">✦</span>
        <span class="truncate">
            {{ app()->getLocale() === 'km' ? 'ដឹកជញ្ជូនឥតគិតថ្លៃសម្រាប់ការកុម្ម៉ង់ចាប់ពី $25 ឡើងទៅ! កូដបញ្ចុះតម្លៃ VIP៖ LIVAGLOW' : 'Complimentary shipping on orders over $25! Use VIP code: LIVAGLOW' }}
        </span>
    </div>

    <!-- Main Navigation Bar -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 gap-2 lg:gap-4">
            
            <!-- Left: Brand Logo (Image 4 Luxury Gold & Cream) -->
            <div class="flex items-center gap-3 shrink-0">
                <!-- Mobile Drawer Toggle Button -->
                <button type="button" 
                        id="mobile-menu-open-btn"
                        class="xl:hidden p-2 -ml-2 rounded-2xl text-stone-700 hover:bg-[#F5EFEB] hover:text-[#B58E3E] focus:outline-none transition-colors"
                        aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>

                <a href="{{ route('home') }}" class="flex items-center gap-2.5 group shrink-0">
                    <!-- Brand Icon from Image 4 -->
                    <div class="h-11 w-11 rounded-2xl overflow-hidden border border-[#EADFC7] shadow-sm bg-white p-0.5 group-hover:scale-105 transition-transform shrink-0 flex items-center justify-center">
                        <img src="{{ asset('img/liva/brand-logo.jpg') }}" alt="LIVA" class="h-full w-full object-cover rounded-xl">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-black font-brand tracking-wider text-[#1C1917] group-hover:text-[#B58E3E] transition-colors leading-none">
                            LIVA
                        </span>
                        <span class="text-[9px] font-bold uppercase tracking-widest text-[#B58E3E] mt-0.5 whitespace-nowrap">
                            {{ __('frontend.brand.subtitle') }}
                        </span>
                    </div>
                </a>
            </div>

            <!-- Middle: Desktop Navigation Links -->
            @php
                $isHomeActive = request()->routeIs('home') && !request()->has('category') && !request()->has('q');
                $isAllProductsActive = request()->routeIs('products.index') || request()->has('category') || request()->has('q');
                $isAboutActive = request()->routeIs('account.dashboard');
            @endphp
            <nav class="hidden xl:flex items-center gap-3 sm:gap-6 font-semibold text-xs lg:text-sm text-stone-700">
                <!-- Home -->
                <a href="{{ route('home') }}" 
                   class="py-1.5 px-3 whitespace-nowrap shrink-0 transition-all duration-200 border-b-2 {{ $isHomeActive ? 'text-[#B58E3E] font-bold border-[#B58E3E]' : 'text-stone-700 font-medium hover:text-[#B58E3E] border-transparent hover:border-[#B58E3E]/40' }}">
                    {{ __('frontend.nav.home') }}
                </a>

                <!-- All Products -->
                <a href="{{ route('products.index') }}" 
                   class="py-1.5 px-3 whitespace-nowrap shrink-0 transition-all duration-200 border-b-2 {{ $isAllProductsActive ? 'text-[#B58E3E] font-bold border-[#B58E3E]' : 'text-stone-700 font-medium hover:text-[#B58E3E] border-transparent hover:border-[#B58E3E]/40' }}">
                    {{ __('frontend.nav.all_products') }}
                </a>

                <!-- About -->
                <a href="{{ route('account.dashboard') }}" class="py-1.5 px-3 whitespace-nowrap shrink-0 transition-all duration-200 border-b-2 {{ $isAboutActive ? 'text-[#B58E3E] font-bold border-[#B58E3E]' : 'text-stone-700 font-medium hover:text-[#B58E3E] border-transparent hover:border-[#B58E3E]/40' }}">
                    {{ __('frontend.nav.about') }}
                </a>

                <!-- Contact -->
                <a href="#footer" class="py-1.5 px-3 whitespace-nowrap shrink-0 transition-all duration-200 border-b-2 text-stone-700 font-medium hover:text-[#B58E3E] border-transparent hover:border-[#B58E3E]/40">
                    {{ __('frontend.nav.contact') }}
                </a>
            </nav>

            <!-- Right: Search Bar, Language Switcher, Action Icons -->
            <div class="flex items-center gap-1.5 sm:gap-2.5 shrink-0">
                
                <!-- Desktop Search Input Form -->
                <form action="{{ route('products.index') }}" method="GET" class="hidden md:flex items-center relative">
                    <input type="text" 
                           name="q" 
                           value="{{ request('q') }}"
                           placeholder="{{ __('frontend.header.search_placeholder') }}" 
                           class="w-36 lg:w-52 xl:w-60 bg-[#FAF7F2] border border-[#EADFC7] rounded-full pl-9 pr-3.5 py-2 text-xs text-stone-800 placeholder:text-stone-400 focus:outline-none focus:border-[#B58E3E] focus:bg-white focus:ring-2 focus:ring-[#EADFC7] transition-all">
                    <svg class="w-4 h-4 text-[#B58E3E] absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </form>

                <!-- Language Switcher Dropdown (Khmer / English) -->
                <div class="relative" id="lang-menu-wrapper">
                    <button type="button" 
                            id="lang-menu-btn"
                            class="flex items-center gap-1.5 px-2.5 sm:px-3 py-1.5 rounded-full border border-[#EADFC7] bg-[#FAF7F2] hover:bg-[#F5EFEB] text-stone-800 text-xs font-bold transition-all shrink-0">
                        @if(app()->getLocale() === 'km')
                            <span class="text-sm sm:text-base leading-none">🇰🇭</span>
                            <span class="hidden sm:inline">ខ្មែរ</span>
                        @else
                            <span class="text-sm sm:text-base leading-none">🇬🇧</span>
                            <span class="hidden sm:inline">EN</span>
                        @endif
                        <svg class="w-3 h-3 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Language Dropdown -->
                    <div id="lang-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-3xl shadow-2xl border border-[#EADFC7] py-2 z-50 animate-in fade-in slide-in-from-top-1">
                        <div class="px-4 py-1 text-[10px] font-bold text-stone-400 uppercase tracking-wider border-b border-[#F5EFEB] mb-1">
                            {{ __('frontend.header.language') }}
                        </div>
                        <a href="{{ route('lang.switch', 'en') }}" 
                           class="flex items-center gap-2.5 px-4 py-2.5 text-xs font-bold text-stone-700 hover:bg-[#FAF7F2] hover:text-[#B58E3E] transition-colors {{ app()->getLocale() === 'en' ? 'bg-[#F5EFEB] text-[#B58E3E]' : '' }}">
                            <span class="text-base">🇬🇧</span>
                            <span>English</span>
                            @if(app()->getLocale() === 'en')
                                <svg class="w-3.5 h-3.5 ml-auto text-[#B58E3E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" /></svg>
                            @endif
                        </a>
                        <a href="{{ route('lang.switch', 'km') }}" 
                           class="flex items-center gap-2.5 px-4 py-2.5 text-xs font-bold text-stone-700 hover:bg-[#FAF7F2] hover:text-[#B58E3E] transition-colors {{ app()->getLocale() === 'km' ? 'bg-[#F5EFEB] text-[#B58E3E]' : '' }}">
                            <span class="text-base">🇰🇭</span>
                            <span>ភាសាខ្មែរ (Khmer)</span>
                            @if(app()->getLocale() === 'km')
                                <svg class="w-3.5 h-3.5 ml-auto text-[#B58E3E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" /></svg>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Wishlist Icon with Badge -->
                <a href="{{ route('account.dashboard') }}" 
                   title="{{ __('frontend.header.wishlist') }}"
                   class="relative p-2 rounded-full text-stone-700 hover:text-[#B58E3E] hover:bg-[#F5EFEB] transition-all shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <span class="absolute top-0.5 right-0.5 w-4 h-4 bg-[#B58E3E] text-white text-[10px] font-black rounded-full flex items-center justify-center">
                        2
                    </span>
                </a>

                <!-- Cart Icon with Badge -->
                <a href="{{ route('cart.index') }}" 
                   title="{{ __('frontend.header.cart') }}"
                   class="relative p-2 rounded-full text-stone-700 hover:text-[#B58E3E] hover:bg-[#F5EFEB] transition-all shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span id="cart-badge-count" class="absolute top-0.5 right-0.5 w-4 h-4 bg-[#B58E3E] text-white text-[10px] font-black rounded-full flex items-center justify-center">
                        3
                    </span>
                </a>

                <!-- Account / Profile Avatar -->
                <a href="{{ route('account.dashboard') }}" 
                   title="{{ __('frontend.header.account') }}"
                   class="flex items-center p-0.5 rounded-full border-2 border-[#EADFC7] hover:border-[#B58E3E] transition-all shrink-0">
                    <img src="{{ asset('img/liva/user-avatar.jpg') }}" 
                         alt="Panha User" 
                         onerror="this.src='https://ui-avatars.com/api/?name=Panha&background=B58E3E&color=fff'"
                         class="w-7 h-7 sm:w-8 sm:h-8 rounded-full object-cover">
                </a>

            </div>
        </div>
    </div>

    <!-- Mobile Drawer Modal & Overlay -->
    <div id="mobile-drawer-backdrop" class="fixed inset-0 bg-black/50 backdrop-blur-xs z-50 hidden transition-opacity duration-300">
        <div id="mobile-drawer-content" class="fixed inset-y-0 left-0 w-4/5 max-w-sm bg-white shadow-2xl flex flex-col z-50 transform -translate-x-full transition-transform duration-300 ease-out">
            
            <!-- Drawer Header -->
            <div class="p-4 border-b border-[#EADFC7] flex items-center justify-between bg-[#FAF7F2]">
                <div class="flex items-center gap-2.5">
                    <div class="h-9 w-9 rounded-xl overflow-hidden border border-[#EADFC7] bg-white">
                        <img src="{{ asset('img/liva/brand-logo.jpg') }}" alt="LIVA" class="h-full w-full object-cover">
                    </div>
                    <span class="font-black font-brand text-xl tracking-wider text-stone-900">LIVA</span>
                </div>
                <button type="button" id="mobile-drawer-close-btn" class="p-2 rounded-xl text-stone-400 hover:text-stone-700 hover:bg-[#F5EFEB]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Drawer Search -->
            <div class="p-4 border-b border-[#EADFC7]">
                <form action="{{ route('products.index') }}" method="GET" class="relative">
                    <input type="text" 
                           name="q" 
                           placeholder="{{ __('frontend.header.search_placeholder') }}" 
                           class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-full pl-9 pr-4 py-2 text-xs text-stone-800 placeholder:text-stone-400 focus:outline-none focus:border-[#B58E3E]">
                    <svg class="w-4 h-4 text-[#B58E3E] absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </form>
            </div>

            <!-- Drawer Navigation Body with Accordions -->
            <div class="flex-1 overflow-y-auto p-4 space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-2.5 font-bold text-sm {{ request()->routeIs('home') && !request()->has('category') ? 'text-[#B58E3E] border-b-2 border-[#B58E3E]' : 'text-stone-700 hover:text-[#B58E3E]' }}">
                    {{ __('frontend.nav.home') }}
                </a>
                
                <a href="{{ route('products.index') }}" class="block px-4 py-2.5 font-bold text-sm {{ request()->routeIs('products.index') && !request()->has('category') ? 'text-[#B58E3E] border-b-2 border-[#B58E3E]' : 'text-stone-700 hover:text-[#B58E3E]' }}">
                    {{ __('frontend.nav.all_products') }}
                </a>

                <!-- Skincare Accordion -->
                <div class="border border-[#EADFC7] rounded-2xl overflow-hidden">
                    <button type="button" 
                            onclick="document.getElementById('mobile-sub-skincare').classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180');"
                            class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-bold text-stone-800 hover:bg-[#F5EFEB]">
                        <span>{{ __('frontend.nav.skincare') }}</span>
                        <svg class="w-4 h-4 text-stone-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div id="mobile-sub-skincare" class="hidden bg-[#FAF7F2] px-3 py-2 space-y-1 text-xs">
                        <a href="{{ route('products.index', ['category' => 'skincare']) }}" class="block px-3 py-1.5 rounded-xl font-bold text-[#B58E3E]">
                            {{ app()->getLocale() === 'km' ? 'គ្រប់ផលិតផលថែស្បែកមុខទាំងអស់' : 'All Skincare (18)' }}
                        </a>
                        <a href="{{ route('products.index', ['category' => 'cleanser']) }}" class="block px-3 py-1.5 rounded-xl text-stone-600 hover:text-[#B58E3E]">
                            {{ __('frontend.categories.cleanser') }} (6)
                        </a>
                        <a href="{{ route('products.index', ['category' => 'toner']) }}" class="block px-3 py-1.5 rounded-xl text-stone-600 hover:text-[#B58E3E]">
                            {{ __('frontend.categories.toner') }} (6)
                        </a>
                        <a href="{{ route('products.index', ['category' => 'serum']) }}" class="block px-3 py-1.5 rounded-xl text-stone-600 hover:text-[#B58E3E]">
                            {{ __('frontend.categories.serum') }} (7)
                        </a>
                        <a href="{{ route('products.index', ['category' => 'cream']) }}" class="block px-3 py-1.5 rounded-xl text-stone-600 hover:text-[#B58E3E]">
                            {{ __('frontend.categories.cream') }} (8)
                        </a>
                        <a href="{{ route('products.index', ['category' => 'sunscreen']) }}" class="block px-3 py-1.5 rounded-xl text-stone-600 hover:text-[#B58E3E]">
                            {{ __('frontend.categories.sunscreen') }} (5)
                        </a>
                    </div>
                </div>

                <!-- Body Care Accordion -->
                <div class="border border-[#EADFC7] rounded-2xl overflow-hidden">
                    <button type="button" 
                            onclick="document.getElementById('mobile-sub-bodycare').classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180');"
                            class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-bold text-stone-800 hover:bg-[#F5EFEB]">
                        <span>{{ __('frontend.nav.body_care') }}</span>
                        <svg class="w-4 h-4 text-stone-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div id="mobile-sub-bodycare" class="hidden bg-[#FAF7F2] px-3 py-2 space-y-1 text-xs">
                        <a href="{{ route('products.index', ['category' => 'body_care']) }}" class="block px-3 py-1.5 rounded-xl font-bold text-[#B58E3E]">
                            {{ app()->getLocale() === 'km' ? 'គ្រប់ផលិតផលថែរក្សាដងខ្លួន' : 'All Body Care (8)' }}
                        </a>
                        <a href="{{ route('products.index', ['category' => 'body_lotion']) }}" class="block px-3 py-1.5 rounded-xl text-stone-600 hover:text-[#B58E3E]">
                            {{ app()->getLocale() === 'km' ? 'ឡេលាបដងខ្លួន' : 'Body Lotion' }} (4)
                        </a>
                        <a href="{{ route('products.index', ['category' => 'body_wash']) }}" class="block px-3 py-1.5 rounded-xl text-stone-600 hover:text-[#B58E3E]">
                            {{ app()->getLocale() === 'km' ? 'សាប៊ូដុសខ្លួន' : 'Body Wash' }} (4)
                        </a>
                    </div>
                </div>

                <a href="{{ route('account.dashboard') }}" class="block px-4 py-2.5 rounded-2xl font-bold text-sm text-stone-700 hover:bg-[#F5EFEB]">
                    {{ __('frontend.nav.about') }}
                </a>
                <a href="#footer" class="block px-4 py-2.5 rounded-2xl font-bold text-sm text-stone-700 hover:bg-[#F5EFEB]">
                    {{ __('frontend.nav.contact') }}
                </a>
            </div>

            <!-- Drawer Footer: Language Switcher -->
            <div class="p-4 border-t border-[#EADFC7] bg-[#FAF7F2] space-y-3">
                <div class="text-xs font-bold text-stone-500 uppercase tracking-wider">
                    {{ __('frontend.header.language') }}
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <a href="{{ route('lang.switch', 'en') }}" 
                       class="py-2 px-3 rounded-xl border text-center text-xs font-bold flex items-center justify-center gap-1.5 {{ app()->getLocale() === 'en' ? 'bg-[#B58E3E] text-white border-[#B58E3E] shadow-sm' : 'bg-white text-stone-700 border-[#EADFC7]' }}">
                        <span>🇬🇧</span> English
                    </a>
                    <a href="{{ route('lang.switch', 'km') }}" 
                       class="py-2 px-3 rounded-xl border text-center text-xs font-bold flex items-center justify-center gap-1.5 {{ app()->getLocale() === 'km' ? 'bg-[#B58E3E] text-white border-[#B58E3E] shadow-sm' : 'bg-white text-stone-700 border-[#EADFC7]' }}">
                        <span>🇰🇭</span> ភាសាខ្មែរ
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>

<!-- Mobile Bottom Navigation Bar -->
<nav class="fixed bottom-0 inset-x-0 z-40 bg-white/95 backdrop-blur-md border-t border-[#EADFC7] py-1.5 px-3 flex items-center justify-around sm:hidden shadow-lg shadow-stone-800/10">
    <a href="{{ route('home') }}" class="flex flex-col items-center gap-0.5 {{ request()->routeIs('home') && !request()->has('category') ? 'text-[#B58E3E] font-bold' : 'text-stone-500 hover:text-[#B58E3E]' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        <span class="text-[10px]">{{ __('frontend.nav.home') }}</span>
    </a>

    <a href="{{ route('products.index') }}" class="flex flex-col items-center gap-0.5 {{ request()->routeIs('products.index') || request()->has('category') ? 'text-[#B58E3E] font-bold' : 'text-stone-500 hover:text-[#B58E3E]' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
        <span class="text-[10px]">{{ __('frontend.categories.title') }}</span>
    </a>

    <a href="{{ route('cart.index') }}" class="relative flex flex-col items-center gap-0.5 {{ request()->routeIs('cart.index') ? 'text-[#B58E3E] font-bold' : 'text-stone-500 hover:text-[#B58E3E]' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
        <span class="absolute -top-1 right-2 w-4 h-4 bg-[#B58E3E] text-white text-[9px] font-black rounded-full flex items-center justify-center">3</span>
        <span class="text-[10px]">{{ __('frontend.header.cart') }}</span>
    </a>

    <a href="{{ route('account.dashboard') }}" class="flex flex-col items-center gap-0.5 {{ request()->routeIs('account.dashboard') ? 'text-[#B58E3E] font-bold' : 'text-stone-500 hover:text-[#B58E3E]' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        <span class="text-[10px]">{{ __('frontend.header.account') }}</span>
    </a>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const langBtn = document.getElementById('lang-menu-btn');
        const langDropdown = document.getElementById('lang-dropdown');
        if (langBtn && langDropdown) {
            langBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                langDropdown.classList.toggle('hidden');
            });
            document.addEventListener('click', function () {
                if (!langDropdown.classList.contains('hidden')) {
                    langDropdown.classList.add('hidden');
                }
            });
        }

        const openBtn = document.getElementById('mobile-menu-open-btn');
        const closeBtn = document.getElementById('mobile-drawer-close-btn');
        const backdrop = document.getElementById('mobile-drawer-backdrop');
        const content = document.getElementById('mobile-drawer-content');

        function openDrawer() {
            backdrop.classList.remove('hidden');
            setTimeout(() => {
                content.classList.remove('-translate-x-full');
            }, 10);
            document.body.classList.add('overflow-hidden');
        }

        function closeDrawer() {
            content.classList.add('-translate-x-full');
            setTimeout(() => {
                backdrop.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }, 300);
        }

        if (openBtn) openBtn.addEventListener('click', openDrawer);
        if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
        if (backdrop) {
            backdrop.addEventListener('click', function(e) {
                if (e.target === backdrop) closeDrawer();
            });
        }
    });
</script>
