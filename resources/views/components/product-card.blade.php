@props(['product'])

@php
    $isInWishlist = in_array($product->id, session('assamese_wishlist', []));
@endphp

<div class="flow-card-2d flex flex-col justify-between overflow-hidden group relative">
    
    <!-- Top Tags & Wishlist Button -->
    <div class="relative w-full aspect-square bg-[#F4ECE1] overflow-hidden">
        <a href="{{ route('product.show', $product->slug) }}" class="block w-full h-full">
            <img src="{{ asset($product->primary_image) }}" 
                 alt="{{ $product->name }}" 
                 class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out">
        </a>

        <!-- Cultural & Quality Badges -->
        <div class="absolute top-3 left-3 flex flex-col gap-1.5 pointer-events-none">
            @if($product->badge)
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase bg-[#1E0C0E]/90 text-[#F5E5B4] backdrop-blur-xs border border-[#D4AF37]/40 shadow-xs">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#D4AF37]"></span>
                    {{ $product->badge }}
                </span>
            @endif

            @if($product->is_bihu_special)
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase bg-[#B31B1B] text-white shadow-xs">
                    🌸 Bihu Special
                </span>
            @endif
        </div>

        <!-- Wishlist Floating Button -->
        <button type="button" 
                onclick="toggleWishlist({{ $product->id }}, this)" 
                class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-gray-700 hover:text-[#B31B1B] shadow-md flex items-center justify-center transition-transform hover:scale-110 active:scale-95"
                title="Add to Wishlist">
            <svg class="w-4 h-4" fill="{{ $isInWishlist ? '#B31B1B' : 'none' }}" stroke="{{ $isInWishlist ? '#B31B1B' : 'currentColor' }}" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
        </button>

        @if($product->discount_percent > 0)
            <div class="absolute bottom-3 left-3 bg-[#B31B1B] text-white text-[11px] font-bold px-2 py-0.5 rounded shadow-sm">
                {{ $product->discount_percent }}% OFF
            </div>
        @endif
    </div>

    <!-- Product Details Content -->
    <div class="p-4 sm:p-5 flex flex-col flex-grow justify-between">
        <div>
            <!-- Category and Motif Line -->
            <div class="flex items-center justify-between text-[11px] text-[#7A6E68] mb-1 font-medium">
                <span class="text-[#9B7616] font-semibold tracking-wide uppercase">{{ $product->category->name ?? 'Heritage' }}</span>
                @if($product->motif)
                    <span class="truncate max-w-[140px] text-gray-500">Motif: {{ $product->motif }}</span>
                @endif
            </div>

            <!-- Assamese & English Name -->
            <h3 class="font-serif-assamese font-bold text-base sm:text-lg text-[#1E0C0E] line-clamp-1 group-hover:text-[#B31B1B] transition-colors">
                <a href="{{ route('product.show', $product->slug) }}">
                    {{ $product->name }}
                </a>
            </h3>

            @if($product->assamese_name)
                <p class="text-xs text-[#B31B1B] font-medium mt-0.5 font-sans line-clamp-1">
                    {{ $product->assamese_name }}
                </p>
            @endif

            <!-- Material & Origin -->
            <p class="text-xs text-[#6B5E57] mt-1.5 line-clamp-1">
                {{ $product->material_type }} • <span class="italic text-[#7A6E68]">{{ $product->origin }}</span>
            </p>

            <!-- Star Rating -->
            <div class="flex items-center gap-1.5 mt-2">
                <div class="flex items-center text-amber-500">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= floor($product->rating))
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @else
                            <svg class="w-3.5 h-3.5 fill-gray-200" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @endif
                    @endfor
                </div>
                <span class="text-[11px] font-semibold text-[#1E0C0E]">{{ number_format($product->rating, 1) }}</span>
                <span class="text-[11px] text-gray-400">({{ $product->reviews_count }})</span>
            </div>
        </div>

        <!-- Pricing & Action Button -->
        <div class="mt-4 pt-3 border-t border-[#EFE8DC] flex items-center justify-between">
            <div>
                <span class="text-base sm:text-lg font-bold text-[#1E0C0E] font-royal">
                    {{ $product->formatted_price }}
                </span>
                @if($product->formatted_original_price)
                    <span class="text-xs text-gray-400 line-through ml-1.5">
                        {{ $product->formatted_original_price }}
                    </span>
                @endif
            </div>

            <!-- Quick Add to Cart Button -->
            <button type="button" 
                    onclick="quickAddToCart({{ $product->id }}, 1)" 
                    class="px-3 py-1.5 rounded-lg bg-[#1E0C0E] hover:bg-[#B31B1B] text-[#F5E5B4] text-xs font-semibold tracking-wide transition shadow-xs flex items-center gap-1.5 active:scale-95">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>Add</span>
            </button>
        </div>

    </div>

</div>
