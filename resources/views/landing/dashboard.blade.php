<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="logo.png">
    <link rel="manifest" href="/manifest.json">
    <title>KOZE MANAGEMENT</title>
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: white;
            color: #374151;
        }

        /* Navigation Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2.5rem;
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 20;
        }

        .navbar h1 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #374151;
        }

        .desktop-menu {
            display: none;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .desktop-menu a {
            text-decoration: none;
            color: #374151;
            font-weight: 500;
            transition: color 0.3s;
        }

        .desktop-menu a:hover {
            color: #0D9488;
        }

        .register-btn {
            background: #0D9488;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 0.5rem;
            transition: background 0.3s;
        }

        .register-btn:hover {
            background: #0F766E;
        }

        .mobile-menu-btn {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: 0.5rem;
            cursor: pointer;
        }

        .mobile-menu-btn span {
            width: 24px;
            height: 2px;
            background: #6B7280;
            transition: all 0.3s;
        }

        /* Mobile Menu Overlay */
        .mobile-menu-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 40;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }

        .mobile-menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .mobile-menu-content {
            position: fixed;
            right: 0;
            top: 0;
            height: 100%;
            width: 320px;
            max-width: calc(100vw - 2rem);
            background: white;
            box-shadow: -10px 0 25px rgba(0, 0, 0, 0.1);
            transform: translateX(100%);
            transition: transform 0.3s;
        }

        .mobile-menu-overlay.active .mobile-menu-content {
            transform: translateX(0);
        }

        /* Hero Section */
        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom right, #14B8A6, #2563EB);
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
        }

        .hero-content {
            position: relative;
            z-index: 10;
            width: 100%;
            padding: 0 1rem;
            max-width: 1280px;
            margin: 0 auto;
        }

        .hero-text {
            max-width: 50%;
            color: white;
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 4rem);
            font-weight: bold;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-description {
            font-size: 1.125rem;
            color: #E5E7EB;
            margin-bottom: 2rem;
        }

        /* Search Section */
        .search-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            transform: translateY(50%);
            padding: 0 1rem;
            z-index: 20;
        }

        .search-container {
            background: white;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border-radius: 1rem;
            max-width: 1280px;
            margin: 0 auto;
            padding: 1.5rem;
        }

        .search-desktop {
            display: none;
            align-items: center;
            gap: 1rem;
        }

        .search-mobile {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .input-group {
            position: relative;
            flex: 1;
        }

        .input-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9CA3AF;
        }

        .search-input, .search-select {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            border: 1px solid #D1D5DB;
            border-radius: 9999px;
            background: white;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s;
        }

        .search-input:focus, .search-select:focus {
            ring: 2px;
            ring-color: #0D9488;
            border-color: transparent;
        }

        .search-btn {
            background: #0D9488;
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 9999px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-btn:hover {
            background: #0F766E;
        }

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
            display: flex;
            gap: 2rem;
        }

        .calendar-month {
            flex: 1;
        }

        .month-title {
            text-align: center;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #374151;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 2px;
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

        /* Responsive */
        @media (min-width: 1024px) {
            .desktop-menu {
                display: flex;
            }
            
            .mobile-menu-btn {
                display: none;
            }
            
            .search-desktop {
                display: flex;
            }
            
            .search-mobile {
                display: none;
            }
            
            .hero-text {
                text-align: left;
            }
        }

        @media (max-width: 600px) {
            .calendar-container {
                flex-direction: column;
                gap: 1rem;
            }
        }

        .spacing {
            height: 4rem;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <!-- Logo/Brand -->
        <h1>KOZE MANAGEMENT</h1>
        
        <!-- Mobile Menu Button -->
        <button class="mobile-menu-btn" id="mobile-menu-btn">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Desktop Menu -->
        <ul class="desktop-menu">
            <li><a href="#">HOME</a></li>
            <li><a href="#">LAYANAN</a></li>
            <li><a href="#">PLATFORM</a></li>
            <li><a href="#">CONTACTS</a></li>
            <li><a href="#" >LOGIN</a></li>
            <li><a href="#" class="register-btn">Register</a></li>
        </ul>

        <!-- Mobile Menu Overlay -->
        <div class="mobile-menu-overlay" id="mobile-menu">
            <div class="mobile-menu-content">
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 1.5rem; border-bottom: 1px solid #E5E7EB;">
                    <h2 style="font-size: 1.25rem; font-weight: bold;">Menu</h2>
                    <button id="close-menu" style="background: none; border: none; font-size: 1.5rem; cursor: pointer;">×</button>
                </div>
                <ul style="list-style: none; padding: 1rem 1.5rem;">
                    <li style="margin-bottom: 1rem;"><a href="#" style="text-decoration: none; color: #374151;">HOME</a></li>
                    <li style="margin-bottom: 1rem;"><a href="#" style="text-decoration: none; color: #374151;">LAYANAN</a></li>
                    <li style="margin-bottom: 1rem;"><a href="#" style="text-decoration: none; color: #374151;">PLATFORM</a></li>
                    <li style="margin-bottom: 1rem;"><a href="#" style="text-decoration: none; color: #374151;">CONTACTS</a></li>
                    <li style="margin-bottom: 1rem; padding-top: 1rem; border-top: 1px solid #E5E7EB;"><a href="#" style="text-decoration: none; color: #374151;">LOGIN</a></li>
                    <li><a href="#" style="text-decoration: none; background: #0D9488; color: white; padding: 0.75rem 1rem; border-radius: 0.5rem; display: block; text-align: center;">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <!-- Background -->
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>

        <!-- Content -->
        <div class="hero-content">
            <div class="hero-text">
                <h2 class="hero-title">Find your perfect home away from home</h2>
                <p class="hero-description">
                    Temukan kost impian Anda dengan fasilitas lengkap dan komunitas yang hangat. 
                    Booking mudah, tinggal nyaman.
                </p>
            </div>
        </div>

        <!-- Search Section -->
        <div class="search-overlay">
            <div class="search-container">
                <!-- Desktop Search -->
                <div class="search-desktop">
                    <div class="input-group">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Cari Hunian" class="search-input">
                    </div>
                    
                    <div class="input-group" style="min-width: 160px;">
                        <i class="fas fa-calendar"></i>
                        <input type="text" placeholder="Mulai sewa" class="search-input" id="start-date-desktop" readonly style="cursor: pointer;">
                    </div>

                    <div class="input-group" style="min-width: 128px;">
                        <i class="fas fa-user"></i>
                        <select class="search-select">
                            <option>Penghuni 1</option>
                            <option>Penghuni 2</option>
                            <option>Penghuni 3+</option>
                        </select>
                    </div>

                    <button class="search-btn">Search</button>
                </div>

                <!-- Mobile Search -->
                <div class="search-mobile">
                    <div class="input-group">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Cari Hunian" class="search-input">
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div class="input-group">
                            <i class="fas fa-calendar"></i>
                            <input type="text" placeholder="Mulai sewa" class="search-input" id="start-date-mobile" readonly style="cursor: pointer;">
                        </div>

                        <div class="input-group">
                            <i class="fas fa-user"></i>
                            <select class="search-select">
                                <option>Penghuni 1</option>
                                <option>Penghuni 2</option>
                                <option>Penghuni 3+</option>
                            </select>
                        </div>
                    </div>

                    <button class="search-btn" style="width: 100%;">Search</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Calendar Popup -->
    <div class="calendar-overlay" id="calendar-popup">
        <div class="calendar-popup">
            <div class="calendar-header">
                <button class="calendar-nav" id="prev-month">‹</button>
                <div class="calendar-title" id="calendar-title">December 2024 - January 2025</div>
                <button class="calendar-nav" id="next-month">›</button>
            </div>
            
            <div class="calendar-container">
                <!-- December Calendar -->
                <div class="calendar-month">
                    <div class="month-title" id="month1-title">December</div>
                    <div class="calendar-grid" id="calendar1">
                        <!-- Calendar days will be generated by JavaScript -->
                    </div>
                </div>
                
                <!-- January Calendar -->
                <div class="calendar-month">
                    <div class="month-title" id="month2-title">January</div>
                    <div class="calendar-grid" id="calendar2">
                        <!-- Calendar days will be generated by JavaScript -->
                    </div>
                </div>
            </div>
            
            <div class="minimum-stay">
                <i class="fas fa-info-circle"></i> Minimum stay of 14 nights
            </div>
        </div>
    </div>

    <div class="spacing"></div>

    <script>
        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenuBtn = document.getElementById('close-menu');

        function openMenu() {
            mobileMenu.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMenu() {
            mobileMenu.classList.remove('active');
            document.body.style.overflow = '';
        }

        mobileMenuBtn.addEventListener('click', openMenu);
        closeMenuBtn.addEventListener('click', closeMenu);
        
        mobileMenu.addEventListener('click', (e) => {
            if (e.target === mobileMenu) {
                closeMenu();
            }
        });

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
        let currentMonth1 = new Date(2024, 11); // December 2024
        let currentMonth2 = new Date(2025, 0);  // January 2025

        const monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        function openCalendar() {
            calendarPopup.style.display = 'flex';
            generateCalendars();
            document.body.style.overflow = 'hidden';
        }

        function closeCalendar() {
            calendarPopup.style.display = 'none';
            document.body.style.overflow = '';
        }

        function generateCalendar(month, calendarId) {
            const calendar = document.getElementById(calendarId);
            calendar.innerHTML = '';
            
            const year = month.getFullYear();
            const monthIndex = month.getMonth();
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
                
                // Highlight December 9th as selected
                if (monthIndex === 11 && date === 9) {
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
            
            // Next month's leading days
            const totalCells = calendar.children.length;
            const remainingCells = 42 - totalCells; // 6 weeks × 7 days
            for (let date = 1; date <= remainingCells && date <= 15; date++) {
                const day = document.createElement('div');
                day.className = 'calendar-day other-month';
                day.textContent = date;
                calendar.appendChild(day);
            }
        }

        function generateCalendars() {
            generateCalendar(currentMonth1, 'calendar1');
            generateCalendar(currentMonth2, 'calendar2');
            
            document.getElementById('month1-title').textContent = monthNames[currentMonth1.getMonth()];
            document.getElementById('month2-title').textContent = monthNames[currentMonth2.getMonth()];
            
            calendarTitle.textContent = `${monthNames[currentMonth1.getMonth()]} ${currentMonth1.getFullYear()} - ${monthNames[currentMonth2.getMonth()]} ${currentMonth2.getFullYear()}`;
        }

        function navigateMonth(direction) {
            if (direction === 'prev') {
                currentMonth1.setMonth(currentMonth1.getMonth() - 1);
                currentMonth2.setMonth(currentMonth2.getMonth() - 1);
            } else {
                currentMonth1.setMonth(currentMonth1.getMonth() + 1);
                currentMonth2.setMonth(currentMonth2.getMonth() + 1);
            }
            generateCalendars();
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
        generateCalendars();
    </script>

</body>
</html>