@extends('layouts.app')

@section('title', 'Your Saved Heritage Wishlist | Rina Hazarika')

@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
        
        <div class="mb-8">
            <h1 class="font-royal text-2xl sm:text-3xl font-bold text-[#1E0C0E]">Your Saved Wishlist</h1>
            <p class="text-xs sm:text-sm text-[#7A6E68] mt-1">Handpicked Assamese handloom weaves and jewellery saved for special occasions</p>
        </div>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-3xl p-12 lg:p-16 text-center border border-[#EFE8DC] max-w-xl mx-auto shadow-xs">
                <svg class="w-16 h-16 mx-auto mb-4 text-[#D4AF37]/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                <h2 class="font-royal text-2xl font-bold text-[#1E0C0E]">Your Wishlist is Empty</h2>
                <p class="text-xs sm:text-sm text-[#7A6E68] mt-2 mb-6">
                    Click the heart icon on any Mekhela Sador or Bihu jewellery piece to save it here for later.
                </p>
                <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl bg-[#1E0C0E] hover:bg-[#B31B1B] text-[#F5E5B4] text-xs font-bold uppercase tracking-wider transition shadow-md">
                    <span>Explore Handloom Collections</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        @endif

    </div>

@endsection
