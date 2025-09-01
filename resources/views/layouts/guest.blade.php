<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'KOZE KOST'))</title>
    
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.webmanifest') }}">
    
    @vite(['resources/css/app.css','resources/js/app.js'])
    @yield('head')
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Top Navigation -->
    <nav class="bg-white shadow-sm border-b sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center">
                    <h1 class="text-xl font-bold text-gray-900">KOZE KOST</h1>
                </a>
                
                <!-- Desktop Menu -->
                <ul class="hidden lg:flex space-x-6 xl:space-x-8 text-gray-700 font-medium">
                    <li><a href="/" class="hover:text-teal-600 transition-colors">HOME</a></li>
                    <li><a href="#why-choose-koze" class="hover:text-teal-600 transition-colors scroll-smooth">LAYANAN</a></li>
                    <li><a href="#" class="hover:text-teal-600 transition-colors">PLATFORM</a></li>
                    <li><a href="#contact" class="hover:text-teal-600 transition-colors scroll-smooth">CONTACTS</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-teal-600 transition-colors">LOGIN</a></li>
                    <li><a href="{{ route('register') }}" class="bg-teal-600 text-white px-6 py-2 rounded-lg hover:bg-teal-700 transition-colors">Register</a></li>
                </ul>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden flex flex-col space-y-1 p-2">
                    <span class="w-6 h-0.5 bg-gray-600 transition-all duration-300"></span>
                    <span class="w-6 h-0.5 bg-gray-600 transition-all duration-300"></span>
                    <span class="w-6 h-0.5 bg-gray-600 transition-all duration-300"></span>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu" class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40 opacity-0 invisible transition-all duration-300">
            <div class="fixed right-0 top-0 h-full w-80 max-w-sm bg-white shadow-xl transform translate-x-full transition-transform duration-300">
                <div class="flex justify-between items-center px-6 py-4 border-b">
                    <h2 class="text-xl font-bold text-gray-800">Menu</h2>
                    <button id="close-menu" class="p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <ul class="flex flex-col px-6 py-4 space-y-4">
                    <li><a href="/" class="block py-2 text-gray-700 hover:text-teal-600 transition-colors">HOME</a></li>
                    <li><a href="#why-choose-koze" class="block py-2 text-gray-700 hover:text-teal-600 transition-colors scroll-smooth">LAYANAN</a></li>
                    <li><a href="#" class="block py-2 text-gray-700 hover:text-teal-600 transition-colors">PLATFORM</a></li>
                    <li><a href="#contact" class="block py-2 text-gray-700 hover:text-teal-600 transition-colors scroll-smooth">CONTACTS</a></li>
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

    @yield('content')

    <!-- PWA Install Popup -->
    <div id="install-card" class="fixed inset-x-0 bottom-0 z-50 px-4 pb-6 hidden">
        <div class="mx-auto max-w-md rounded-2xl border border-slate-200 bg-white shadow-xl p-4">
            <div class="flex items-start gap-3">
                <div class="shrink-0 h-10 w-10 rounded-lg bg-teal-500 text-white grid place-items-center font-semibold">PWA</div>
                <div class="flex-1">
                    <h2 class="text-base font-semibold">Install this app</h2>
                    <p class="text-sm text-slate-600">Add it to your home screen for a faster, full-screen experience.</p>
                    <div class="mt-3 flex gap-2">
                        <button id="install-confirm" class="inline-flex items-center gap-2 rounded-lg bg-teal-600 hover:bg-teal-700 text-white px-3 py-2 text-sm font-medium">Install</button>
                        <button id="install-dismiss" class="inline-flex items-center gap-2 rounded-lg border border-slate-300 px-3 py-2 text-sm">Maybe later</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stack('scripts')

    <!-- Service Worker Registration -->
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
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

        mobileMenuBtn?.addEventListener('click', openMenu);
        closeMenuBtn?.addEventListener('click', closeMenu);
        
        // Close menu when clicking overlay
        mobileMenu?.addEventListener('click', (e) => {
            if (e.target === mobileMenu) {
                closeMenu();
            }
        });

        // Smooth scroll functionality
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').slice(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                    closeMenu(); // Close mobile menu if open
                }
            });
        });
    </script>
</body>
</html>
