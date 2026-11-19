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

       

        <h1 class="text-2xl sm:text-4xl font-black font-brand text-stone-900 tracking-tight">
            {{ __('frontend.contact.title') }}
        </h1>
        <p class="text-xs sm:text-sm text-stone-600 mt-2 leading-relaxed">
            {{ __('frontend.contact.subtitle') }}
        </p>
    </div>

    <!-- Contact Cards Grid -->
   

    <!-- Contact Form & Map Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Contact Form -->
        <div class="lg:col-span-7 rounded-3xl p-6 sm:p-10 ">
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
            
            <div class="bg-gradient-to-br  p-6 sm:p-8 ">
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
            <div class=" overflow-hidden  p-5  space-y-3">
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

