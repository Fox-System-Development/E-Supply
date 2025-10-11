<x-app-layout>
    <x-slot name="header">        
        <h1 class="home-page-tittle">
            {{ __('Menu de Gestão 
                Simplificada.') }}
        </h1>
    </x-slot>
            
    <div class="bg-orange-middle-page">
        <div class="main flex flex-row justify-between gap-8">

                
                <div class="ml-6 w-1/4 bg-white rounded-lg p-20 transaction-block shadow-lg mt-12">
                    <img class ="add-sign-image"src="" alt="">
                    <p class ="main-new-transaction-title">Nova Transação</p>
                    <p class="main-new-transaction-sub-title">Registre uma nova despesa ou receita.                    
                </div>

                <div class="w-1/4 bg-white rounded-lg p-20 extract-block shadow-lg mt-12">
                    <img src="" alt="" class="clock-img">
                    <p class="main-extract-title">Extrato</p>
                    <p class="main-extract-sub-title">Acesse o histórico completo de suas movimentações.
                </div>

                <div class="w-1/4 bg-white rounded-lg p-20 edit-transaction-block shadow-lg mt-12">
                    <img src="" alt="" class="edit-img">
                    <p class="main-edit-transaction-title">Editar Transação</p>
                    <p class="main-edit-transaction-sub-title">Edite informações de uma despesa ou receita já criada.             
                </div>

                <div class="w-1/4 me-6 bg-white rounded-lg p-20 config-block shadow-lg mt-12">
                    <img src="" alt="" class="config-img">
                    <p class="main-home-congig-title bold">Configurações</p>
                    <p class="main-home-congig-sub-title">Organize acessos, privilégios e ajustes do sistema</p>
                </div>
             </div>            
         </div>            
    </div>
</x-app-layout>