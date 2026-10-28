<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Rina Hazarika | Authentic Assamese Mekhela Sador & Traditional Bihu Ornaments')</title>
    <meta name="description" content="@yield('meta_description', 'Discover pure Muga Silk, Mulberry Paat, Organic Eri Handlooms, and handcrafted 24K gold-washed Gamkharu, Jonbiri, and Dholbiri ornaments from Assam.')">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="alternate icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FAF7F2] text-[#2D2825] flex flex-col min-h-screen antialiased selection:bg-[#B31B1B] selection:text-white">

    <!-- Simple Assamese Heritage Page Loader -->
    <div id="assamese-page-loader" class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-[#FAF7F2]/95 backdrop-blur-md transition-opacity duration-300">
        <div class="relative flex flex-col items-center">
            <!-- Spinning Golden Ring with Jaapi Motif -->
            <div class="relative w-20 h-20 sm:w-24 sm:h-24 flex items-center justify-center">
                <div class="absolute inset-0 rounded-full border-2 border-dashed border-[#D4AF37] animate-spin" style="animation-duration: 5s;"></div>
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-full bg-[#1E0C0E] border-2 border-[#D4AF37] p-2.5 shadow-xl flex items-center justify-center animate-pulse">
                    <img src="{{ asset('images/motifs/jaapi.svg') }}" alt="Jaapi Loader" class="w-full h-full object-contain filter invert drop-shadow">
                </div>
            </div>

            <!-- Assamese Heritage Calligraphy & Status -->
            <div class="mt-4 text-center">
                <div class="font-royal text-sm sm:text-base font-bold text-[#1E0C0E] tracking-widest uppercase">
                    ৰীণা হাজৰিকা
                </div>
                <div class="text-[10px] sm:text-xs text-[#B31B1B] font-semibold mt-0.5 tracking-wider">
                    AXOMIYA BASTRA &amp; ALONKAR
                </div>
                <div class="text-[11px] text-[#9B7616] mt-2 flex items-center justify-center gap-1.5 font-medium">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-[#D72638] animate-ping"></span>
                    <span id="assamese-loader-text">অসমীয়া ঐতিহ্য ক্ৰাফ্টিং...</span>
                </div>
            </div>

            <!-- Gamusa Strip Progress Bar -->
            <div class="w-36 h-1.5 bg-[#E0D3C1] rounded-full overflow-hidden mt-3 shadow-inner">
                <div class="h-full bg-gradient-to-r from-[#D4AF37] via-[#B31B1B] to-[#D4AF37] rounded-full animate-pulse"></div>
            </div>
        </div>
    </div>

    <!-- Traditional Gamusa Ribbon Strip -->
    <div class="gamusa-ribbon"></div>

    <!-- Announcement Bar -->
    <aside aria-label="Announcement" class="bg-[#1E0C0E] text-[#F5E5B4] text-[10px] sm:text-xs py-1.5 sm:py-2 px-2.5 sm:px-4 border-b border-[#D4AF37]/20 overflow-hidden">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-1 text-center sm:text-left">
            <div class="flex items-center justify-center gap-1.5 flex-wrap">
                <span class="inline-block w-1.5 h-1.5 rounded-full bg-[#D72638] animate-ping flex-shrink-0"></span>
                <span class="font-medium tracking-wide">🌺 RONGALI BIHU: USE CODE <span class="text-white font-bold bg-[#B31B1B] px-1 py-0.5 rounded text-[9px] sm:text-[10px]">BIHU2026</span> FOR 10% OFF</span>
            </div>
            <div class="hidden sm:flex items-center gap-4 text-[11px] text-[#ECE2D0]">
                <span class="hidden md:inline">✦ 100% Silk Mark Certified</span>
                <span class="hidden md:inline">✦ Handcrafted in Sualkuchi & Ranthali</span>
                <a href="{{ route('contact') }}" class="underline hover:text-white transition">Custom Bridal Booking</a>
            </div>
        </div>
    </aside>

    <!-- Main Navigation Bar -->
    <header class="sticky top-0 z-50 bg-[#FAF7F2]/95 backdrop-blur-md border-b border-[#EFE8DC] transition-shadow duration-300 shadow-xs">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20 gap-3 xl:gap-6">
                
                <!-- Brand / Logo -->
                <div class="flex items-center gap-1.5 sm:gap-3 flex-shrink-0">
                    <button type="button" id="mobile-menu-btn" class="lg:hidden p-1.5 rounded-lg text-gray-700 hover:text-[#B31B1B] hover:bg-[#F4ECE1] focus:outline-none flex-shrink-0" aria-label="Open Menu">
                        <svg class="w-5.5 h-5.5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    
                    <a href="{{ route('home') }}" class="group flex items-center gap-2 sm:gap-3 flex-shrink-0">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#1E0C0E] border-2 border-[#D4AF37] flex items-center justify-center p-1 sm:p-1.5 shadow-xs group-hover:scale-105 transition-transform flex-shrink-0">
                            <img src="{{ asset('images/motifs/jaapi.svg') }}" alt="Assamese Jaapi Motif" class="w-full h-full object-contain filter invert drop-shadow">
                        </div>
                        <div class="flex flex-col flex-shrink-0">
                            <span class="font-royal font-bold text-sm sm:text-lg xl:text-xl text-[#1E0C0E] tracking-tight sm:tracking-wider leading-none whitespace-nowrap">
                                RINA HAZARIKA
                            </span>
                            <span class="hidden sm:block text-[9px] sm:text-[10px] font-semibold text-[#B31B1B] tracking-wider uppercase mt-1 whitespace-nowrap">
                                ৰীণা হাজৰিকা • Axomiya Bastra & Alonkar
                            </span>
                            <span class="sm:hidden text-[9px] font-semibold text-[#B31B1B] uppercase tracking-wide truncate">
                                হস্ততাঁত আৰু অলংকাৰ
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center gap-3 xl:gap-6 text-xs xl:text-sm font-medium text-[#4A3E38] whitespace-nowrap flex-shrink-0">
                    <a href="{{ route('home') }}" class="hover:text-[#B31B1B] transition {{ request()->routeIs('home') ? 'text-[#B31B1B] font-semibold' : '' }}">Home</a>
                    <a href="{{ route('shop', ['category' => 'mekhela-sador']) }}" class="hover:text-[#B31B1B] transition {{ request()->input('category') == 'mekhela-sador' ? 'text-[#B31B1B] font-semibold' : '' }}">Mekhela Sador</a>
                    <a href="{{ route('shop', ['category' => 'traditional-ornaments']) }}" class="hover:text-[#B31B1B] transition {{ request()->input('category') == 'traditional-ornaments' ? 'text-[#B31B1B] font-semibold' : '' }}">Bihu Ornaments</a>
                    <a href="{{ route('shop', ['category' => 'eri-handloom']) }}" class="hover:text-[#B31B1B] transition {{ request()->input('category') == 'eri-handloom' ? 'text-[#B31B1B] font-semibold' : '' }}">Eri Silk</a>
                    <a href="{{ route('heritage') }}" class="hover:text-[#B31B1B] transition {{ request()->routeIs('heritage') ? 'text-[#B31B1B] font-semibold' : '' }}"><span class="hidden xl:inline">Our </span>Heritage</a>
                    <a href="{{ route('contact') }}" class="hover:text-[#B31B1B] transition {{ request()->routeIs('contact') ? 'text-[#B31B1B] font-semibold' : '' }}">Custom<span class="hidden xl:inline"> Order</span></a>
                </nav>

                <!-- Search, Wishlist & Cart Actions -->
                <div class="flex items-center gap-2 sm:gap-3 flex-shrink-0">
                    
                    <!-- Search Bar Toggle / Form -->
                    <form action="{{ route('shop') }}" method="GET" class="hidden md:flex items-center relative">
                        <input type="text" name="q" value="{{ request('q') }}" placeholder="Search..." 
                               class="text-xs bg-[#F4ECE1]/80 hover:bg-[#F4ECE1] focus:bg-white border border-[#E0D3C1] focus:border-[#C59B27] rounded-full pl-8 pr-3 py-1.5 w-24 lg:w-28 xl:w-44 focus:w-36 xl:focus:w-52 transition-all duration-300 focus:outline-none focus:ring-1 focus:ring-[#C59B27]">
                        <svg class="w-3.5 h-3.5 text-[#7D5F10] absolute left-2.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 1114 0z"></path>
                        </svg>
                    </form>

                    <!-- Wishlist Icon -->
                    <a href="{{ route('wishlist.index') }}" class="relative p-2 text-[#4A3E38] hover:text-[#B31B1B] hover:bg-[#F4ECE1] rounded-full transition flex-shrink-0" title="Wishlist">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        <span id="nav-wishlist-count" class="absolute top-0 right-0 w-4 h-4 bg-[#C59B27] text-white text-[10px] font-bold rounded-full flex items-center justify-center {{ ($globalWishlistCount ?? 0) > 0 ? '' : 'hidden' }}">
                            {{ $globalWishlistCount ?? 0 }}
                        </span>
                    </a>

                    <!-- Cart Icon with Flyout Badge -->
                    <a href="{{ route('cart.index') }}" class="relative p-2 bg-[#1E0C0E] text-white hover:bg-[#B31B1B] rounded-full transition shadow-xs flex items-center justify-center group flex-shrink-0" title="Cart">
                        <svg class="w-5 h-5 group-hover:scale-105 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <span id="nav-cart-count" class="absolute -top-1 -right-1 w-5 h-5 bg-[#D72638] text-white text-[11px] font-bold rounded-full flex items-center justify-center border-2 border-[#FAF7F2]">
                            {{ $globalCartCount ?? 0 }}
                        </span>
                    </a>

                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation Drawer (Positioned outside header to avoid backdrop-filter containing block trap) -->
    <div id="mobile-drawer" class="fixed inset-0 z-[100] hidden">
        <!-- Backdrop Overlay -->
        <div id="mobile-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-xs transition-opacity duration-300"></div>
        
        <!-- Drawer Panel -->
        <div class="fixed top-0 bottom-0 left-0 w-[300px] max-w-[85vw] h-full bg-[#FAF7F2] shadow-2xl flex flex-col justify-between overflow-y-auto z-10 border-r border-[#E0D3C1]">
            <div class="p-5 sm:p-6">
                <!-- Drawer Header -->
                <div class="flex items-center justify-between pb-4 border-b border-[#EFE8DC]">
                    <div class="flex items-center gap-2.5">
                        <div class="w-9 h-9 rounded-full bg-[#1E0C0E] border border-[#D4AF37] flex items-center justify-center p-1.5 shadow-xs">
                            <img src="{{ asset('images/motifs/jaapi.svg') }}" alt="Jaapi" class="w-full h-full object-contain filter invert">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-royal font-bold text-base text-[#1E0C0E] leading-tight">RINA HAZARIKA</span>
                            <span class="text-[9px] font-semibold text-[#B31B1B] uppercase tracking-wide">হস্ততাঁত আৰু অলংকাৰ</span>
                        </div>
                    </div>
                    <button type="button" id="close-drawer-btn" class="p-2 rounded-lg text-gray-500 hover:text-[#B31B1B] hover:bg-[#F4ECE1] transition focus:outline-none" aria-label="Close Menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <!-- Search Input -->
                <form action="{{ route('shop') }}" method="GET" class="mt-4">
                    <div class="relative">
                        <input type="text" name="q" placeholder="Search silk, ornaments..." 
                               class="w-full text-xs bg-white border border-[#E0D3C1] rounded-xl pl-9 pr-3 py-2.5 focus:outline-none focus:border-[#C59B27] shadow-xs">
                        <svg class="w-4 h-4 text-[#7D5F10] absolute left-3 top-3 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 1114 0z"></path>
                        </svg>
                    </div>
                </form>

                <!-- Navigation Links -->
                <div class="mt-5">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-[#9B7616] block mb-2 px-2">Collections & Ateliers</span>
                    <nav class="flex flex-col gap-1 text-xs font-medium text-[#4A3E38]">
                        <a href="{{ route('home') }}" class="py-2.5 px-3 rounded-xl hover:bg-[#F4ECE1] hover:text-[#B31B1B] flex items-center justify-between {{ request()->routeIs('home') ? 'bg-[#F4ECE1] text-[#B31B1B] font-bold' : '' }}">
                            <span class="flex items-center gap-2"><span>🏠</span> Home</span>
                        </a>
                        <a href="{{ route('shop', ['category' => 'mekhela-sador']) }}" class="py-2.5 px-3 rounded-xl hover:bg-[#F4ECE1] hover:text-[#B31B1B] flex items-center justify-between">
                            <span class="flex items-center gap-2"><span>🧵</span> Pure Muga & Paat</span>
                            <span class="text-[10px] text-[#9B7616]">মেখেলা চাদৰ</span>
                        </a>
                        <a href="{{ route('shop', ['category' => 'traditional-ornaments']) }}" class="py-2.5 px-3 rounded-xl hover:bg-[#F4ECE1] hover:text-[#B31B1B] flex items-center justify-between">
                            <span class="flex items-center gap-2"><span>✨</span> Bihu Ornaments</span>
                            <span class="text-[10px] text-[#9B7616]">অসমীয়া গহনা</span>
                        </a>
                        <a href="{{ route('shop', ['category' => 'eri-handloom']) }}" class="py-2.5 px-3 rounded-xl hover:bg-[#F4ECE1] hover:text-[#B31B1B] flex items-center justify-between">
                            <span class="flex items-center gap-2"><span>🌿</span> Eri Peace Silk</span>
                            <span class="text-[10px] text-[#9B7616]">এৰী কাপোৰ</span>
                        </a>
                        <a href="{{ route('heritage') }}" class="py-2.5 px-3 rounded-xl hover:bg-[#F4ECE1] hover:text-[#B31B1B] flex items-center justify-between {{ request()->routeIs('heritage') ? 'bg-[#F4ECE1] text-[#B31B1B] font-bold' : '' }}">
                            <span class="flex items-center gap-2"><span>🏛️</span> Sualkuchi & Ranthali</span>
                        </a>
                        <a href="{{ route('contact') }}" class="py-2.5 px-3 rounded-xl hover:bg-[#F4ECE1] hover:text-[#B31B1B] flex items-center justify-between {{ request()->routeIs('contact') ? 'bg-[#F4ECE1] text-[#B31B1B] font-bold' : '' }}">
                            <span class="flex items-center gap-2"><span>💌</span> Custom Loom Concierge</span>
                        </a>
                    </nav>
                </div>

                <!-- Quick Account / Wishlist / Cart Actions -->
                <div class="mt-5 pt-4 border-t border-[#EFE8DC]">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-[#9B7616] block mb-2 px-2">Saved & Orders</span>
                    <div class="space-y-1">
                        <a href="{{ route('wishlist.index') }}" class="py-2.5 px-3 rounded-xl hover:bg-[#F4ECE1] hover:text-[#B31B1B] flex items-center justify-between text-xs font-semibold text-[#4A3E38]">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#B31B1B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                <span>Wishlist</span>
                            </span>
                            <span id="mobile-wishlist-count" class="px-2 py-0.5 rounded-full bg-[#C59B27] text-white text-[10px] font-bold">{{ $globalWishlistCount ?? 0 }}</span>
                        </a>
                        <a href="{{ route('cart.index') }}" class="py-2.5 px-3 rounded-xl hover:bg-[#F4ECE1] hover:text-[#B31B1B] flex items-center justify-between text-xs font-semibold text-[#4A3E38]">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#1E0C0E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                <span>Cart Bag</span>
                            </span>
                            <span id="mobile-cart-count" class="px-2 py-0.5 rounded-full bg-[#D72638] text-white text-[10px] font-bold">{{ $globalCartCount ?? 0 }} items</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Drawer Footer -->
            <div class="p-5 border-t border-[#EFE8DC] bg-[#F6F1E9] text-[11px] text-[#7A6E68]">
                <div class="flex items-center gap-2 text-[#B31B1B] font-bold mb-1">
                    <img src="{{ asset('images/motifs/jaapi.svg') }}" alt="Jaapi" class="w-4 h-4">
                    <span>জয় আই অসম (Joy Aai Axom)</span>
                </div>
                <p class="leading-relaxed text-[10px]">
                    Direct from hereditary master artisans in Sualkuchi & Ranthali. 100% Silk Mark certified.
                </p>
            </div>
        </div>
    </div>

    <!-- Global Toast Notification Container -->
    <div id="toast-container" class="fixed bottom-6 right-6 z-50 flex flex-col gap-2 pointer-events-none"></div>

    <!-- Flash Messages -->
    <main class="flex-grow">
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="bg-[#F1F8F4] border-l-4 border-emerald-600 p-4 rounded-r-lg shadow-xs flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-sm font-medium text-emerald-900">{{ session('success') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-emerald-700 hover:text-emerald-900 text-xs font-bold uppercase">&times;</button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="bg-[#FFF1F1] border-l-4 border-[#B31B1B] p-4 rounded-r-lg shadow-xs flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#B31B1B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-sm font-medium text-[#911212]">{{ session('error') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-red-700 hover:text-red-900 text-xs font-bold uppercase">&times;</button>
                </div>
            </div>
        @endif

        @if(session('info'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="bg-[#FFF9EA] border-l-4 border-[#C59B27] p-4 rounded-r-lg shadow-xs flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#C59B27]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-sm font-medium text-[#7D5F10]">{{ session('info') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-[#7D5F10] hover:text-black text-xs font-bold uppercase">&times;</button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Traditional Motif Divider -->
    <div class="max-w-4xl mx-auto py-6 sm:py-8 px-4 flex items-center justify-center gap-2 sm:gap-4 text-[#D4AF37] overflow-hidden">
        <div class="h-px bg-gradient-to-r from-transparent via-[#D4AF37]/40 to-transparent flex-1"></div>
        <img src="{{ asset('images/motifs/kingkhap.svg') }}" alt="Kingkhap" class="w-6 h-6 sm:w-8 sm:h-8 opacity-60 flex-shrink-0">
        <span class="font-royal text-[10px] sm:text-xs tracking-wider sm:tracking-widest text-[#9B7616] uppercase font-semibold text-center whitespace-nowrap">Axomiya Bastra & Alonkar</span>
        <img src="{{ asset('images/motifs/jaapi.svg') }}" alt="Jaapi" class="w-6 h-6 sm:w-8 sm:h-8 opacity-60 flex-shrink-0">
        <div class="h-px bg-gradient-to-r from-transparent via-[#D4AF37]/40 to-transparent flex-1"></div>
    </div>

    <!-- Footer -->
    <footer class="bg-[#140708] text-[#ECE2D0] border-t border-[#D4AF37]/30 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-[#ECE2D0]/10">
                
                <!-- Brand Narrative -->
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-[#D4AF37]/10 border border-[#D4AF37] flex items-center justify-center p-2">
                            <img src="{{ asset('images/motifs/jaapi.svg') }}" alt="Jaapi" class="w-full h-full object-contain filter invert">
                        </div>
                        <span class="font-royal font-bold text-xl text-white tracking-wider">RINA HAZARIKA</span>
                    </div>
                    <p class="text-xs sm:text-sm text-[#D8CCA3] leading-relaxed mb-6 pr-4">
                        Dedicated to preserving the indigenous weaving traditions of Sualkuchi and the handcrafted royal jewellery of Ranthali & Barpeta. Every Mekhela Sador and Bihu ornament tells a sacred story of the Brahmaputra valley.
                    </p>
                    <div class="flex items-center gap-4 text-xs text-[#E5C158]">
                        <span class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-[#E5C158]"></span> 100% Silk Mark</span>
                        <span class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-[#E5C158]"></span> GI Protected Craft</span>
                        <span class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-[#E5C158]"></span> Pan-India Insured Shipping</span>
                    </div>
                </div>

                <!-- Collections -->
                <div>
                    <h3 class="font-royal text-sm font-semibold text-white tracking-wider uppercase mb-4 border-b border-[#D4AF37]/30 pb-2">Collections</h3>
                    <ul class="space-y-2 text-xs text-[#D8CCA3]">
                        <li><a href="{{ route('shop', ['category' => 'mekhela-sador']) }}" class="hover:text-white transition">Pure Muga Silk Sador</a></li>
                        <li><a href="{{ route('shop', ['category' => 'mekhela-sador']) }}" class="hover:text-white transition">Mulberry Paat Silk</a></li>
                        <li><a href="{{ route('shop', ['category' => 'eri-handloom']) }}" class="hover:text-white transition">Organic Eri (Peace Silk)</a></li>
                        <li><a href="{{ route('shop', ['category' => 'traditional-ornaments']) }}" class="hover:text-white transition">Gamkharu Clasp Bangles</a></li>
                        <li><a href="{{ route('shop', ['category' => 'traditional-ornaments']) }}" class="hover:text-white transition">Jonbiri & Dholbiri</a></li>
                        <li><a href="{{ route('shop', ['category' => 'bridal-heritage']) }}" class="hover:text-white transition">Bridal Trousseau Box</a></li>
                    </ul>
                </div>

                <!-- Heritage & Stories -->
                <div>
                    <h3 class="font-royal text-sm font-semibold text-white tracking-wider uppercase mb-4 border-b border-[#D4AF37]/30 pb-2">Craft & Roots</h3>
                    <ul class="space-y-2 text-xs text-[#D8CCA3]">
                        <li><a href="{{ route('heritage') }}#sualkuchi" class="hover:text-white transition">Sualkuchi Weaving Looms</a></li>
                        <li><a href="{{ route('heritage') }}#muga-story" class="hover:text-white transition">The Golden Muga Story</a></li>
                        <li><a href="{{ route('heritage') }}#ranthali" class="hover:text-white transition">Goldsmiths of Ranthali</a></li>
                        <li><a href="{{ route('heritage') }}#motifs" class="hover:text-white transition">Kingkhap & Japi Motifs</a></li>
                        <li><a href="{{ route('heritage') }}#bihu-traditions" class="hover:text-white transition">Bihu Attire Protocol</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition">Loom Visit Experience</a></li>
                    </ul>
                </div>

                <!-- Showroom & Help -->
                <div>
                    <h3 class="font-royal text-sm font-semibold text-white tracking-wider uppercase mb-4 border-b border-[#D4AF37]/30 pb-2">Concierge</h3>
                    <div class="space-y-3 text-xs text-[#D8CCA3]">
                        <p class="leading-relaxed"><strong class="text-white">Heritage Showroom:</strong><br>Gs Road, Near Christian Basti, Guwahati, Assam 781005</p>
                        <p><strong class="text-white">Weaving Loom Hub:</strong><br>Bhatipara, Sualkuchi, Kamrup, Assam</p>
                        <p><strong class="text-white">Helpline / WhatsApp:</strong><br><a href="tel:+919876543210" class="hover:text-white">+91 98765 43210</a></p>
                        <p><strong class="text-white">Email:</strong><br><a href="mailto:heritage@rinahazarika.com" class="hover:text-white">heritage@rinahazarika.com</a></p>
                    </div>
                </div>

            </div>

            <!-- Bottom Subfooter -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-[#A89C83]">
                <p>© {{ date('Y') }} Rina Hazarika — Axomiya Bastra & Alonkar. All Rights Reserved.</p>
                <div class="flex items-center gap-6">
                    <span class="text-[#D4AF37] font-semibold">অসম আমাৰ ৰূপহী (Axom Amar Rupohi)</span>
                    <a href="{{ route('heritage') }}" class="hover:text-white transition">Artisan Charter</a>
                    <a href="{{ route('contact') }}" class="hover:text-white transition">Authenticity Guarantee</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts for 2D UI Interactions & AJAX Cart/Wishlist -->
    <script>
        // Mobile Drawer Controller
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const closeBtn = document.getElementById('close-drawer-btn');
        const drawer = document.getElementById('mobile-drawer');
        const overlay = document.getElementById('mobile-overlay');

        function openDrawer() {
            drawer.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeDrawer() {
            drawer.classList.add('hidden');
            document.body.style.overflow = '';
        }

        if (mobileBtn) mobileBtn.addEventListener('click', openDrawer);
        if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
        if (overlay) overlay.addEventListener('click', closeDrawer);

        // Global Assamese Loader Functions
        window.showLoader = function(text = 'অসমীয়া ঐতিহ্য ক্ৰাফ্টিং...') {
            const loader = document.getElementById('assamese-page-loader');
            const txt = document.getElementById('assamese-loader-text');
            if (txt) txt.textContent = text;
            if (loader) {
                loader.classList.remove('opacity-0', 'pointer-events-none');
            }
        };

        window.hideLoader = function() {
            const loader = document.getElementById('assamese-page-loader');
            if (loader) {
                loader.classList.add('opacity-0', 'pointer-events-none');
            }
        };

        // Automatically hide loader when page finishes loading
        window.addEventListener('load', function() {
            setTimeout(window.hideLoader, 250);
        });
        // Safety fallback to guarantee page is interactive
        setTimeout(window.hideLoader, 1800);

        // Show loader on page transition links (except hash anchors, target="_blank", or javascript links)
        document.addEventListener('click', function(e) {
            const link = e.target.closest('a');
            if (!link) return;
            const href = link.getAttribute('href');
            if (
                href && 
                !href.startsWith('#') && 
                !href.startsWith('javascript:') && 
                !href.startsWith('mailto:') && 
                !href.startsWith('tel:') && 
                link.target !== '_blank' &&
                !e.ctrlKey && !e.metaKey && !e.shiftKey
            ) {
                // Only show for internal links
                if (href.startsWith('/') || href.startsWith(window.location.origin)) {
                    window.showLoader('Loading Traditional Collection...');
                }
            }
        });

        // Show loader on form submissions
        document.addEventListener('submit', function(e) {
            const form = e.target;
            if (!form.hasAttribute('data-no-loader')) {
                window.showLoader('Processing Authentic Request...');
            }
        });

        // Toast Notification Function with optional action link
        window.showToast = function(message, type = 'success', actionLink = null, actionText = 'View Bag') {
            const container = document.getElementById('toast-container');
            if (!container) return;

            const toast = document.createElement('div');
            toast.className = `pointer-events-auto flex items-center justify-between gap-3 px-4 py-3 rounded-xl shadow-2xl text-xs sm:text-sm font-medium transition-all duration-300 transform translate-y-4 opacity-0 border ${
                type === 'success' 
                    ? 'bg-[#1E0C0E] text-[#F5E5B4] border-[#D4AF37]/50' 
                    : 'bg-[#B31B1B] text-white border-red-800'
            }`;
            
            let actionHtml = '';
            if (actionLink) {
                actionHtml = `<a href="${actionLink}" class="ml-2 px-2.5 py-1 bg-[#D4AF37] hover:bg-[#C59B27] text-[#1E0C0E] text-[11px] font-bold rounded-lg uppercase tracking-wider transition whitespace-nowrap">${actionText} &rarr;</a>`;
            }

            toast.innerHTML = `
                <div class="flex items-center gap-2.5 min-w-0">
                    <svg class="w-5 h-5 flex-shrink-0 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="truncate">${message}</span>
                </div>
                ${actionHtml}
            `;

            container.appendChild(toast);

            requestAnimationFrame(() => {
                toast.classList.remove('translate-y-4', 'opacity-0');
            });

            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-2');
                setTimeout(() => toast.remove(), 300);
            }, 4000);
        };

        // Update All Wishlist Badges
        window.updateWishlistBadges = function(count) {
            const desktopBadge = document.getElementById('nav-wishlist-count');
            if (desktopBadge) {
                desktopBadge.textContent = count;
                if (count > 0) {
                    desktopBadge.classList.remove('hidden');
                } else {
                    desktopBadge.classList.add('hidden');
                }
            }
            const mobileBadge = document.getElementById('mobile-wishlist-count');
            if (mobileBadge) {
                mobileBadge.textContent = count;
            }
        };

        // Update All Cart Badges
        window.updateCartBadges = function(count) {
            const desktopBadge = document.getElementById('nav-cart-count');
            if (desktopBadge) {
                desktopBadge.textContent = count;
            }
            const mobileBadge = document.getElementById('mobile-cart-count');
            if (mobileBadge) {
                mobileBadge.textContent = count + (count === 1 ? ' item' : ' items');
            }
        };

        // Quick AJAX Wishlist Toggle
        window.toggleWishlist = async function(productId, btnElement) {
            const tokenMeta = document.querySelector('meta[name="csrf-token"]');
            const token = tokenMeta ? tokenMeta.getAttribute('content') : '';

            // Micro-loader on button
            let originalSvg = null;
            if (btnElement) {
                originalSvg = btnElement.querySelector('svg');
                if (originalSvg) originalSvg.classList.add('animate-pulse');
            }

            try {
                const response = await fetch("{{ route('wishlist.toggle') }}", {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ product_id: productId })
                });

                const data = await response.json();
                if (data.success) {
                    showToast(data.message, 'success', "{{ route('wishlist.index') }}", 'View Wishlist');
                    updateWishlistBadges(data.count);

                    // Update all buttons on page for this product
                    document.querySelectorAll(`[data-wishlist-id="${productId}"]`).forEach(btn => {
                        const svg = btn.querySelector('svg');
                        if (svg) {
                            if (data.added) {
                                svg.setAttribute('fill', '#B31B1B');
                                svg.setAttribute('stroke', '#B31B1B');
                            } else {
                                svg.setAttribute('fill', 'none');
                                svg.setAttribute('stroke', 'currentColor');
                            }
                        }
                    });

                    // If on wishlist page and item un-hearted, remove the card dynamically
                    if (!data.added) {
                        const cardWrapper = document.querySelector(`.wishlist-card-wrapper[data-card-product-id="${productId}"]`);
                        if (cardWrapper) {
                            cardWrapper.style.opacity = '0';
                            cardWrapper.style.transform = 'scale(0.9)';
                            setTimeout(() => {
                                cardWrapper.remove();
                                const remaining = document.querySelectorAll('.wishlist-card-wrapper');
                                if (remaining.length === 0) {
                                    const grid = document.getElementById('wishlist-grid');
                                    const emptyView = document.getElementById('wishlist-empty');
                                    if (grid) grid.classList.add('hidden');
                                    if (emptyView) emptyView.classList.remove('hidden');
                                }
                            }, 300);
                        }
                    }
                }
            } catch (err) {
                console.error('Wishlist error:', err);
                showToast('Unable to update wishlist. Please try again.', 'error');
            } finally {
                if (originalSvg) originalSvg.classList.remove('animate-pulse');
            }
        };

        // Quick AJAX Add to Cart
        window.quickAddToCart = async function(productId, qty = 1, btnElement = null) {
            const tokenMeta = document.querySelector('meta[name="csrf-token"]');
            const token = tokenMeta ? tokenMeta.getAttribute('content') : '';

            let origContent = null;
            if (btnElement) {
                origContent = btnElement.innerHTML;
                btnElement.disabled = true;
                btnElement.innerHTML = `
                    <svg class="animate-spin w-3.5 h-3.5 text-[#D4AF37]" viewBox="0 0 24 24" fill="none">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Adding...</span>
                `;
            }

            try {
                const response = await fetch("{{ route('cart.add') }}", {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ product_id: productId, quantity: qty })
                });

                const data = await response.json();
                if (data.success) {
                    showToast(data.message, 'success', "{{ route('cart.index') }}", 'View Bag');
                    updateCartBadges(data.cartCount);
                } else {
                    showToast('Could not add item to cart.', 'error');
                }
            } catch (err) {
                console.error('Cart error:', err);
                showToast('Unable to add item to bag. Please try again.', 'error');
            } finally {
                if (btnElement && origContent !== null) {
                    btnElement.disabled = false;
                    btnElement.innerHTML = origContent;
                }
            }
        };
    </script>

    @stack('scripts')
</body>
</html>
