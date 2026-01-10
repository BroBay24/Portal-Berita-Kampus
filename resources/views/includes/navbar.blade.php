    <!-- Navbar -->
    <nav class="sticky top-0 z-50 w-full bg-white shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-8 py-4 px-4 lg:px-14">
            <div class="flex items-center gap-8">
                <!-- Logo & Brand -->
                <a href="{{ route('landing') }}" class="flex items-center gap-2 hover:opacity-80 transition">
                    <img src="{{ asset('assets/css/img/LogUkdc.png') }}" alt="Logo" class="w-8 lg:w-10 h-8 lg:h-10">
                    <span class="text-lg lg:text-xl font-bold text-gray-900">Kabar Kampus</span>
                </a>

                <!-- Navigation Menu -->
                <div id="menu" class="hidden lg:flex lg:items-center">
                    <ul class="flex flex-col lg:flex-row gap-6 lg:gap-8 font-semibold text-base tracking-tight mt-4 lg:mt-0 pt-4 lg:pt-0 border-t lg:border-t-0 lg:border-0 text-gray-800">
                        <li>
                            <a href="{{ route('landing') }}" 
                                class="block py-2 lg:py-0 transition hover:text-primary {{ request()->is('/') ? 'text-primary' : 'text-gray-800' }}">
                                Beranda
                            </a>
                        </li>

                        @foreach (\App\Models\NewsCategory::all() as $category)
                            <li>
                                <a href="{{ route('category.show', $category->slug) }}" 
                                    class="block py-2 lg:py-0 transition hover:text-primary {{ request()->is($category->slug) ? 'text-primary' : 'text-gray-800' }}">
                                    {{ $category->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Login Button -->
            <a href="{{ url('/login') }}" class="hidden lg:inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg font-semibold hover:bg-opacity-90 transition">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
                <span class=>Login</span>
            </a>

            <!-- Mobile Menu Toggle -->
            <button class="lg:hidden p-2 text-gray-600 hover:text-primary focus:outline-none ml-auto" id="menu-toggle" aria-label="Toggle menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </nav>