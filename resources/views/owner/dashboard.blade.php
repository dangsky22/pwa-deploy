{{-- resources/views/owner/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard - KOZE Management</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 font-inter min-h-screen">

    <!-- Enhanced Navbar -->
    <nav class="bg-white shadow-lg border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-building text-white text-sm"></i>
                        </div>
                        <h1 class="text-xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            KOZE MANAGEMENT
                        </h1>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 text-sm text-gray-600 hover:text-red-600 transition-colors duration-200">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hidden sm:inline">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="mb-4 sm:mb-0">
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Dashboard Pemilik Kostan</h2>
                    <p class="mt-2 text-gray-600">Kelola properti kostan Anda dengan mudah</p>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Terakhir update</p>
                        <p class="text-sm font-medium text-gray-900">{{ date('d M Y, H:i') }}</p>
                    </div>
                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                </div>
            </div>
        </div>

        <!-- Enhanced Stats Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-8">
            <!-- Total Kostan Card -->
            <div class="bg-white shadow-xl rounded-2xl p-4 sm:p-6 border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xs sm:text-sm font-medium text-gray-500 uppercase tracking-wide">Total Kostan</h3>
                        <p class="text-3xl sm:text-4xl font-bold text-gray-900 mt-2">5</p>
                        <p class="text-sm text-gray-600 mt-1">Unit terdaftar</p>
                    </div>
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-building text-white text-lg sm:text-2xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center text-sm">
                        <i class="fas fa-chart-line text-blue-500 mr-2"></i>
                        <span class="text-gray-600">Status aktif</span>
                    </div>
                </div>
            </div>

            <!-- Terisi Card -->
            <div class="bg-white shadow-xl rounded-2xl p-4 sm:p-6 border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xs sm:text-sm font-medium text-gray-500 uppercase tracking-wide">Terisi</h3>
                        <p class="text-3xl sm:text-4xl font-bold text-green-600 mt-2">3</p>
                        <p class="text-sm text-gray-600 mt-1">Unit berpenghuni</p>
                    </div>
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-users text-white text-lg sm:text-2xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center">
                            <i class="fas fa-percentage text-green-500 mr-2"></i>
                            <span class="text-gray-600">Occupancy rate</span>
                        </div>
                        <span class="font-semibold text-green-600">60%</span>
                    </div>
                </div>
            </div>

            <!-- Kosong Card -->
            <div class="bg-white shadow-xl rounded-2xl p-4 sm:p-6 border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 sm:col-span-2 lg:col-span-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xs sm:text-sm font-medium text-gray-500 uppercase tracking-wide">Kosong</h3>
                        <p class="text-3xl sm:text-4xl font-bold text-red-600 mt-2">2</p>
                        <p class="text-sm text-gray-600 mt-1">Unit tersedia</p>
                    </div>
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-door-open text-white text-lg sm:text-2xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center text-sm">
                        <i class="fas fa-clock text-red-500 mr-2"></i>
                        <span class="text-gray-600">Siap disewa</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Action Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
            <!-- Quick Actions Card -->
            <div class="bg-white shadow-xl rounded-2xl p-4 sm:p-6 border border-gray-100 order-2 lg:order-1">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-blue-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-bolt text-white text-sm"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900">Aksi Cepat</h3>
                </div>
                <div class="space-y-4">
                    <a href="{{ route('owner.create') }}" class="flex items-center justify-between w-full p-3 sm:p-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:scale-[1.02] shadow-lg hover:shadow-xl">
                        <div class="flex items-center">
                            <i class="fas fa-plus-circle text-lg sm:text-xl mr-3"></i>
                            <div>
                                <p class="font-semibold text-sm sm:text-base">Tambah Unit Baru</p>
                                <p class="text-blue-100 text-xs sm:text-sm">Daftarkan kostan baru</p>
                            </div>
                        </div>
                        <i class="fas fa-arrow-right text-blue-200"></i>
                    </a>
                    <a href="#" class="flex items-center justify-between w-full p-3 sm:p-4 bg-gray-50 text-gray-700 rounded-xl hover:bg-gray-100 transition-all duration-200 border border-gray-200">
                        <div class="flex items-center">
                            <i class="fas fa-list-alt text-lg sm:text-xl mr-3 text-gray-500"></i>
                            <div>
                                <p class="font-semibold text-sm sm:text-base">Kelola Unit</p>
                                <p class="text-gray-500 text-xs sm:text-sm">Edit informasi kostan</p>
                            </div>
                        </div>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </a>
                    <a href="#" class="flex items-center justify-between w-full p-3 sm:p-4 bg-gray-50 text-gray-700 rounded-xl hover:bg-gray-100 transition-all duration-200 border border-gray-200">
                        <div class="flex items-center">
                            <i class="fas fa-chart-bar text-lg sm:text-xl mr-3 text-gray-500"></i>
                            <div>
                                <p class="font-semibold text-sm sm:text-base">Laporan</p>
                                <p class="text-gray-500 text-xs sm:text-sm">Lihat statistik lengkap</p>
                            </div>
                        </div>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </a>
                </div>
            </div>

            <!-- Recent Activity Card -->
            <div class="bg-white shadow-xl rounded-2xl p-4 sm:p-6 border border-gray-100 order-1 lg:order-2">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-teal-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-history text-white text-sm"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900">Aktivitas Terkini</h3>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center p-3 bg-green-50 rounded-lg border-l-4 border-green-400">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                            <i class="fas fa-user-plus text-green-600 text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">Penghuni baru mendaftar</p>
                            <p class="text-xs text-gray-600">Unit A-12 • 2 jam yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-center p-3 bg-blue-50 rounded-lg border-l-4 border-blue-400">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                            <i class="fas fa-money-bill-wave text-blue-600 text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">Pembayaran diterima</p>
                            <p class="text-xs text-gray-600">Unit B-05 • 1 hari yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-center p-3 bg-yellow-50 rounded-lg border-l-4 border-yellow-400">
                        <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                            <i class="fas fa-tools text-yellow-600 text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">Permintaan maintenance</p>
                            <p class="text-xs text-gray-600">Unit C-08 • 2 hari yang lalu</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-700 font-medium flex items-center">
                        Lihat semua aktivitas
                        <i class="fas fa-arrow-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

   

</body>
</html>