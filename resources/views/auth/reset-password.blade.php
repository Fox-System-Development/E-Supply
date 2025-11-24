<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Redefinir Senha</title>

    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet" />

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="min-h-screen">

    <div class="min-h-screen flex items-center justify-center w-full
        bg-[radial-gradient(circle_at_center,theme(colors.orange.400)_0%,theme(colors.orange.300)_100%,#fcfbf7_60%)]">

        <div class="w-[480px] rounded-3xl bg-white px-12 py-10 shadow-2xl relative">

            <!-- LOGO -->
            <div class="absolute -top-10 left-1/2 -translate-x-1/2 flex h-20 w-20 
                        items-center justify-center rounded-full bg-black shadow-lg">

                <img src="{{ asset('images/logo-e-supply.png') }}" 
                     alt="Logo" 
                     class="w-18 h-18 object-contain rounded-full"/>
            </div>

            <!-- Título -->
            <div class="mt-10 mb-6">
                <h1 class="text-4xl font-black">Redefinir Senha</h1>
                <p class="text-gray-600 mt-2 text-sm leading-relaxed">
                    Insira sua nova senha para concluir a redefinição da conta.
                </p>
            </div>

            <!-- FORM -->
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email -->
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                <input 
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email', $request->email) }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="E-mail"
                    class="mb-2 w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                           focus:border-orange-400 focus:ring-2 focus:ring-orange-300 focus:outline-none"
                />
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                <!-- Nova Senha -->
                <label for="password" class="block text-sm font-medium text-gray-700 mt-4 mb-1">Nova Senha</label>
                <input 
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Digite a nova senha"
                    class="mb-2 w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                           focus:border-orange-400 focus:ring-2 focus:ring-orange-300 focus:outline-none"
                />
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                <!-- Confirmar Senha -->
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mt-4 mb-1">Confirmar Senha</label>
                <input 
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirme a nova senha"
                    class="mb-2 w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                           focus:border-orange-400 focus:ring-2 focus:ring-orange-300 focus:outline-none"
                />
                @error('password_confirmation')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                <!-- Botão -->
                <button type="submit" 
                    class="w-full mt-6 rounded-xl bg-[#e38a06] py-3 text-lg font-medium 
                           text-white shadow-md transition hover:bg-[#cc7a04]">
                    Redefinir Senha
                </button>

                <div class="mt-4 text-center">
                    <a href="{{ route('login') }}" class="text-sm text-orange-500 font-medium hover:underline transition">
                        Voltar ao login
                    </a>
                </div>
            </form>

        </div>
    </div>

</body>
</html>
