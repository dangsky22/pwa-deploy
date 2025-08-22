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
    
    <!-- Calendar Popup Styles -->
    <style>
        /* Calendar Popup Styles */
        .calendar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 50;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .calendar-popup {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            max-width: 600px;
            width: 100%;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: scale(0.9);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .calendar-nav {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #6B7280;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s;
        }

        .calendar-nav:hover {
            background: #F3F4F6;
            color: #374151;
        }

        .calendar-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #374151;
        }

        .calendar-container {
            width: 100%;
        }

        .calendar-month {
            width: 100%;
        }

        .month-title {
            text-align: center;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #374151;
            font-size: 1.125rem;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
            margin-bottom: 1rem;
        }

        .calendar-day-header {
            text-align: center;
            font-size: 0.75rem;
            font-weight: 600;
            color: #6B7280;
            padding: 0.5rem 0;
        }

        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            cursor: pointer;
            font-size: 0.875rem;
            transition: all 0.3s;
            color: #374151;
            min-height: 40px;
        }

        .calendar-day:hover {
            background: #F3F4F6;
        }

        .calendar-day.selected {
            background: #0D9488;
            color: white;
        }

        .calendar-day.other-month {
            color: #D1D5DB;
        }

        .minimum-stay {
            background: #F3F4F6;
            padding: 0.5rem;
            border-radius: 0.5rem;
            margin: 1rem 0;
            text-align: center;
            font-size: 0.875rem;
            color: #6B7280;
        }
    </style>
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
            <div class="absolute inset-0 w-full h-full bg-cover bg-center bg-no-repeat" 
                 style="background-image: url('{{ asset('images/icons/dashboard.png') }}');">
            </div>
            
        </div>

 <!-- Content -->
        <div class="relative z-10 w-full">
            <div class="flex items-center">
                <!-- Left Text with White Background Wrapper - positioned to the far left -->
                <div class="w-full lg:w-auto lg:max-w-2xl pl-4 sm:pl-6 lg:pl-10">
                    <div class="bg-white bg-opacity-95 backdrop-blur-sm rounded-3xl p-6 lg:p-8 xl:p-12 shadow-xl">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold leading-tight text-gray-900 mb-6">
                            Find your perfect home away from home
                        </h1>
                        <p class="text-gray-700 text-base sm:text-lg lg:text-xl leading-relaxed">
                            Temukan kost impian Anda dengan fasilitas lengkap dan komunitas yang hangat. Booking mudah, tinggal nyaman.
                        </p>
                    </div>
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
                        <input type="text" placeholder="Mulai sewa" id="start-date-desktop" readonly
                               class="w-full pl-12 pr-4 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent appearance-none bg-white cursor-pointer">
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
                            <input type="text" placeholder="Mulai sewa" id="start-date-mobile" readonly
                                   class="w-full pl-12 pr-4 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent appearance-none bg-white cursor-pointer">
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

    <!-- Calendar Popup -->
    <div class="calendar-overlay" id="calendar-popup">
        <div class="calendar-popup">
            <div class="calendar-header">
                <button class="calendar-nav" id="prev-month">‹</button>
                <div class="calendar-title" id="calendar-title">December 2024</div>
                <button class="calendar-nav" id="next-month">›</button>
            </div>
            
            <div class="calendar-container">
                <!-- Single Month Calendar -->
                <div class="calendar-month">
                    <div class="month-title" id="current-month-title">December</div>
                    <!-- Day Headers -->
                    <div class="calendar-grid">
                        <div class="calendar-day-header">Sun</div>
                        <div class="calendar-day-header">Mon</div>
                        <div class="calendar-day-header">Tue</div>
                        <div class="calendar-day-header">Wed</div>
                        <div class="calendar-day-header">Thu</div>
                        <div class="calendar-day-header">Fri</div>
                        <div class="calendar-day-header">Sat</div>
                    </div>
                    <!-- Calendar Days -->
                    <div class="calendar-grid" id="current-calendar">
                        <!-- Calendar days will be generated by JavaScript -->
                    </div>
                </div>
            </div>
            
            <div class="minimum-stay">
                <i class="fas fa-info-circle"></i> Minimum stay of 14 nights
            </div>
        </div>
    </div>

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
                closeCalendar();
            }
        });

        // Calendar functionality
        const calendarPopup = document.getElementById('calendar-popup');
        const startDateDesktop = document.getElementById('start-date-desktop');
        const startDateMobile = document.getElementById('start-date-mobile');
        const prevMonthBtn = document.getElementById('prev-month');
        const nextMonthBtn = document.getElementById('next-month');
        const calendarTitle = document.getElementById('calendar-title');

        let currentDate = new Date();
        let selectedDate = null;
        let currentMonth = new Date(2024, 11); // Start with December 2024

        const monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        function openCalendar() {
            calendarPopup.style.display = 'flex';
            generateCalendar();
            document.body.classList.add('overflow-hidden');
        }

        function closeCalendar() {
            calendarPopup.style.display = 'none';
            document.body.classList.remove('overflow-hidden');
        }

        function generateCalendar() {
            const calendar = document.getElementById('current-calendar');
            calendar.innerHTML = '';
            
            const year = currentMonth.getFullYear();
            const monthIndex = currentMonth.getMonth();
            const firstDay = new Date(year, monthIndex, 1).getDay();
            const lastDate = new Date(year, monthIndex + 1, 0).getDate();
            const lastDatePrevMonth = new Date(year, monthIndex, 0).getDate();
            
            // Previous month's trailing days
            for (let i = firstDay - 1; i >= 0; i--) {
                const day = document.createElement('div');
                day.className = 'calendar-day other-month';
                day.textContent = lastDatePrevMonth - i;
                calendar.appendChild(day);
            }
            
            // Current month's days
            for (let date = 1; date <= lastDate; date++) {
                const day = document.createElement('div');
                day.className = 'calendar-day';
                day.textContent = date;
                
                // Highlight December 9th as selected initially
                if (monthIndex === 11 && date === 9 && year === 2024) {
                    day.classList.add('selected');
                    selectedDate = new Date(year, monthIndex, date);
                }
                
                day.addEventListener('click', () => {
                    // Remove previous selection
                    document.querySelectorAll('.calendar-day.selected').forEach(d => {
                        d.classList.remove('selected');
                    });
                    
                    // Add selection to clicked day
                    day.classList.add('selected');
                    selectedDate = new Date(year, monthIndex, date);
                    
                    // Update input fields
                    const dateStr = selectedDate.toLocaleDateString('id-ID', {
                        day: '2-digit',
                        month: '2-digit', 
                        year: 'numeric'
                    });
                    startDateDesktop.value = dateStr;
                    startDateMobile.value = dateStr;
                    
                    // Close calendar after selection
                    setTimeout(() => {
                        closeCalendar();
                    }, 300);
                });
                
                calendar.appendChild(day);
            }
            
            // Next month's leading days to fill the grid
            const totalCells = calendar.children.length;
            const remainingCells = 42 - totalCells; // 6 weeks × 7 days
            for (let date = 1; date <= remainingCells && date <= 15; date++) {
                const day = document.createElement('div');
                day.className = 'calendar-day other-month';
                day.textContent = date;
                calendar.appendChild(day);
            }

            // Update titles
            document.getElementById('current-month-title').textContent = monthNames[monthIndex];
            calendarTitle.textContent = `${monthNames[monthIndex]} ${year}`;
        }

        function navigateMonth(direction) {
            if (direction === 'prev') {
                currentMonth.setMonth(currentMonth.getMonth() - 1);
            } else {
                currentMonth.setMonth(currentMonth.getMonth() + 1);
            }
            generateCalendar();
        }

        // Event listeners
        startDateDesktop.addEventListener('click', openCalendar);
        startDateMobile.addEventListener('click', openCalendar);
        
        prevMonthBtn.addEventListener('click', () => navigateMonth('prev'));
        nextMonthBtn.addEventListener('click', () => navigateMonth('next'));
        
        calendarPopup.addEventListener('click', (e) => {
            if (e.target === calendarPopup) {
                closeCalendar();
            }
        });

        // Initialize calendar
        generateCalendar();
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