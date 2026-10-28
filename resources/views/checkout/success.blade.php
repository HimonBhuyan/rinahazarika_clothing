@extends('layouts.app')

@section('title', 'Order Confirmed #' . $order->order_number . ' | Rina Hazarika')

@section('content')

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        
        <!-- Celebration Header -->
        <div class="text-center mb-10">
            <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center mx-auto mb-4 border-2 border-emerald-500 shadow-md">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
            </div>
            
            <span class="text-xs font-bold text-[#B31B1B] uppercase tracking-widest block font-royal mb-1">ধন্যবাদ • Order Placed Successfully</span>
            <h1 class="font-royal text-3xl sm:text-4xl font-bold text-[#1E0C0E]">Thank You for Honoring Assamese Heritage</h1>
            <p class="text-xs sm:text-sm text-[#7A6E68] mt-2 max-w-lg mx-auto">
                Your heirloom handloom order has been received at our Sualkuchi Loom Atelier. An order confirmation has been emailed to <strong>{{ $order->customer_email }}</strong>.
            </p>
            <div class="mt-4 inline-flex items-center gap-2 bg-[#FFFDF7] border border-[#D4AF37] px-4 py-2 rounded-full text-xs font-bold font-mono text-[#7D5F10]">
                <span>Order Reference:</span>
                <span class="text-[#1E0C0E]">{{ $order->order_number }}</span>
            </div>
        </div>

        <!-- 4-Stage Delivery Timeline (2D Flow) -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-[#EFE8DC] shadow-xs mb-8">
            <h2 class="font-royal text-sm font-bold uppercase tracking-wider text-[#1E0C0E] mb-6">Artisan Packaging & Delivery Journey</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 relative">
                <!-- Step 1 -->
                <div class="flex sm:flex-col items-center sm:text-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-emerald-600 text-white flex items-center justify-center text-xs font-bold shadow">
                        ✓
                    </div>
                    <div>
                        <span class="font-bold text-xs text-[#1E0C0E] block">Confirmed</span>
                        <span class="text-[11px] text-gray-500">Order Placed</span>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="flex sm:flex-col items-center sm:text-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#D4AF37] text-[#1E0C0E] flex items-center justify-center text-xs font-bold shadow">
                        2
                    </div>
                    <div>
                        <span class="font-bold text-xs text-[#1E0C0E] block">Loom Inspection</span>
                        <span class="text-[11px] text-gray-500">Quality Checked</span>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="flex sm:flex-col items-center sm:text-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#FAF7F2] border border-[#E0D3C1] text-gray-400 flex items-center justify-center text-xs font-bold">
                        3
                    </div>
                    <div>
                        <span class="font-bold text-xs text-gray-400 block">Insured Dispatch</span>
                        <span class="text-[11px] text-gray-400">Bluedart / DTDC Air</span>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="flex sm:flex-col items-center sm:text-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#FAF7F2] border border-[#E0D3C1] text-gray-400 flex items-center justify-center text-xs font-bold">
                        4
                    </div>
                    <div>
                        <span class="font-bold text-xs text-gray-400 block">Delivery</span>
                        <span class="text-[11px] text-gray-400">Within 3-5 Days</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Receipt Summary Card -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-[#EFE8DC] shadow-xs space-y-6">
            <div class="flex items-center justify-between pb-4 border-b border-[#EFE8DC]">
                <div>
                    <span class="text-xs text-[#7A6E68]">Ordered on: {{ $order->created_at->format('M d, Y • h:i A') }}</span>
                    <span class="block text-xs font-bold text-[#1E0C0E]">Payment Mode: {{ strtoupper($order->payment_method) }}</span>
                </div>
                <button type="button" onclick="window.print()" class="px-4 py-2 rounded-lg bg-[#FAF7F2] hover:bg-[#F4ECE1] text-[#1E0C0E] border border-[#E0D3C1] text-xs font-bold transition flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    <span>Print Invoice</span>
                </button>
            </div>

            <!-- Shipping Address Details -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-xs text-[#4A3E38]">
                <div class="p-4 rounded-xl bg-[#FAF7F2]">
                    <span class="font-bold text-[#1E0C0E] block mb-1">Delivering To:</span>
                    <p class="font-semibold text-sm text-[#1E0C0E]">{{ $order->customer_name }}</p>
                    <p class="mt-1 leading-relaxed">{{ $order->shipping_address }}, {{ $order->city }}, {{ $order->state }} - {{ $order->postal_code }}</p>
                    <p class="mt-1">Phone: {{ $order->customer_phone }}</p>
                </div>

                <div class="p-4 rounded-xl bg-[#FAF7F2]">
                    <span class="font-bold text-[#1E0C0E] block mb-1">Assamese Packaging Protocol:</span>
                    <p class="leading-relaxed">All textiles are sealed in breathable virgin muslin cloth. Ornaments are buffered in plush red velvet cases.</p>
                    @if($order->has_gamusa_gift_wrap)
                        <span class="inline-block mt-2 font-bold text-[#B31B1B]">✓ Traditional Red-and-White Gamusa Wrapping Included</span>
                    @endif
                </div>
            </div>

            <!-- Ordered Items List -->
            <div class="divide-y divide-[#EFE8DC] pt-2">
                @foreach($order->items as $item)
                    <div class="py-3 flex items-center justify-between gap-4 text-xs">
                        <div class="flex items-center gap-3">
                            @if($item->image)
                                <img src="{{ asset($item->image) }}" alt="{{ $item->product_name }}" class="w-12 h-12 rounded-lg object-cover border border-[#EFE8DC]">
                            @endif
                            <div>
                                <h3 class="font-bold text-[#1E0C0E]">{{ $item->product_name }}</h3>
                                <span class="text-gray-500">Qty: {{ $item->quantity }} × ₹{{ number_format($item->price, 0) }}</span>
                            </div>
                        </div>
                        <span class="font-bold font-royal text-[#1E0C0E]">₹{{ number_format($item->subtotal, 0) }}</span>
                    </div>
                @endforeach
            </div>

            <!-- Total Calculations -->
            <div class="pt-4 border-t border-[#EFE8DC] space-y-2 text-xs text-[#4A3E38]">
                <div class="flex justify-between">
                    <span>Subtotal:</span>
                    <span class="font-bold font-royal">₹{{ number_format($order->subtotal, 0) }}</span>
                </div>
                @if($order->discount_amount > 0)
                    <div class="flex justify-between text-[#B31B1B]">
                        <span>Promo Discount:</span>
                        <span class="font-bold">-₹{{ number_format($order->discount_amount, 0) }}</span>
                    </div>
                @endif
                @if($order->has_gamusa_gift_wrap)
                    <div class="flex justify-between text-[#7D5F10]">
                        <span>Gamusa Wrap:</span>
                        <span class="font-bold">+₹150</span>
                    </div>
                @endif
                <div class="flex justify-between">
                    <span>Insured Courier:</span>
                    <span class="font-bold text-emerald-700">FREE</span>
                </div>
                <div class="pt-3 border-t border-[#EFE8DC] flex justify-between text-base">
                    <span class="font-royal font-bold text-[#1E0C0E]">Grand Total:</span>
                    <span class="font-royal font-bold text-xl text-[#B31B1B]">₹{{ number_format($order->total_amount, 0) }}</span>
                </div>
            </div>

            <!-- Back to Shop -->
            <div class="pt-6 border-t border-[#EFE8DC] flex flex-col sm:flex-row items-center justify-between gap-4">
                <a href="{{ route('home') }}" class="text-xs font-semibold text-[#B31B1B] hover:underline">
                    &larr; Back to Home Page
                </a>
                <a href="{{ route('shop') }}" class="px-6 py-2.5 rounded-xl bg-[#1E0C0E] hover:bg-[#B31B1B] text-[#F5E5B4] text-xs font-bold uppercase tracking-wider transition">
                    Explore More Creations
                </a>
            </div>

        </div>

    </div>

@endsection
