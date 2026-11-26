<header class="sticky top-0 z-40 bg-[#FAF7F2]/95 backdrop-blur-md transition-all duration-200">
    <!-- Announcement Micro Bar (Luxury Gold & Deep Espresso) -->
    <div
        class="bg-[#1C1917] text-[#EADFC7] text-[11px] sm:text-xs font-medium py-1.5 px-4 text-center tracking-wider flex items-center justify-center gap-2 border-b border-[#2E2822]">

        <marquee direction="left" scrollamount="5" class="truncate">
            {{ app()->getLocale() === 'km' ? 'ដឹកជញ្ជូនឥតគិតថ្លៃសម្រាប់ការកុម្ម៉ង់ចាប់ពី $25 ឡើងទៅ! កូដបញ្ចុះតម្លៃ VIP៖ LIVAGLOW' : 'Complimentary shipping on orders over $25! Use VIP code: LIVAGLOW' }}
        </marquee>
    </div>

    <!-- Main Navigation Bar -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 gap-2 lg:gap-4">

            <!-- Left: Brand Logo (Image 4 Luxury Gold & Cream) -->
            <div class="flex items-center gap-3 shrink-0">
                <!-- Mobile Drawer Toggle Button -->
                <button type="button" id="mobile-menu-open-btn"
                    class="xl:hidden p-2 -ml-2 rounded-2xl text-stone-700 hover:bg-[#F5EFEB] hover:text-[#B58E3E] focus:outline-none transition-colors"
                    aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>

                <a href="{{ route('home') }}" class="flex items-center gap-2.5 group shrink-0">
                    <img src="{{ asset('img/liva/brand-logo.webp') }}" alt="LIVA"
                        class="h-9 sm:h-10 w-auto object-contain group-hover:scale-105 transition-transform shrink-0">
                    <span
                        class="hidden sm:inline-block text-[9px] font-bold uppercase tracking-widest text-[#B58E3E] border-l border-[#EADFC7] pl-2.5 whitespace-nowrap">
                        {{ __('frontend.brand.subtitle') }}
                    </span>
                </a>
            </div>

            <!-- Middle: Desktop Navigation Links -->
            @php
                $isHomeActive = request()->routeIs('home') && !request()->has('category') && !request()->has('q');
                $isAboutActive = request()->routeIs('about.index');
                $isContactActive = request()->routeIs('contact.index');
            @endphp
            <nav class="hidden xl:flex items-center gap-3 sm:gap-6 font-semibold text-xs lg:text-sm text-stone-700">
                <!-- Home -->
                <a href="{{ route('home') }}"
                    class="py-1.5 px-3 whitespace-nowrap shrink-0 transition-all duration-200 border-b-2 {{ $isHomeActive ? 'text-[#B58E3E] font-bold border-[#B58E3E]' : 'text-stone-700 font-medium hover:text-[#B58E3E] border-transparent hover:border-[#B58E3E]/40' }}">
                    {{ __('frontend.nav.home') }}
                </a>

                <!-- About -->
                <a href="{{ route('about.index') }}"
                    class="py-1.5 px-3 whitespace-nowrap shrink-0 transition-all duration-200 border-b-2 {{ $isAboutActive ? 'text-[#B58E3E] font-bold border-[#B58E3E]' : 'text-stone-700 font-medium hover:text-[#B58E3E] border-transparent hover:border-[#B58E3E]/40' }}">
                    {{ __('frontend.nav.about') }}
                </a>

                <!-- Contact -->
                <a href="{{ route('contact.index') }}"
                    class="py-1.5 px-3 whitespace-nowrap shrink-0 transition-all duration-200 border-b-2 {{ $isContactActive ? 'text-[#B58E3E] font-bold border-[#B58E3E]' : 'text-stone-700 font-medium hover:text-[#B58E3E] border-transparent hover:border-[#B58E3E]/40' }}">
                    {{ __('frontend.nav.contact') }}
                </a>
            </nav>

            <!-- Right: Search Bar, Language Switcher, Action Icons -->
            <div class="flex items-center gap-1.5 sm:gap-2.5 shrink-0">

                <!-- Desktop Search Input Form -->
                <form action="{{ route('products.index') }}" method="GET"
                    class="hidden md:flex items-center relative">
                    <input type="text" name="q" value="{{ request('q') }}"
                        placeholder="{{ __('frontend.header.search_placeholder') }}"
                        class="w-36 lg:w-52 xl:w-60 bg-[#FAF7F2] border border-[#EADFC7] rounded-full pl-9 pr-3.5 py-2 text-xs text-stone-800 placeholder:text-stone-400 focus:outline-none focus:border-[#B58E3E] focus:bg-white focus:ring-2 focus:ring-[#EADFC7] transition-all">
                    <svg class="w-4 h-4 text-[#B58E3E] absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </form>

                <!-- Language Switcher Dropdown (Khmer / English) -->
                <div class="relative" id="lang-menu-wrapper">
                    <button type="button" id="lang-menu-btn"
                        class="flex items-center gap-1.5 px-2 py-1.5 bg-transparent border-0 rounded-none text-stone-800 hover:text-[#B58E3E] text-xs font-bold transition-colors shrink-0 focus:outline-none">
                        @if (app()->getLocale() === 'km')
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
                    <div id="lang-dropdown"
                        class="hidden absolute right-0 mt-2 w-44 bg-[#FAF7F2] border-0 rounded-none shadow-lg py-2 z-50 animate-in fade-in slide-in-from-top-1">
                        <div class="px-3 py-1 text-[10px] font-bold text-stone-400 uppercase tracking-wider mb-1">
                            {{ __('frontend.header.language') }}
                        </div>
                        <a href="{{ route('lang.switch', 'en') }}"
                            class="flex items-center gap-2.5 px-3 py-2 text-xs font-bold transition-colors {{ app()->getLocale() === 'en' ? 'text-[#B58E3E]' : 'text-stone-700 hover:text-[#B58E3E]' }}">
                            <span class="text-base">🇬🇧</span>
                            <span>English</span>
                            @if (app()->getLocale() === 'en')
                                <svg class="w-3.5 h-3.5 ml-auto text-[#B58E3E]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            @endif
                        </a>
                        <a href="{{ route('lang.switch', 'km') }}"
                            class="flex items-center gap-2.5 px-3 py-2 text-xs font-bold transition-colors {{ app()->getLocale() === 'km' ? 'text-[#B58E3E]' : 'text-stone-700 hover:text-[#B58E3E]' }}">
                            <span class="text-base">🇰🇭</span>
                            <span>ភាសាខ្មែរ (Khmer)</span>
                            @if (app()->getLocale() === 'km')
                                <svg class="w-3.5 h-3.5 ml-auto text-[#B58E3E]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Wishlist Icon with Badge -->
                <a href="{{ route('wishlist.index') }}" title="{{ __('frontend.header.wishlist') }}"
                    class="relative p-2 rounded-full {{ request()->routeIs('wishlist.index') ? 'text-[#B58E3E] bg-[#F5EFEB]' : 'text-stone-700 hover:text-[#B58E3E] hover:bg-[#F5EFEB]' }} transition-all shrink-0">
                    <svg class="w-5 h-5" fill="{{ request()->routeIs('wishlist.index') ? 'currentColor' : 'none' }}"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <span
                        class="wishlist-badge-count absolute top-0.5 right-0.5 w-4 h-4 bg-[#B58E3E] text-white text-[10px] font-black rounded-full flex items-center justify-center">
                        2
                    </span>
                </a>

                <!-- Cart Icon with Badge -->
                <a href="{{ route('cart.index') }}" title="{{ __('frontend.header.cart') }}"
                    class="relative p-2 rounded-full {{ request()->routeIs('cart.index') ? 'text-[#B58E3E] bg-[#F5EFEB]' : 'text-stone-700 hover:text-[#B58E3E] hover:bg-[#F5EFEB]' }} transition-all shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span id="cart-badge-count"
                        class="absolute top-0.5 right-0.5 w-4 h-4 bg-[#B58E3E] text-white text-[10px] font-black rounded-full flex items-center justify-center">
                        3
                    </span>
                </a>

                <!-- User Account / Auth Dropdown (No profile yet -> Login / Register) -->
                <div class="relative" id="user-auth-menu-wrapper">
                    <button type="button" id="user-auth-menu-btn" title="{{ __('frontend.auth.user_icon_title') }}"
                        class="flex items-center justify-center w-8 h-8 sm:w-9 sm:h-9 rounded-full border border-[#EADFC7] bg-[#FAF7F2] hover:bg-[#F5EFEB] hover:border-[#B58E3E] text-stone-700 hover:text-[#B58E3E] transition-all shrink-0">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>

                    <!-- User Auth Dropdown -->
                    <div id="user-auth-dropdown"
                        class="hidden absolute right-0 mt-2 w-64 bg-[#FAF7F2] border-0 rounded-none shadow-lg p-4 z-50 animate-in fade-in slide-in-from-top-1">


                        <div class="pt-3 space-y-2">
                            <a href="{{ route('login') }}"
                                class="w-full py-2 px-4 rounded-xl bg-gradient-to-r from-[#B58E3E] to-[#C5A059] text-white text-xs font-bold shadow-xs hover:from-[#997528] hover:to-[#B58E3E] transition-all flex items-center justify-center gap-2">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                <span>{{ __('frontend.auth.sign_in') }}</span>
                            </a>

                            <a href="{{ route('register') }}"
                                class="w-full py-2 px-4 rounded-xl bg-[#FAF7F2] text-stone-800 border border-[#EADFC7] hover:border-[#B58E3E] hover:text-[#B58E3E] text-xs font-bold transition-all flex items-center justify-center gap-2">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                                <span>{{ __('frontend.auth.create_account') }}</span>
                            </a>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
