<x-app-layout>

    <!-- Container principal -->
    <div class="min-h-screen bg-gradient-to-br from-orange-300 to-orange-500 py-20">

    <!-- Título -->
    <div class="text-center pb-8">
        <h1 class="text-4xl font-bold text-gray-900 drop-shadow-md">
            Configurações
        </h1>
    </div>

        <!-- Card -->
        <div class="max-w-xl mx-auto bg-white rounded-3xl shadow-2xl p-10">

            <!-- PRIVACIDADE -->
            <a href="{{ asset('files/lorem-ipsum.pdf') }}" target="_blank"
               class="flex items-center justify-center gap-3 w-full bg-white border border-orange-300 
                      rounded-2xl p-4 mb-6 shadow-md hover:shadow-xl hover:bg-orange-50 
                      transition-all duration-300 text-gray-800 font-semibold">
                <img src="{{ asset('images/lock.png') }}" class="h-6 w-6" alt="">
                Privacidade
            </a>

            <!-- SUPORTE -->
            <a href="https://wa.me/5531999999999?text=Gostaria%20de%20abrir%20um%20chamado!"
               target="_blank"
               class="flex items-center justify-center gap-3 w-full bg-white border border-orange-300 
                      rounded-2xl p-4 mb-6 shadow-md hover:shadow-xl hover:bg-orange-50 
                      transition-all duration-300 text-gray-800 font-semibold">
                <img src="{{ asset('images/suporte.png') }}" class="h-6 w-6" alt="">
                Suporte
            </a>

            <!-- LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="flex items-center justify-center gap-3 w-full bg-white border border-orange-300 
                               rounded-2xl p-4 shadow-md hover:shadow-xl hover:bg-orange-50 
                               transition-all duration-300 text-gray-800 font-semibold">

                    <img src="{{ asset('images/done.png') }}" class="h-6 w-6" alt="">
                    Encerrar Sessão
                </button>
            </form>

        </div>
    </div>

</x-app-layout>
