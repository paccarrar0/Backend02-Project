@include('shared/head')

<body class="bg-gray-100 min-h-screen flex flex-col">

    <div class="fixed left-1/2 top-4 transform -translate-x-1/2 z-50 w-1/2">
        @include('components.flash-message')
    </div>

    <nav class="bg-white shadow mb-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="#" class="text-blue-600 text-3xl font-bold">ERMS</a>
                </div>

                <div class="hidden md:flex space-x-4">
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <a href="#" class="text-gray-700 hover:text-blue-600">Register</a>
                            <a href="#" class="text-gray-700 hover:text-blue-600">Reports</a>
                            <a href="{{ route('equipments.index') }}" class="text-gray-700 hover:text-blue-600">Equipments</a>
                        @else
                            <a href="#" class="text-gray-700 hover:text-blue-600">Equipments</a>
                            <a href="#" class="text-gray-700 hover:text-blue-600">Reservations</a>
                        @endif

                        <div class="relative group">
                            <button class="text-gray-700 hover:text-blue-600 focus:outline-none">
                                Account ▾
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                                <div class="px-4 py-2 text-sm text-gray-600">{{ auth()->user()->email }}</div>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Profile</a>
                                <hr class="my-1">
                                <a href="{{ route('users.logout') }}" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</a>
                            </div>
                        </div>
                    @else
                        <a href="#" class="text-gray-700 hover:text-blue-600">Equipments</a>
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4">
        @yield('content')
    </main>
</body>
