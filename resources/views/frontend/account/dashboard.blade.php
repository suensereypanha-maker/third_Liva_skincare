@extends('frontend.layouts.app')

@section('title', __('frontend.dashboard.title') . ' - Liva Luxury Skincare')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pb-24 sm:pb-12">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left Column: User Profile Card & Navigation -->
        <aside class="lg:col-span-3 space-y-6">
            
            <!-- User Profile Summary Card -->
            <div class="bg-white rounded-3xl p-6 border border-[#EADFC7] shadow-sm text-center">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    <img src="{{ $user['avatar'] ?? asset('img/liva/user-avatar.jpg') }}" 
                         alt="{{ $user['name'] }}" 
                         class="w-full h-full rounded-full object-cover border-4 border-[#EADFC7] shadow-md"
                         onerror="this.src='https://ui-avatars.com/api/?name=Panha&background=B58E3E&color=fff'">
                    <span class="absolute bottom-0 right-0 w-5 h-5 bg-emerald-500 border-2 border-white rounded-full"></span>
                </div>
                <h3 class="font-black font-brand text-stone-900 text-lg">
                    {{ app()->getLocale() === 'km' && !empty($user['name_km']) ? $user['name_km'] : $user['name'] }}
                </h3>
                <p class="text-xs text-stone-400 mt-0.5">{{ $user['email'] }}</p>
                <div class="mt-3">
                    <span class="inline-block px-3 py-1 rounded-full bg-[#FAF7F2] text-[#B58E3E] border border-[#EADFC7] text-[10px] font-bold uppercase tracking-wider">
                        VIP Gold Member
                    </span>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="bg-white rounded-3xl p-4 border border-[#EADFC7] shadow-sm space-y-1 text-xs sm:text-sm font-semibold">
                
                <a href="{{ route('account.dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-[#F5EFEB] text-[#B58E3E] font-bold border border-[#EADFC7] shadow-xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                    <span>{{ __('frontend.dashboard.nav_dashboard') }}</span>
                </a>

                <a href="#orders" 
                   class="flex items-center gap-3 px-4 py-3 rounded-2xl text-stone-600 hover:text-[#B58E3E] hover:bg-[#FAF7F2] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                    <span>{{ __('frontend.dashboard.nav_orders') }}</span>
                </a>

                <a href="#wishlist" 
                   class="flex items-center gap-3 px-4 py-3 rounded-2xl text-stone-600 hover:text-[#B58E3E] hover:bg-[#FAF7F2] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                    <span>{{ __('frontend.dashboard.nav_wishlist') }}</span>
                    <span class="ml-auto bg-[#F5EFEB] text-[#B58E3E] text-[10px] font-bold px-2 py-0.5 rounded-full border border-[#EADFC7]">2</span>
                </a>

                <a href="#address" 
                   class="flex items-center gap-3 px-4 py-3 rounded-2xl text-stone-600 hover:text-[#B58E3E] hover:bg-[#FAF7F2] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    <span>{{ __('frontend.dashboard.nav_address') }}</span>
                </a>

                <a href="#settings" 
                   class="flex items-center gap-3 px-4 py-3 rounded-2xl text-stone-600 hover:text-[#B58E3E] hover:bg-[#FAF7F2] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    <span>{{ __('frontend.dashboard.nav_settings') }}</span>
                </a>

                <div class="pt-2 border-t border-[#F5EFEB]">
                    <a href="{{ route('home') }}" 
                       class="flex items-center gap-3 px-4 py-2.5 rounded-2xl text-stone-600 hover:text-red-600 hover:bg-stone-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                        <span>{{ __('frontend.dashboard.nav_logout') }}</span>
                    </a>
                </div>

            </div>

        </aside>

        <!-- Right Main Dashboard Content Area -->
        <main class="lg:col-span-9 space-y-8">
            
            <!-- Welcome Header -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-[#EADFC7] shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-black font-brand text-stone-900 tracking-tight">
                        {{ __('frontend.dashboard.title') }}
                    </h1>
                    <p class="text-xs sm:text-sm text-stone-500 mt-1">
                        {{ __('frontend.dashboard.welcome', ['name' => $user['name']]) }} ✦
                    </p>
                </div>

                <a href="{{ route('products.index') }}" class="px-6 py-2.5 rounded-full bg-gradient-to-r from-[#B58E3E] to-[#C5A059] text-white text-xs font-bold shadow-md shadow-stone-800/10 hover:from-[#997528] hover:to-[#B58E3E] transition-all">
                    {{ __('frontend.hero.shop_now') }} →
                </a>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                
                <!-- Card 1: Total Orders -->
                <div class="bg-white rounded-3xl p-5 border border-[#EADFC7] shadow-sm text-center">
                    <div class="w-10 h-10 mx-auto rounded-2xl bg-[#FAF7F2] text-[#B58E3E] border border-[#EADFC7] flex items-center justify-center mb-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                    </div>
                    <span class="text-2xl font-black text-stone-900">{{ $stats['total_orders'] }}</span>
                    <span class="block text-[11px] text-stone-400 font-bold uppercase tracking-wider mt-0.5">
                        {{ __('frontend.dashboard.total_orders') }}
                    </span>
                </div>

                <!-- Card 2: Total Spent -->
                <div class="bg-white rounded-3xl p-5 border border-[#EADFC7] shadow-sm text-center">
                    <div class="w-10 h-10 mx-auto rounded-2xl bg-[#FAF7F2] text-[#B58E3E] border border-[#EADFC7] flex items-center justify-center mb-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <span class="text-2xl font-black text-stone-900">${{ number_format($stats['total_spent'], 2) }}</span>
                    <span class="block text-[11px] text-stone-400 font-bold uppercase tracking-wider mt-0.5">
                        {{ __('frontend.dashboard.total_spent') }}
                    </span>
                </div>

                <!-- Card 3: Wishlist Items -->
                <div class="bg-white rounded-3xl p-5 border border-[#EADFC7] shadow-sm text-center">
                    <div class="w-10 h-10 mx-auto rounded-2xl bg-[#FAF7F2] text-[#B58E3E] border border-[#EADFC7] flex items-center justify-center mb-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                    </div>
                    <span class="text-2xl font-black text-stone-900">{{ $stats['wishlist_items'] }}</span>
                    <span class="block text-[11px] text-stone-400 font-bold uppercase tracking-wider mt-0.5">
                        {{ __('frontend.dashboard.wishlist_items') }}
                    </span>
                </div>

                <!-- Card 4: Coupons -->
                <div class="bg-white rounded-3xl p-5 border border-[#EADFC7] shadow-sm text-center">
                    <div class="w-10 h-10 mx-auto rounded-2xl bg-[#FAF7F2] text-[#B58E3E] border border-[#EADFC7] flex items-center justify-center mb-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" /></svg>
                    </div>
                    <span class="text-2xl font-black text-stone-900">{{ $stats['coupons'] }}</span>
                    <span class="block text-[11px] text-stone-400 font-bold uppercase tracking-wider mt-0.5">
                        {{ __('frontend.dashboard.coupons') }}
                    </span>
                </div>

            </div>

            <!-- Promo Banner: Pure Radiance Every Day -->
            <div class="rounded-3xl bg-gradient-to-r from-[#1C1917] via-[#2A241F] to-[#1C1917] border border-[#3E3832] p-6 sm:p-8 flex items-center justify-between gap-6 relative overflow-hidden text-white shadow-md">
                <div class="space-y-1 relative z-10">
                    <span class="text-[10px] uppercase font-extrabold tracking-widest text-[#C5A059]">Liva VIP Elite</span>
                    <h3 class="text-2xl sm:text-3xl font-black font-brand text-[#FAF7F2] tracking-tight">
                        {{ __('frontend.dashboard.beauty_banner') }}
                    </h3>
                    <p class="text-xs text-[#EADFC7]/80 max-w-sm">
                        {{ __('frontend.brand.tagline') }}
                    </p>
                </div>
                <div class="relative z-10 flex-shrink-0">
                    <img src="{{ asset('img/liva/brand-logo.webp') }}" alt="LIVA" class="w-20 sm:w-24 h-auto object-contain">
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div id="orders" class="bg-white rounded-3xl p-6 sm:p-8 border border-[#EADFC7] shadow-sm space-y-4">
                <div class="flex items-center justify-between pb-4 border-b border-[#F5EFEB]">
                    <h3 class="font-extrabold font-brand text-base sm:text-lg text-stone-900">
                        {{ __('frontend.dashboard.recent_orders') }}
                    </h3>
                    <a href="#" class="text-xs font-bold text-[#B58E3E] hover:underline">
                        {{ __('frontend.dashboard.view_all') }} →
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs sm:text-sm">
                        <thead>
                            <tr class="text-stone-400 uppercase text-[10px] sm:text-xs tracking-wider border-b border-[#F5EFEB]">
                                <th class="pb-3">{{ __('frontend.dashboard.order_id') }}</th>
                                <th class="pb-3">{{ __('frontend.dashboard.date') }}</th>
                                <th class="pb-3">{{ __('frontend.dashboard.status') }}</th>
                                <th class="pb-3">{{ __('frontend.dashboard.total') }}</th>
                                <th class="pb-3 text-right">{{ __('frontend.dashboard.action') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#F5EFEB] text-stone-700 font-medium">
                            @foreach($recentOrders as $ro)
                                <tr class="hover:bg-[#FAF7F2] transition-colors">
                                    <td class="py-4 font-black text-stone-900">{{ $ro['id'] }}</td>
                                    <td class="py-4 text-stone-500">{{ $ro['date'] }}</td>
                                    <td class="py-4">
                                        <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $ro['status'] === 'Processing' ? 'bg-[#F5EFEB] text-[#997528] border border-[#EADFC7]' : 'bg-emerald-50 text-emerald-700 border border-emerald-200' }}">
                                            {{ $ro['status'] }}
                                        </span>
                                    </td>
                                    <td class="py-4 font-black text-stone-900">${{ number_format($ro['total'], 2) }}</td>
                                    <td class="py-4 text-right">
                                        <a href="{{ route('order.success') }}" class="text-xs font-bold text-[#B58E3E] hover:underline">
                                            {{ __('frontend.dashboard.view_details') }} →
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </main>

    </div>

</div>
@endsection
