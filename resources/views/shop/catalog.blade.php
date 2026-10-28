@extends('layouts.app')

@section('title', 'Handloom & Jewellery Catalog | Rina Hazarika')

@section('content')

    <!-- Catalog Header -->
    <div class="bg-[#1E0C0E] text-[#ECE2D0] py-12 border-b border-[#D4AF37]/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex text-xs text-[#D8CCA3] mb-3 gap-2">
                <a href="{{ route('home') }}" class="hover:text-white">Home</a>
                <span>/</span>
                <span class="text-[#D4AF37]">Shop All Collections</span>
            </nav>
            <h1 class="font-royal text-2xl sm:text-3xl lg:text-4xl font-bold text-white tracking-wide">
                Assamese Handloom & Heritage Jewellery
            </h1>
            <p class="text-xs sm:text-sm text-[#D8CCA3] mt-2 max-w-2xl">
                Explore authentic pure Muga, Mulberry Paat, and organic Eri silk Mekhela Sador, along with handcrafted Gamkharu, Jonbiri, and Dholbiri ornaments.
            </p>
        </div>
    </div>

    <!-- Main Catalog Body -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Filters Sidebar -->
            <aside class="lg:col-span-1">
                <!-- Mobile Filters Toggle Button -->
                <div class="lg:hidden flex items-center justify-between bg-white p-3.5 rounded-xl border border-[#EFE8DC] shadow-xs mb-4">
                    <button type="button" onclick="document.getElementById('catalog-filters').classList.toggle('hidden')" class="flex items-center gap-2 text-xs font-bold text-[#1E0C0E]">
                        <svg class="w-4 h-4 text-[#B31B1B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                        <span>Filter & Refine Collections</span>
                        @if(request()->hasAny(['category', 'material', 'motif', 'bihu', 'min_price', 'max_price']))
                            <span class="w-2 h-2 rounded-full bg-[#B31B1B]"></span>
                        @endif
                    </button>
                    @if(request()->hasAny(['category', 'material', 'motif', 'bihu', 'q', 'min_price', 'max_price']))
                        <a href="{{ route('shop') }}" class="text-[11px] font-semibold text-[#B31B1B]">Reset</a>
                    @endif
                </div>

                <div id="catalog-filters" class="hidden lg:block bg-white p-6 rounded-2xl border border-[#EFE8DC] shadow-xs sticky top-28 space-y-6">
                    
                    <div class="flex items-center justify-between pb-4 border-b border-[#EFE8DC]">
                        <h2 class="font-royal text-sm font-bold uppercase tracking-wider text-[#1E0C0E]">Filters</h2>
                        @if(request()->hasAny(['category', 'material', 'motif', 'bihu', 'q', 'min_price', 'max_price']))
                            <a href="{{ route('shop') }}" class="text-[11px] font-semibold text-[#B31B1B] hover:underline">Clear All</a>
                        @endif
                    </div>

                    <form action="{{ route('shop') }}" method="GET" id="filter-form">
                        @if(request('q'))
                            <input type="hidden" name="q" value="{{ request('q') }}">
                        @endif

                        <!-- Category Filter -->
                        <div class="mb-6">
                            <h3 class="text-xs font-bold text-[#1E0C0E] uppercase tracking-wider mb-3">Categories</h3>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2.5 text-xs text-[#4A3E38] hover:text-[#B31B1B] cursor-pointer">
                                    <input type="radio" name="category" value="" onchange="this.form.submit()" {{ !request('category') ? 'checked' : '' }} class="text-[#B31B1B] focus:ring-[#B31B1B]">
                                    <span>All Categories</span>
                                </label>
                                @foreach($categories as $cat)
                                    <label class="flex items-center justify-between text-xs text-[#4A3E38] hover:text-[#B31B1B] cursor-pointer">
                                        <div class="flex items-center gap-2.5">
                                            <input type="radio" name="category" value="{{ $cat->slug }}" onchange="this.form.submit()" {{ request('category') === $cat->slug ? 'checked' : '' }} class="text-[#B31B1B] focus:ring-[#B31B1B]">
                                            <span>{{ $cat->name }}</span>
                                        </div>
                                        <span class="text-[10px] text-gray-400">({{ $cat->products_count }})</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Material Filter -->
                        <div class="mb-6 pt-5 border-t border-[#EFE8DC]">
                            <h3 class="text-xs font-bold text-[#1E0C0E] uppercase tracking-wider mb-3">Material & Silk</h3>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2.5 text-xs text-[#4A3E38] hover:text-[#B31B1B] cursor-pointer">
                                    <input type="radio" name="material" value="" onchange="this.form.submit()" {{ !request('material') ? 'checked' : '' }} class="text-[#B31B1B] focus:ring-[#B31B1B]">
                                    <span>All Materials</span>
                                </label>
                                @foreach($materials as $val => $label)
                                    <label class="flex items-center gap-2.5 text-xs text-[#4A3E38] hover:text-[#B31B1B] cursor-pointer">
                                        <input type="radio" name="material" value="{{ $val }}" onchange="this.form.submit()" {{ request('material') === $val ? 'checked' : '' }} class="text-[#B31B1B] focus:ring-[#B31B1B]">
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Festive Filter Toggle -->
                        <div class="mb-6 pt-5 border-t border-[#EFE8DC]">
                            <label class="flex items-center gap-2 text-xs font-bold text-[#B31B1B] cursor-pointer">
                                <input type="checkbox" name="bihu" value="1" onchange="this.form.submit()" {{ request('bihu') ? 'checked' : '' }} class="rounded text-[#B31B1B] focus:ring-[#B31B1B]">
                                <span>🌸 Show Bihu Festive Specials Only</span>
                            </label>
                        </div>

                        <!-- Price Range -->
                        <div class="pt-5 border-t border-[#EFE8DC]">
                            <h3 class="text-xs font-bold text-[#1E0C0E] uppercase tracking-wider mb-3">Price Range (₹)</h3>
                            <div class="flex items-center gap-2 mb-3">
                                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" class="w-full text-xs p-2 bg-[#FAF7F2] border border-[#E0D3C1] rounded-lg focus:outline-none">
                                <span class="text-gray-400">-</span>
                                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" class="w-full text-xs p-2 bg-[#FAF7F2] border border-[#E0D3C1] rounded-lg focus:outline-none">
                            </div>
                            <button type="submit" class="w-full py-2 bg-[#1E0C0E] hover:bg-[#B31B1B] text-white text-xs font-semibold rounded-lg transition">Apply Price Filter</button>
                        </div>

                    </form>
                </div>
            </aside>

            <!-- Products Content Area -->
            <main class="lg:col-span-3">
                
                <!-- Controls bar -->
                <div class="bg-white p-4 rounded-xl border border-[#EFE8DC] shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                    <div>
                        <span class="text-xs text-[#7A6E68]">Showing <strong class="text-[#1E0C0E]">{{ $products->total() }}</strong> authentic creations</span>
                    </div>

                    <!-- Sorting Dropdown -->
                    <div class="flex items-center gap-2 text-xs">
                        <label for="sort-select" class="text-[#7A6E68] whitespace-nowrap">Sort by:</label>
                        <select id="sort-select" onchange="applySorting(this.value)" class="text-xs bg-[#FAF7F2] border border-[#E0D3C1] rounded-lg px-3 py-1.5 focus:outline-none focus:border-[#C59B27]">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest Arrivals</option>
                            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                            <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Highest Rated</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                @if($products->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($products as $product)
                            <x-product-card :product="$product" />
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-10">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="bg-white rounded-2xl p-12 text-center border border-[#EFE8DC]">
                        <img src="{{ asset('images/motifs/jaapi.svg') }}" alt="Empty" class="w-16 h-16 mx-auto mb-4 opacity-40">
                        <h3 class="font-royal text-lg font-bold text-[#1E0C0E]">No creations matched your filters</h3>
                        <p class="text-xs text-[#7A6E68] mt-2">Try clearing your filters or exploring our other traditional collections.</p>
                        <a href="{{ route('shop') }}" class="inline-block mt-4 px-6 py-2.5 rounded-lg bg-[#B31B1B] text-white text-xs font-semibold">View All Products</a>
                    </div>
                @endif

            </main>

        </div>
    </div>

@endsection

@push('scripts')
<script>
    function applySorting(val) {
        const url = new URL(window.location.href);
        url.searchParams.set('sort', val);
        window.location.href = url.toString();
    }
</script>
@endpush
