<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrar</title>

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

            <!-- Título e link para Login -->
            <div class="mb-6 flex items-start justify-between mt-10">
                <p class="text-base text-gray-700">Crie sua conta!</p>

                <div class="text-right text-sm">
                    <p class="text-gray-500">Já possui conta?</p>
                    <a href="{{ route('login') }}" class="font-medium text-orange-500 hover:underline transition">Entrar</a>
                </div>
            </div>

            <h1 class="mb-8 text-5xl font-black">Registrar</h1>

            <!-- FORM -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <label for="name" class="mb-1 block text-sm font-medium text-gray-700">Nome</label>
                <input 
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required autofocus autocomplete="name"
                    placeholder="Seu nome"
                    class="mb-2 w-full rounded-xl border border-gray-300 px-4 py-3 text-sm 
                           focus:border-orange-400 focus:ring-2 focus:ring-orange-300 focus:outline-none"
                />
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                <!-- Email -->
                <label for="email" class="mt-4 mb-1 block text-sm font-medium text-gray-700">E-mail</label>
                <input 
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required autocomplete="username"
                    placeholder="Seu e-mail"
                    class="mb-2 w-full rounded-xl border border-gray-300 px-4 py-3 text-sm 
                           focus:border-orange-400 focus:ring-2 focus:ring-orange-300 focus:outline-none"
                />
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                <!-- Password -->
                <label for="password" class="mt-4 mb-1 block text-sm font-medium text-gray-700">Senha</label>
                <input 
                    id="password"
                    type="password"
                    name="password"
                    required autocomplete="new-password"
                    placeholder="Crie uma senha"
                    class="mb-2 w-full rounded-xl border border-gray-300 px-4 py-3 text-sm 
                           focus:border-orange-400 focus:ring-2 focus:ring-orange-300 focus:outline-none"
                />
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                <!-- Confirm Password -->
                <label for="password_confirmation" class="mt-4 mb-1 block text-sm font-medium text-gray-700">Confirmar senha</label>
                <input 
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required autocomplete="new-password"
                    placeholder="Repita sua senha"
                    class="mb-6 w-full rounded-xl border border-gray-300 px-4 py-3 text-sm 
                           focus:border-orange-400 focus:ring-2 focus:ring-orange-300 focus:outline-none"
                />
                @error('password_confirmation')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                <!-- Botão -->
                <button type="submit" 
                        class="w-full rounded-xl bg-[#e38a06] py-3 text-lg font-medium 
                               text-white shadow-md transition hover:bg-[#cc7a04]">
                    Registrar
                </button>
            </form>
        </div>
    </div>
</body>
</html>
