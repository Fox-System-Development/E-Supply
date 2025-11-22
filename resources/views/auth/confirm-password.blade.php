<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Confirmar Senha</title>

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

            <!-- TÍTULO -->
            <div class="mt-10 mb-6">
                <h1 class="text-4xl font-black">Confirmar Senha</h1>
                <p class="text-gray-600 mt-2 text-sm leading-relaxed">
                    Para continuar, confirme sua senha abaixo.  
                    Esta é uma área protegida da aplicação.
                </p>
            </div>

            <!-- FORM -->
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <label for="password" class="mb-1 block text-sm font-medium text-gray-700">Senha</label>

                <input 
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Digite sua senha"
                    class="mb-2 w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                           focus:border-orange-400 focus:ring-2 focus:ring-orange-300 focus:outline-none"
                />

                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                <button type="submit" 
                        class="w-full mt-6 rounded-xl bg-[#e38a06] py-3 text-lg font-medium 
                               text-white shadow-md transition hover:bg-[#cc7a04]">
                    Confirmar
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
