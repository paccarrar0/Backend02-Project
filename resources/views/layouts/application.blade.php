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
                    <div class="relative">
                        <button id="accountDropdownBtn" class="text-gray-700 hover:text-blue-600 focus:outline-none">
                            Account ▾
                        </button>
                        <div id="accountDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden z-50">
                            <div class="px-4 py-2 text-sm text-gray-600">{{ auth()->user()->email }}</div>
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Profile</a>
                            <hr class="my-1">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
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

<script>
    document.querySelectorAll(".close-alert").forEach(function(button) {
        button.addEventListener("click", function() {
            const alert = button.closest(".alert-box");
            if (alert) {
                alert.remove();
            }
        });
    });

    const dropdownBtn = document.getElementById('accountDropdownBtn');
    const dropdownMenu = document.getElementById('accountDropdown');

    if (dropdownBtn && dropdownMenu) {
        dropdownBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function(e) {
            if (!dropdownMenu.contains(e.target) && !dropdownBtn.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    }
</script>