@extends('layouts.app')

@section('title', 'Secure Checkout | Rina Hazarika Heritage Handlooms')

@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
        
        <!-- 3-Step 2D Progress Flow -->
        <div class="max-w-2xl mx-auto mb-8 sm:mb-10 px-2">
            <div class="flex items-center justify-between relative">
                <div class="absolute left-0 right-0 top-1/2 -translate-y-1/2 h-0.5 bg-[#EFE8DC] -z-0"></div>
                
                <div class="flex items-center gap-1.5 sm:gap-2 bg-[#FAF7F2] px-2 sm:px-3 relative z-10">
                    <span class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-[#1E0C0E] text-[#F5E5B4] text-[11px] sm:text-xs font-bold flex items-center justify-center">1</span>
                    <span class="text-[11px] sm:text-xs font-bold text-[#1E0C0E]"><span class="hidden sm:inline">Delivery </span>Details</span>
                </div>

                <div class="flex items-center gap-1.5 sm:gap-2 bg-[#FAF7F2] px-2 sm:px-3 relative z-10">
                    <span class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-[#D4AF37] text-[#1E0C0E] text-[11px] sm:text-xs font-bold flex items-center justify-center">2</span>
                    <span class="text-[11px] sm:text-xs font-bold text-[#7D5F10]">Payment<span class="hidden sm:inline"> Method</span></span>
                </div>

                <div class="flex items-center gap-1.5 sm:gap-2 bg-[#FAF7F2] px-2 sm:px-3 relative z-10">
                    <span class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-gray-200 text-gray-500 text-[11px] sm:text-xs font-bold flex items-center justify-center">3</span>
                    <span class="text-[11px] sm:text-xs font-medium text-gray-400"><span class="hidden sm:inline">Order </span>Confirmed</span>
                </div>
            </div>
        </div>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                
                <!-- Checkout Form Fields (8 cols) -->
                <div class="lg:col-span-8 space-y-8">
                    
                    <!-- Customer Information Box -->
                    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-[#EFE8DC] shadow-xs">
                        <h2 class="font-royal text-lg font-bold text-[#1E0C0E] mb-6 flex items-center gap-2 pb-3 border-b border-[#EFE8DC]">
                            <span class="w-6 h-6 rounded-full bg-[#1E0C0E] text-[#F5E5B4] text-xs flex items-center justify-center font-sans">1</span>
                            <span>Customer & Delivery Details</span>
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                            <div class="sm:col-span-2">
                                <label class="block font-bold text-[#1E0C0E] mb-1">Full Name *</label>
                                <input type="text" name="customer_name" value="{{ old('customer_name') }}" required placeholder="e.g. Priyadarshini Bordoloi" class="w-full p-3 bg-[#FAF7F2] border border-[#E0D3C1] rounded-xl focus:outline-none focus:border-[#C59B27]">
                                @error('customer_name') <span class="text-red-600 text-[11px]">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block font-bold text-[#1E0C0E] mb-1">Email Address *</label>
                                <input type="email" name="customer_email" value="{{ old('customer_email') }}" required placeholder="e.g. name@domain.com" class="w-full p-3 bg-[#FAF7F2] border border-[#E0D3C1] rounded-xl focus:outline-none focus:border-[#C59B27]">
                                @error('customer_email') <span class="text-red-600 text-[11px]">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block font-bold text-[#1E0C0E] mb-1">Contact Phone / WhatsApp *</label>
                                <input type="tel" name="customer_phone" value="{{ old('customer_phone') }}" required placeholder="e.g. +91 9876543210" class="w-full p-3 bg-[#FAF7F2] border border-[#E0D3C1] rounded-xl focus:outline-none focus:border-[#C59B27]">
                                @error('customer_phone') <span class="text-red-600 text-[11px]">{{ $message }}</span> @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block font-bold text-[#1E0C0E] mb-1">Full Shipping Address (House/Street/Landmark) *</label>
                                <textarea name="shipping_address" rows="3" required placeholder="House number, apartment name, street, nearest landmark..." class="w-full p-3 bg-[#FAF7F2] border border-[#E0D3C1] rounded-xl focus:outline-none focus:border-[#C59B27]">{{ old('shipping_address') }}</textarea>
                                @error('shipping_address') <span class="text-red-600 text-[11px]">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block font-bold text-[#1E0C0E] mb-1">City / Town *</label>
                                <input type="text" id="city-input" name="city" value="{{ old('city', 'Guwahati') }}" required class="w-full p-3 bg-[#FAF7F2] border border-[#E0D3C1] rounded-xl focus:outline-none focus:border-[#C59B27]">
                                <!-- Quick City Pills -->
                                <div class="flex flex-wrap gap-1 mt-2 text-[10px]">
                                    <button type="button" onclick="setCity('Guwahati')" class="px-2 py-0.5 rounded bg-[#F4ECE1] text-[#7A6E68] hover:text-[#B31B1B]">Guwahati</button>
                                    <button type="button" onclick="setCity('Jorhat')" class="px-2 py-0.5 rounded bg-[#F4ECE1] text-[#7A6E68] hover:text-[#B31B1B]">Jorhat</button>
                                    <button type="button" onclick="setCity('Dibrugarh')" class="px-2 py-0.5 rounded bg-[#F4ECE1] text-[#7A6E68] hover:text-[#B31B1B]">Dibrugarh</button>
                                    <button type="button" onclick="setCity('Tezpur')" class="px-2 py-0.5 rounded bg-[#F4ECE1] text-[#7A6E68] hover:text-[#B31B1B]">Tezpur</button>
                                    <button type="button" onclick="setCity('Delhi NCR')" class="px-2 py-0.5 rounded bg-[#F4ECE1] text-[#7A6E68] hover:text-[#B31B1B]">Delhi</button>
                                    <button type="button" onclick="setCity('Mumbai')" class="px-2 py-0.5 rounded bg-[#F4ECE1] text-[#7A6E68] hover:text-[#B31B1B]">Mumbai</button>
                                </div>
                                @error('city') <span class="text-red-600 text-[11px]">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block font-bold text-[#1E0C0E] mb-1">State *</label>
                                <input type="text" name="state" value="{{ old('state', 'Assam') }}" required class="w-full p-3 bg-[#FAF7F2] border border-[#E0D3C1] rounded-xl focus:outline-none focus:border-[#C59B27]">
                                @error('state') <span class="text-red-600 text-[11px]">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block font-bold text-[#1E0C0E] mb-1">PIN / Postal Code *</label>
                                <input type="text" name="postal_code" value="{{ old('postal_code') }}" required placeholder="e.g. 781001" class="w-full p-3 bg-[#FAF7F2] border border-[#E0D3C1] rounded-xl focus:outline-none focus:border-[#C59B27]">
                                @error('postal_code') <span class="text-red-600 text-[11px]">{{ $message }}</span> @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block font-bold text-[#1E0C0E] mb-1">Special Weaving or Delivery Note (Optional)</label>
                                <input type="text" name="order_notes" value="{{ old('order_notes') }}" placeholder="e.g. Custom blouse sizing preference, gift message..." class="w-full p-3 bg-[#FAF7F2] border border-[#E0D3C1] rounded-xl focus:outline-none focus:border-[#C59B27]">
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method Section -->
                    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-[#EFE8DC] shadow-xs">
                        <h2 class="font-royal text-lg font-bold text-[#1E0C0E] mb-6 flex items-center gap-2 pb-3 border-b border-[#EFE8DC]">
                            <span class="w-6 h-6 rounded-full bg-[#D4AF37] text-[#1E0C0E] text-xs flex items-center justify-center font-sans">2</span>
                            <span>Choose Payment Mode</span>
                        </h2>

                        <div class="space-y-4">
                            <!-- UPI Payment -->
                            <label class="flex items-start gap-4 p-4 rounded-2xl border-2 border-[#EFE8DC] hover:border-[#D4AF37] cursor-pointer transition has-checked:border-[#B31B1B] has-checked:bg-[#FFFDF7]">
                                <input type="radio" name="payment_method" value="upi" checked class="mt-1 text-[#B31B1B] focus:ring-[#B31B1B]">
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between">
                                        <span class="font-bold text-sm text-[#1E0C0E]">Instant UPI (Google Pay / PhonePe / Paytm / BHIM)</span>
                                        <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">Fastest & Secure</span>
                                    </div>
                                    <p class="text-xs text-[#7A6E68] mt-1">Instant QR scan & payment confirmation directly via UPI.</p>
                                </div>
                            </label>

                            <!-- Cash on Delivery -->
                            <label class="flex items-start gap-4 p-4 rounded-2xl border-2 border-[#EFE8DC] hover:border-[#D4AF37] cursor-pointer transition has-checked:border-[#B31B1B] has-checked:bg-[#FFFDF7]">
                                <input type="radio" name="payment_method" value="cod" class="mt-1 text-[#B31B1B] focus:ring-[#B31B1B]">
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between">
                                        <span class="font-bold text-sm text-[#1E0C0E]">Cash on Delivery (COD)</span>
                                        <span class="text-[10px] text-gray-500">Available Pan-India</span>
                                    </div>
                                    <p class="text-xs text-[#7A6E68] mt-1">Pay comfortably in cash or card to the courier upon delivery.</p>
                                </div>
                            </label>

                            <!-- Credit / Debit Cards -->
                            <label class="flex items-start gap-4 p-4 rounded-2xl border-2 border-[#EFE8DC] hover:border-[#D4AF37] cursor-pointer transition has-checked:border-[#B31B1B] has-checked:bg-[#FFFDF7]">
                                <input type="radio" name="payment_method" value="card" class="mt-1 text-[#B31B1B] focus:ring-[#B31B1B]">
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between">
                                        <span class="font-bold text-sm text-[#1E0C0E]">Credit / Debit Card / NetBanking</span>
                                        <span class="text-[10px] text-gray-500">Visa / Mastercard / RuPay</span>
                                    </div>
                                    <p class="text-xs text-[#7A6E68] mt-1">Encrypted 256-bit checkout gateway.</p>
                                </div>
                            </label>
                        </div>
                    </div>

                </div>

                <!-- Order Review Sidebar (4 cols) -->
                <div class="lg:col-span-4">
                    <div class="bg-white p-6 rounded-3xl border border-[#EFE8DC] shadow-xs sticky top-28 space-y-6">
                        <h3 class="font-royal text-base font-bold text-[#1E0C0E] uppercase tracking-wider pb-3 border-b border-[#EFE8DC]">
                            Items in this Order ({{ count($items) }})
                        </h3>

                        <!-- Mini Items List -->
                        <div class="space-y-3 max-h-60 overflow-y-auto pr-1">
                            @foreach($items as $item)
                                <div class="flex items-center gap-3 text-xs">
                                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-12 h-12 rounded-lg object-cover flex-shrink-0 border border-[#EFE8DC]">
                                    <div class="flex-grow min-w-0">
                                        <h4 class="font-semibold text-[#1E0C0E] truncate">{{ $item['name'] }}</h4>
                                        <span class="text-[11px] text-gray-500">Qty: {{ $item['quantity'] }}</span>
                                    </div>
                                    <span class="font-bold font-royal text-[#1E0C0E]">₹{{ number_format($item['subtotal'], 0) }}</span>
                                </div>
                            @endforeach
                        </div>

                        <!-- Calculations -->
                        <div class="space-y-3 text-xs text-[#4A3E38] pt-4 border-t border-[#EFE8DC]">
                            <div class="flex items-center justify-between">
                                <span>Subtotal:</span>
                                <span class="font-bold font-royal text-[#1E0C0E]">₹{{ number_format($subtotal, 0) }}</span>
                            </div>

                            @if($discount > 0)
                                <div class="flex items-center justify-between text-[#B31B1B]">
                                    <span>Promo Discount:</span>
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
                                <span>Pan-India Insured Courier:</span>
                                <span>
                                    @if($shipping == 0)
                                        <strong class="text-emerald-700 uppercase font-bold">FREE</strong>
                                    @else
                                        ₹{{ number_format($shipping, 0) }}
                                    @endif
                                </span>
                            </div>

                            <div class="pt-4 border-t border-[#EFE8DC] flex items-center justify-between text-base">
                                <span class="font-royal font-bold text-[#1E0C0E]">Total Payable:</span>
                                <span class="font-royal font-bold text-xl text-[#B31B1B]">₹{{ number_format($total, 0) }}</span>
                            </div>
                        </div>

                        <!-- Submit Order Button -->
                        <button type="submit" class="w-full py-4 rounded-xl bg-[#D72638] hover:bg-[#B31B1B] text-white text-xs font-bold uppercase tracking-wider transition shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                            <span>Confirm & Place Order</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </button>

                        <div class="text-[11px] text-center text-[#7A6E68] pt-2">
                            <span>Traditional Gamusa casing included with every order.</span>
                        </div>

                    </div>
                </div>

            </div>
        </form>

    </div>

@endsection

@push('scripts')
<script>
    function setCity(cityName) {
        const input = document.getElementById('city-input');
        if (input) input.value = cityName;
    }
</script>
@endpush
