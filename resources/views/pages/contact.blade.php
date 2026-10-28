@extends('layouts.app')

@section('title', 'Custom Bridal Weave & Atelier Concierge | Rina Hazarika')

@section('content')

    <!-- Header -->
    <div class="bg-[#1E0C0E] text-[#ECE2D0] py-14 border-b border-[#D4AF37]/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-2xl">
            <span class="text-xs font-bold text-[#D4AF37] uppercase tracking-widest block font-royal mb-2">Bespoke Concierge</span>
            <h1 class="font-royal text-3xl sm:text-4xl font-bold text-white tracking-wide">
                Custom Bridal Weaves & Loom Visits
            </h1>
            <p class="text-xs sm:text-sm text-[#D8CCA3] mt-2 leading-relaxed">
                Commission a bespoke heirloom Mekhela Sador woven to your wedding specifications or schedule a private loom tour in Sualkuchi.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Contact & Custom Form (7 cols) -->
            <div class="lg:col-span-7 bg-white p-6 sm:p-10 rounded-3xl border border-[#EFE8DC] shadow-xs">
                <h2 class="font-royal text-xl font-bold text-[#1E0C0E] mb-2">Commission an Axomiya Heirloom</h2>
                <p class="text-xs text-[#7A6E68] mb-6">Our master weavers and jewellery curators will connect with you directly.</p>

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4 text-xs">
                    @csrf

                    <div>
                        <label class="block font-bold text-[#1E0C0E] mb-1">Your Full Name *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Archana Hazarika" class="w-full p-3 bg-[#FAF7F2] border border-[#E0D3C1] rounded-xl focus:outline-none focus:border-[#C59B27]">
                        @error('name') <span class="text-red-600 text-[11px]">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-bold text-[#1E0C0E] mb-1">Email Address *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="name@domain.com" class="w-full p-3 bg-[#FAF7F2] border border-[#E0D3C1] rounded-xl focus:outline-none focus:border-[#C59B27]">
                            @error('email') <span class="text-red-600 text-[11px]">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block font-bold text-[#1E0C0E] mb-1">Phone / WhatsApp *</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="+91 9876543210" class="w-full p-3 bg-[#FAF7F2] border border-[#E0D3C1] rounded-xl focus:outline-none focus:border-[#C59B27]">
                            @error('phone') <span class="text-red-600 text-[11px]">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block font-bold text-[#1E0C0E] mb-1">Select Area of Interest *</label>
                        <select name="interest" required class="w-full p-3 bg-[#FAF7F2] border border-[#E0D3C1] rounded-xl focus:outline-none focus:border-[#C59B27]">
                            <option value="Bridal Mekhela Sador Commission">Bespoke Bridal Mekhela Sador (Custom Zari & Color)</option>
                            <option value="Full Bridal Jewellery Suite">Complete Traditional Jewellery Suite (Gamkharu + Dholbiri)</option>
                            <option value="Sualkuchi Loom Experience">Private Sualkuchi Loom Atelier Visit</option>
                            <option value="Corporate / Bulk Heritage Gifting">Festive Corporate Gifting & Traditional Gamusa</option>
                            <option value="General Inquiries">General Sizing & Authenticity Inquiries</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-[#1E0C0E] mb-1">Your Message or Wedding Timeline *</label>
                        <textarea name="message" rows="4" required placeholder="Describe your preferred silk type, motif preferences (e.g. Kingkhap, peacock), wedding date, or custom requests..." class="w-full p-3 bg-[#FAF7F2] border border-[#E0D3C1] rounded-xl focus:outline-none focus:border-[#C59B27]">{{ old('message') }}</textarea>
                        @error('message') <span class="text-red-600 text-[11px]">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="w-full py-4 rounded-xl bg-[#1E0C0E] hover:bg-[#B31B1B] text-[#F5E5B4] text-xs font-bold uppercase tracking-wider transition shadow-md">
                        Send Concierge Inquiry
                    </button>
                </form>
            </div>

            <!-- Atelier Information (5 cols) -->
            <div class="lg:col-span-5 space-y-6">
                
                <div class="bg-white p-6 sm:p-8 rounded-3xl border border-[#EFE8DC] shadow-xs space-y-6 text-xs text-[#4A3E38]">
                    <h3 class="font-royal text-base font-bold text-[#1E0C0E] uppercase tracking-wider pb-3 border-b border-[#EFE8DC]">
                        Ateliers & Showrooms
                    </h3>

                    <div>
                        <span class="font-bold text-[#1E0C0E] block text-sm">Guwahati Flagship Showroom</span>
                        <p class="mt-1 leading-relaxed text-[#7A6E68]">
                            GS Road, Near Christian Basti, Guwahati, Assam 781005<br>
                            Open Monday – Saturday: 10:30 AM to 8:30 PM
                        </p>
                    </div>

                    <div>
                        <span class="font-bold text-[#1E0C0E] block text-sm">Sualkuchi Weaving Hub</span>
                        <p class="mt-1 leading-relaxed text-[#7A6E68]">
                            Bhatipara Handloom Cluster, Sualkuchi, Kamrup District, Assam<br>
                            Loom tours available by prior appointment.
                        </p>
                    </div>

                    <div>
                        <span class="font-bold text-[#1E0C0E] block text-sm">Ranthali Goldsmith Guild</span>
                        <p class="mt-1 leading-relaxed text-[#7A6E68]">
                            Traditional Filigree Workshop, Ranthali, Barpeta, Assam
                        </p>
                    </div>

                    <div class="pt-4 border-t border-[#EFE8DC] space-y-2">
                        <p><strong class="text-[#1E0C0E]">WhatsApp Concierge:</strong> +91 98765 43210</p>
                        <p><strong class="text-[#1E0C0E]">Direct Support:</strong> care@rinahazarika.com</p>
                    </div>
                </div>

                <!-- Silk Mark Certification Card -->
                <div class="bg-[#FFFDF7] p-6 rounded-3xl border border-[#D4AF37]/40 shadow-xs flex items-center gap-4">
                    <img src="{{ asset('images/motifs/jaapi.svg') }}" alt="Jaapi" class="w-12 h-12 flex-shrink-0">
                    <div class="text-xs">
                        <span class="font-bold text-[#1E0C0E] block">100% Authenticity Guarantee</span>
                        <p class="text-[#7A6E68] mt-0.5">Every Mekhela Sador comes with verifiable Silk Mark hologram tags and artisan identity cards.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
