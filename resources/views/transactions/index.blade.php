<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Minhas Transações') }}
        </h2>
    </x-slot>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb--10 p-10 max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="bg-white rounded-lg p-6 shadow-lg border-l-4 border-green-500 flex items-center justify-between ">
        <div>
            <p class="text-sm text-gray-500 font-medium">Total Receitas</p>
            <p class="text-2xl font-bold text-green-600">
                R$ {{ number_format($totalReceitas, 2, ',', '.') }}
            </p>
        </div>
        <div class="p-3 rounded-full bg-green-100 text-green-500">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
        </div>
    </div>

    <div class="bg-white rounded-lg p-6 shadow-lg border-l-4 border-red-500 flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500 font-medium">Total Despesas</p>
            <p class="text-2xl font-bold text-red-600">
                R$ {{ number_format($totalDespesas, 2, ',', '.') }}
            </p>
        </div>
        <div class="p-3 rounded-full bg-red-100 text-red-500">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
        </div>
    </div>

    <div class="bg-white rounded-lg p-6 shadow-lg border-l-4 border-blue-500 flex flex-col justify-center">
        <p class="text-gray-500 font-medium mb-2">Saldo Atual</p>
        <p class="text-4xl font-bold {{ $saldo < 0 ? 'text-red-600' : 'text-gray-800' }}">
            R$ {{ number_format($saldo, 2, ',', '.') }}
        </p>
        <p class="text-sm text-gray-400 mt-2">Balanço geral do mês</p>
    </div>

    <div class="bg-white rounded-lg p-6 shadow-lg flex flex-col items-center justify-center">
        <h3 class="text-gray-500 font-medium mb-4">Distribuição</h3>
        
        <div class="w-48 h-48">
            <canvas id="myPieChart"></canvas>
        </div>
    </div>

</div>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex flex-col md:flex-row justify-between items-center mb-4">
    
                    <a href="{{ route('transactions.create') }}" class="text-blue-500 hover:text-blue-700 font-bold mb-4 md:mb-0">
                        + Adicionar Nova Transação
                    </a>

                    <form action="{{ route('transactions.index') }}" method="GET" class="flex items-center">
                        
                        <input 
                            type="text" 
                            name="search" 
                            placeholder="Procurar transação..." 
                            value="{{ request('search') }}"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        >

                        <button type="submit" class="ml-2 bg-gray-800 text-white p-2 rounded-md hover:bg-gray-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>
                        
                        @if(request('search'))
                            <a href="{{ route('transactions.index') }}" class="ml-2 text-gray-500 hover:text-red-500 text-sm">
                                Limpar
                            </a>
                        @endif

                    </form>
                </div>

                    {{-- A nossa tabela de antes entra aqui --}}
                    <table class="min-w-full divide-y divide-gray-200 mt-6">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
<tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">R$ {{ number_format($transaction->amount, 2, ',', '.') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->type }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('transactions.edit', $transaction) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                        <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Tem a certeza?');">Apagar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

 
<script>
    const ctx = document.getElementById('myPieChart').getContext('2d');
    
    
    const receitas = {{ $totalReceitas }};
    const despesas = {{ $totalDespesas }};

    new Chart(ctx, {
        type: 'doughnut', // Pode mudar para 'pie' se preferir pizza cheia
        data: {
            labels: ['Receitas', 'Despesas'],
            datasets: [{
                data: [receitas, despesas],
                backgroundColor: [
                    '#10B981', // Cor Verde (Tailwind Emerald 500)
                    '#EF4444'  // Cor Vermelha (Tailwind Red 500)
                ],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
</script>