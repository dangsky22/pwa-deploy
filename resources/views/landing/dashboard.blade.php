{{-- resources/views/landing/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOZE MANAGEMENT</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white font-sans text-gray-800">

    <!-- Navbar -->
    <nav class="flex justify-between items-center px-10 py-4 shadow-md bg-white">
        <h1 class="text-2xl font-bold text-gray-800">KOZE MANAGEMENT</h1>
        <ul class="flex space-x-8 text-gray-700 font-medium">
            <li><a href="#" class="hover:text-teal-600">Home</a></li>
            <li><a href="#" class="hover:text-teal-600">Layanan</a></li>
            <li><a href="#" class="hover:text-teal-600">Platform</a></li>
            <li><a href="#" class="hover:text-teal-600">Contacts</a></li>
            <li><a href="{{ route('login') }}" class="hover:text-teal-600">Login</a></li>
            <li><a href="{{ route('register') }}" class="hover:text-teal-600">Register</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="flex flex-col md:flex-row items-center justify-between px-10 py-16 max-w-7xl mx-auto">
        <!-- Left Text -->
        <div class="md:w-1/2 space-y-6">
            <h2 class="text-4xl md:text-5xl font-bold leading-tight">
                Find your perfect home away from home
            </h2>
            <p class="text-gray-600 text-lg">
                Temukan kost impian Anda dengan fasilitas lengkap dan komunitas yang hangat.
                Booking mudah, tinggal nyaman.
            </p>
        </div>

        <!-- Right Image -->
        <div class="md:w-1/2 mt-10 md:mt-0">
            <img src="https://images.pexels.com/photos/3771831/pexels-photo-3771831.jpeg" 
                 alt="Couple on Sofa"
                 class="rounded-lg shadow-lg w-full object-cover">
        </div>
    </section>

    <!-- Search Section -->
    <section class="bg-white shadow-md rounded-full max-w-5xl mx-auto mt-[-40px] p-4 flex items-center space-x-4 relative z-10">
        <input type="text" placeholder="Cari Hunian" 
               class="flex-1 px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-600">
        
        <select class="px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-600">
            <option>Mulai sewa</option>
            <option>Hari ini</option>
            <option>Minggu depan</option>
        </select>

        <select class="px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-600">
            <option>Penghuni 1</option>
            <option>Penghuni 2</option>
            <option>Penghuni 3+</option>
        </select>

        <button class="bg-teal-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-teal-700">
            Search
        </button>
    </section>

</body>
</html>
