{{-- resources/views/tenant/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penghuni - KOZE MANAGEMENT</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">

    <!-- Top Navigation -->
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-gray-900">KOZE</h1>
                    <span class="ml-2 text-sm text-gray-500">Dashboard</span>
                </div>
                
                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                            <div class="w-8 h-8 bg-teal-600 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-medium">JD</span>
                            </div>
                            <span class="hidden sm:block">John Doe</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
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
                        <a href="#" class="bg-teal-50 text-teal-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-home mr-3"></i>
                            Dashboard
                        </a>
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-bed mr-3"></i>
                            My Room
                        </a>
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-credit-card mr-3"></i>
                            Payments
                        </a>
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-exclamation-triangle mr-3"></i>
                            Complaints
                        </a>
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-user mr-3"></i>
                            Profile
                        </a>
                    </nav>
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
                        <a href="#" class="bg-teal-50 text-teal-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-home mr-3"></i>
                            Dashboard
                        </a>
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-bed mr-3"></i>
                            My Room
                        </a>
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-credit-card mr-3"></i>
                            Payments
                        </a>
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-exclamation-triangle mr-3"></i>
                            Complaints
                        </a>
                        <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-user mr-3"></i>
                            Profile
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
                    <div></div>
                </div>
            </div>

            <div class="p-4 sm:p-6 lg:p-8">
                <!-- Welcome Section -->
                <div class="mb-8">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">
                        Selamat datang, John!
                    </h1>
                    <p class="text-gray-600">Berikut adalah ringkasan aktivitas kost Anda hari ini.</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
                    <!-- Kontrak Status -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-file-contract text-green-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Kontrak</p>
                                <p class="text-2xl font-bold text-gray-900">Aktif</p>
                                <p class="text-xs text-gray-500">Berakhir 15 Des 2025</p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Status -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-credit-card text-yellow-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Pembayaran</p>
                                <p class="text-2xl font-bold text-gray-900">Pending</p>
                                <p class="text-xs text-gray-500">Jatuh tempo 5 Sep</p>
                            </div>
                        </div>
                    </div>

                    <!-- Room Number -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-door-open text-blue-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Kamar</p>
                                <p class="text-2xl font-bold text-gray-900">A-205</p>
                                <p class="text-xs text-gray-500">Anarta Building</p>
                            </div>
                        </div>
                    </div>

                    <!-- Complaints -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-tools text-red-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Keluhan</p>
                                <p class="text-2xl font-bold text-gray-900">1</p>
                                <p class="text-xs text-gray-500">Dalam proses</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <!-- Payment Section -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            <i class="fas fa-credit-card text-teal-600 mr-2"></i>
                            Pembayaran Bulanan
                        </h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                                <div>
                                    <p class="font-medium text-gray-900">September 2025</p>
                                    <p class="text-sm text-gray-600">Jatuh tempo: 5 September</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-bold text-gray-900">Rp 2.500.000</p>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                </div>
                            </div>
                            <button class="w-full bg-teal-600 text-white py-3 rounded-lg font-medium hover:bg-teal-700 transition-colors">
                                Bayar Sekarang
                            </button>
                        </div>
                    </div>

                    <!-- Room Info -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            <i class="fas fa-bed text-teal-600 mr-2"></i>
                            Informasi Kamar
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Nomor Kamar:</span>
                                <span class="font-medium text-gray-900">A-205</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Building:</span>
                                <span class="font-medium text-gray-900">Anarta</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tipe:</span>
                                <span class="font-medium text-gray-900">Single Room</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Check-in:</span>
                                <span class="font-medium text-gray-900">15 Jan 2025</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Kontrak Berakhir:</span>
                                <span class="font-medium text-gray-900">15 Des 2025</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities & Quick Actions -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent Activities -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            <i class="fas fa-clock text-teal-600 mr-2"></i>
                            Aktivitas Terbaru
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                                <div>
                                    <p class="text-sm text-gray-900">Pembayaran Agustus berhasil</p>
                                    <p class="text-xs text-gray-500">2 hari yang lalu</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                                <div>
                                    <p class="text-sm text-gray-900">Keluhan AC diperbaiki</p>
                                    <p class="text-xs text-gray-500">5 hari yang lalu</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2"></div>
                                <div>
                                    <p class="text-sm text-gray-900">Reminder pembayaran September</p>
                                    <p class="text-xs text-gray-500">1 minggu yang lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            <i class="fas fa-bolt text-teal-600 mr-2"></i>
                            Quick Actions
                        </h3>
                        <div class="grid grid-cols-2 gap-4">
                            <button class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class="fas fa-exclamation-triangle text-red-500 text-xl mb-2"></i>
                                <span class="text-sm font-medium text-gray-700">Lapor Masalah</span>
                            </button>
                            <button class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class="fas fa-file-download text-blue-500 text-xl mb-2"></i>
                                <span class="text-sm font-medium text-gray-700">Download Invoice</span>
                            </button>
                            <button class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class="fas fa-calendar-plus text-green-500 text-xl mb-2"></i>
                                <span class="text-sm font-medium text-gray-700">Perpanjang Kontrak</span>
                            </button>
                            <button class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class="fas fa-comments text-purple-500 text-xl mb-2"></i>
                                <span class="text-sm font-medium text-gray-700">Chat Support</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
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

        // Close sidebar when clicking overlay
        mobileSidebar.addEventListener('click', (e) => {
            if (e.target === mobileSidebar) {
                mobileSidebar.classList.add('hidden');
            }
        });
    </script>
</body>
</html>