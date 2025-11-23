<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verificar E-mail</title>

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
                     class="w-18 h-18 object-contain rounded-full" />
            </div>

            <!-- TÍTULO -->
            <div class="mt-10 mb-6">
                <h1 class="text-4xl font-black">Verificar E-mail</h1>

                <p class="text-gray-600 mt-3 text-sm leading-relaxed">
                    Obrigado por se registrar!  
                    Antes de começar, precisamos que você verifique seu endereço de e-mail.  
                    Clique no link que enviamos para sua caixa de entrada.
                </p>
            </div>

            <!-- STATUS -->
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 bg-green-100 px-4 py-2 rounded-lg">
                    Um novo link de verificação foi enviado para o e-mail informado.
                </div>
            @endif

            <!-- AÇÕES -->
            <div class="mt-6 space-y-4">

                <!-- Reenviar link -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button type="submit"
                        class="w-full rounded-xl bg-[#e38a06] py-3 text-lg font-medium 
                               text-white shadow-md transition hover:bg-[#cc7a04]">
                        Reenviar Link de Verificação
                    </button>
                </form>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="w-full underline text-sm text-gray-600 hover:text-gray-900 mt-2 hover:underline transition">
                        Sair da Conta
                    </button>
                </form>

            </div>

        </div>
    </div>

</body>
</html>
