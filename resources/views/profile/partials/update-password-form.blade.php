<section>
    <header>
        <h2 class="text-2xl font-bold text-gray-900">
            Alterar Senha
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Garanta que sua conta esteja protegida com uma senha forte.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- Senha atual -->
        <div>
            <x-input-label for="current_password" value="Senha Atual" />
            <x-text-input id="current_password" name="current_password" type="password"
                class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- Nova senha -->
        <div>
            <x-input-label for="password" value="Nova Senha" />
            <x-text-input id="password" name="password" type="password"
                class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar -->
        <div>
            <x-input-label for="password_confirmation" value="Confirmar Senha" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Salvar</x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-green-600 font-semibold">Senha atualizada!</p>
            @endif
        </div>
    </form>
</section>
