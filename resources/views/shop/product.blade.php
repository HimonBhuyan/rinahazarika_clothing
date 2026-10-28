@extends('layouts.app')

@section('title', $product->name . ' | Rina Hazarika Assamese Heritage')
@section('meta_description', Str::limit(strip_tags($product->description), 160))

@section('content')

@php
    $isInWishlist = in_array($product->id, session('assamese_wishlist', []));
@endphp

    <!-- Breadcrumb -->
    <div class="bg-white border-b border-[#EFE8DC] py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex text-xs text-[#7A6E68] gap-2">
                <a href="{{ route('home') }}" class="hover:text-[#B31B1B]">Home</a>
                <span>/</span>
                <a href="{{ route('shop') }}" class="hover:text-[#B31B1B]">Shop</a>
                <span>/</span>
                <a href="{{ route('shop', ['category' => $product->category->slug]) }}" class="hover:text-[#B31B1B]">{{ $product->category->name }}</a>
                <span>/</span>
                <span class="text-[#1E0C0E] font-medium truncate max-w-xs">{{ $product->name }}</span>
            </nav>
        </div>
    </div>

    <!-- Product Main View -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14">
            
            <!-- Product Image Gallery (2D Flow) -->
            <div class="lg:col-span-6 space-y-4">
                <div class="relative aspect-square rounded-3xl overflow-hidden bg-[#F4ECE1] border border-[#EFE8DC] shadow-sm">
                    <img id="main-product-img" 
                         src="{{ asset($product->primary_image) }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-full object-cover object-center transition-all duration-300">
                    
                    @if($product->badge)
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#1E0C0E]/90 text-[#F5E5B4] border border-[#D4AF37]/50 shadow-md">
                                ✦ {{ $product->badge }}
                            </span>
                        </div>
                    @endif

                    @if($product->is_bihu_special)
                        <div class="absolute bottom-4 left-4">
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#B31B1B] text-white shadow-md">
                                🌸 Bihu Special Edition
                            </span>
                        </div>
                    @endif
                </div>

                <!-- Trust Guarantee Bar under image -->
                <div class="p-4 rounded-xl bg-white border border-[#EFE8DC] grid grid-cols-3 gap-2 text-center text-xs text-[#4A3E38]">
                    <div class="flex flex-col items-center">
                        <span class="text-base text-[#D4AF37]">🧵</span>
                        <span class="font-semibold mt-1">Authentic Weave</span>
                        <span class="text-[10px] text-gray-500">100% Pure Silk</span>
                    </div>
                    <div class="flex flex-col items-center border-x border-[#EFE8DC]">
                        <span class="text-base text-[#B31B1B]">🏛️</span>
                        <span class="font-semibold mt-1">GI Heritage</span>
                        <span class="text-[10px] text-gray-500">Direct From Assam</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="text-base text-emerald-600">🛡️</span>
                        <span class="font-semibold mt-1">Insured Courier</span>
                        <span class="text-[10px] text-gray-500">Pan-India Transit</span>
                    </div>
                </div>
            </div>

            <!-- Product Purchase & Info Column -->
            <div class="lg:col-span-6 flex flex-col justify-between">
                <div>
                    <!-- Category & SKU -->
                    <div class="flex items-center justify-between text-xs text-[#9B7616] font-semibold uppercase tracking-wider mb-2">
                        <span>{{ $product->category->name }}</span>
                        <span class="text-gray-400 font-mono text-[11px]">SKU: {{ $product->sku ?? 'RH-AXOM' }}</span>
                    </div>

                    <!-- English Title -->
                    <h1 class="font-royal font-bold text-2xl sm:text-3xl lg:text-4xl text-[#1E0C0E] leading-tight mb-1">
                        {{ $product->name }}
                    </h1>

                    <!-- Assamese Script Title -->
                    @if($product->assamese_name)
                        <p class="font-serif-assamese text-base sm:text-lg text-[#B31B1B] font-semibold mb-4">
                            {{ $product->assamese_name }}
                        </p>
                    @endif

                    <!-- Star Rating and Reviews -->
                    <div class="flex items-center gap-3 pb-5 border-b border-[#EFE8DC]">
                        <div class="flex items-center text-amber-500">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            @endfor
                        </div>
                        <span class="text-xs font-bold text-[#1E0C0E]">{{ number_format($product->rating, 2) }} / 5.0</span>
                        <span class="text-xs text-gray-400">({{ $product->reviews_count }} Verified Artisan Reviews)</span>
                    </div>

                    <!-- Pricing Display -->
                    <div class="py-4 sm:py-5 border-b border-[#EFE8DC]/80">
                        <div class="flex items-baseline gap-3 flex-wrap">
                            <span class="font-royal font-bold text-2xl sm:text-4xl text-[#1E0C0E]">
                                {{ $product->formatted_price }}
                            </span>
                            @if($product->formatted_original_price)
                                <span class="text-sm sm:text-base text-gray-400 line-through">
                                    {{ $product->formatted_original_price }}
                                </span>
                                <span class="text-xs font-bold text-[#B31B1B] bg-[#FFF1F1] px-2 py-0.5 rounded">
                                    SAVE {{ $product->discount_percent }}%
                                </span>
                            @endif
                        </div>
                        <span class="text-[11px] sm:text-xs text-emerald-700 font-semibold block mt-1">Inclusive of all taxes & Silk Mark stamping</span>
                    </div>

                    <!-- Short Description -->
                    <p class="text-xs sm:text-sm text-[#4A3E38] leading-relaxed my-5">
                        {{ $product->description }}
                    </p>

                    <!-- Key Craft Highlights Box -->
                    <div class="bg-[#FFFDF7] rounded-2xl p-4 border border-[#D4AF37]/30 mb-6 space-y-2 text-xs">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-[#1E0C0E]">Material Type:</span>
                            <span class="text-[#7D5F10] font-medium">{{ $product->material_type }}</span>
                        </div>
                        @if($product->motif)
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-[#1E0C0E]">Traditional Motif:</span>
                                <span class="text-[#B31B1B] font-medium">{{ $product->motif }}</span>
                            </div>
                        @endif
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-[#1E0C0E]">Craft Village Origin:</span>
                            <span class="text-[#1E0C0E]">{{ $product->origin }}</span>
                        </div>
                        @if($product->dimensions)
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-[#1E0C0E]">Dimensions:</span>
                                <span class="text-[#4A3E38]">{{ $product->dimensions }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Add to Cart & Buy Form -->
                    <form action="{{ route('cart.add') }}" method="POST" class="space-y-3">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        <div class="flex items-center gap-2.5 sm:gap-3 flex-wrap sm:flex-nowrap">
                            <!-- Quantity Selector -->
                            <div class="flex items-center border border-[#E0D3C1] rounded-xl bg-white overflow-hidden flex-shrink-0">
                                <button type="button" onclick="decreaseQty()" class="px-3 py-2.5 sm:px-3.5 text-gray-600 hover:bg-[#F4ECE1] transition cursor-pointer font-bold">-</button>
                                <input type="number" id="qty-input" name="quantity" value="1" min="1" max="10" class="w-10 sm:w-12 text-center text-xs font-bold border-none focus:outline-none">
                                <button type="button" onclick="increaseQty()" class="px-3 py-2.5 sm:px-3.5 text-gray-600 hover:bg-[#F4ECE1] transition cursor-pointer font-bold">+</button>
                            </div>

                            <!-- Add to Cart CTA -->
                            <button type="submit" class="flex-1 min-w-[150px] py-3 sm:py-3.5 rounded-xl bg-[#1E0C0E] hover:bg-[#B31B1B] text-[#F5E5B4] text-xs sm:text-sm font-semibold uppercase tracking-wider transition shadow-md hover:shadow-lg flex items-center justify-center gap-2 cursor-pointer">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                <span>Add to Cart</span>
                            </button>

                            <!-- Buy Now CTA -->
                            <button type="submit" name="buy_now" value="1" class="flex-1 min-w-[140px] py-3 sm:py-3.5 rounded-xl bg-gradient-to-r from-[#D4AF37] to-[#C59B27] hover:from-[#C59B27] hover:to-[#9B7616] text-[#1E0C0E] font-bold text-xs sm:text-sm uppercase tracking-wider transition shadow-md hover:shadow-lg flex items-center justify-center gap-1.5 cursor-pointer">
                                <span>⚡ Buy Now</span>
                            </button>

                            <!-- Wishlist Toggle -->
                            <button type="button" 
                                    onclick="event.preventDefault(); event.stopPropagation(); toggleWishlist({{ $product->id }}, this)" 
                                    class="p-3 sm:p-3.5 rounded-xl border border-[#E0D3C1] bg-white hover:bg-[#FFF1F1] text-gray-700 hover:text-[#B31B1B] transition shadow-xs flex-shrink-0 cursor-pointer" 
                                    title="Save to Wishlist"
                                    data-wishlist-id="{{ $product->id }}">
                                <svg class="w-5 h-5 pointer-events-none" fill="{{ $isInWishlist ? '#B31B1B' : 'none' }}" stroke="{{ $isInWishlist ? '#B31B1B' : 'currentColor' }}" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </form>

                </div>

                <!-- Gamusa Gift Wrap Feature Note -->
                <div class="mt-6 pt-5 border-t border-[#EFE8DC] flex items-center gap-3 text-xs text-[#7A6E68]">
                    <img src="{{ asset('images/motifs/gamusa_border.svg') }}" alt="Gamusa" class="h-4 w-12 object-cover rounded">
                    <span>Complimentary traditional unbleached cotton casing. Traditional Gamusa gift wrapping available at checkout.</span>
                </div>
            </div>

        </div>

        <!-- Detailed Craft Story & Care Tabs -->
        <div class="mt-16 bg-white rounded-3xl p-6 sm:p-10 border border-[#EFE8DC] shadow-xs">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                
                <div>
                    <h2 class="font-royal text-lg font-bold text-[#1E0C0E] mb-3 flex items-center gap-2">
                        <img src="{{ asset('images/motifs/kingkhap.svg') }}" alt="Motif" class="w-5 h-5">
                        <span>The Weaving & Metallurgical Lore</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-[#4A3E38] leading-relaxed mb-4">
                        {{ $product->craft_story ?? 'Woven on indigenous wooden frame looms in the historic weaving enclave of Sualkuchi. Every inch of zari work requires intense hand manipulation using bamboo reeds and fly shuttles.' }}
                    </p>
                    <p class="text-xs text-[#7A6E68] leading-relaxed">
                        In Assamese society, this piece is treated as a sanctified living fabric. The natural fibers breathe and regulate body temperature gracefully through all four seasons.
                    </p>
                </div>

                <div>
                    <h2 class="font-royal text-lg font-bold text-[#1E0C0E] mb-3 flex items-center gap-2">
                        <span class="text-base text-[#D4AF37]">🌿</span>
                        <span>Traditional Care & Preservation</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-[#4A3E38] leading-relaxed mb-3">
                        {{ $product->care_instructions ?? 'Dry clean only. Wrap in pristine unbleached cotton or mul-mul cloth. Air out in shaded morning breeze twice a year.' }}
                    </p>
                    <ul class="text-xs text-[#7A6E68] space-y-1 list-disc list-inside">
                        <li>Do not spray perfumes or alcohol-based fragrances directly onto silk or gold zari.</li>
                        <li>Roll fold along the length to prevent stiff crease folds.</li>
                        <li>Store ornaments separately in airtight soft pouches.</li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Verified Patron Reviews -->
        <div class="mt-16">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="font-royal text-2xl font-bold text-[#1E0C0E]">Customer Reviews</h2>
                    <p class="text-xs text-[#7A6E68] mt-1">Verified reflections from handloom lovers across Assam and India</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($product->reviews as $review)
                    <div class="bg-white p-6 rounded-2xl border border-[#EFE8DC] shadow-xs flex flex-col justify-between">
                        <div>
                            <div class="flex items-center text-amber-500 mb-2">
                                @for($i = 0; $i < $review->rating; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                @endfor
                            </div>
                            <p class="text-xs text-[#4A3E38] italic leading-relaxed">"{{ $review->comment }}"</p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-[#F5EFE6] flex items-center justify-between text-xs">
                            <span class="font-bold text-[#1E0C0E]">{{ $review->customer_name }}</span>
                            <span class="text-gray-400">{{ $review->city }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-[#7A6E68]">Be the first to review this heritage creation.</p>
                @endforelse
            </div>
        </div>

        <!-- Related / Pairing Recommendations -->
        @if($relatedProducts->count() > 0)
            <div class="mt-20 pt-10 border-t border-[#EFE8DC]">
                <div class="mb-8">
                    <span class="text-xs font-bold text-[#B31B1B] uppercase tracking-widest block mb-1 font-royal">Curated Pairings</span>
                    <h2 class="font-royal text-2xl font-bold text-[#1E0C0E]">Complete Your Axomiya Ensemble</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $rel)
                        <x-product-card :product="$rel" />
                    @endforeach
                </div>
            </div>
        @endif

    </div>

@endsection

@push('scripts')
<script>
    function decreaseQty() {
        const input = document.getElementById('qty-input');
        if (input && parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
    function increaseQty() {
        const input = document.getElementById('qty-input');
        if (input && parseInt(input.value) < 10) {
            input.value = parseInt(input.value) + 1;
        }
    }
</script>
@endpush
