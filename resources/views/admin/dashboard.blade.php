{{-- resources/views/admin/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - KOZE MANAGEMENT</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">

    <!-- Top Navigation -->
    <nav class="bg-white shadow-sm border-b sticky top-0 z-30">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo & Title -->
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-gray-900">KOZE</h1>
                    <span class="ml-2 text-sm text-gray-500 hidden sm:block">Admin Panel</span>
                </div>
                
                <!-- Top Right -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button class="relative p-2 text-gray-400 hover:text-gray-600">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                    </button>
                    
                    <!-- User Menu -->
                    <div class="relative">
                        <button id="admin-menu-btn" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                            <div class="w-8 h-8 bg-teal-600 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-medium">AD</span>
                            </div>
                            <span class="hidden sm:block">Admin</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div id="admin-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i>Profile
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-cog mr-2"></i>Settings
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-shield-alt mr-2"></i>Security
                            </a>
                            <hr class="my-1">
                            <form action="{{ route('logout') }}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex h-screen bg-gray-50">
        <!-- Sidebar -->
        <div class="hidden lg:flex lg:w-64 lg:flex-col">
            <div class="flex-1 flex flex-col min-h-0 bg-white border-r">
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <nav class="mt-5 flex-1 px-2 space-y-1">
                        <!-- Dashboard -->
                        <a href="#" class="bg-teal-50 text-teal-700 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-chart-pie mr-3 text-lg"></i>
                            Dashboard
                        </a>
                        
                        <!-- Tenant Management -->
                        <div class="space-y-1">
                            <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                                <i class="fas fa-users mr-3 text-lg"></i>
                                Penghuni
                                <span class="ml-auto bg-gray-200 text-gray-600 text-xs px-2 py-1 rounded-full">24</span>
                            </a>
                        </div>
                        
                        <!-- Room Management -->
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-bed mr-3 text-lg"></i>
                            Kamar
                        </a>
                        
                        <!-- Payments -->
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-credit-card mr-3 text-lg"></i>
                            Pembayaran
                            <span class="ml-auto bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">5</span>
                        </a>
                        
                        <!-- Complaints -->
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-exclamation-triangle mr-3 text-lg"></i>
                            Keluhan
                            <span class="ml-auto bg-yellow-100 text-yellow-600 text-xs px-2 py-1 rounded-full">3</span>
                        </a>
                        
                        <!-- Maintenance -->
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-tools mr-3 text-lg"></i>
                            Maintenance
                        </a>
                        
                        <!-- Divider -->
                        <hr class="my-4">
                        
                        <!-- Buildings -->
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-building mr-3 text-lg"></i>
                            Buildings
                        </a>
                        
                        <!-- Reports -->
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-chart-bar mr-3 text-lg"></i>
                            Laporan
                        </a>
                        
                        <!-- Settings -->
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-cog mr-3 text-lg"></i>
                            Pengaturan
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Mobile Header -->
            <div class="lg:hidden bg-white border-b px-4 py-3">
                <div class="flex items-center justify-between">
                    <button id="open-sidebar" class="text-gray-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-lg font-semibold text-gray-900">Dashboard</h1>
                    <div class="relative">
                        <button class="p-1 text-gray-400">
                            <i class="fas fa-bell"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-6 lg:p-8">
                <!-- Header -->
                <div class="mb-8">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Dashboard Overview</h1>
                    <p class="text-gray-600">Selamat datang di panel admin KOZE Management</p>
                </div>

                <!-- Main Stats -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
                    <!-- Total Penghuni -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-users text-blue-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Penghuni</p>
                                <p class="text-2xl font-bold text-gray-900">24</p>
                                <p class="text-xs text-green-600">+2 bulan ini</p>
                            </div>
                        </div>
                    </div>

                    <!-- Kamar Tersedia -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-bed text-green-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Kamar Tersedia</p>
                                <p class="text-2xl font-bold text-gray-900">6</p>
                                <p class="text-xs text-gray-500">dari 30 kamar</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Payments -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-exclamation-circle text-red-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Pembayaran Tertunda</p>
                                <p class="text-2xl font-bold text-gray-900">5</p>
                                <p class="text-xs text-red-600">Perlu tindak lanjut</p>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Revenue -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-chart-line text-yellow-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Pendapatan Bulan Ini</p>
                                <p class="text-2xl font-bold text-gray-900">60M</p>
                                <p class="text-xs text-green-600">+8.5% dari bulan lalu</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Items & Recent Activities -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <!-- Action Items -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                            Perlu Tindakan
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg border border-red-200">
                                <div>
                                    <p class="font-medium text-gray-900 text-sm">5 Pembayaran Overdue</p>
                                    <p class="text-xs text-gray-600">Lebih dari 7 hari terlambat</p>
                                </div>
                                <button class="text-red-600 hover:text-red-800 text-sm font-medium">
                                    Lihat Detail
                                </button>
                            </div>
                            
                            <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                                <div>
                                    <p class="font-medium text-gray-900 text-sm">3 Keluhan Belum Ditangani</p>
                                    <p class="text-xs text-gray-600">AC rusak, kebocoran air</p>
                                </div>
                                <button class="text-yellow-600 hover:text-yellow-800 text-sm font-medium">
                                    Tangani
                                </button>
                            </div>
                            
                            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg border border-blue-200">
                                <div>
                                    <p class="font-medium text-gray-900 text-sm">2 Kontrak Akan Berakhir</p>
                                    <p class="text-xs text-gray-600">Dalam 30 hari ke depan</p>
                                </div>
                                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    Hubungi
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activities -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-clock text-teal-600 mr-2"></i>
                            Aktivitas Terbaru
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm text-gray-900">John Doe membayar sewa September</p>
                                    <p class="text-xs text-gray-500">2 jam yang lalu</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm text-gray-900">Kamar A-103 check-in baru</p>
                                    <p class="text-xs text-gray-500">5 jam yang lalu</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-red-500 rounded-full mt-2"></div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm text-gray-900">Keluhan AC rusak dari kamar B-205</p>
                                    <p class="text-xs text-gray-500">1 hari yang lalu</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2"></div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm text-gray-900">Maintenance scheduled untuk lift</p>
                                    <p class="text-xs text-gray-500">2 hari yang lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Tables -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Top Performing Buildings -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Building Performance</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Anarta</span>
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm font-medium">95% Ocupancy</span>
                                    <div class="w-16 bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-600 h-2 rounded-full" style="width: 95%"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Alesha</span>
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm font-medium">88% Ocupancy</span>
                                    <div class="w-16 bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-500 h-2 rounded-full" style="width: 88%"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">The West End</span>
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm font-medium">75% Ocupancy</span>
                                    <div class="w-16 bg-gray-200 rounded-full h-2">
                                        <div class="bg-yellow-500 h-2 rounded-full" style="width: 75%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Payments -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Pembayaran Terbaru</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">John Doe (A-205)</p>
                                    <p class="text-xs text-gray-500">September 2025</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-medium text-green-600">Rp 2.5M</p>
                                    <p class="text-xs text-gray-500">2 jam lalu</p>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Jane Smith (B-103)</p>
                                    <p class="text-xs text-gray-500">September 2025</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-medium text-green-600">Rp 2.8M</p>
                                    <p class="text-xs text-gray-500">5 jam lalu</p>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Mike Johnson (C-301)</p>
                                    <p class="text-xs text-gray-500">September 2025</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-medium text-green-600">Rp 3.2M</p>
                                    <p class="text-xs text-gray-500">1 hari lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Sidebar -->
    <div class="lg:hidden fixed inset-0 z-40 hidden" id="mobile-sidebar">
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>
        <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" id="close-sidebar">
                    <i class="fas fa-times text-white"></i>
                </button>
            </div>
            <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                <nav class="mt-5 px-2 space-y-1">
                    <a href="#" class="bg-teal-50 text-teal-700 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                        <i class="fas fa-chart-pie mr-3"></i>
                        Dashboard
                    </a>
                    <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                        <i class="fas fa-users mr-3"></i>
                        Penghuni
                    </a>
                    <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                        <i class="fas fa-bed mr-3"></i>
                        Kamar
                    </a>
                    <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                        <i class="fas fa-credit-card mr-3"></i>
                        Pembayaran
                    </a>
                    <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                        <i class="fas fa-exclamation-triangle mr-3"></i>
                        Keluhan
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <script>
        // Mobile sidebar functionality
        const openSidebar = document.getElementById('open-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');
        const mobileSidebar = document.getElementById('mobile-sidebar');

        if (openSidebar) {
            openSidebar.addEventListener('click', () => {
                mobileSidebar.classList.remove('hidden');
            });
        }

        if (closeSidebar) {
            closeSidebar.addEventListener('click', () => {
                mobileSidebar.classList.add('hidden');
            });
        }

        mobileSidebar.addEventListener('click', (e) => {
            if (e.target === mobileSidebar) {
                mobileSidebar.classList.add('hidden');
            }
        });

        // Admin dropdown functionality
        const adminMenuBtn = document.getElementById('admin-menu-btn');
        const adminDropdown = document.getElementById('admin-dropdown');

        adminMenuBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            adminDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!adminMenuBtn.contains(e.target) && !adminDropdown.contains(e.target)) {
                adminDropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>