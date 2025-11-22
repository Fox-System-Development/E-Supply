<x-app-layout>
<<<<<<< HEAD
    <x-slot name="header">        
        <h1 class="home-page-tittle">
            {{ __('Menu de Gestão Simplificada.') }}
        </h1>
    </x-slot>
            
    <div class="bg-orange-middle-page py-10">
        <div class="main flex flex-row justify-center gap-8 px-4">
 
            <a href="{{ route('transactions.create') }}"
                class="w-1/4 bg-white rounded-3xl p-20 shadow-2xl flex flex-col items-start gap-3 transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-white/20 hover:border-white/40 hover:shadow-xl hover:backdrop-blur-md">
                    <img src="{{ asset('images/plus.png') }}" alt="" class="h-15 w-14">
                    <p class="font-bold text-xl">Nova Transação</p>
                    <p class="text-lg text-gray-600">Registre uma nova despesa ou receita.</p>
            </a>
            
            <a href="{{ route('transactions.index') }}"
               class="w-1/4 bg-white rounded-3xl p-20 shadow-2xl flex flex-col items-start gap-3 transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-white/20 hover:border-white/40 hover:shadow-xl hover:backdrop-blur-md">
                    <img src="{{ asset('images/clock-image.png') }}" alt="Ícone de Relógio" class="h-15 w-14">
                    <p class="font-bold text-2xl">Extrato</p>
                    <p class="text-lg text-gray-600">Acesse o histórico completo de suas movimentações.</p>
            </a>

            <a href="{{ route('transactions.index') }}"
               class="w-1/4 bg-white rounded-3xl p-20 shadow-2xl flex flex-col items-start gap-3 transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-white/20 hover:border-white/40 hover:shadow-xl hover:backdrop-blur-md">
                    <img src="{{ asset('images/edit-image.png') }}" alt="" class="h-15 w-14">
                    <p class="font-bold text-2xl">Editar Transação</p>
                    <p class="text-lg text-gray-600">Edite informações de uma despesa ou receita já criada.</p>
            </a>

            <a href="{{ route('settings.config') }}"
               class="w-1/4 bg-white rounded-3xl p-20 shadow-2xl flex flex-col items-start gap-3 transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-white/20 hover:border-white/40 hover:shadow-xl hover:backdrop-blur-md">
                    <img src="{{ asset('images/config-image.png') }}" alt="" class="h-15 w-14">
                    <p class="font-bold text-2xl">Configurações</p>
                    <p class="text-lg text-gray-600">Organize acessos, privilégios e ajustes do sistema</p>
            </a>            

        </div>            
    </div>
    <div class="items-center text-center">
                <p class="text-gray-700 mt-20">© Todos os Direitos Reservados E-Supply 2025.</p>
            </div>
</x-app-layout>
=======
    
    <div class="relative min-h-screen min-w-screen bg-gradient-to-br from-orange-300 to-orange-500 py-20">

        <div>
            <p class="font-bold text-center text-gray-700 py-12 text-5xl">Menu de Gestão Simplificado</p>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap justify-center gap-8">
            <a href="{{ route('transactions.create') }}"
               class="w-64 bg-white rounded-3xl p-10 shadow-xl flex flex-col items-start gap-3 transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-orange-50 hover:border-orange-300 hover:shadow-2xl">
                <img src="{{ asset('images/plus.png') }}" alt="" class="h-12 w-12">
                <p class="font-bold text-xl text-gray-900">Nova Transação</p>
                <p class="text-gray-700 text-sm">Registre uma nova despesa ou receita.</p>
            </a>

            <a href="{{ route('transactions.index') }}"
               class="w-64 bg-white rounded-3xl p-10 shadow-xl flex flex-col items-start gap-3 transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-orange-50 hover:border-orange-300 hover:shadow-2xl">
                <img src="{{ asset('images/clock-image.png') }}" alt="" class="h-12 w-12">
                <p class="font-bold text-xl text-gray-900">Extrato</p>
                <p class="text-gray-700 text-sm">Acesse o histórico completo de suas movimentações.</p>
            </a>

            <a href="{{ route('transactions.index') }}"
               class="w-64 bg-white rounded-3xl p-10 shadow-xl flex flex-col items-start gap-3 transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-orange-50 hover:border-orange-300 hover:shadow-2xl">
                <img src="{{ asset('images/edit-image.png') }}" alt="" class="h-12 w-12">
                <p class="font-bold text-xl text-gray-900">Editar Transação</p>
                <p class="text-gray-700 text-sm">Edite informações de uma despesa ou receita já criada.</p>
            </a>

            <a href="{{ route('settings.config') }}"
               class="w-64 bg-white rounded-3xl p-10 shadow-xl flex flex-col items-start gap-3 transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-orange-50 hover:border-orange-300 hover:shadow-2xl">
                <img src="{{ asset('images/config-image.png') }}" alt="" class="h-12 w-12">
                <p class="font-bold text-xl text-gray-900">Configurações</p>
                <p class="text-gray-700 text-sm">Organize acessos, privilégios e ajustes do sistema</p>
            </a>
        </div>

        <!-- Footer sobreposto -->
        <div class="absolute bottom-0 left-0 w-full text-center bg-white shadow-lg rounded-t-xl py-4 z-10">
            <p class="text-black font-bold">© Todos os Direitos Reservados E-Supply 2025.</p>
        </div>
    </div>

    <button id="chatButton" class="fixed bottom-6 right-6 bg-indigo-600 hover:bg-indigo-700 text-white p-4 rounded-full shadow-2xl transition-all duration-300 z-50 flex items-center justify-center group">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 group-hover:animate-pulse">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
    </svg>
