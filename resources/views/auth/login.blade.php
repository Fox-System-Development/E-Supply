<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

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
        
        <div class="absolute -top-10 left-1/2 -translate-x-1/2 flex h-20 w-20 
            items-center justify-center rounded-full bg-black shadow-lg">

            <img src="{{ asset('images/logo-e-supply.png') }}" 
                alt="Logo" 
                class="w-18 h-18 object-contain rounded-full"/>
        </div>

        
        @if (session('status'))
          <div class="mt-12 mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
          </div>
        @endif
        
        <div class="mb-6 flex items-start justify-between mt-10">
          <p class="text-base text-gray-700">Seja bem vindo novamente!</p>

          @if (Route::has('register'))
            <div class="text-right text-sm">
              <p class="text-gray-500">Sem conta?</p>
              <a href="{{ route('register') }}" class="font-medium text-orange-500 hover:underline transition">Se inscreva!</a>
            </div>
          @endif
        </div>

        <h1 class="mb-8 text-5xl font-black">Entrar</h1>

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <label for="email" class="mb-1 block text-sm font-medium text-gray-700"> Digite o e-mail: </label>
          <input 
            id="email" 
            type="email" 
            name="email" 
            value="{{ old('email') }}" 
            required autofocus autocomplete="username" 
            placeholder="E-mail" 
            class="mb-2 w-full rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-orange-400 focus:ring-2 focus:ring-orange-300 focus:outline-none" 
          />
          @error('email')
              <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
          @enderror

          <label for="password" class="mb-1 block text-sm font-medium text-gray-700 mt-4"> Digite a sua senha: </label>

          <div class="relative">
            <input 
              id="password" 
              type="password" 
              name="password" 
              required autocomplete="current-password" 
              placeholder="Senha" 
              class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-orange-400 focus:ring-2 focus:ring-orange-300 focus:outline-none" 
            />
            
            <span id="togglePassword" class="absolute top-3.5 right-3 cursor-pointer text-gray-500 hover:text-gray-700 transition duration-150">
              <svg id="eye-open" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.43-.001.639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              </svg>
              <svg id="eye-slash" class="h-5 w-5 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12c.708 2.21 2.339 4.136 4.35 5.518L7.697 18.8c.84-.962 1.48-2.028 1.91-3.2l.685-1.92m-3.956-2.744a3.001 3.001 0 1 0 5.414 1.341l3.585-1.898a10.476 10.476 0 0 0 1.914-2.18c.708-2.21 2.339-4.136 4.35-5.518l-1.42-1.285c-1.865 1.393-3.88 2.39-5.918 3.16M12 21a9 9 0 0 1-8.632-12.441l-1.272-1.745M20.25 10.5h-4.425" />
              </svg>
            </span>
          </div>
          @error('password')
              <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
          @enderror

          <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
              <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500" name="remember">
              <span class="ms-2 text-sm text-gray-600">{{ __('Lembre-me') }}</span>
            </label>
          </div>
          
          <div class="mt-1 mb-6 flex justify-end">
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="text-[13px] text-red-500 hover:underline transition">Esqueceu a senha?</a>
            @endif
          </div>

          <button type="submit" class="w-full rounded-xl bg-[#e38a06] py-3 text-lg font-medium text-white shadow-md transition hover:bg-[#cc7a04]">Iniciar Sessão</button>
        </form>
      </div>
    </div>

    <script>
      const togglePassword = document.getElementById('togglePassword');
      const passwordInput = document.getElementById('password');
      const eyeOpen = document.getElementById('eye-open');
      // Alterado para 'eye-slash'
      const eyeSlash = document.getElementById('eye-slash'); 

      togglePassword.addEventListener('click', function (e) {
        // Alterna o tipo de input entre 'password' e 'text'
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Alterna a visibilidade dos ícones
        eyeOpen.classList.toggle('hidden');
        eyeSlash.classList.toggle('hidden'); // Usa 'eyeSlash'
      });
    </script>
  </body>
</html>