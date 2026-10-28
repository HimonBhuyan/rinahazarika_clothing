@extends('layouts.app')

@section('title', 'The Chronicle of Assamese Silks & Heritage Ornaments | Rina Hazarika')

@section('content')

    <!-- Hero Header -->
    <div class="bg-[#1E0C0E] text-[#ECE2D0] py-16 lg:py-20 border-b border-[#D4AF37]/30 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center max-w-3xl">
            <span class="text-xs font-bold text-[#D4AF37] uppercase tracking-widest block font-royal mb-2">Heritage & Craft History</span>
            <h1 class="font-royal text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-wide leading-tight mb-4">
                The Golden Threads & Royal Silvers of Pragjyotishpura
            </h1>
            <p class="font-serif-assamese italic text-lg sm:text-xl text-[#E5C158] mb-6">
                "অসমৰ পাট-মুগাৰ জেউতি, যুগ যুগান্তৰৰ জাতীয় সংস্কৃতি"
            </p>
            <p class="text-xs sm:text-sm text-[#D8CCA3] leading-relaxed">
                An archival tribute to the hereditary weavers of Sualkuchi, the goldsmiths of Ranthali, and the timeless cultural motifs of Assam.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-20">
        
        <!-- Section 1: The Trinity of Assam Silks -->
        <section id="trinity-silks">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold text-[#B31B1B] uppercase tracking-widest block mb-2 font-royal">Sericulture of the Brahmaputra</span>
                <h2 class="font-royal text-2xl sm:text-3xl font-bold text-[#1E0C0E]">The Three Sacred Silks of Assam</h2>
                <div class="w-16 h-1 bg-[#D4AF37] mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Muga Silk Card -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-[#EFE8DC] shadow-xs flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-[#FFFDF7] border border-[#D4AF37] flex items-center justify-center mb-6">
                            <span class="font-royal font-bold text-lg text-[#9B7616]">মু</span>
                        </div>
                        <h3 class="font-royal font-bold text-xl text-[#1E0C0E]">Golden Muga Silk</h3>
                        <span class="text-xs text-[#9B7616] font-semibold block mb-3 font-mono">Antheraea assamensis (GI Tagged)</span>
                        <p class="text-xs sm:text-sm text-[#4A3E38] leading-relaxed">
                            Endemic only to the Brahmaputra valley. Its natural golden luster never fades; instead, it shines brighter with every gentle wash. Historically reserved for Ahom kings and queens.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-[#F5EFE6] text-xs font-semibold text-[#B31B1B]">
                        <a href="{{ route('shop', ['material' => 'Muga Silk']) }}" class="hover:underline flex items-center gap-1">
                            Explore Muga Sador &rarr;
                        </a>
                    </div>
                </div>

                <!-- Paat Silk Card -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-[#EFE8DC] shadow-xs flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-[#FFF1F1] border border-[#B31B1B]/40 flex items-center justify-center mb-6">
                            <span class="font-royal font-bold text-lg text-[#B31B1B]">পা</span>
                        </div>
                        <h3 class="font-royal font-bold text-xl text-[#1E0C0E]">Mulberry Paat Silk</h3>
                        <span class="text-xs text-[#B31B1B] font-semibold block mb-3 font-mono">Bombyx textor</span>
                        <p class="text-xs sm:text-sm text-[#4A3E38] leading-relaxed">
                            Known for its ethereal drape and brilliant white filament that absorbs royal dyes like crimson scarlet and peacock teal with supreme vibrancy. The signature wedding textile of Assam.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-[#F5EFE6] text-xs font-semibold text-[#B31B1B]">
                        <a href="{{ route('shop', ['material' => 'Paat Silk']) }}" class="hover:underline flex items-center gap-1">
                            Explore Paat Sador &rarr;
                        </a>
                    </div>
                </div>

                <!-- Eri Silk Card -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-[#EFE8DC] shadow-xs flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-[#F6F1E9] border border-[#D8CCA3] flex items-center justify-center mb-6">
                            <span class="font-royal font-bold text-lg text-[#7D5F10]">এ</span>
                        </div>
                        <h3 class="font-royal font-bold text-xl text-[#1E0C0E]">Eri Peace Silk (Ahimsa)</h3>
                        <span class="text-xs text-[#7D5F10] font-semibold block mb-3 font-mono">Samia cynthia ricini</span>
                        <p class="text-xs sm:text-sm text-[#4A3E38] leading-relaxed">
                            Spun without boiling or killing the moth. Eri silk offers unique isothermal properties—insulating warmth in winter and breathable coolness in summer with a wool-silk texture.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-[#F5EFE6] text-xs font-semibold text-[#B31B1B]">
                        <a href="{{ route('shop', ['category' => 'eri-handloom']) }}" class="hover:underline flex items-center gap-1">
                            Explore Eri Weaves &rarr;
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- Section 2: Sualkuchi The Silk Haven -->
        <section id="sualkuchi" class="bg-white rounded-3xl p-8 sm:p-12 border border-[#EFE8DC] shadow-xs">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <span class="text-xs font-bold text-[#B31B1B] uppercase tracking-widest block mb-2 font-royal">The Manchester of the East</span>
                    <h2 class="font-royal text-2xl sm:text-3xl font-bold text-[#1E0C0E] mb-4">Sualkuchi: Where Weaving is Worship</h2>
                    <p class="text-xs sm:text-sm text-[#4A3E38] leading-relaxed mb-4">
                        Founded in the 11th century during the reign of King Dharma Pala of the Pala dynasty, Sualkuchi was envisioned as an artisanal sanctuary where master weavers were settled to create attire for the royal court.
                    </p>
                    <p class="text-xs sm:text-sm text-[#4A3E38] leading-relaxed mb-6">
                        Mahatma Gandhi, upon visiting Sualkuchi in 1946, remarked: <em>"Assamese women weave dreams in their looms."</em> Today, thousands of traditional handlooms continue to hum across Sualkuchi, preserving an unbroken chain of living heritage.
                    </p>
                    <div class="flex items-center gap-4 text-xs font-bold text-[#7D5F10]">
                        <span>✓ Hand-operated Fly Shuttle Looms</span>
                        <span>✓ 100% Zero-Carbon Weaving</span>
                    </div>
                </div>

                <div>
                    <img src="{{ asset('images/products/muga_kingkhap.jpg') }}" alt="Sualkuchi Weaving" class="rounded-2xl shadow-lg w-full h-80 object-cover border border-[#D4AF37]/30">
                </div>
            </div>
        </section>

        <!-- Section 3: Ranthali Jewellery Glossary -->
        <section id="ranthali">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold text-[#B31B1B] uppercase tracking-widest block mb-2 font-royal">Heritage Goldsmithy</span>
                <h2 class="font-royal text-2xl sm:text-3xl font-bold text-[#1E0C0E]">The Classical Assamese Ornaments</h2>
                <div class="w-16 h-1 bg-[#D4AF37] mx-auto mt-3 rounded-full"></div>
                <p class="text-xs sm:text-sm text-[#7A6E68] mt-3">Each jewel is inspired by native flora, musical instruments, and sacred fauna of Assam</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Gamkharu -->
                <div class="bg-white p-5 rounded-2xl border border-[#EFE8DC] shadow-xs">
                    <img src="{{ asset('images/products/gamkharu_jonbiri.jpg') }}" alt="Gamkharu" class="w-full aspect-square rounded-xl object-cover mb-3">
                    <h3 class="font-royal font-bold text-base text-[#1E0C0E]">Gamkharu (গামখাৰু)</h3>
                    <p class="text-xs text-[#7A6E68] mt-1">
                        Heavy cylindrical wrist cuff with floral openwork filigree and a locking pin screw.
                    </p>
                </div>

                <!-- Jonbiri -->
                <div class="bg-white p-5 rounded-2xl border border-[#EFE8DC] shadow-xs">
                    <img src="{{ asset('images/products/gamkharu_jonbiri.jpg') }}" alt="Jonbiri" class="w-full aspect-square rounded-xl object-cover mb-3">
                    <h3 class="font-royal font-bold text-base text-[#1E0C0E]">Jonbiri (জোনবিৰি)</h3>
                    <p class="text-xs text-[#7A6E68] mt-1">
                        Crescent moon necklace embellished with red kemp stones and golden granulations.
                    </p>
                </div>

                <!-- Dholbiri -->
                <div class="bg-white p-5 rounded-2xl border border-[#EFE8DC] shadow-xs">
                    <img src="{{ asset('images/products/dholbiri_lokaparo.jpg') }}" alt="Dholbiri" class="w-full aspect-square rounded-xl object-cover mb-3">
                    <h3 class="font-royal font-bold text-base text-[#1E0C0E]">Dholbiri (ঢোলবিৰি)</h3>
                    <p class="text-xs text-[#7A6E68] mt-1">
                        Pendant shaped like the Assamese festive Dhol drum, suspended from pearl strands.
                    </p>
                </div>

                <!-- Golpota -->
                <div class="bg-white p-5 rounded-2xl border border-[#EFE8DC] shadow-xs">
                    <img src="{{ asset('images/products/golpota_thuriya.jpg') }}" alt="Golpota" class="w-full aspect-square rounded-xl object-cover mb-3">
                    <h3 class="font-royal font-bold text-base text-[#1E0C0E]">Golpota (গলপটা)</h3>
                    <p class="text-xs text-[#7A6E68] mt-1">
                        Choker necklace with floral stampings backed by soft royal red velvet ribbon.
                    </p>
                </div>

            </div>
        </section>

    </div>

@endsection
