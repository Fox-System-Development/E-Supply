<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Transação</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-orange-300 to-orange-500">

    <!-- CARD -->
    <div class="relative bg-white w-[780px] rounded-2xl shadow-xl p-12  transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-orange-50 hover:border-orange-300 hover:shadow-2xl"" >
        <a href="{{ route('home') }}"
        <!-- Título com ícone ao lado -->
        <div class="flex items-center gap-4 mb-10">
            <img src="{{ asset('images/home.png') }}" 
                 alt="Logo" 
                 class="w-12 h-12 object-contain transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-orange-50 hover:border-orange-300 hover:shadow-2xl" />
        </a>
            
            <h1 class="text-3xl font-bold text-black">Adicionar nova Transação</h1>
        </div>

        <form action="{{ route('transactions.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-2 gap-6">

                <!-- Descrição -->
                <div>
                    <label class="block text-sm font-semibold mb-1">Descrição</label>
                    <input 
                        type="text" 
                        id="description" 
                        name="description"
                        placeholder="Adicione a descrição"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-500 outline-none"
                        required
                    >
                </div>

                <!-- Valor -->
                <div>
                    <label class="block text-sm font-semibold mb-1">Valor (R$)</label>
                    <input 
                        type="number" 
                        id="amount" 
                        name="amount" 
                        step="0.01"
                        placeholder="Digite o valor"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-500 outline-none"
                        required
                    >
                </div>

                <!-- Tipo -->
                <div>
                    <label class="block text-sm font-semibold mb-1">Tipo</label>
                    <select 
                        id="type" 
                        name="type"
                        class="w-full border border-gray-300 rounded-lg p-3 text-gray-600 focus:ring-2 focus:ring-orange-500 outline-none"
                        required
                    >
                        <option disabled selected>Selecione o tipo</option>
                        <option value="receita">Receita</option>
                        <option value="despesa">Despesa</option>
                    </select>
                </div>

                <!-- Data -->
                <div>
                    <label class="block text-sm font-semibold mb-1">Data</label>
                    <input 
                        type="date" 
                        id="date" 
                        name="date"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-500 outline-none"
                        required
                    >
                </div>
            </div>

            <!-- Botão -->
            <div class="w-full flex justify-center pt-2">
                <button 
                    type="submit"
                    class="bg-orange-600 hover:bg-orange-700 transition text-white font-semibold px-10 py-3 rounded-xl shadow-lg flex flex-col items-start gap-3 transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-orange-50 hover:border-orange-300 hover:shadow-2xl""
                >
                    Salvar Transação
                </button>
            </div>
        </form>

    </div>

</body>
</html>
