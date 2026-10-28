@extends('layouts.app')

@section('title', 'Your Heritage Shopping Bag | Rina Hazarika')

@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
        
        <div class="mb-8">
            <h1 class="font-royal text-2xl sm:text-3xl font-bold text-[#1E0C0E]">Your Heritage Cart</h1>
            <p class="text-xs sm:text-sm text-[#7A6E68] mt-1">Authentic handloom creations and handcrafted Assamese ornaments</p>
        </div>

        @if(!empty($items))
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                
                <!-- Cart Items List (8 cols) -->
                <div class="lg:col-span-8 space-y-6">
                    
                    <!-- Free Shipping Progress -->
                    @php
                        $freeShippingThreshold = 5000;
                        $amountLeft = max(0, $freeShippingThreshold - $subtotal);
                        $percent = min(100, ($subtotal / $freeShippingThreshold) * 100);
                    @endphp
                    <div class="bg-white p-4 rounded-2xl border border-[#EFE8DC] shadow-xs">
                        <div class="flex items-center justify-between text-xs font-semibold mb-2">
                            @if($amountLeft > 0)
                                <span class="text-[#4A3E38]">Add <strong class="text-[#B31B1B]">₹{{ number_format($amountLeft, 0) }}</strong> more for <strong>FREE Pan-India Insured Delivery</strong></span>
                            @else
                                <span class="text-emerald-700 font-bold flex items-center gap-1.5">
                                    <span>🎉</span> You have unlocked FREE Pan-India Insured Delivery!
                                </span>
                            @endif
                            <span class="text-[#9B7616]">{{ (int)$percent }}%</span>
                        </div>
                        <div class="w-full h-2 bg-[#F4ECE1] rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-[#D4AF37] to-[#B31B1B] rounded-full transition-all duration-500" style="width: {{ $percent }}%"></div>
                        </div>
                    </div>

                    <!-- Items Table -->
                    <div class="bg-white rounded-2xl border border-[#EFE8DC] overflow-hidden shadow-xs divide-y divide-[#EFE8DC]">
                        @foreach($items as $item)
                            <div class="p-4 sm:p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-xl overflow-hidden bg-[#F4ECE1] flex-shrink-0 border border-[#EFE8DC]">
                                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h3 class="font-serif-assamese font-bold text-base text-[#1E0C0E]">
                                            <a href="{{ route('product.show', $item['slug']) }}" class="hover:text-[#B31B1B] transition">
                                                {{ $item['name'] }}
                                            </a>
                                        </h3>
                                        @if(!empty($item['assamese_name']))
                                            <p class="text-xs text-[#B31B1B] font-medium">{{ $item['assamese_name'] }}</p>
                                        @endif
                                        <p class="text-xs text-gray-500 mt-1">{{ $item['material'] }}</p>
                                        <span class="text-xs font-bold text-[#1E0C0E] font-royal mt-1 block">
                                            ₹{{ number_format($item['price'], 0) }}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between sm:justify-end gap-6 w-full sm:w-auto">
                                    <!-- Quantity Update Form -->
                                    <form action="{{ route('cart.update') }}" method="POST" class="flex items-center border border-[#E0D3C1] rounded-lg bg-[#FAF7F2] overflow-hidden">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                        <button type="submit" name="quantity" value="{{ $item['quantity'] - 1 }}" class="px-2.5 py-1 text-gray-600 hover:bg-[#F4ECE1]">-</button>
                                        <span class="px-3 text-xs font-bold">{{ $item['quantity'] }}</span>
                                        <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}" class="px-2.5 py-1 text-gray-600 hover:bg-[#F4ECE1]">+</button>
                                    </form>

                                    <!-- Subtotal -->
                                    <div class="text-right min-w-[90px]">
                                        <span class="block text-sm font-bold text-[#1E0C0E] font-royal">
                                            ₹{{ number_format($item['subtotal'], 0) }}
                                        </span>
                                    </div>

                                    <!-- Remove Button -->
                                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-[#B31B1B] transition p-1" title="Remove item">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Traditional Gamusa Wrapping Option -->
                    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-[#EFE8DC] shadow-xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <img src="{{ asset('images/motifs/gamusa_border.svg') }}" alt="Gamusa" class="h-6 w-14 sm:w-16 object-cover rounded shadow-xs flex-shrink-0">
                            <div class="min-w-0">
                                <span class="font-bold text-xs text-[#1E0C0E] block">Add Traditional Red-and-White Gamusa Gift Wrapping</span>
                                <span class="text-[11px] text-[#7A6E68] block leading-tight">Authentic Assamese ceremonial Gamusa wrap with red sacred threads (+₹150)</span>
                            </div>
                        </div>

                        <form action="{{ route('cart.giftwrap') }}" method="POST" class="w-full sm:w-auto flex-shrink-0">
                            @csrf
                            <input type="hidden" name="gift_wrap" value="{{ $hasGiftWrap ? '0' : '1' }}">
                            <button type="submit" class="w-full sm:w-auto text-xs font-bold px-3 py-2 sm:py-1.5 rounded-lg border transition {{ $hasGiftWrap ? 'bg-[#B31B1B] text-white border-[#B31B1B]' : 'bg-white text-[#1E0C0E] border-[#E0D3C1] hover:bg-[#FAF7F2]' }}">
                                {{ $hasGiftWrap ? '✓ Added' : '+ Add Wrap' }}
                            </button>
                        </form>
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('shop') }}" class="text-xs font-semibold text-[#B31B1B] hover:underline flex items-center gap-1">
                            &larr; Continue Exploring Collections
                        </a>
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-xs text-gray-500 hover:text-red-700 underline">Clear Cart</button>
                        </form>
                    </div>

                </div>

                <!-- Order Summary Column (4 cols) -->
                <div class="lg:col-span-4">
                    <div class="bg-white p-6 rounded-2xl border border-[#EFE8DC] shadow-xs sticky top-28 space-y-6">
                        <h2 class="font-royal text-base font-bold text-[#1E0C0E] uppercase tracking-wider pb-3 border-b border-[#EFE8DC]">
                            Order Summary
                        </h2>

                        <!-- Promo Code Input -->
                        <div>
                            @if($coupon)
                                <div class="bg-[#F1F8F4] border border-emerald-300 rounded-xl p-3 flex items-center justify-between text-xs text-emerald-900">
                                    <div>
                                        <span class="font-bold">{{ $coupon['code'] }}</span>
                                        <span class="block text-[11px] text-emerald-700">{{ $coupon['description'] }}</span>
                                    </div>
                                    <form action="{{ route('cart.coupon.remove') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-600 font-bold hover:underline text-[11px]">Remove</button>
                                    </form>
                                </div>
                            @else
                                <form action="{{ route('cart.coupon') }}" method="POST" class="flex gap-2">
                                    @csrf
                                    <input type="text" name="code" placeholder="Promo code (e.g. BIHU2026)" class="w-full text-xs bg-[#FAF7F2] border border-[#E0D3C1] rounded-xl px-3 py-2 uppercase font-medium focus:outline-none focus:border-[#C59B27]">
                                    <button type="submit" class="px-4 py-2 bg-[#1E0C0E] hover:bg-[#B31B1B] text-white text-xs font-semibold rounded-xl transition">Apply</button>
                                </form>
                                <p class="text-[10px] text-gray-400 mt-1.5">Tip: Try promo code <strong>BIHU2026</strong> for 10% off.</p>
                            @endif
                        </div>

                        <!-- Calculations -->
                        <div class="space-y-3 text-xs text-[#4A3E38] pt-2">
                            <div class="flex items-center justify-between">
                                <span>Bag Subtotal:</span>
                                <span class="font-bold font-royal text-[#1E0C0E]">₹{{ number_format($subtotal, 0) }}</span>
                            </div>

                            @if($discount > 0)
                                <div class="flex items-center justify-between text-[#B31B1B]">
                                    <span>Bihu Privilege Discount ({{ $coupon['percent'] ?? 10 }}%):</span>
                                    <span class="font-bold">-₹{{ number_format($discount, 0) }}</span>
                                </div>
                            @endif

                            @if($hasGiftWrap)
                                <div class="flex items-center justify-between text-[#7D5F10]">
                                    <span>Gamusa Gift Wrap:</span>
                                    <span class="font-bold">+₹{{ number_format($giftWrap, 0) }}</span>
                                </div>
                            @endif

                            <div class="flex items-center justify-between">
                                <span>Pan-India Insured Shipping:</span>
                                <span>
                                    @if($shipping == 0)
                                        <strong class="text-emerald-700 uppercase font-bold">FREE</strong>
                                    @else
                                        ₹{{ number_format($shipping, 0) }}
                                    @endif
                                </span>
                            </div>

                            <div class="pt-4 border-t border-[#EFE8DC] flex items-center justify-between text-base">
                                <span class="font-royal font-bold text-[#1E0C0E]">Grand Total:</span>
                                <span class="font-royal font-bold text-xl text-[#B31B1B]">₹{{ number_format($total, 0) }}</span>
                            </div>
                        </div>

                        <!-- Proceed to Checkout Button -->
                        <a href="{{ route('checkout.index') }}" class="w-full py-4 rounded-xl bg-[#D72638] hover:bg-[#B31B1B] text-white text-xs font-bold uppercase tracking-wider transition shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                            <span>Proceed to Secure Checkout</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>

                        <div class="text-[11px] text-center text-gray-400 space-y-1">
                            <p>🔒 256-bit Bank Grade Security</p>
                            <p>100% Silk Mark Authenticity Assured</p>
                        </div>

                    </div>
                </div>

            </div>
        @else
            <!-- Empty Cart -->
            <div class="bg-white rounded-3xl p-12 lg:p-16 text-center border border-[#EFE8DC] max-w-xl mx-auto shadow-xs">
                <img src="{{ asset('images/motifs/jaapi.svg') }}" alt="Empty Cart" class="w-20 h-20 mx-auto mb-4 opacity-50">
                <h2 class="font-royal text-2xl font-bold text-[#1E0C0E]">Your Heritage Bag is Empty</h2>
                <p class="text-xs sm:text-sm text-[#7A6E68] mt-2 mb-6">
                    You haven’t added any handcrafted Assamese Mekhela Sador or Bihu jewellery yet.
                </p>
                <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl bg-[#1E0C0E] hover:bg-[#B31B1B] text-[#F5E5B4] text-xs font-bold uppercase tracking-wider transition shadow-md">
                    <span>Explore Handloom Collections</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        @endif

    </div>

@endsection
