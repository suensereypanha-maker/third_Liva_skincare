<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Liva Luxury Skincare - ' . __('frontend.brand.tagline'))</title>

    <!-- Google Fonts for English (Plus Jakarta Sans & Playfair Display) and Khmer (Kantumruy Pro) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles & Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: {{ app()->getLocale() === 'km' ? "'Kantumruy Pro', sans-serif" : "'Plus Jakarta Sans', sans-serif" }};
        }
        .font-brand {
            font-family: 'Playfair Display', Georgia, serif;
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#FAF7F2] text-[#292524] antialiased min-h-screen flex flex-col selection:bg-[#B58E3E] selection:text-white">

    <!-- Header Navigation -->
    @include('frontend.layouts.header')

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Global Footer -->
    @include('frontend.layouts.footer')

    <!-- Floating Contact Widget (Telegram, Facebook Messenger, Chat - Matching Image 2 annotation) -->
    <div class="fixed bottom-16 sm:bottom-6 right-4 sm:right-6 z-40" id="floating-contact-container">
        
        <!-- Contact Menu Options (Telegram / Facebook) -->
        <div id="contact-popup-menu" class="hidden mb-3 space-y-2 flex flex-col items-end animate-in fade-in slide-in-from-bottom-2">
            
            <!-- Telegram Contact -->
            <a href="https://t.me/livaskincare" target="_blank" rel="noopener noreferrer" 
               class="flex items-center gap-3 px-4 py-2.5 rounded-full bg-white text-gray-800 shadow-xl border border-[#EADFC7] hover:border-[#B58E3E] hover:scale-105 transition-all text-xs font-bold group">
                <span class="text-gray-700 group-hover:text-[#B58E3E] transition-colors">{{ __('frontend.contact.telegram') }}</span>
                <div class="w-8 h-8 rounded-full bg-[#229ED9] text-white flex items-center justify-center shadow-sm">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.196 1.006.128.832.942z"/>
                    </svg>
                </div>
            </a>

            <!-- Facebook Messenger Contact -->
            <a href="https://m.me/livaskincare" target="_blank" rel="noopener noreferrer" 
               class="flex items-center gap-3 px-4 py-2.5 rounded-full bg-white text-gray-800 shadow-xl border border-[#EADFC7] hover:border-[#B58E3E] hover:scale-105 transition-all text-xs font-bold group">
                <span class="text-gray-700 group-hover:text-[#B58E3E] transition-colors">{{ __('frontend.contact.facebook') }}</span>
                <div class="w-8 h-8 rounded-full bg-[#0084FF] text-white flex items-center justify-center shadow-sm">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M12 0C5.373 0 0 4.974 0 11.111c0 3.498 1.744 6.614 4.469 8.654V24l4.088-2.242c1.092.303 2.246.464 3.443.464 6.627 0 12-4.975 12-11.111C24 4.974 18.627 0 12 0zm1.191 14.963l-3.056-3.26-5.963 3.26 6.556-6.963 3.13 3.259 5.89-3.259-6.557 6.963z"/>
                    </svg>
                </div>
            </a>

        </div>

        <!-- Main Trigger Button -->
        <button type="button" 
                id="floating-contact-btn"
                title="{{ __('frontend.contact.contact_us') }}"
                class="w-13 h-13 sm:w-14 sm:h-14 rounded-full bg-gradient-to-tr from-[#997528] via-[#B58E3E] to-[#C5A059] text-white flex items-center justify-center shadow-xl shadow-stone-800/25 hover:scale-108 active:scale-95 transition-all duration-300 group border-2 border-white/60">
            <svg id="contact-icon-chat" class="w-6 h-6 transform group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <svg id="contact-icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span class="absolute -top-1 -right-1 w-3.5 h-3.5 bg-emerald-400 border-2 border-white rounded-full"></span>
        </button>
    </div>

    <!-- Toast Notification Container (Gold & Ivory Luxury Theme) -->
    <div id="liva-toast" class="fixed top-6 right-6 z-50 transform translate-x-full opacity-0 transition-all duration-300 pointer-events-none">
        <div class="bg-white/95 backdrop-blur-md border border-[#EADFC7] text-gray-900 px-5 py-3.5 rounded-2xl shadow-2xl flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-[#FAF7F2] text-[#B58E3E] border border-[#EADFC7] flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div>
                <p id="liva-toast-title" class="font-bold text-sm text-gray-900"></p>
                <p id="liva-toast-msg" class="text-xs text-stone-500"></p>
            </div>
        </div>
    </div>

    <script>
        function showToast(title, message) {
            const toast = document.getElementById('liva-toast');
            document.getElementById('liva-toast-title').textContent = title;
            document.getElementById('liva-toast-msg').textContent = message;
            toast.classList.remove('translate-x-full', 'opacity-0');
            toast.classList.add('translate-x-0', 'opacity-100');
            setTimeout(() => {
                toast.classList.remove('translate-x-0', 'opacity-100');
                toast.classList.add('translate-x-full', 'opacity-0');
            }, 3000);
        }

        // Global Wishlist Persistence & Synchronization (localStorage)
        function getWishlist() {
            try {
                const saved = localStorage.getItem('liva_wishlist');
                if (saved !== null) {
                    return JSON.parse(saved);
                }
            } catch (e) {}
            return ['liva-night-cream', 'liva-brightening-serum'];
        }

        function saveWishlist(items) {
            try {
                localStorage.setItem('liva_wishlist', JSON.stringify(items));
            } catch (e) {}
            updateWishlistBadges(items.length);
        }

        function updateWishlistBadges(count) {
            document.querySelectorAll('.wishlist-badge-count').forEach(el => {
                el.textContent = count;
                if (count > 0) {
                    el.style.display = 'flex';
                } else {
                    el.style.display = 'none';
                }
            });
        }

        function syncWishlistIcons() {
            const list = getWishlist();
            updateWishlistBadges(list.length);
            document.querySelectorAll('.wishlist-toggle-btn').forEach(btn => {
                const slug = btn.getAttribute('data-wishlist-slug');
                const svg = btn.querySelector('svg');
                if (!slug || !svg) return;
                if (list.includes(slug)) {
                    btn.classList.add('text-[#B58E3E]');
                    btn.classList.remove('text-stone-700', 'text-stone-500');
                    svg.classList.add('fill-current');
                    svg.setAttribute('fill', 'currentColor');
                    svg.style.fill = 'currentColor';
                } else {
                    btn.classList.remove('text-[#B58E3E]');
                    btn.classList.add('text-stone-700');
                    svg.classList.remove('fill-current');
                    svg.setAttribute('fill', 'none');
                    svg.style.fill = 'none';
                }
            });
        }

        function toggleWishlist(slug, name, btnEl) {
            let list = getWishlist();
            const idx = list.indexOf(slug);
            const isAdded = idx === -1;
            if (isAdded) {
                list.push(slug);
                showToast('{{ __('frontend.header.wishlist') }}', 'Added ' + name + ' to favorites');
            } else {
                list.splice(idx, 1);
                showToast('{{ __('frontend.header.wishlist') }}', 'Removed ' + name + ' from favorites');
            }
            saveWishlist(list);
            syncWishlistIcons();
            if (typeof window.syncWishlistPage === 'function') {
                window.syncWishlistPage(isAdded ? null : slug);
            }
            if (typeof window.syncCartFavorites === 'function') {
                window.syncCartFavorites();
            }
        }

        // Floating contact toggle (Telegram & Facebook)
        document.addEventListener('DOMContentLoaded', function () {
            syncWishlistIcons();
            const contactBtn = document.getElementById('floating-contact-btn');
            const popup = document.getElementById('contact-popup-menu');
            const iconChat = document.getElementById('contact-icon-chat');
            const iconClose = document.getElementById('contact-icon-close');

            if (contactBtn && popup) {
                contactBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    popup.classList.toggle('hidden');
                    iconChat.classList.toggle('hidden');
                    iconClose.classList.toggle('hidden');
                });

                document.addEventListener('click', function (e) {
                    if (!popup.contains(e.target) && !contactBtn.contains(e.target)) {
                        popup.classList.add('hidden');
                        iconChat.classList.remove('hidden');
                        iconClose.classList.add('hidden');
                    }
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
