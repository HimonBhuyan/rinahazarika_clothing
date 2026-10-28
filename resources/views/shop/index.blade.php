@extends('layouts.app')

@section('title', 'Rina Hazarika | Authentic Assamese Mekhela Sador & Traditional Bihu Ornaments')

@section('content')

    <!-- Hero Section -->
    <section class="relative min-h-[560px] sm:min-h-[640px] lg:min-h-[700px] flex items-center bg-[#140708] overflow-hidden">
        <!-- Background Hero Image positioned to the right -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero/hero_banner.jpg') }}" 
                 alt="Assamese Traditional Mekhela Sador and Bihu Ornaments" 
                 class="w-full h-full object-cover object-[70%_25%] sm:object-[80%_center] lg:object-[88%_top] opacity-55 sm:opacity-75 transition-transform duration-1000">
            <!-- 2D Gradient Vignette: Dark overlay across entire background on mobile, left-to-right fade on desktop -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#140708] from-40% sm:from-15% via-[#140708]/95 via-80% sm:via-45% md:via-[#140708]/80 md:via-55% to-[#140708]/60 sm:to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#140708] via-transparent to-[#140708]/70"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16 lg:py-24">
            <!-- Text Content strictly constrained to the left side -->
            <div class="w-full max-w-xl lg:max-w-lg mr-auto text-left">
                
                <!-- Cultural Tag -->
                <div class="inline-flex items-center gap-1.5 sm:gap-2 px-3 py-1 sm:px-3.5 sm:py-1.5 rounded-full bg-[#D4AF37]/20 border border-[#D4AF37]/50 text-[#F5E5B4] text-[10px] sm:text-xs font-semibold uppercase tracking-wider mb-4 sm:mb-5 backdrop-blur-xs">
                    <img src="{{ asset('images/motifs/jaapi.svg') }}" alt="Jaapi" class="w-3.5 h-3.5 sm:w-4 sm:h-4 filter invert">
                    <span>Axomiya Bastra & Alonkar • Sualkuchi</span>
                </div>

                <!-- Main Headline -->
                <h1 class="font-royal font-bold text-2xl sm:text-4xl lg:text-5xl text-white tracking-wide leading-tight mb-3 sm:mb-4">
                    The Golden Splendor of Assam
                </h1>

                <p class="font-serif-assamese italic text-base sm:text-xl text-[#E5C158] mb-3 sm:mb-4 leading-snug">
                    "ৰূপালী সপোন, সোণালী বয়ন — অসমীয়া পৰম্পৰাৰ অনুপম নিদৰ্শন"
                </p>

                <p class="text-xs sm:text-sm text-[#ECE2D0] leading-relaxed mb-6 sm:mb-8 max-w-md">
                    Discover authentic handwoven <strong>Pure Muga Silk</strong>, <strong>Mulberry Paat</strong>, and handcrafted <strong>Gamkharu, Jonbiri, and Dholbiri</strong> jewellery directly from hereditary master artisans of Sualkuchi and Ranthali.
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5 sm:gap-4 w-full sm:w-auto">
                    <a href="{{ route('shop', ['category' => 'mekhela-sador']) }}" 
                       class="px-5 sm:px-7 py-3 sm:py-3.5 rounded-xl bg-[#D72638] hover:bg-[#B31B1B] text-white text-xs sm:text-sm font-semibold tracking-wide transition shadow-lg hover:shadow-xl hover:-translate-y-0.5 transform flex items-center justify-center gap-2 text-center">
                        <span>Explore Mekhela Sador</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>

                    <a href="{{ route('shop', ['category' => 'traditional-ornaments']) }}" 
                       class="px-5 sm:px-7 py-3 sm:py-3.5 rounded-xl bg-[#1E0C0E]/90 hover:bg-[#1E0C0E] text-[#F5E5B4] border border-[#D4AF37] text-xs sm:text-sm font-semibold tracking-wide transition hover:-translate-y-0.5 transform flex items-center justify-center gap-2 text-center">
                        <span>Bihu Ornaments</span>
                        <svg class="w-4 h-4 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>

                <!-- Trust Badges List (Left-aligned 2-column format) -->
                <div class="mt-6 sm:mt-8 pt-4 sm:pt-5 border-t border-[#D4AF37]/20 grid grid-cols-2 gap-2 sm:gap-3 text-[11px] sm:text-xs text-[#D8CCA3] max-w-md">
                    <div class="flex items-center gap-1.5 sm:gap-2">
                        <span class="text-[#D4AF37] text-sm">✦</span>
                        <span>100% Silk Mark</span>
                    </div>
                    <div class="flex items-center gap-1.5 sm:gap-2">
                        <span class="text-[#D4AF37] text-sm">✦</span>
                        <span>GI Tagged Muga</span>
                    </div>
                    <div class="flex items-center gap-1.5 sm:gap-2">
                        <span class="text-[#D4AF37] text-sm">✦</span>
                        <span>24K Gold Plated Brass</span>
                    </div>
                    <div class="flex items-center gap-1.5 sm:gap-2">
                        <span class="text-[#D4AF37] text-sm">✦</span>
                        <span>Direct Artisan Sourcing</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Traditional Motif Ribbon Strip -->
    <section class="bg-[#FFFDF7] border-y border-[#EFE8DC] py-3 sm:py-4 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-start sm:justify-around gap-4 sm:gap-6 text-[#9B7616] text-[11px] sm:text-xs font-semibold tracking-wider uppercase overflow-x-auto whitespace-nowrap">
            <div class="flex items-center gap-2 flex-shrink-0">
                <img src="{{ asset('images/motifs/kingkhap.svg') }}" alt="Kingkhap" class="w-4 h-4 sm:w-5 sm:h-5">
                <span>Kingkhap (সিংখাপ)</span>
            </div>
            <div class="flex items-center gap-2 flex-shrink-0">
                <img src="{{ asset('images/motifs/jonbiri.svg') }}" alt="Jonbiri" class="w-4 h-4 sm:w-5 sm:h-5">
                <span>Jonbiri (জোনবিৰি)</span>
            </div>
            <div class="flex items-center gap-2 flex-shrink-0">
                <img src="{{ asset('images/motifs/jaapi.svg') }}" alt="Jaapi" class="w-4 h-4 sm:w-5 sm:h-5">
                <span>Jaapi (জাপি)</span>
            </div>
            <div class="flex items-center gap-2 flex-shrink-0">
                <span class="text-sm sm:text-base text-[#B31B1B]">🪕</span>
                <span>Gamkharu (গামখাৰু)</span>
            </div>
            <div class="flex items-center gap-2 flex-shrink-0">
                <span class="text-sm sm:text-base text-[#B31B1B]">🥁</span>
                <span>Dholbiri (ঢোলবিৰি)</span>
            </div>
        </div>
    </section>

    <!-- Categories Grid (2D Flow Design) -->
    <section class="py-16 lg:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-bold text-[#B31B1B] uppercase tracking-widest block mb-2 font-royal">Curated Axomiya Heritage</span>
            <h2 class="font-royal text-2xl sm:text-3xl lg:text-4xl font-bold text-[#1E0C0E]">Explore by Category</h2>
            <div class="w-16 h-1 bg-[#D4AF37] mx-auto mt-3 rounded-full"></div>
            <p class="text-sm text-[#6B5E57] mt-3">From the golden threads of Sualkuchi to the intricate filigree of Ranthali</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
                <a href="{{ route('shop', ['category' => $category->slug]) }}" 
                   class="group relative rounded-2xl overflow-hidden bg-white border border-[#EFE8DC] shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between">
                    
                    <div class="aspect-4/3 w-full bg-[#F4ECE1] overflow-hidden relative">
                        <img src="{{ asset($category->banner_image) }}" 
                             alt="{{ $category->name }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        
                        <div class="absolute bottom-3 left-3 right-3 text-white">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-[#F5E5B4] block">{{ $category->products_count }} Items</span>
                            <h3 class="font-royal font-bold text-lg text-white group-hover:text-[#F5E5B4] transition-colors leading-tight">
                                {{ $category->name }}
                            </h3>
                        </div>
                    </div>

                    <div class="p-4 bg-white flex flex-col justify-between flex-grow">
                        <p class="text-xs text-[#7A6E68] line-clamp-2 leading-relaxed">
                            {{ $category->description }}
                        </p>
                        <div class="mt-3 pt-3 border-t border-[#F5EFE6] flex items-center justify-between text-xs font-semibold text-[#B31B1B] group-hover:text-[#911212]">
                            <span>{{ $category->assamese_name }}</span>
                            <span class="flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                View Collection &rarr;
                            </span>
                        </div>
                    </div>

                </a>
            @endforeach
        </div>
    </section>

    <!-- Featured Handloom & Jewellery Showcase -->
    <section class="py-16 bg-[#F5EFE6] relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
                <div>
                    <span class="text-xs font-bold text-[#B31B1B] uppercase tracking-widest block mb-1 font-royal">Handpicked Masterpieces</span>
                    <h2 class="font-royal text-2xl sm:text-3xl font-bold text-[#1E0C0E]">Featured Handloom & Jewellery</h2>
                    <p class="text-xs sm:text-sm text-[#7A6E68] mt-1">Certified pure silk weaves and handcrafted traditional ornaments</p>
                </div>
                <a href="{{ route('shop') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-[#B31B1B] hover:text-[#911212] transition">
                    <span>View All Collections</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <!-- Product Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- Interactive 2D Assamese Attire & Ornament Anatomy Explorer -->
    <section class="py-12 sm:py-16 lg:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl sm:rounded-3xl p-4 sm:p-10 lg:p-12 border border-[#EFE8DC] shadow-xs relative overflow-hidden">
            
            <div class="max-w-2xl mb-6 sm:mb-8">
                <span class="text-[10px] sm:text-xs font-bold text-[#B31B1B] uppercase tracking-widest block mb-1 font-royal">Interactive 2D Cultural Visualizer</span>
                <h2 class="font-royal text-xl sm:text-3xl font-bold text-[#1E0C0E]">Anatomy of Assamese Attire & Ornaments</h2>
                <p class="text-xs sm:text-sm text-[#6B5E57] mt-1.5 sm:mt-2">
                    Tap on any hotspot or button below to explore how traditional Mekhela Sador and Bihu ornaments are worn with authentic cultural significance.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 items-center">
                
                <!-- 2D Interactive Visual Illustration -->
                <div class="lg:col-span-7 relative bg-[#FAF7F2] rounded-xl sm:rounded-2xl p-3 sm:p-6 border border-[#E0D3C1] flex flex-col items-center justify-center">
                    
                    <div class="relative max-w-md w-full">
                        <img src="{{ asset('images/hero/hero_banner.jpg') }}" alt="Assamese Attire Illustration" class="rounded-xl w-full h-[280px] sm:h-[400px] object-cover object-top shadow-md">
                        
                        <!-- Hotspot 1: Jonbiri & Dholbiri (Necklace) -->
                        <div class="absolute top-[32%] left-[48%] -translate-x-1/2 -translate-y-1/2 group cursor-pointer" onclick="selectHotspot(0)">
                            <div class="beacon" id="beacon-0"></div>
                            <span class="hidden sm:inline-block absolute left-6 -top-2 bg-[#1E0C0E] text-[#F5E5B4] text-[10px] font-bold px-2 py-0.5 rounded shadow pointer-events-none whitespace-nowrap">1. Jonbiri & Dholbiri</span>
                        </div>

                        <!-- Hotspot 2: Gamkharu (Bangle) -->
                        <div class="absolute top-[68%] left-[38%] -translate-x-1/2 -translate-y-1/2 group cursor-pointer" onclick="selectHotspot(1)">
                            <div class="beacon bg-[#D4AF37]" id="beacon-1"></div>
                            <span class="hidden sm:inline-block absolute left-6 -top-2 bg-[#1E0C0E] text-[#F5E5B4] text-[10px] font-bold px-2 py-0.5 rounded shadow pointer-events-none whitespace-nowrap">2. Gamkharu</span>
                        </div>

                        <!-- Hotspot 3: Sador Drape & Kingkhap Aanchal -->
                        <div class="absolute top-[52%] right-[16%] -translate-x-1/2 -translate-y-1/2 group cursor-pointer" onclick="selectHotspot(2)">
                            <div class="beacon bg-[#B31B1B]" id="beacon-2"></div>
                            <span class="hidden sm:inline-block absolute right-6 -top-2 bg-[#1E0C0E] text-[#F5E5B4] text-[10px] font-bold px-2 py-0.5 rounded shadow pointer-events-none whitespace-nowrap">3. Sador & Kingkhap</span>
                        </div>

                        <!-- Hotspot 4: Kopou Phool (Orchid Hair) -->
                        <div class="absolute top-[18%] left-[62%] -translate-x-1/2 -translate-y-1/2 group cursor-pointer" onclick="selectHotspot(3)">
                            <div class="beacon bg-pink-600" id="beacon-3"></div>
                            <span class="hidden sm:inline-block absolute left-6 -top-2 bg-[#1E0C0E] text-[#F5E5B4] text-[10px] font-bold px-2 py-0.5 rounded shadow pointer-events-none whitespace-nowrap">4. Kopou Phool</span>
                        </div>
                    </div>

                    <!-- Mobile Touch Selector Pills -->
                    <div class="flex items-center gap-1.5 overflow-x-auto whitespace-nowrap w-full mt-3 pt-1 lg:hidden">
                        <button type="button" onclick="selectHotspot(0)" class="px-2.5 py-1 rounded-full bg-[#1E0C0E] text-[#F5E5B4] text-[10px] font-bold">1. Jonbiri</button>
                        <button type="button" onclick="selectHotspot(1)" class="px-2.5 py-1 rounded-full bg-white text-[#1E0C0E] border border-[#D4AF37] text-[10px] font-bold">2. Gamkharu</button>
                        <button type="button" onclick="selectHotspot(2)" class="px-2.5 py-1 rounded-full bg-white text-[#1E0C0E] border border-[#B31B1B] text-[10px] font-bold">3. Sador</button>
                        <button type="button" onclick="selectHotspot(3)" class="px-2.5 py-1 rounded-full bg-white text-[#1E0C0E] border border-pink-500 text-[10px] font-bold">4. Kopou</button>
                    </div>

                </div>

                <!-- Interactive Detail Card -->
                <div class="lg:col-span-5 bg-[#FFFDF7] p-5 sm:p-6 rounded-xl sm:rounded-2xl border border-[#D4AF37]/30 shadow-xs flex flex-col justify-between">
                    <div id="hotspot-content">
                        <span id="hotspot-badge" class="inline-block text-[10px] font-bold uppercase tracking-wider text-[#B31B1B] bg-[#FFF1F1] px-2.5 py-1 rounded-full mb-2 sm:mb-3">
                            Royal Neckpiece
                        </span>
                        <h3 id="hotspot-title" class="font-royal font-bold text-xl sm:text-2xl text-[#1E0C0E]">
                            Jonbiri & Dholbiri (জোনবিৰি আৰু ঢোলবিৰি)
                        </h3>
                        <p id="hotspot-subtitle" class="text-xs text-[#9B7616] font-semibold mt-1">
                            Auspicious Crescent & Drum Ornaments of Assam
                        </p>
                        <p id="hotspot-desc" class="text-xs sm:text-sm text-[#4A3E38] leading-relaxed mt-4">
                            The <strong>Jonbiri</strong> represents the tender crescent moon, adorned with ruby red stones and miniature gold bead hangings. The <strong>Dholbiri</strong> mirrors the musical Dhol drum played during Rongali Bihu. Both are essential jewels in an Assamese bride’s trousseau.
                        </p>
                        
                        <div class="mt-6 pt-4 border-t border-[#EFE8DC] space-y-2 text-xs text-[#6B5E57]">
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-[#1E0C0E]">Materiality:</span>
                                <span id="hotspot-spec">24K Gold washed Silver/Brass with Meenakari</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-[#1E0C0E]">Origin:</span>
                                <span id="hotspot-origin">Ranthali & Barpeta Goldsmiths</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <a id="hotspot-cta" href="{{ route('shop', ['category' => 'traditional-ornaments']) }}" 
                           class="w-full py-3 rounded-xl bg-[#1E0C0E] hover:bg-[#B31B1B] text-[#F5E5B4] text-xs font-semibold tracking-wider uppercase transition flex items-center justify-center gap-2">
                            <span>Shop Traditional Ornaments</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Bihu Festive Special Section -->
    <section class="py-16 bg-[#FFFDF7] border-t border-[#EFE8DC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
                <div>
                    <span class="text-xs font-bold text-[#B31B1B] uppercase tracking-widest block mb-1 font-royal">ৰঙালী বিহুৰ বিশেষ সম্ভাৰ</span>
                    <h2 class="font-royal text-2xl sm:text-3xl font-bold text-[#1E0C0E]">Rongali Bihu Festive Edition</h2>
                    <p class="text-xs sm:text-sm text-[#7A6E68] mt-1">Attire and ornaments specially woven for the spring festive season</p>
                </div>
                <a href="{{ route('shop', ['bihu' => '1']) }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-[#B31B1B] hover:text-[#911212] transition">
                    <span>View All Bihu Specials</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($bihuSpecialProducts->take(3) as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- The Heritage Story (Sualkuchi & Ranthali) -->
    <section class="py-16 lg:py-24 bg-[#1E0C0E] text-[#ECE2D0] relative overflow-hidden">
        <div class="absolute right-0 top-1/2 -translate-y-1/2 opacity-5 pointer-events-none">
            <img src="{{ asset('images/motifs/kingkhap.svg') }}" alt="Kingkhap" class="w-96 h-96 filter invert">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#D4AF37]/20 border border-[#D4AF37]/40 text-[#F5E5B4] text-xs font-semibold uppercase tracking-wider mb-4">
                        <span>Ancient Craft Roots</span>
                    </div>
                    
                    <h2 class="font-royal text-3xl sm:text-4xl font-bold text-white mb-6 leading-tight">
                        Woven in Sualkuchi, Forged in Ranthali
                    </h2>

                    <p class="text-sm sm:text-base text-[#D8CCA3] leading-relaxed mb-4">
                        For more than a thousand years, the rhythmic clatter of wooden fly-shuttle looms has echoed across the lanes of <strong>Sualkuchi</strong> on the northern banks of the Brahmaputra. Here, silk weaving is not merely a profession — it is a sacred devotion.
                    </p>

                    <p class="text-sm sm:text-base text-[#D8CCA3] leading-relaxed mb-6">
                        Simultaneously, in the villages of <strong>Ranthali</strong> and <strong>Barpeta</strong>, traditional goldsmiths preserve ancient filigree techniques, rolling silver foil and bathing each piece in 24-karat gold liquid (Kesha-Xaun) without any toxic chemical plating.
                    </p>

                    <div class="grid grid-cols-2 gap-6 pt-4 border-t border-[#D4AF37]/20">
                        <div>
                            <span class="block font-royal font-bold text-2xl text-[#E5C158]">1,200+</span>
                            <span class="text-xs text-[#ECE2D0]">Artisan Looms Supported</span>
                        </div>
                        <div>
                            <span class="block font-royal font-bold text-2xl text-[#E5C158]">100%</span>
                            <span class="text-xs text-[#ECE2D0]">Authentic Silk Mark Assured</span>
                        </div>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('heritage') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#D4AF37] hover:bg-[#C59B27] text-[#1E0C0E] text-xs font-bold uppercase tracking-wider transition">
                            <span>Read Full Heritage Chronicle</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Visual Collage -->
                <div class="grid grid-cols-2 gap-4">
                    <img src="{{ asset('images/products/muga_kingkhap.jpg') }}" alt="Muga Silk Loom" class="rounded-2xl shadow-xl w-full h-64 object-cover border border-[#D4AF37]/30">
                    <img src="{{ asset('images/products/gamkharu_jonbiri.jpg') }}" alt="Gamkharu Filigree" class="rounded-2xl shadow-xl w-full h-64 object-cover mt-8 border border-[#D4AF37]/30">
                    <img src="{{ asset('images/products/paat_maroon.jpg') }}" alt="Paat Silk" class="rounded-2xl shadow-xl w-full h-64 object-cover -mt-8 border border-[#D4AF37]/30">
                    <img src="{{ asset('images/products/eri_peace_silk.jpg') }}" alt="Eri Ahimsa Silk" class="rounded-2xl shadow-xl w-full h-64 object-cover border border-[#D4AF37]/30">
                </div>

            </div>
        </div>
    </section>

    <!-- Verified Reviews / Cultural Testimonials -->
    <section class="py-16 bg-[#FAF7F2]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold text-[#B31B1B] uppercase tracking-widest block mb-2 font-royal">Voices of Our Patron Families</span>
                <h2 class="font-royal text-2xl sm:text-3xl font-bold text-[#1E0C0E]">Generations of Trust & Elegance</h2>
                <div class="w-16 h-1 bg-[#D4AF37] mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($latestReviews->take(3) as $rev)
                    <div class="bg-white p-6 rounded-2xl border border-[#EFE8DC] shadow-xs flex flex-col justify-between">
                        <div>
                            <!-- Star rating -->
                            <div class="flex items-center text-amber-500 mb-3">
                                @for($i = 0; $i < $rev->rating; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                @endfor
                            </div>
                            <p class="text-xs sm:text-sm text-[#4A3E38] italic leading-relaxed">
                                "{{ $rev->comment }}"
                            </p>
                        </div>

                        <div class="mt-6 pt-4 border-t border-[#F5EFE6] flex items-center justify-between">
                            <div>
                                <span class="font-bold text-xs text-[#1E0C0E] block">{{ $rev->customer_name }}</span>
                                <span class="text-[11px] text-[#7A6E68]">{{ $rev->city }}, Assam</span>
                            </div>
                            <span class="text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">
                                ✓ Verified Buyer
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Bihu Coupon Promo Strip -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="rounded-3xl bg-gradient-to-r from-[#911212] to-[#B31B1B] text-white p-8 sm:p-10 shadow-xl relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="relative z-10 max-w-xl">
                <span class="text-xs font-bold uppercase tracking-wider text-[#F5E5B4] bg-black/30 px-3 py-1 rounded-full inline-block mb-3">
                    Limited Period Bihu Privilege
                </span>
                <h3 class="font-royal text-2xl sm:text-3xl font-bold leading-tight">
                    Celebrate Rongali Bihu with 10% Off
                </h3>
                <p class="text-xs sm:text-sm text-[#F6F1E9] mt-2">
                    Use code <code class="bg-white text-[#B31B1B] font-mono font-bold px-2 py-0.5 rounded text-sm">BIHU2026</code> during checkout for instant savings across pure Muga, Paat silk and jewellery suites.
                </p>
            </div>

            <div class="relative z-10 flex-shrink-0">
                <a href="{{ route('shop') }}" class="px-7 py-3.5 rounded-xl bg-[#F5E5B4] hover:bg-white text-[#1E0C0E] font-bold text-xs uppercase tracking-wider transition shadow-md">
                    Shop Festive Now &rarr;
                </a>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    // 2D Anatomy Hotspot Data
    const hotspots = [
        {
            badge: "Royal Neckpiece",
            title: "Jonbiri & Dholbiri (জোনবিৰি আৰু ঢোলবিৰি)",
            subtitle: "Auspicious Crescent & Drum Ornaments of Assam",
            desc: "The Jonbiri represents the tender crescent moon, adorned with ruby red stones and miniature gold bead hangings. The Dholbiri mirrors the musical Dhol drum played during Rongali Bihu. Both are essential jewels in an Assamese bride’s trousseau.",
            spec: "24K Gold washed Silver/Brass with Meenakari",
            origin: "Ranthali & Barpeta Goldsmiths",
            ctaLink: "{{ route('shop', ['category' => 'traditional-ornaments']) }}",
            ctaText: "Shop Traditional Ornaments"
        },
        {
            badge: "Filigree Wrist Cuff",
            title: "Gamkharu (গামখাৰু)",
            subtitle: "Hereditary Clasp Bangle of Royalty",
            desc: "The grandest bangle in Assamese culture. Handcrafted using ancient repoussé and delicate floral jali openwork, fastened with a traditional locking screw pin that adjusts to any wrist width.",
            spec: "Pure Brass with 24K Kesha-Xaun Gold Wash & Silver foil",
            origin: "Ranthali, Barpeta, Assam",
            ctaLink: "{{ route('shop', ['category' => 'traditional-ornaments']) }}",
            ctaText: "Explore Gamkharu Bangles"
        },
        {
            badge: "Handloom Upper Drape",
            title: "Sador with Kingkhap Motif (চাদৰ আৰু সিংখাপ)",
            subtitle: "The Sacred Golden Aanchal",
            desc: "The Sador is gracefully wrapped around the torso and pleated over the shoulder. Woven with the majestic Kingkhap (Ahom dynastic royal lion) motif in pure gold zari, symbolising regal grace.",
            spec: "100% Pure Muga or Mulberry Paat Silk",
            origin: "Sualkuchi, Kamrup, Assam",
            ctaLink: "{{ route('shop', ['category' => 'mekhela-sador']) }}",
            ctaText: "Explore Mekhela Sador"
        },
        {
            badge: "Festive Blossom",
            title: "Kopou Phool (কপৌ ফুল)",
            subtitle: "Foxtail Orchid: The Spring Soul of Bihu",
            desc: "Tucked into the hair bun beside traditional Assamese hairpins. The blooming of Kopou Phool marks the arrival of Bohag Bihu and symbolizes pure love and youthfulness.",
            spec: "Natural Rhynchostylis retusa orchid bloom",
            origin: "Forests of Assam",
            ctaLink: "{{ route('shop', ['bihu' => '1']) }}",
            ctaText: "View Bihu Festive Attire"
        }
    ];

    function selectHotspot(index) {
        const data = hotspots[index];
        if (!data) return;

        document.getElementById('hotspot-badge').textContent = data.badge;
        document.getElementById('hotspot-title').textContent = data.title;
        document.getElementById('hotspot-subtitle').textContent = data.subtitle;
        document.getElementById('hotspot-desc').innerHTML = data.desc;
        document.getElementById('hotspot-spec').textContent = data.spec;
        document.getElementById('hotspot-origin').textContent = data.origin;
        
        const cta = document.getElementById('hotspot-cta');
        cta.href = data.ctaLink;
        cta.querySelector('span').textContent = data.ctaText;
    }
</script>
@endpush
