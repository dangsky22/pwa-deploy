@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg">
        <!-- Logo -->
        <div class="flex items-center justify-center h-16 bg-gray-800">
            <span class="text-white text-xl font-bold">KOZE</span>
        </div>

        <!-- Navigation -->
        <nav class="mt-6">
            <div class="px-4 space-y-3">
                <!-- Dashboard -->
                <a href="{{ route('dashboard.penghuni') }}" 
                   class="flex items-center p-3 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-100 transition-colors group">
                    <i class="fas fa-home w-6"></i>
                    <span class="ml-3">Dashboard Home</span>
                </a>

                <!-- My Room -->
                <a href="#" 
                   class="flex items-center p-3 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors group">
                    <i class="fas fa-bed w-6"></i>
                    <span class="ml-3">My Room</span>
                </a>

                <!-- Payments -->
                <a href="#" 
                   class="flex items-center p-3 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors group">
                    <i class="fas fa-credit-card w-6"></i>
                    <span class="ml-3">Payments</span>
                </a>

                <!-- Complaints -->
                <a href="#" 
                   class="flex items-center p-3 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors group">
                    <i class="fas fa-exclamation-circle w-6"></i>
                    <span class="ml-3">Complaints</span>
                </a>

                <!-- Community -->
                <a href="#" 
                   class="flex items-center p-3 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors group">
                    <i class="fas fa-users w-6"></i>
                    <span class="ml-3">Community</span>
                </a>

                <!-- Profile -->
                <a href="#" 
                   class="flex items-center p-3 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors group">
                    <i class="fas fa-user w-6"></i>
                    <span class="ml-3">Profile</span>
                </a>

                <!-- Settings -->
                <a href="#" 
                   class="flex items-center p-3 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors group">
                    <i class="fas fa-cog w-6"></i>
                    <span class="ml-3">Settings</span>
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="mt-6">
                    @csrf
                    <button type="submit" 
                            class="flex w-full items-center p-3 text-red-600 rounded-lg hover:bg-red-50 transition-colors group">
                        <i class="fas fa-sign-out-alt w-6"></i>
                        <span class="ml-3">Logout</span>
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-semibold text-gray-900">Welcome Back, Penghuni!</h1>
            <p class="text-gray-600">Here's what's happening with your room today.</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Room Status -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-full">
                        <i class="fas fa-bed text-green-600"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-600">Room Status</h2>
                        <p class="text-lg font-semibold text-gray-900">Active</p>
                    </div>
                </div>
            </div>

            <!-- Next Payment -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-full">
                        <i class="fas fa-calendar text-blue-600"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-600">Next Payment</h2>
                        <p class="text-lg font-semibold text-gray-900">Sep 25, 2025</p>
                    </div>
                </div>
            </div>

            <!-- Active Complaints -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-100 rounded-full">
                        <i class="fas fa-exclamation-circle text-yellow-600"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-600">Active Complaints</h2>
                        <p class="text-lg font-semibold text-gray-900">0</p>
                    </div>
                </div>
            </div>

            <!-- Community Events -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-100 rounded-full">
                        <i class="fas fa-users text-purple-600"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-600">Community Events</h2>
                        <p class="text-lg font-semibold text-gray-900">2 Upcoming</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Activities</h2>
            <div class="space-y-4">
                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                    <div class="p-3 bg-blue-100 rounded-full">
                        <i class="fas fa-credit-card text-blue-600"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-900">Last Payment Received</h3>
                        <p class="text-sm text-gray-600">August 25, 2025</p>
                    </div>
                </div>

                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                    <div class="p-3 bg-green-100 rounded-full">
                        <i class="fas fa-check-circle text-green-600"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-900">Room Cleaning Service</h3>
                        <p class="text-sm text-gray-600">Completed on August 30, 2025</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
