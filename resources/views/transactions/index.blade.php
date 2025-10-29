<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Minhas Transações') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a href="{{ route('transactions.create') }}" class="text-blue-500 hover:text-blue-700 font-bold">
                        Adicionar Nova Transação
                    </a>

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