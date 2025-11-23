<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recuperar Senha</title>

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
                <h1 class="text-4xl font-black">Esqueceu a senha?</h1>
                <p class="text-gray-600 mt-2 text-sm leading-relaxed">
                    Sem problemas! Basta informar seu e-mail abaixo e enviaremos um link para redefinir sua senha.
                </p>
            </div>

            <!-- Status -->
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <!-- FORM -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <label for="email" class="mb-1 block text-sm font-medium text-gray-700">E-mail</label>
                <input 
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required autofocus
                    placeholder="Digite seu e-mail"
                    class="mb-2 w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                           focus:border-orange-400 focus:ring-2 focus:ring-orange-300 focus:outline-none"
                />
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                <button type="submit" 
                        class="w-full mt-6 rounded-xl bg-[#e38a06] py-3 text-lg font-medium 
                               text-white shadow-md transition hover:bg-[#cc7a04]">
                    Enviar link de recuperação
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
