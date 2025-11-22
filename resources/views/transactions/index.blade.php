<x-app-layout>

    {{-- Fundo degradê igual à página de Perfil --}}
    <div class="min-h-screen bg-gradient-to-br from-orange-300 to-orange-500 py-10">

        <h2 class="text-center text-3xl font-bold text-gray-900 mb-10">
            Minhas Transações
        </h2>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        {{-- CARDS SUPERIORES --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">

            {{-- Receitas --}}
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <p class="text-gray-500 font-medium">Total Receitas</p>
                <p class="text-3xl font-bold text-green-600 mt-1">
                    R$ {{ number_format($totalReceitas, 2, ',', '.') }}
                </p>
            </div>

            {{-- Despesas --}}
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <p class="text-gray-500 font-medium">Total Despesas</p>
                <p class="text-3xl font-bold text-red-600 mt-1">
                    R$ {{ number_format($totalDespesas, 2, ',', '.') }}
                </p>
            </div>

            {{-- Saldo --}}
            <div class="bg-white rounded-xl p-6 shadow-lg md:col-span-2">
                <p class="text-gray-500 font-medium">Saldo Atual</p>
                <p class="text-4xl font-bold {{ $saldo < 0 ? 'text-red-600' : 'text-gray-700' }}">
                    R$ {{ number_format($saldo, 2, ',', '.') }}
                </p>
                <p class="text-sm text-gray-400 mt-1">Balanço geral do mês</p>
            </div>

            {{-- Gráfico --}}
            <div class="bg-white rounded-xl p-6 shadow-lg md:col-span-2 flex justify-center">
                <div class="w-56 h-56">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>

        </div>

        {{-- LISTA / TABELA --}}
        <div class="max-w-5xl mx-auto mt-10">

            <div class="bg-white rounded-xl shadow-lg p-6">

                {{-- Topo: botão + busca --}}
                <div class="flex flex-col md:flex-row justify-between items-center mb-4">

                    <a href="{{ route('transactions.create') }}"
                        class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                        + Adicionar Nova Transação
                    </a>

                    <form action="{{ route('transactions.index') }}" method="GET"
                        class="flex items-center mt-4 md:mt-0">

                        <input
                            type="text"
                            name="search"
                            placeholder="Procurar transação..."
                            value="{{ request('search') }}"
                            class="border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500"
                        >

                        <button class="ml-2 p-2 rounded-lg shadow bg-white hover:bg-gray-100 transition">
                             <img src="images/magnifying.png" class="w-7 h-7" />
                        </button>

                        @if(request('search'))
                            <a href="{{ route('transactions.index') }}" class="ml-3 text-gray-500 hover:text-red-500 text-sm">
                                Limpar
                            </a>
                        @endif

                    </form>
                </div>

                {{-- Tabela --}}
                <table class="min-w-full divide-y divide-gray-200 rounded-lg overflow-hidden shadow-md">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase bg-gray-300">Data</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase bg-gray-300">Descrição</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase bg-gray-300">Valor</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase bg-gray-300">Tipo</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase bg-gray-300">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td class="px-6 py-4">{{ $transaction->date }}</td>
                                <td class="px-6 py-4">{{ $transaction->description }}</td>
                                <td class="px-6 py-4">
                                    R$ {{ number_format($transaction->amount, 2, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 capitalize">{{ $transaction->type }}</td>
                                <td class="px-6 py-4 text-sm font-medium">
                                    <a href="{{ route('transactions.edit', $transaction) }}"
                                        class="text-blue-600 hover:text-blue-900">
                                        <x-primary-button>Editar</x-primary-button>
                                    </a>

                                    <form action="{{ route('transactions.destroy', $transaction) }}"
                                          method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Tem certeza?')"
                                            class="ml-4 text-red-600 hover:text-red-900">
                                            <x-danger-button>Apagar</x-danger-button>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>

</x-app-layout>

{{-- SCRIPT DO GRÁFICO --}}
<script>
    const ctx = document.getElementById('myPieChart').getContext('2d');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Receitas', 'Despesas'],
            datasets: [{
                data: [{{ $totalReceitas }}, {{ $totalDespesas }}],
                backgroundColor: ['#10B981', '#EF4444'],
                hoverOffset: 4
            }]
        },
        options: { plugins: { legend: { position: 'bottom' } } }
    });
</script>
