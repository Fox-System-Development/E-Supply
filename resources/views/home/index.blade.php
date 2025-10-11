<x-app-layout>
    <x-slot name="header">        
        <h1 class="home-page-tittle">
            {{ __('Menu de Gestão Simplificada.') }}
        </h1>
    </x-slot>
            
    <div class="bg-orange-middle-page py-10">
        <div class="main flex flex-row justify-center gap-8 px-4">

            <div class="w-1/4 bg-white rounded-3xl p-20 shadow-2xl flex flex-col items-start gap-3 hover:bg-sky-700">
                <img src="{{asset('images/plus.png')}}" alt="" class="h-15 w-14">
                <p class="font-bold text-xl">Nova Transação</p>
                <p class="text-lg text-gray-600">Registre uma nova despesa ou receita.</p>
            </div>

            <div class="w-1/4 bg-white rounded-3xl p-20 shadow-2xl flex flex-col items-start gap-3 ">
                <img src="{{ asset('images/clock-image.png') }}" alt="Ícone de Relógio" class="h-15 w-14">
                <p class="font-bold text-2xl">Extrato</p>
                <p class="text-lg text-gray-600">Acesse o histórico completo de suas movimentações.</p>
            </div>

            <div class="w-1/4 bg-white rounded-3xl p-20 shadow-2xl flex flex-col items-start gap-3">
                <img src="{{asset('images/edit-image.png')}}" alt="" class="h-15 w-14">
                <p class="font-bold text-2xl">Editar Transação</p>
                <p class="text-lg text-gray-600">Edite informações de uma despesa ou receita já criada.</p>
            </div>

            <div class="w-1/4 bg-white rounded-3xl p-20 shadow-2xl flex flex-col items-start gap-3">
                <img src="{{asset('images/config-image.png')}}" alt="" class="h-15 w-14">
                <p class="font-bold text-2xl">Configurações</p>
                <p class="text-lg text-gray-600">Organize acessos, privilégios e ajustes do sistema</p>
            </div>            
         </div>            
    </div>
    <div class="items-center text-center">
                <p class="text-gray-700 mt-20">© Todos os Direitos Reservados E-Supply 2025.</p>
            </div>
</x-app-layout>