</header>

<!-- Mobile Drawer Modal & Overlay (Moved outside header to avoid backdrop-filter clipping) -->
<div id="mobile-drawer-backdrop" class="fixed inset-0 bg-black/60 z-50 hidden transition-opacity duration-300">
    <div id="mobile-drawer-content"
        class="fixed inset-y-0 left-0 w-4/5 max-w-sm h-full bg-white shadow-2xl flex flex-col z-50 transform -translate-x-full transition-transform duration-300 ease-out">

        <!-- Drawer Header -->
        <div class="p-4 border-b border-[#EADFC7] flex items-center justify-between bg-[#FAF7F2] shrink-0">
            <div class="flex items-center gap-2.5">
                <img src="{{ asset('img/liva/brand-logo.webp') }}" alt="LIVA"
                    class="h-8 w-auto object-contain">
                <span
                    class="text-[9px] font-bold uppercase tracking-widest text-[#B58E3E] border-l border-[#EADFC7] pl-2.5 whitespace-nowrap">
                    {{ __('frontend.brand.subtitle') }}
                </span>
            </div>
            <button type="button" id="mobile-drawer-close-btn"
                class="p-2 text-stone-400 hover:text-stone-700 hover:bg-[#F5EFEB] transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Drawer Search -->
        <div class="p-4 border-b border-[#EADFC7] shrink-0">
            <form action="{{ route('products.index') }}" method="GET" class="relative">
                <input type="text" name="q" placeholder="{{ __('frontend.header.search_placeholder') }}"
                    class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-none pl-9 pr-4 py-2.5 text-xs text-stone-800 placeholder:text-stone-400 focus:outline-none focus:border-[#B58E3E]">
                <svg class="w-4 h-4 text-[#B58E3E] absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </form>
        </div>

        <!-- Drawer Navigation Body with Accordions -->
        <div class="flex-1 overflow-y-auto p-4 space-y-2">
            <a href="{{ route('home') }}"
                class="block px-4 py-2.5 font-bold text-sm {{ request()->routeIs('home') && !request()->has('category') ? 'text-[#B58E3E] border-b-2 border-[#B58E3E]' : 'text-stone-700 hover:text-[#B58E3E]' }}">
                {{ __('frontend.nav.home') }}
            </a>

            <a href="{{ route('products.index') }}"
                class="block px-4 py-2.5 font-bold text-sm {{ request()->routeIs('products.index') && !request()->has('category') ? 'text-[#B58E3E] border-b-2 border-[#B58E3E]' : 'text-stone-700 hover:text-[#B58E3E]' }}">
                {{ __('frontend.nav.all_products') }}
            </a>

            <!-- Skincare Accordion -->
            <div class="border border-[#EADFC7] rounded-none overflow-hidden">
                <button type="button"
                    onclick="document.getElementById('mobile-sub-skincare').classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180');"
                    class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-bold text-stone-800 hover:bg-[#F5EFEB]">
                    <span>{{ __('frontend.nav.skincare') }}</span>
                    <svg class="w-4 h-4 text-stone-400 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="mobile-sub-skincare" class="hidden bg-[#FAF7F2] px-3 py-2 space-y-1 text-xs">
                    <a href="{{ route('products.index', ['category' => 'skincare']) }}"
                        class="block px-3 py-1.5 rounded-none font-bold text-[#B58E3E]">
                        {{ app()->getLocale() === 'km' ? 'គ្រប់ផលិតផលថែស្បែកមុខទាំងអស់' : 'All Skincare (18)' }}
                    </a>
                    <a href="{{ route('products.index', ['category' => 'cleanser']) }}"
                        class="block px-3 py-1.5 rounded-none text-stone-600 hover:text-[#B58E3E]">
                        {{ __('frontend.categories.cleanser') }} (6)
                    </a>
                    <a href="{{ route('products.index', ['category' => 'toner']) }}"
                        class="block px-3 py-1.5 rounded-none text-stone-600 hover:text-[#B58E3E]">
                        {{ __('frontend.categories.toner') }} (6)
                    </a>
                    <a href="{{ route('products.index', ['category' => 'serum']) }}"
                        class="block px-3 py-1.5 rounded-none text-stone-600 hover:text-[#B58E3E]">
                        {{ __('frontend.categories.serum') }} (7)
                    </a>
                    <a href="{{ route('products.index', ['category' => 'cream']) }}"
                        class="block px-3 py-1.5 rounded-none text-stone-600 hover:text-[#B58E3E]">
                        {{ __('frontend.categories.cream') }} (8)
                    </a>
                    <a href="{{ route('products.index', ['category' => 'sunscreen']) }}"
                        class="block px-3 py-1.5 rounded-none text-stone-600 hover:text-[#B58E3E]">
                        {{ __('frontend.categories.sunscreen') }} (5)
                    </a>
                </div>
            </div>

            <!-- Body Care Accordion -->
            <div class="border border-[#EADFC7] rounded-none overflow-hidden">
                <button type="button"
                    onclick="document.getElementById('mobile-sub-bodycare').classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180');"
                    class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-bold text-stone-800 hover:bg-[#F5EFEB]">
                    <span>{{ __('frontend.nav.body_care') }}</span>
                    <svg class="w-4 h-4 text-stone-400 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="mobile-sub-bodycare" class="hidden bg-[#FAF7F2] px-3 py-2 space-y-1 text-xs">
                    <a href="{{ route('products.index', ['category' => 'body_care']) }}"
                        class="block px-3 py-1.5 rounded-none font-bold text-[#B58E3E]">
                        {{ app()->getLocale() === 'km' ? 'គ្រប់ផលិតផលថែរក្សាដងខ្លួន' : 'All Body Care (8)' }}
                    </a>
                    <a href="{{ route('products.index', ['category' => 'body_lotion']) }}"
                        class="block px-3 py-1.5 rounded-none text-stone-600 hover:text-[#B58E3E]">
                        {{ app()->getLocale() === 'km' ? 'ឡេលាបដងខ្លួន' : 'Body Lotion' }} (4)
                    </a>
                    <a href="{{ route('products.index', ['category' => 'body_wash']) }}"
                        class="block px-3 py-1.5 rounded-none text-stone-600 hover:text-[#B58E3E]">
                        {{ app()->getLocale() === 'km' ? 'សាប៊ូដុសខ្លួន' : 'Body Wash' }} (4)
                    </a>
                </div>
            </div>

            <!-- Wishlist in Mobile Drawer -->
            <a href="{{ route('wishlist.index') }}"
                class="flex items-center justify-between px-4 py-2.5 rounded-none font-bold text-sm text-stone-700 hover:bg-[#F5EFEB]">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#B58E3E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <span>{{ __('frontend.header.wishlist') }}</span>
                </span>
                <span
                    class="wishlist-badge-count text-xs font-bold text-[#B58E3E] bg-[#F5EFEB] px-2 py-0.5 rounded-none">2</span>
            </a>

            <!-- About in Mobile Drawer -->
            <a href="{{ route('about.index') }}"
                class="block px-4 py-2.5 rounded-none font-bold text-sm {{ request()->routeIs('about.index') ? 'text-[#B58E3E] bg-[#F5EFEB]' : 'text-stone-700 hover:bg-[#F5EFEB]' }}">
                {{ __('frontend.nav.about') }}
            </a>

            <!-- Contact in Mobile Drawer -->
            <a href="{{ route('contact.index') }}"
                class="block px-4 py-2.5 rounded-none font-bold text-sm {{ request()->routeIs('contact.index') ? 'text-[#B58E3E] bg-[#F5EFEB]' : 'text-stone-700 hover:bg-[#F5EFEB]' }}">
                {{ __('frontend.nav.contact') }}
            </a>
        </div>

        <!-- Drawer Auth Section (Sign In / Register) -->
        <div class="p-4 border-t border-[#EADFC7] bg-white space-y-2 shrink-0">
            <a href="{{ route('login') }}"
                class="w-full py-2.5 px-4 rounded-none bg-gradient-to-r from-[#B58E3E] to-[#C5A059] text-white text-xs font-bold shadow-xs hover:from-[#997528] hover:to-[#B58E3E] transition-all flex items-center justify-center gap-2">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                <span>{{ __('frontend.auth.sign_in') }}</span>
            </a>
            <a href="{{ route('register') }}"
                class="w-full py-2.5 px-4 rounded-none bg-[#FAF7F2] text-stone-800 border border-[#EADFC7] hover:border-[#B58E3E] text-xs font-bold transition-all flex items-center justify-center gap-2">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                <span>{{ __('frontend.auth.create_account') }}</span>
            </a>
        </div>

        <!-- Drawer Footer: Language Switcher -->
        <div class="p-4 border-t border-[#EADFC7] bg-[#FAF7F2] space-y-3 shrink-0">
            <div class="text-[10px] font-bold text-stone-400 uppercase tracking-wider">
                {{ __('frontend.header.language') }}
            </div>
            <div class="grid grid-cols-2 gap-2">
                <a href="{{ route('lang.switch', 'en') }}"
                    class="py-2 px-3 rounded-none border text-center text-xs font-bold flex items-center justify-center gap-1.5 {{ app()->getLocale() === 'en' ? 'bg-[#B58E3E] text-white border-[#B58E3E] shadow-sm' : 'bg-white text-stone-700 border-[#EADFC7]' }}">
                    <span>🇬🇧</span> English
                </a>
                <a href="{{ route('lang.switch', 'km') }}"
                    class="py-2 px-3 rounded-none border text-center text-xs font-bold flex items-center justify-center gap-1.5 {{ app()->getLocale() === 'km' ? 'bg-[#B58E3E] text-white border-[#B58E3E] shadow-sm' : 'bg-white text-stone-700 border-[#EADFC7]' }}">
                    <span>🇰🇭</span> ភាសាខ្មែរ
                </a>
            </div>
        </div>

    </div>
</div>


<!-- Mobile Bottom Navigation Bar (5 tabs: Home, Products, Wishlist, Cart, Account) -->
<nav
    class="fixed bottom-0 inset-x-0 z-40 bg-white/95 backdrop-blur-md border-t border-[#EADFC7] py-1.5 px-2 flex items-center justify-around sm:hidden shadow-lg shadow-stone-800/10">
    <!-- Home -->
    <a href="{{ route('home') }}"
        class="flex flex-col items-center gap-0.5 {{ request()->routeIs('home') && !request()->has('category') ? 'text-[#B58E3E] font-bold' : 'text-stone-500 hover:text-[#B58E3E]' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span class="text-[9px]">{{ __('frontend.nav.home') }}</span>
    </a>

    <!-- Catalog -->
    <a href="{{ route('products.index') }}"
        class="flex flex-col items-center gap-0.5 {{ request()->routeIs('products.index') || request()->has('category') ? 'text-[#B58E3E] font-bold' : 'text-stone-500 hover:text-[#B58E3E]' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
        </svg>
        <span class="text-[9px]">{{ __('frontend.categories.title') }}</span>
    </a>

    <!-- Wishlist / Favorites -->
    <a href="{{ route('wishlist.index') }}"
        class="relative flex flex-col items-center gap-0.5 {{ request()->routeIs('wishlist.index') ? 'text-[#B58E3E] font-bold' : 'text-stone-500 hover:text-[#B58E3E]' }}">
        <svg class="w-5 h-5" fill="{{ request()->routeIs('wishlist.index') ? 'currentColor' : 'none' }}"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
        <span
            class="wishlist-badge-count absolute -top-1 right-2 w-3.5 h-3.5 bg-[#B58E3E] text-white text-[8px] font-black rounded-full flex items-center justify-center">2</span>
        <span class="text-[9px]">{{ __('frontend.header.wishlist') }}</span>
    </a>

    <!-- Cart -->
    <a href="{{ route('cart.index') }}"
        class="relative flex flex-col items-center gap-0.5 {{ request()->routeIs('cart.index') ? 'text-[#B58E3E] font-bold' : 'text-stone-500 hover:text-[#B58E3E]' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
        <span
            class="absolute -top-1 right-2 w-3.5 h-3.5 bg-[#B58E3E] text-white text-[8px] font-black rounded-full flex items-center justify-center">3</span>
        <span class="text-[9px]">{{ __('frontend.header.cart') }}</span>
    </a>

    <!-- User Account / Login -->
    <a href="{{ route('login') }}"
        class="flex flex-col items-center gap-0.5 {{ request()->routeIs('login') || request()->routeIs('register') || request()->routeIs('account.dashboard') ? 'text-[#B58E3E] font-bold' : 'text-stone-500 hover:text-[#B58E3E]' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        <span class="text-[9px]">{{ __('frontend.header.account') }}</span>
    </a>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Language Switcher Dropdown
        const langBtn = document.getElementById('lang-menu-btn');
        const langDropdown = document.getElementById('lang-dropdown');
        if (langBtn && langDropdown) {
            langBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                langDropdown.classList.toggle('hidden');
                // Close user auth dropdown if open
                const userDropdown = document.getElementById('user-auth-dropdown');
                if (userDropdown) userDropdown.classList.add('hidden');
            });
            document.addEventListener('click', function() {
                if (!langDropdown.classList.contains('hidden')) {
                    langDropdown.classList.add('hidden');
                }
            });
        }

        // User Auth Dropdown (Login / Register)
        const userBtn = document.getElementById('user-auth-menu-btn');
        const userDropdown = document.getElementById('user-auth-dropdown');
        if (userBtn && userDropdown) {
            userBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                userDropdown.classList.toggle('hidden');
                // Close lang dropdown if open
                if (langDropdown) langDropdown.classList.add('hidden');
            });
            document.addEventListener('click', function(e) {
                if (!userDropdown.contains(e.target) && !userBtn.contains(e.target)) {
                    userDropdown.classList.add('hidden');
                }
            });
        }

        // Mobile Drawer
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
