<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-orange-300 to-orange-500 py-16">

        <!-- Título -->
        <div>
            <h1 class="text-center font-bold text-4xl text-gray-900 drop-shadow-md">
                Meu Perfil
            </h1>
        </div>

        <!-- Conteúdo -->
        <div class="max-w-4xl mx-auto mt-10 space-y-10 px-4">

            <!-- Atualizar informações do perfil -->
            <div class="bg-white shadow-xl rounded-3xl p-8">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Atualizar senha -->
            <div class="bg-white shadow-xl rounded-3xl p-8">
                @include('profile.partials.update-password-form')
            </div>

            <!-- Deletar conta -->
            <div class="bg-white shadow-xl rounded-3xl p-8">
                @include('profile.partials.delete-user-form')
            </div>

        </div>

    </div>

</x-app-layout>
