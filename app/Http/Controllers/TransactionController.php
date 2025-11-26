<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request);
        $query = auth()->user()->transactions();

        if ($request->filled('search')) {

            $termo = $request->search;

            $query->where(function ($q) use ($termo) {
                $q->where('description', 'like', '%'.$termo.'%')
                    ->orWhere('date', 'like', '%'.$termo.'%')
                    ->orWhere('type', 'like', '%'.$termo.'%');
            });
        }

        $transactions = $query->get();

        $totalReceitas = $transactions->where('type', 'receita')->sum('amount');

        $totalDespesas = $transactions->where('type', 'despesa')->sum('amount');

        $saldo = $totalReceitas - $totalDespesas;

        // 2. Envia a lista de transações para a view 'index'
        return view('transactions.index', compact('transactions', 'totalReceitas', 'totalDespesas', 'saldo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|in:receita,despesa',
            'date' => 'required|date',
            'justificativa' => 'reequired|string', // nullable significa que é opcional
        ]);

        // Passo 2: Adicionar o "Dono" da transação 👤
        $validatedData['user_id'] = auth()->id(); // Pega o ID do utilizador autenticado

        // Passo 3: Salvar no Banco de Dados 💾
        Transaction::create($validatedData);

        // Redireciona o utilizador de volta para uma página com uma mensagem de sucesso
        return redirect()->route('transactions.index')
            ->with('success', 'Transação salva com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|in:receita,despesa',
            'date' => 'required|date',
            'justificativa' => 'nullable|string',
        ]);

        $transaction->update($validatedData);

        return redirect()->route('transactions.index')->with('succes', 'Transação Atualizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('succes', 'Transação apagada com sucesso.');
    }
}
