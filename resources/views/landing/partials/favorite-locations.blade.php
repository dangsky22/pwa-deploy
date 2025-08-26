{{-- resources/views/landing/partials/favorite-locations.blade.php --}}
<!-- Section Pilih lokasi favoritmu -->
<section class="py-16 px-4 sm:px-6 lg:px-10 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-8">
                Pilih lokasi favoritmu
            </h2>
        </div>

        <!-- Locations Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
              <!-- Benhil -->
            <div class="group cursor-pointer">
                <div class="relative overflow-hidden rounded-2xl mb-4">
                    <img src="{{ asset('images/icons/.png') }}" 
                         alt="Benhil" 
                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 pointer-events-none"></div>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 text-center">Benhil</h3>
            </div>


            <!-- Alesha -->
            <div class="group cursor-pointer">
                <div class="relative overflow-hidden rounded-2xl mb-4">
                    <img src="{{ asset('images/icons/alesha.png') }}" 
                         alt="Alesha" 
                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 pointer-events-none"></div>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 text-center">Alesha</h3>
            </div>

            <!-- The West End -->
            <div class="group cursor-pointer">
                <div class="relative overflow-hidden rounded-2xl mb-4">
                    <img src="{{ asset('images/icons/west_end.png') }}" 
                         alt="The West End" 
                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 pointer-events-none"></div>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 text-center">The West End</h3>
            </div>

            <!-- Anarta -->
            <div class="group cursor-pointer">
                <div class="relative overflow-hidden rounded-2xl mb-4">
                    <img src="{{ asset('images/icons/anarta.png') }}" 
                         alt="Anarta" 
                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 pointer-events-none"></div>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 text-center">Anarta</h3>
            </div>
            <!-- Piaza The Mozia -->
            <div class="group cursor-pointer">
                <div class="relative overflow-hidden rounded-2xl mb-4">
                    <img src="{{ asset('images/icons/piaza.png') }}" 
                         alt="Piaza The Mozia" 
                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 pointer-events-none"></div>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 text-center">Piaza The Mozia</h3>
            </div>
        </div>

        <!-- View All Button -->
        <div class="text-center">
            <button class="bg-teal-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-teal-700 transition-colors inline-flex items-center gap-2">
                View all spaces
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>
</section>