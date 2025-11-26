<?php

use App\Models\User;
use App\Models\Transaction;
use function Pest\Laravel\{actingAs, post, get};

describe('Funcionalidade: Gestão de Transações', function () {

    // Contexto (Background)
    beforeEach(function () {
        // Dado que eu sou um usuário autenticado
        $this->user = User::factory()->create();
        actingAs($this->user);
    });

    it('deve permitir adicionar uma nova receita de salário', function () {
        // DADO QUE (Given) - O cenário já está montado no beforeEach
        // Mas podemos definir dados específicos aqui
        $dadosDaReceita = [
            'description' => 'Salário Mensal',
            'amount' => 5000,
            'type' => 'receita',
            'date' => '2025-10-01'
        ];

        // QUANDO (When) - Eu envio os dados
        $response = post(route('transactions.store'), $dadosDaReceita);

        // ENTÃO (Then) - Eu devo ser redirecionado e ver os dados no banco
        $response->assertRedirect(route('transactions.index'));
        
        $this->assertDatabaseHas('transactions', [
            'description' => 'Salário Mensal',
            'amount' => 5000
        ]);
    });

    it('não deve permitir cadastro sem valor (Validação)', function () {
        // QUANDO eu tento salvar sem valor
        $response = post(route('transactions.store'), [
            'description' => 'Compra sem valor',
            'amount' => '' // Vazio
        ]);

        // ENTÃO eu devo ver um erro na sessão
        $response->assertSessionHasErrors('amount');
    });

});