</button>

<div id="chatWindow" class="fixed bottom-24 right-6 w-80 bg-white rounded-2xl shadow-2xl z-50 hidden flex-col border border-gray-200 overflow-hidden">
    <div class="bg-indigo-600 p-4 text-white font-bold flex justify-between items-center">
        <span>Super Sup</span>
        <button id="closeChat" class="text-sm opacity-80 hover:opacity-100">✕</button>
    </div>

    <div id="chatMessages" class="p-4 h-64 overflow-y-auto bg-gray-50 flex flex-col gap-3">
        <div class="self-start bg-white text-gray-800 p-3 rounded-lg rounded-tl-none shadow-sm text-sm max-w-[85%] border border-gray-100">
            Olá! Eu sou o Super Sup 🤖, seu assitente digital! Como posso te ajudar hoje? 
        </div>
    </div>

    <div class="p-3 bg-white border-t border-gray-100 flex gap-2">
        <input type="text" id="chatInput" placeholder="Digite sua dúvida..." class="flex-1 border-gray-300 rounded-full text-sm focus:ring-indigo-500 focus:border-indigo-500">
        <button id="sendMessage" class="bg-indigo-600 text-white p-2 rounded-full hover:bg-indigo-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 transform rotate-90">
                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
            </svg>
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Pegamos os elementos com segurança
        const chatButton = document.getElementById('chatButton');
        const chatWindow = document.getElementById('chatWindow');
        const closeChat = document.getElementById('closeChat');
        const maximizeChat = document.getElementById('maximizeChat');
        const chatInput = document.getElementById('chatInput');
        const sendMessageBtn = document.getElementById('sendMessage');
        const chatMessages = document.getElementById('chatMessages');

        let isMaximized = false;

        // Função de Rolagem
        function scrollToBottom() {
            if(chatMessages) {
                setTimeout(() => {
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }, 50);
            }
        }

        // 1. Abrir/Fechar Chat
        if (chatButton && chatWindow && closeChat) {
            function toggleChat() {
                chatWindow.classList.toggle('hidden');
                chatWindow.classList.toggle('flex');
                if (!chatWindow.classList.contains('hidden')) {
                    scrollToBottom();
                    if(chatInput) chatInput.focus();
                }
            }
            chatButton.addEventListener('click', toggleChat);
            closeChat.addEventListener('click', toggleChat);
        } else {
            console.error("Erro: Botões principais do chat não encontrados no HTML.");
        }

        // 2. Maximizar (Só adiciona o evento se o botão existir)
        if (maximizeChat && chatWindow && chatMessages) {
            maximizeChat.addEventListener('click', function(e) {
                e.stopPropagation(); // Impede cliques acidentais em elementos pai
                isMaximized = !isMaximized;
                
                if (isMaximized) {
                    // Modo Grande
                    chatWindow.classList.remove('w-80');
                    chatWindow.classList.add('w-96', 'h-[600px]');
                    chatMessages.classList.remove('h-80');
                    chatMessages.classList.add('flex-1');
                } else {
                    // Modo Normal
                    chatWindow.classList.add('w-80');
                    chatWindow.classList.remove('w-96', 'h-[600px]');
                    chatMessages.classList.add('h-80');
                    chatMessages.classList.remove('flex-1');
                }
                scrollToBottom();
            });
        }

        // 3. Lógica de Envio de Mensagem
        function appendMessage(text, isUser) {
            const div = document.createElement('div');
            div.className = isUser 
                ? 'self-end bg-indigo-600 text-white p-3 rounded-lg rounded-tr-none shadow-sm text-sm max-w-[85%]' 
                : 'self-start bg-white text-gray-800 p-3 rounded-lg rounded-tl-none shadow-sm text-sm max-w-[85%] border border-gray-100';
            
            div.innerHTML = text.replace(/\n/g, '<br>');
            chatMessages.appendChild(div);
            scrollToBottom();
        }

        async function sendMessage() {
            const text = chatInput.value.trim();
            if (!text) return;

            appendMessage(text, true);
            chatInput.value = '';
            
            const loadingDiv = document.createElement('div');
            loadingDiv.className = 'self-start text-gray-400 text-xs ml-2 animate-pulse';
            loadingDiv.innerText = 'Digitando...';
            loadingDiv.id = 'loadingIndicator';
            chatMessages.appendChild(loadingDiv);
            scrollToBottom();

            try {
                const response = await fetch('{{ route("chat.send") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message: text })
                });

                const data = await response.json();
                const loader = document.getElementById('loadingIndicator');
                if(loader) loader.remove();
                
                appendMessage(data.reply, false);

            } catch (error) {
                const loader = document.getElementById('loadingIndicator');
                if(loader) loader.remove();
                appendMessage('Erro ao conectar.', false);
                console.error(error);
            }
        }

        if (sendMessageBtn && chatInput) {
            sendMessageBtn.addEventListener('click', sendMessage);
            chatInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') sendMessage();
            });
        }
    });
</script>
</x-app-layout>
>>>>>>> TL-10/Integrar-chat-bot-no-backend
