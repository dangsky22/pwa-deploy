{{-- resources/views/landing/partials/flexible-housing.blade.php --}}
<section class="py-16 px-4 sm:px-6 lg:px-10 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-16">
            
            <!-- Left Side - Image Grid -->
            <div class="w-full lg:w-1/2">
                <div class="grid grid-cols-2 gap-4">
                    <!-- Top Left Image -->
                    <div class="relative">
                        <img src="{{ asset('images/flexible/coworking-space.jpg') }}" 
                             alt="Coworking Space" 
                             class="w-full h-48 object-cover rounded-2xl shadow-lg">
                    </div>
                    
                    <!-- Top Right Image -->
                    <div class="relative">
                        <img src="{{ asset('images/flexible/modern-living.jpg') }}" 
                             alt="Modern Living" 
                             class="w-full h-48 object-cover rounded-2xl shadow-lg">
                    </div>
                    
                    <!-- Bottom Left Image -->
                    <div class="relative">
                        <img src="{{ asset('images/flexible/video-call.jpg') }}" 
                             alt="Video Call Workspace" 
                             class="w-full h-48 object-cover rounded-2xl shadow-lg">
                    </div>
                    
                    <!-- Bottom Right Image -->
                    <div class="relative">
                        <img src="{{ asset('images/flexible/teamwork.jpg') }}" 
                             alt="Teamwork" 
                             class="w-full h-48 object-cover rounded-2xl shadow-lg">
                    </div>
                </div>
            </div>

            <!-- Right Side - Content -->
            <div class="w-full lg:w-1/2">
                <div class="space-y-6">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                        Masa Depan Hunian yang Fleksibel
                    </h2>
                    
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Kami percaya pada dunia dimana mencari hunian ideal hanya dengan sekali klik. Baik Anda mahasiswa baru, pekerja yang pindah kota, atau mencari tempat tinggal sementara - bawa tas Anda, biarkan kami mengurus sisanya.
                    </p>
                    
                    <!-- Call-to-action button -->
                    <div class="pt-4">
                        <button class="bg-teal-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-teal-700 transition-colors inline-flex items-center gap-2">
                            Mulai Pencarian
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>