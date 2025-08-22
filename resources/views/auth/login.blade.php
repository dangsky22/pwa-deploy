{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - KOZE Management</title>
    @vite('resources/css/app.css')
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-white font-sans">
    <div class="min-h-screen flex">
        <!-- Left Side - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
            <div class="max-w-md w-full space-y-8">
                <!-- Header -->
                <div class="text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-gray-900 flex items-center gap-2">
                        Welcome Back 
                        <span class="text-2xl">👋</span>
                    </h2>
                    <p class="mt-2 text-gray-600">
                        Today is a new day. It's your day. You shape it.<br>
                        Sign in to start managing your projects.
                    </p>
                </div>

                <!-- Login Form -->
                <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent @error('email') @enderror" 
                            placeholder="Example@email.com"
                            value="{{ old('email') }}"
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <input 
                                id="password" 
                                name="password" 
                                type="password" 
                                required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent @error('password') @enderror" 
                                placeholder="At least 8 characters"
                            >
                            <button 
                                type="button" 
                                id="togglePassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600"
                            >
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Forgot Password -->
                    <div class="text-right">
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800">
                            Forgot Password?
                        </a>
                    </div>

                    <!-- Sign In Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-gray-800 text-white py-3 px-4 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors font-medium"
                    >
                        Sign in
                    </button>

                    <!-- Divider -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Or</span>
                        </div>
                    </div>

                    <!-- Social Login Buttons -->
                    <div class="space-y-3">
                        <!-- Google Login -->
                        <button 
                            type="button" 
                            class="w-full flex items-center justify-center gap-3 px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors"
                        >
                            <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google" class="w-5 h-5">
                            <span class="text-gray-700 font-medium">Sign in with Google</span>
                        </button>

                        <!-- Facebook Login -->
                        <button 
                            type="button" 
                            class="w-full flex items-center justify-center gap-3 px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors"
                        >
                            <i class="fab fa-facebook-f text-blue-600 w-5"></i>
                            <span class="text-gray-700 font-medium">Sign in with Facebook</span>
                        </button>
                    </div>

                    <!-- Sign Up Link -->
                    <div class="text-center">
                        <span class="text-gray-600">Don't you have an account? </span>
                        <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                            Sign up
                        </a>
                    </div>
                </form>

                <!-- Copyright -->
                <div class="text-center mt-8">
                    <p class="text-xs text-gray-400">© 2023 ALL RIGHTS RESERVED</p>
                </div>
            </div>
        </div>

        <!-- Right Side - Image -->
        <div class="hidden lg:block lg:w-1/2 relative">
            <!-- Background Image -->
            <img 
                src="{{ asset('images/icons/kost.png') }}" 
                alt="Kost Interior" 
                class="absolute inset-0 w-full h-full object-cover"
            >
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Toggle Password Visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (password.type === 'password') {
                password.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });

        // Display flash messages
        @if(session('success'))
            alert('{{ session('success') }}');
        @endif

        @if(session('error'))
            alert('{{ session('error') }}');
        @endif
    </script>
</body>
</html>