<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $mensagemUsuario = $request->input('message');

        // Conexão com o Ollama (URL interna do Docker)
        // O nome do host é o nome do serviço no docker-compose: 'ollama'
        $url = "http://ollama:11434/api/chat";

        try {
            $response = Http::timeout(120)->post($url, [
                "model" => "llama3.2", // O modelo que baixamos
                "messages" => [
                    [
                        "role" => "system",
                        "content" => "Você é um assistente financeiro útil e responde em português do Brasil de forma curta.
                        Você ajuda o usuário a cadastrar novas Despesas e Receitas nesse link: http://localhost:8030/transactions/create
                         Você ajuda o usuário a encontrar o dashboard nesse link:http://localhost:8030/transactions
                         O usuário pode editar, registar, excluir, ver o próprio perfil, alterar as configurações.
                        LINK DE RESPOSTA: Configurações: http://localhost:8030/settings
                        Perfil: http://localhost:8030/profile
                        suporte: https://api.whatsapp.com/send/?phone=5531999999999&text=Gostaria+de+abrir+um+chamado%21&type=phone_number&app_absent=0

                        "
                    ],
                    [
                        "role" => "user",
                        "content" => $mensagemUsuario
                    ]
                ],
                "stream" => false // Importante: false para receber a resposta inteira de uma vez
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $respostaBot = $data['message']['content'] ?? 'Ollama ficou mudo.';
                return response()->json(['reply' => $respostaBot]);
            } else {
                return response()->json(['reply' => 'Erro Ollama: ' . $response->body()], 500);
            }

        } catch (\Exception $e) {
            return response()->json(['reply' => 'Erro de conexão: O Ollama está rodando? ' . $e->getMessage()], 500);
        }
    }
}