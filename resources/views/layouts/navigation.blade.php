<nav x-data="{ open: false }" class="bg-white shadow-xl rounded-b-2xl border-b border-gray-200">
    <!-- Primary Navigation Menu -->
<<<<<<< HEAD
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo-e-supply.png') }}" alt="Logo do Sistema  Financeiro" class="block h-21 w-20">
                    </a>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Menu Inicial') }}
                    </x-nav-link>
                    <x-nav-link :href="route('transactions.index')" :active="request()->routeIs('transactions.index')">
                        {{ __('Transações') }}
                    </x-nav-link>
                    <x-nav-link :href="route('settings.config')" :active="request()->routeIs('settings.config')">
                        {{ __('Configurações') }}
                    </x-nav-link>
                </div>
=======
    <div class="max-w-7xl mx-auto px-6 sm:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center hover:opacity-90 transition">
                    <img src="{{ asset('images/logo-e-supply.png') }}" alt="Logo" class="block h-21 w-20">
                </a>
>>>>>>> TL-10/Integrar-chat-bot-no-backend
            </div>

            <!-- Desktop Menu + Dropdown -->
            <div class="hidden sm:flex items-center gap-6">

                <!-- Example if you add menu links later:
                <a href="{{ route('home') }}"
                   class="font-medium text-gray-700 hover:text-orange-600 transition text-sm">
                    Home
                </a>
                -->

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center gap-2 px-4 py-2 bg-white rounded-xl text-sm font-medium 
                                text-gray-600 hover:bg-orange-50 hover:text-orange-700 transition shadow-sm
                                ring-2 ring-orange-400 ring-offset-2 ring-offset-white">
                                                
                            <span>{{ Auth::user()->name }}</span>

                            <svg class="h-4 w-4 text-gray-500"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Perfil
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Sair
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="sm:hidden flex items-center">
                <button @click="open = ! open"
                        class="p-2 rounded-md text-gray-600 hover:bg-orange-50 hover:text-orange-700 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': ! open }"
                              class="inline-flex" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': ! open, 'inline-flex': open }"
                              class="hidden" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

<<<<<<< HEAD
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
=======
    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden bg-white border-t border-gray-200">
        
        <!-- Links -->
        <div class="py-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                Home
>>>>>>> TL-10/Integrar-chat-bot-no-backend
            </x-responsive-nav-link>
        </div>

        <!-- User Info -->
        <div class="py-3 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-900">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-600">{{ Auth::user()->email }}</div>
            </div>

            <!-- Profile + Logout -->
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Perfil
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        Sair
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
