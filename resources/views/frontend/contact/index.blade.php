@extends('frontend.layouts.app')

@section('title', __('frontend.contact.title') . ' - Liva Luxury Skincare')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-16 space-y-12 sm:space-y-16">

    <!-- Breadcrumb & Header -->
    <div class="text-center max-w-2xl mx-auto">
        <nav class="flex items-center justify-center gap-2 text-xs text-stone-500 mb-4">
            <a href="{{ route('home') }}" class="hover:text-[#B58E3E] transition-colors">{{ __('frontend.nav.home') }}</a>
            <span>/</span>
            <span class="text-[#B58E3E] font-bold">{{ __('frontend.nav.contact') }}</span>
        </nav>

        <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-[#F5EFEB] border border-[#EADFC7] text-[#997528] text-xs font-bold uppercase tracking-wider mb-3">
            <span>📞</span>
            <span>Concierge Service</span>
        </div>

        <h1 class="text-2xl sm:text-4xl font-black font-brand text-stone-900 tracking-tight">
            {{ __('frontend.contact.title') }}
        </h1>
        <p class="text-xs sm:text-sm text-stone-600 mt-2 leading-relaxed">
            {{ __('frontend.contact.subtitle') }}
        </p>
    </div>

    <!-- Contact Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Telegram Support -->
        <a href="https://t.me/livaskincare" target="_blank" rel="noopener noreferrer" 
           class="group bg-white rounded-3xl p-6 border border-[#EADFC7] hover:border-[#229ED9] hover:shadow-xl transition-all flex flex-col justify-between">
            <div>
                <div class="w-12 h-12 rounded-2xl bg-[#229ED9]/10 text-[#229ED9] flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.196 1.006.128.832.942z"/></svg>
                </div>
                <h3 class="font-bold text-stone-900 text-sm mb-1 group-hover:text-[#229ED9] transition-colors">
                    {{ __('frontend.contact.telegram') }}
                </h3>
                <p class="text-xs text-stone-500 mb-4">Instant chat & order assist</p>
            </div>
            <div class="text-xs font-bold text-[#229ED9] flex items-center gap-1">
                <span>@livaskincare</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </div>
        </a>

        <!-- Facebook Messenger -->
        <a href="https://m.me/livaskincare" target="_blank" rel="noopener noreferrer" 
           class="group bg-white rounded-3xl p-6 border border-[#EADFC7] hover:border-[#0084FF] hover:shadow-xl transition-all flex flex-col justify-between">
            <div>
                <div class="w-12 h-12 rounded-2xl bg-[#0084FF]/10 text-[#0084FF] flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 4.974 0 11.111c0 3.498 1.744 6.614 4.469 8.654V24l4.088-2.242c1.082.3 2.23.464 3.443.464 6.627 0 12-4.975 12-11.111C24 4.974 18.627 0 12 0zm1.191 14.963l-3.056-3.259-5.963 3.259 6.559-6.963 3.13 3.259 5.889-3.259-6.559 6.963z"/></svg>
                </div>
                <h3 class="font-bold text-stone-900 text-sm mb-1 group-hover:text-[#0084FF] transition-colors">
                    {{ __('frontend.contact.facebook') }}
                </h3>
                <p class="text-xs text-stone-500 mb-4">Beauty consultations & live updates</p>
            </div>
            <div class="text-xs font-bold text-[#0084FF] flex items-center gap-1">
                <span>m.me/livaskincare</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </div>
        </a>

        <!-- Phone / Hotline -->
        <a href="tel:+85523888999" 
           class="group bg-white rounded-3xl p-6 border border-[#EADFC7] hover:border-[#B58E3E] hover:shadow-xl transition-all flex flex-col justify-between">
            <div>
                <div class="w-12 h-12 rounded-2xl bg-[#F5EFEB] text-[#B58E3E] flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <h3 class="font-bold text-stone-900 text-sm mb-1 group-hover:text-[#B58E3E] transition-colors">
                    {{ __('frontend.contact.phone_title') }}
                </h3>
                <p class="text-xs text-stone-500 mb-4">{{ __('frontend.contact.hours_desc') }}</p>
            </div>
            <div class="text-xs font-bold text-[#B58E3E] flex items-center gap-1">
                <span>+855 23 888 999</span>
            </div>
        </a>

        <!-- Flagship Boutique -->
        <div class="bg-white rounded-3xl p-6 border border-[#EADFC7] hover:shadow-xl transition-all flex flex-col justify-between">
            <div>
                <div class="w-12 h-12 rounded-2xl bg-[#F5EFEB] text-[#B58E3E] flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-bold text-stone-900 text-sm mb-1">
                    {{ __('frontend.contact.office_title') }}
                </h3>
                <p class="text-xs text-stone-500 mb-4">{{ __('frontend.contact.office_address') }}</p>
            </div>
            <div class="text-xs font-bold text-stone-700">
                <span>BKK1, Phnom Penh</span>
            </div>
        </div>

    </div>

    <!-- Contact Form & Map Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Contact Form -->
        <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-10 border border-[#EADFC7] shadow-sm">
            <h2 class="text-xl sm:text-2xl font-black font-brand text-stone-900 mb-1">
                {{ __('frontend.contact.form_title') }}
            </h2>
            <p class="text-xs sm:text-sm text-stone-500 mb-6">
                {{ __('frontend.contact.form_subtitle') }}
            </p>

            <form onsubmit="handleContactSubmit(event)" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-stone-700 mb-1.5">{{ __('frontend.contact.form_name') }} *</label>
                        <input type="text" 
                               required 
                               placeholder="e.g. Serey Panha" 
                               class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl px-4 py-2.5 text-xs text-stone-900 focus:outline-none focus:border-[#B58E3E] focus:bg-white transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-stone-700 mb-1.5">{{ __('frontend.contact.form_phone') }} *</label>
                        <input type="tel" 
                               required 
                               placeholder="e.g. 012 345 678" 
                               class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl px-4 py-2.5 text-xs text-stone-900 focus:outline-none focus:border-[#B58E3E] focus:bg-white transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-stone-700 mb-1.5">{{ __('frontend.contact.form_email') }} (Optional)</label>
                    <input type="email" 
                           placeholder="e.g. panha@gmail.com" 
                           class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl px-4 py-2.5 text-xs text-stone-900 focus:outline-none focus:border-[#B58E3E] focus:bg-white transition-all">
                </div>

                <div>
                    <label class="block text-xs font-bold text-stone-700 mb-1.5">{{ __('frontend.contact.form_subject') }}</label>
                    <select class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl px-4 py-2.5 text-xs text-stone-900 focus:outline-none focus:border-[#B58E3E] focus:bg-white transition-all">
                        <option>Product Recommendation & Skin Consultation</option>
                        <option>Order Status & Delivery Tracking</option>
                        <option>Payment & ABA KHQR Assistance</option>
                        <option>Wholesale & Boutique Partnership</option>
                        <option>Other Inquiries</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-stone-700 mb-1.5">{{ __('frontend.contact.form_message') }} *</label>
                    <textarea required 
                              rows="4" 
                              placeholder="How may our skincare concierge assist you today?"
                              class="w-full bg-[#FAF7F2] border border-[#EADFC7] rounded-xl px-4 py-2.5 text-xs text-stone-900 focus:outline-none focus:border-[#B58E3E] focus:bg-white transition-all"></textarea>
                </div>

                <button type="submit" 
                        class="w-full py-3.5 rounded-full bg-gradient-to-r from-[#B58E3E] to-[#C5A059] text-white text-xs sm:text-sm font-bold shadow-md shadow-[#B58E3E]/20 hover:from-[#997528] hover:to-[#B58E3E] transition-all flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    <span>{{ __('frontend.contact.form_send') }}</span>
                </button>
            </form>
        </div>

        <!-- Right Side: Luxury Assurance & Map -->
        <div class="lg:col-span-5 space-y-6">
            
            <div class="bg-gradient-to-br from-[#FAF7F2] to-[#F5EFEB] rounded-3xl p-6 sm:p-8 border border-[#EADFC7]">
                <h3 class="font-extrabold font-brand text-stone-900 text-lg mb-3">
                    Concierge Hours & Direct Assistance
                </h3>
                <div class="space-y-3 text-xs text-stone-600">
                    <div class="flex items-start gap-3">
                        <span class="text-[#B58E3E] font-bold">●</span>
                        <div>
                            <strong class="text-stone-800">Direct Delivery Coverage:</strong>
                            <p class="mt-0.5">Phnom Penh same-day dispatch. 1-2 days for all Cambodian provinces via J&T Express / Virak Buntham.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-[#B58E3E] font-bold">●</span>
                        <div>
                            <strong class="text-stone-800">Personalized Skin Analysis:</strong>
                            <p class="mt-0.5">Send a selfie to our Telegram beauty advisor for a custom morning & evening routine recommendation.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-[#B58E3E] font-bold">●</span>
                        <div>
                            <strong class="text-stone-800">VIP Order Tracking:</strong>
                            <p class="mt-0.5">Receive immediate ABA KHQR payment receipts and live courier dispatch SMS updates.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Boutique Image / Map Card -->
            <div class="rounded-3xl overflow-hidden border border-[#EADFC7] bg-white p-5 shadow-sm space-y-3">
                <div class="aspect-16/9 rounded-2xl bg-[#FAF7F2] overflow-hidden relative">
                    <img src="{{ asset('img/hero.png') }}" alt="Liva Flagship Store" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-stone-950/40 flex items-center justify-center">
                        <span class="px-4 py-2 rounded-full bg-white/90 backdrop-blur-xs text-xs font-bold text-stone-900 shadow-md">
                            📍 Flagship Boutique – BKK1
                        </span>
                    </div>
                </div>
                <div class="flex items-center justify-between text-xs text-stone-500 pt-1">
                    <span>Mon - Sun: 8:30 AM - 8:00 PM</span>
                    <a href="https://maps.google.com" target="_blank" class="text-[#B58E3E] font-bold hover:underline">View on Map →</a>
                </div>
            </div>

        </div>

    </div>

</div>

@push('scripts')
<script>
    function handleContactSubmit(e) {
        e.preventDefault();
        showToast('{{ __('frontend.contact.title') }}', '{{ __('frontend.contact.form_success') }}');
        e.target.reset();
    }
</script>
@endpush
@endsection

