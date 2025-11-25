<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_pode_ver_a_lista_de_transacoes()
    {

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/transactions');

        $response->assertStatus(200);
    }

    public function test_visitante_nao_pode_ver_transacoes()
    {

        $response = $this->get('/transactions');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_usuario_pode_ver_pagina_de_transacoes()
    {
        $user = \App\Models\User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('transactions.create'));

        $response->assertStatus(200);

    }

    public function test_usuario_pode_salvar_uma_nova_transacao()
    {

        $user = \App\Models\User::factory()->create();

        $dadosTransacao = [
            'description' => 'Pagamento Teste',
            'amount' => 100.50,
            'type' => 'despesa',
            'date' => '2025-10-20',
        ];

        $response = $this->actingAs($user)
            ->post(route('transactions.store'), $dadosTransacao);

        $response->assertStatus(302);
        $response->assertRedirect(route('transactions.index'));

        $this->assertDatabaseHas('transactions', [
            'description' => 'Pagamento Teste',
            'user_id' => $user->id,
        ]);
    }

    public function test_usuario_pode_editar_uma_transacao()
    {

        $user = \App\Models\User::factory()->create();

        $dadosTransacaoErrado = \App\Models\Transaction::create([
            'user_id' => $user->id,
            'description' => 'Pagamento Teste Errado',
            'amount' => 100.50,
            'type' => 'despesa',
            'date' => '2025-10-20',
        ]);

        $dadosTransacaoCerto = [
            'description' => 'Pagamento Teste Certo',
            'amount' => 110.50,
            'type' => 'receita',
            'date' => '2025-10-20',
        ];

        $response = $this->actingAs($user)
            ->put(route('transactions.update', $dadosTransacaoErrado), $dadosTransacaoCerto);

        $response->assertStatus(302);
        $response->assertRedirect(route('transactions.index'));

        $this->assertDatabaseHas('transactions', [
            'id' => $dadosTransacaoErrado->id,
            'description' => 'Pagamento Teste Certo',
            'amount' => 110.50,
        ]);
    }

    public function test_usuario_pode_excluir_uma_transacao()
    {

        $user = \App\Models\User::factory()->create();

        $transacao = \App\Models\Transaction::create([
            'user_id' => $user->id,
            'description' => 'Vou ser deletada',
            'amount' => 50.00,
            'type' => 'despesa',
            'date' => '2025-10-20',
        ]);

        $response = $this->actingAs($user)
            ->delete(route('transactions.destroy', $transacao));

        $response->assertStatus(302);
        $response->assertRedirect(route('transactions.index'));

        $this->assertDatabaseMissing('transactions', [
            'id' => $transacao->id,
            'description' => 'Vou ser deletada',
        ]);
    }

    public function test_calcula_totais_do_dashboard_corretamente()
    {
        $user = \App\Models\User::factory()->create();

        \App\Models\Transaction::create([
            'user_id' => $user->id,
            'description' => 'Salário',
            'amount' => 1000.00,
            'type' => 'receita',
            'date' => now(),
        ]);

        \App\Models\Transaction::create([
            'user_id' => $user->id,
            'description' => 'Conta de Luz',
            'amount' => 300.00,
            'type' => 'despesa',
            'date' => now(),
        ]);

        $response = $this->actingAs($user)->get(route('transactions.index'));

        $response->assertStatus(200);

        $response->assertViewHas('totalReceitas', 1000.00);
        $response->assertViewHas('totalDespesas', 300.00);
        $response->assertViewHas('saldo', 700.00);
    }

    public function test_filtro_de_pesquisa_funciona()
    {
        $user = \App\Models\User::factory()->create();

        \App\Models\Transaction::create([
            'user_id' => $user->id,
            'description' => 'Café da Manhã',
            'amount' => 50.00,
            'type' => 'despesa',
            'date' => now(),
        ]);

        \App\Models\Transaction::create([
            'user_id' => $user->id,
            'description' => 'Cinema',
            'amount' => 100.00,
            'type' => 'despesa',
            'date' => now(),
        ]);

        $response = $this->actingAs($user)
            ->get(route('transactions.index', ['search' => 'Café']));

        $response->assertStatus(200);

        $response->assertSee('Café da Manhã');
        $response->assertDontSee('Cinema');

        $response->assertViewHas('totalDespesas', 50.00);
    }
}
