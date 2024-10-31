<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mini E-commerce' }}</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <!-- Logo -->
            <h1 class="text-3xl font-bold text-blue-600">
                <a href="#" class="hover:text-blue-800">MyShop</a>
            </h1>

            <!-- Navigation Links -->
            <nav class="flex space-x-6">
                <x-button-link href="{{ route('products.index') }}" class="hover:bg-blue-100 px-4 py-2 rounded-md">
                    <i class="fas fa-store mr-1"></i> Products
                </x-button-link>
                <x-button-link href="{{ route('cart.index') }}" class="hover:bg-blue-100 px-4 py-2 rounded-md">
                    <i class="fas fa-shopping-cart mr-1"></i> Cart
                </x-button-link>
                <x-button-link href="{{ route('orders.index') }}" class="hover:bg-blue-100 px-4 py-2 rounded-md">
                    <i class="fas fa-box mr-1"></i> Orders
                </x-button-link>
            </nav>

            <!-- Search and User Menu -->
            <div class="flex items-center space-x-4">
                <!-- Search Input -->
                <div class="relative">
                    <input type="text" placeholder="Search products..."
                           class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <button class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

                <!-- User Menu -->
                <div class="text-blue-600">
                    <a href="#" class="hover:text-blue-800">
                        <i class="fas fa-user-circle text-2xl"></i>
                    </a>
                </div>
            </div>
            <!-- User Profile & Logout -->
            <div class="flex items-center space-x-4">
                <!-- Profile Link -->
                <a href="{{ url('/profile') }}" class="text-blue-600 px-4 py-2 rounded-md hover:bg-blue-100">
                    Profile
                </a>
                
                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-200">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto mt-8 p-4">
        @if(session('success'))
            {{-- <x-alert color="green" class="mb-4">{{ session('success') }}</x-alert> --}}
        @endif
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white mt-8 py-6">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- About Section -->
            <div class="text-center md:text-left">
                <h3 class="font-semibold text-lg mb-2">About Us</h3>
                <p class="text-sm">MyShop is your go-to e-commerce platform for the latest products and trends. Shop with confidence and convenience.</p>
            </div>

            <!-- Quick Links Section -->
            <div class="text-center">
                <h3 class="font-semibold text-lg mb-2">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('products.index') }}" class="hover:underline">Shop</a></li>
                    <li><a href="{{ route('cart.index') }}" class="hover:underline">Cart</a></li>
                    <li><a href="{{ route('orders.index') }}" class="hover:underline">Orders</a></li>
                    <li><a href="#" class="hover:underline">Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact Info Section -->
            <div class="text-center md:text-right">
                <h3 class="font-semibold text-lg mb-2">Contact Us</h3>
                <p class="text-sm">123 E-commerce St., Business City</p>
                <p class="text-sm">Email: support@myshop.com</p>
                <p class="text-sm">Phone: (123) 456-7890</p>
            </div>
        </div>

        <div class="text-center text-sm mt-6">
            <p>&copy; {{ date('Y') }} MyShop. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Scripts (Alpine.js for Interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>