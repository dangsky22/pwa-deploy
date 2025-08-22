{{-- resources/views/landing/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <title>KOZE MANAGEMENT</title>
    @vite('resources/css/app.css')
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-white font-sans text-gray-800">

    <!-- Navbar -->
    <nav class="flex justify-between items-center px-4 sm:px-6 lg:px-10 py-4 shadow-md bg-white relative z-20">
        <!-- Logo/Brand -->
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">KOZE MANAGEMENT</h1>
        
        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="lg:hidden flex flex-col space-y-1 p-2">
            <span class="w-6 h-0.5 bg-gray-600 transition-all duration-300"></span>
            <span class="w-6 h-0.5 bg-gray-600 transition-all duration-300"></span>
            <span class="w-6 h-0.5 bg-gray-600 transition-all duration-300"></span>
        </button>

        <!-- Desktop Menu -->
        <ul class="hidden lg:flex space-x-6 xl:space-x-8 text-gray-700 font-medium">
            <li><a href="#" class="hover:text-teal-600 transition-colors">HOME</a></li>
            <li><a href="#" class="hover:text-teal-600 transition-colors">LAYANAN</a></li>
            <li><a href="#" class="hover:text-teal-600 transition-colors">PLATFORM</a></li>
            <li><a href="#" class="hover:text-teal-600 transition-colors">CONTACTS</a></li>
            <li><a href="{{ route('login') }}" class="hover:text-teal-600 transition-colors">LOGIN</a></li>
            <li><a href="{{ route('register') }}" class="bg-teal-600 text-white px-6 py-2 rounded-lg hover:bg-teal-700 transition-colors">Register</a></li>
        </ul>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu" class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40 opacity-0 invisible transition-all duration-300">
            <div class="fixed right-0 top-0 h-full w-80 max-w-sm bg-white shadow-xl transform translate-x-full transition-transform duration-300">
                <div class="flex justify-between items-center px-6 py-4 border-b">
                    <h2 class="text-xl font-bold text-gray-800">Menu</h2>
                    <button id="close-menu" class="p-2">
                        <span class="sr-only">Close menu</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <ul class="flex flex-col px-6 py-4 space-y-4">
                    <li><a href="#" class="block py-2 text-gray-700 hover:text-teal-600 transition-colors">HOME</a></li>
                    <li><a href="#" class="block py-2 text-gray-700 hover:text-teal-600 transition-colors">LAYANAN</a></li>
                    <li><a href="#" class="block py-2 text-gray-700 hover:text-teal-600 transition-colors">PLATFORM</a></li>
                    <li><a href="#" class="block py-2 text-gray-700 hover:text-teal-600 transition-colors">CONTACTS</a></li>
                    <li class="pt-4 border-t">
                        <a href="{{ route('login') }}" class="block py-2 text-gray-700 hover:text-teal-600 transition-colors">LOGIN</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="block bg-teal-600 text-white px-4 py-3 rounded-lg hover:bg-teal-700 transition-colors text-center">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <!-- Fallback background color -->
            <div class="w-full h-full bg-gradient-to-br from-teal-500 to-blue-600"></div>
            <!-- Main background image -->
            <img src="{{ asset('images/icons/kost.png')}}" 
                 alt="Couple relaxing at home"
                 class="absolute inset-0 w-full h-full object-cover"
                 onload="this.style.opacity='1'"
                 onerror="this.style.display='none'"
                 style="opacity: 0; transition: opacity 0.3s;">
            <!-- Dark overlay for better text readability -->
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 w-full px-4 sm:px-6 lg:px-10 max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <!-- Left Text -->
                <div class="w-full lg:w-1/2 space-y-4 sm:space-y-6 text-center lg:text-left">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold leading-tight text-white">
                        Find your perfect home away from home
                    </h2>
                    <p class="text-gray-200 text-base sm:text-lg lg:text-xl max-w-lg mx-auto lg:mx-0">
                        Temukan kost impian Anda dengan fasilitas lengkap dan komunitas yang hangat. 
                        Booking mudah, tinggal nyaman.
                    </p>
                </div>

                <!-- Right side - can be used for additional content if needed -->
                <div class="w-full lg:w-1/2 mt-8 lg:mt-0">
                    <!-- This space can be used for additional elements if needed -->
                </div>
            </div>
        </div>

        <!-- Search Section - Overlaying the hero -->
        <div class="absolute bottom-0 left-0 right-0 transform translate-y-1/2 px-4 sm:px-6 lg:px-10 z-20">
            <div class="bg-white shadow-xl rounded-2xl max-w-5xl mx-auto p-4 sm:p-6 relative z-10">
                <!-- Desktop Search -->
                <div class="hidden lg:flex items-center space-x-4">
                    <!-- Search Input with Icon -->
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" placeholder="Cari Hunian" 
                               class="w-full pl-12 pr-4 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent">
                    </div>
                    
                    <!-- Start Date Select with Icon -->
                    <div class="relative min-w-40">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-calendar text-gray-400"></i>
                        </div>
                        <select class="w-full pl-12 pr-4 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent appearance-none bg-white">
                            <option>Mulai sewa</option>
                            <option>Hari ini</option>
                            <option>Minggu depan</option>
                        </select>
                    </div>

                    <!-- Occupants Select with Icon -->
                    <div class="relative min-w-32">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <select class="w-full pl-12 pr-4 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent appearance-none bg-white">
                            <option>Penghuni 1</option>
                            <option>Penghuni 2</option>
                            <option>Penghuni 3+</option>
                        </select>
                    </div>

                    <!-- Search Button -->
                    <button class="bg-teal-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-teal-700 transition-colors whitespace-nowrap">
                        Search
                    </button>
                </div>

                <!-- Mobile Search -->
                <div class="lg:hidden space-y-4">
                    <!-- Search Input -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" placeholder="Cari Hunian" 
                               class="w-full pl-12 pr-4 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent">
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Date Select -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-calendar text-gray-400"></i>
                            </div>
                            <select class="w-full pl-12 pr-4 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent appearance-none bg-white">
                                <option>Mulai sewa</option>
                                <option>Hari ini</option>
                                <option>Minggu depan</option>
                            </select>
                        </div>

                        <!-- Occupants Select -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <select class="w-full pl-12 pr-4 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent appearance-none bg-white">
                                <option>Penghuni 1</option>
                                <option>Penghuni 2</option>
                                <option>Penghuni 3+</option>
                            </select>
                        </div>
                    </div>

                    <button class="w-full bg-teal-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-teal-700 transition-colors">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Add some spacing after hero for the overlapping search bar -->
    <div class="h-16"></div>

    <!-- JavaScript for Mobile Menu -->
    <script>
        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenuBtn = document.getElementById('close-menu');

        function openMenu() {
            mobileMenu.classList.remove('opacity-0', 'invisible');
            mobileMenu.classList.add('opacity-100', 'visible');
            mobileMenu.querySelector('div').classList.remove('translate-x-full');
            document.body.classList.add('overflow-hidden');
        }

        function closeMenu() {
            mobileMenu.classList.add('opacity-0', 'invisible');
            mobileMenu.classList.remove('opacity-100', 'visible');
            mobileMenu.querySelector('div').classList.add('translate-x-full');
            document.body.classList.remove('overflow-hidden');
        }

        mobileMenuBtn.addEventListener('click', openMenu);
        closeMenuBtn.addEventListener('click', closeMenu);
        
        // Close menu when clicking on overlay
        mobileMenu.addEventListener('click', (e) => {
            if (e.target === mobileMenu) {
                closeMenu();
            }
        });

        // Close menu on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeMenu();
            }
        });
    </script>

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
   if ("serviceWorker" in navigator) {
      // Register a service worker hosted at the root of the
      // site using the default scope.
      navigator.serviceWorker.register("/sw.js").then(
      (registration) => {
         console.log("Service worker registration succeeded:", registration);
      },
      (error) => {
         console.error(`Service worker registration failed: ${error}`);
      },
    );
      } else {
     console.error("Service workers are not supported.");
      }
    </script>
</body>
</html>