{{-- resources/views/owner/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard - KOZE Management</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">KOZE Management</h1>
        <div>
            <a href="#" class="text-sm text-gray-600 hover:text-gray-800">Logout</a>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="p-6">
        <h2 class="text-2xl font-bold text-gray-700 mb-6">Dashboard Pemilik Kostan</h2>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white shadow rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-700">Total Kostan</h3>
                <p class="text-3xl font-bold text-gray-900 mt-2">5</p>
            </div>
            <div class="bg-white shadow rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-700">Terisi</h3>
                <p class="text-3xl font-bold text-green-600 mt-2">3</p>
            </div>
            <div class="bg-white shadow rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-700">Kosong</h3>
                <p class="text-3xl font-bold text-red-600 mt-2">2</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Aksi</h3>
            <a href="#" class="inline-block px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                + Tambah Unit Baru
            </a>
        </div>
    </div>

</body>
</html>
