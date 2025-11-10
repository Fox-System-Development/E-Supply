<x-app-layout>
    <x-slot name="header">
        <h1 class="config-page-tittle">
            {{ __('Configurações') }}
        </h1>
    </x-slot>


        <div class="w-full pl-[270px] pr-[270px]">

            <div class="w-full bg-white rounded-[2vw] shadow-2xl mt-[150px] px-8 py-[80px]">
            
                <a href="{{ asset('files/lorem-ipsum.pdf') }}" target="_blanlk"
                class="bg-[#ECBC76] rounded-3xl mb-6 p-2 shadow-2xl flex items-center justify-center gap-3 transform transition-all duration-300 ease-in-out hover:scale-[1.03] hover:bg-[#ECBC76]/40 hover:border-white/40 hover:shadow-xl hover:backdrop-blur-md text-center">
                    <img src="{{ asset('images/lock.png') }}" alt="" class="h-6 w-6">
                    <p class= "font-bold text-1xl text-gray-800 p-2">Privacidade</p>
                </a>
                
                <a href="https://wa.me/5531999999999?text=Gostaria%20de%20abrir%20um%20chamado!" target="_blank"
                class="bg-[#ECBC76] rounded-3xl mb-6 p-2 shadow-2xl flex items-center justify-center gap-3 transform transition-all duration-300 ease-in-out hover:scale-[1.03] hover:bg-[#ECBC76]/40 hover:border-white/40 hover:shadow-xl hover:backdrop-blur-md text-center">
                    <img src="{{ asset('images/suporte.png') }}" alt="" class="h-6 w-6">
                    <p class= "font-bold text-1xl text-gray-800 p-2">Suporte</p>
                </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    class="bg-[#ECBC76] rounded-3xl  p-4 shadow-2xl flex items-center justify-center gap-3 transform transition-all duration-300 ease-in-out hover:scale-[1.03] hover:bg-[#ECBC76]/40 hover:border-white/40 hover:shadow-xl hover:backdrop-blur-md text-center">
                            <img src="{{ asset('images/done.png') }}" alt="" class="h-6 w-6">             
                            <p class="font-bold text-1xl text-gray-800">Encerrar Sessão</p>
                    </a>
                </form>

            </div>
        </div>
</x-app-layout>