<x-app-layout>
    <!-- Página inteira com gradiente laranja -->
    <div class="relative min-h-screen min-w-screen bg-gradient-to-br from-orange-300 to-orange-500 py-16">

        <div>
            <p class="font-bold text-center text-gray-900 py-12 text-5xl">Menu de Gestão Simplificado</p>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap justify-center gap-8">
            <a href="{{ route('transactions.create') }}"
               class="w-64 bg-white rounded-3xl p-10 shadow-xl flex flex-col items-start gap-3 transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-orange-50 hover:border-orange-300 hover:shadow-2xl">
                <img src="{{ asset('images/plus.png') }}" alt="" class="h-12 w-12">
                <p class="font-bold text-xl text-gray-900">Nova Transação</p>
                <p class="text-gray-700 text-sm">Registre uma nova despesa ou receita.</p>
            </a>

            <a href="{{ route('transactions.index') }}"
               class="w-64 bg-white rounded-3xl p-10 shadow-xl flex flex-col items-start gap-3 transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-orange-50 hover:border-orange-300 hover:shadow-2xl">
                <img src="{{ asset('images/clock-image.png') }}" alt="" class="h-12 w-12">
                <p class="font-bold text-xl text-gray-900">Extrato</p>
                <p class="text-gray-700 text-sm">Acesse o histórico completo de suas movimentações.</p>
            </a>

            <a href="{{ route('transactions.index') }}"
               class="w-64 bg-white rounded-3xl p-10 shadow-xl flex flex-col items-start gap-3 transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-orange-50 hover:border-orange-300 hover:shadow-2xl">
                <img src="{{ asset('images/edit-image.png') }}" alt="" class="h-12 w-12">
                <p class="font-bold text-xl text-gray-900">Editar Transação</p>
                <p class="text-gray-700 text-sm">Edite informações de uma despesa ou receita já criada.</p>
            </a>

            <a href="{{ route('settings.config') }}"
               class="w-64 bg-white rounded-3xl p-10 shadow-xl flex flex-col items-start gap-3 transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-orange-50 hover:border-orange-300 hover:shadow-2xl">
                <img src="{{ asset('images/config-image.png') }}" alt="" class="h-12 w-12">
                <p class="font-bold text-xl text-gray-900">Configurações</p>
                <p class="text-gray-700 text-sm">Organize acessos, privilégios e ajustes do sistema</p>
            </a>
        </div>

        <!-- Footer sobreposto -->
        <div class="absolute bottom-0 left-0 w-full text-center bg-white shadow-lg rounded-t-xl py-4 z-10">
            <p class="text-black font-bold">© Todos os Direitos Reservados E-Supply 2025.</p>
        </div>
    </div>
</x-app-layout>
