{{-- resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - KOZE Management</title>
    @vite('resources/css/app.css')
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-white font-sans">

    <!-- Role Selection Modal (Initial View) -->
    <div id="roleModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4 relative">
            <!-- Close Button -->
            <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>

            <!-- Modal Content -->
            <div class="text-center space-y-6">
                <h2 class="text-2xl font-bold text-gray-900">Create your account</h2>
                
                <div class="space-y-3">
                    <p class="text-gray-600">or sign in with</p>
                    <div class="flex justify-center space-x-4">
                        <button class="text-teal-600 hover:text-teal-800 font-medium">Email</button>
                        <button class="text-teal-600 hover:text-teal-800 font-medium">Gmail</button>
                        <button class="text-teal-600 hover:text-teal-800 font-medium">Facebook</button>
                    </div>
                </div>

                <!-- Role Selection Buttons -->
                <div class="space-y-4 mt-8">
                    <button 
                        onclick="selectRole('owner')" 
                        class="w-full bg-teal-700 text-white py-4 px-6 rounded-full font-semibold hover:bg-teal-800 transition-colors text-lg"
                    >
                        Owner
                    </button>
                    
                    <button 
                        onclick="selectRole('penyewa')" 
                        class="w-full bg-teal-700 text-white py-4 px-6 rounded-full font-semibold hover:bg-teal-800 transition-colors text-lg"
                    >
                        Penyewa
                    </button>
                </div>

                <!-- Login Link -->
                <div class="mt-8">
                    <span class="text-gray-600">Already have an account? </span>
                    <a href="{{ route('login') }}" class="text-teal-600 hover:text-teal-800 font-semibold">
                        Log in
                    </a>
                </div>

                <!-- Terms -->
                <div class="text-xs text-gray-500 mt-6">
                    By creating an account you agree to our 
                    <a href="#" class="text-teal-600 hover:underline">Terms of Service</a> 
                    and 
                    <a href="#" class="text-teal-600 hover:underline">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Form (Hidden Initially) -->
    <div id="registerForm" class="min-h-screen flex">
        <!-- Left Side - Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
            <div class="max-w-md w-full space-y-8">
                <!-- Header -->
                <div class="text-center lg:text-left">
                    <button onclick="backToRoleSelection()" class="text-gray-400 hover:text-gray-600 mb-4">
                        <i class="fas fa-arrow-left text-xl"></i>
                    </button>
                    <h2 class="text-3xl font-bold text-gray-900">Create your account</h2>
                    <div class="mt-2 space-x-4">
                        <span class="text-gray-600">or sign in with</span>
                        <button class="text-teal-600 hover:text-teal-800 font-medium">Email</button>
                        <button class="text-teal-600 hover:text-teal-800 font-medium">Gmail</button>
                        <button class="text-teal-600 hover:text-teal-800 font-medium">Facebook</button>
                    </div>
                </div>

                <!-- Registration Form -->
                <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    
                    <!-- Hidden Role Field -->
                    <input type="hidden" id="selectedRole" name="role" value="">
                    
                    <!-- First Name Field -->
                    <div>
                        <input 
                            id="first_name" 
                            name="first_name" 
                            type="text" 
                            required 
                            class="w-full px-4 py-4 bg-gray-100 border-0 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white transition-colors @error('first_name') ring-2 ring-red-500 @enderror" 
                            placeholder="First name"
                            value="{{ old('first_name') }}"
                        >
                        @error('first_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Last Name Field -->
                    <div>
                        <input 
                            id="last_name" 
                            name="last_name" 
                            type="text" 
                            required 
                            class="w-full px-4 py-4 bg-gray-100 border-0 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white transition-colors @error('last_name') ring-2 ring-red-500 @enderror" 
                            placeholder="Last name"
                            value="{{ old('last_name') }}"
                        >
                        @error('last_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            required 
                            class="w-full px-4 py-4 bg-gray-100 border-0 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white transition-colors @error('email') ring-2 ring-red-500 @enderror" 
                            placeholder="Email"
                            value="{{ old('email') }}"
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <div class="relative">
                            <input 
                                id="password" 
                                name="password" 
                                type="password" 
                                required 
                                class="w-full px-4 py-4 bg-gray-100 border-0 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white transition-colors @error('password') ring-2 ring-red-500 @enderror" 
                                placeholder="Password"
                            >
                            <button 
                                type="button" 
                                id="togglePassword"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600"
                            >
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Confirmation -->
                    <div>
                        <input 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            type="password" 
                            required 
                            class="w-full px-4 py-4 bg-gray-100 border-0 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white transition-colors" 
                            placeholder="Confirm Password"
                        >
                    </div>

                    <!-- Newsletter Checkbox -->
                    <div class="flex items-start space-x-3">
                        <input 
                            id="newsletter" 
                            name="newsletter" 
                            type="checkbox" 
                            class="mt-1 h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                        >
                        <label for="newsletter" class="text-sm text-gray-600">
                            I want to receive updates about offers, news, city launches, and exclusive deals
                        </label>
                    </div>

                    <!-- Create Account Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-teal-700 text-white py-4 px-4 rounded-full hover:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors font-semibold text-lg"
                    >
                        Create account
                    </button>

                    <!-- Login Link -->
                    <div class="text-center">
                        <span class="text-gray-600">Already have an account? </span>
                        <a href="{{ route('login') }}" class="text-teal-600 hover:text-teal-800 font-semibold">
                            Log in
                        </a>
                    </div>

                    <!-- Terms -->
                    <div class="text-xs text-gray-500 text-center">
                        By creating an account you agree to our 
                        <a href="#" class="text-teal-600 hover:underline">Terms of Service</a> 
                        and 
                        <a href="#" class="text-teal-600 hover:underline">Privacy Policy</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Side - Image -->
        <div class="hidden lg:block lg:w-1/2 relative">
            <!-- Background Image -->
            <img 
                src="{{ asset('images/icons/kost.png') }}" 
                alt="Kost Register" 
                class="absolute inset-0 w-full h-full object-cover"
            >
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Check if there's a selected role from previous session or error
        document.addEventListener('DOMContentLoaded', function() {
            const hasErrors = {{ $errors->any() ? 'true' : 'false' }};
            const oldRole = "{{ old('role') }}";
            
            if (hasErrors || oldRole) {
                // Show form directly if there are validation errors
                document.getElementById('roleModal').classList.add('hidden');
                document.getElementById('registerForm').classList.remove('hidden');
                if (oldRole) {
                    document.getElementById('selectedRole').value = oldRole;
                }
            }
        });

        // Select role and show registration form
        function selectRole(role) {
            document.getElementById('selectedRole').value = role;
            document.getElementById('roleModal').classList.add('hidden');
            document.getElementById('registerForm').classList.remove('hidden');
        }

        // Go back to role selection
        function backToRoleSelection() {
            document.getElementById('registerForm').classList.add('hidden');
            document.getElementById('roleModal').classList.remove('hidden');
        }

        // Close modal (redirect to home)
        function closeModal() {
            window.location.href = "{{ route('home') }}";
        }

        // Toggle Password Visibility
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            if (togglePassword) {
                togglePassword.addEventListener('click', function() {
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
            }
        });

        // Handle Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const roleModal = document.getElementById('roleModal');
                const registerForm = document.getElementById('registerForm');
                
                if (!roleModal.classList.contains('hidden')) {
                    closeModal();
                } else if (!registerForm.classList.contains('hidden')) {
                    backToRoleSelection();
                }
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