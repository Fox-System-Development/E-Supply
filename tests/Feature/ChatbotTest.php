<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ChatbotTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_consegue_enviar_mensagem_e_receber_resposta()
    {
        // 1. PREPARAR: Fingir que a API externa (Google/Ollama) respondeu com sucesso
        Http::fake([
            '*' => Http::response([
                'candidates' => [
                    [
                        'content' => [
                            'parts' => [
                                ['text' => 'Olá! Sou o usuário simulado.'],
                            ],
                        ],
                    ],
                ],

                'message' => [
                    'content' => 'Olá! Sou o usuário simulado.',
                ],
            ], 200),
        ]);

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->postJson(route('chat.send'), [
                'message' => 'Como economizar dinheiro?',
            ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['reply']);
    }

    public function test_nao_pode_enviar_mensagem_vazia()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->postJson(route('chat.send'), [
                'message' => '',
            ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['message']);
    }
}
