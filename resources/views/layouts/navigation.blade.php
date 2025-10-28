<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Main flex container for desktop layout -->
        <div class="flex justify-between items-center h-16">

            <!-- GUEST NAVIGATION: LEFT (Logo + Links), CENTER (Search), RIGHT (Auth) -->
            @guest
                <!-- LEFT SECTION: Logo and Main Links -->
                <div class="flex items-center space-x-8">
                    <!-- Logo -->
                    <div class="shrink-0">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-auto">
                        </a>
                    </div>
                    <!-- Navigation Links -->
                    <!-- Increased spacing here (space-x-6) -->
                    <div class="hidden sm:flex space-x-6">
                        <x-nav-link :href="route('my-recipes')" :active="request()->routeIs('my-recipes')">
                            {{ __('My recipes') }}
                        </x-nav-link>
                        <x-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')">
                            {{ __('About us') }}
                        </x-nav-link>
                        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                            {{ __('Contact') }}
                        </x-nav-link>
                    </div>
                </div>

                <!-- CENTER SECTION: Search Bar (Hidden on small screens, max-width on larger ones) -->
                <!-- Increased margin here (mx-16) to push sides out -->
                <div class="flex-1 max-w-md hidden lg:block mx-16">
                    <div class="relative">
                        <input type="search" placeholder="Search for recipes..."
                               class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm py-2 px-4 pl-10 text-sm transition duration-150 ease-in-out">
                        <!-- Search Icon -->
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-400"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <!-- RIGHT SECTION: Auth Links -->
                <!-- Increased spacing here (space-x-6) -->
                <div class="hidden sm:flex items-center space-x-6">
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Log in') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-nav-link>
                </div>
            @endguest

            <!-- AUTHENTICATED NAVIGATION (Unmodified, but structurally repositioned for correctness) -->
            @auth
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endauth

            <!-- Hamburger (Appears for both Guest and Auth on mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @auth
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
        @guest
            <!-- Guest Responsive Links (Mobile) -->
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('my-recipes')" :active="request()->routeIs('my-recipes')">
                    {{ __('My recipes') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')">
                    {{ __('About us') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                    {{ __('Contact') }}
                </x-responsive-nav-link>
            </div>
            <!-- Auth Links are at the bottom on mobile -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Log in') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            </div>
        @endguest
    </div>
</nav>
