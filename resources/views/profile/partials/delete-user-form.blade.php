<section class="space-y-6">
    <header>
        <h2 class="text-2xl font-bold text-red-600">
            Excluir Conta
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Esta ação é permanente. Certifique-se de salvar qualquer informação importante antes de prosseguir.
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        Excluir Conta
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-xl font-bold text-gray-900">
                Tem certeza que deseja excluir sua conta?
            </h2>

            <p class="mt-2 text-gray-600">
                Essa ação não poderá ser desfeita. Insira sua senha para confirmar.
            </p>

            <div class="mt-4">
                <x-input-label for="password" value="Senha" />
                <x-text-input id="password" name="password" type="password"
                    class="mt-1 block w-full" placeholder="Digite sua senha" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancelar
                </x-secondary-button>

                <x-danger-button>
                    Excluir
                </x-danger-button>
            </div>
        </form>

    </x-modal>
</section>
