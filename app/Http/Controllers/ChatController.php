<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $mensagemUsuario = $request->input('message');

        // Conexão com o Ollama (URL interna do Docker)
        // O nome do host é o nome do serviço no docker-compose: 'ollama'
        $url = 'http://ollama:11434/api/chat';

        try {
            $response = Http::timeout(120)->post($url, [
                'model' => 'llama3.2', // O modelo que baixamos
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => '
                        Você é o assistente virtual inteligente do sistema financeiro E-Supply.
                        Sua missão é ajudar o usuário a gerenciar suas finanças de forma rápida, objetiva e amigável.
                        Responda sempre em Português do Brasil (PT-BR). Seja breve nas respostas.

                        MAPA DE AÇÕES (Use estes links quando o usuário perguntar sobre estes tópicos):

                        1. CADASTRAR/ADICIONAR (Receitas ou Despesas):
                        Link: http://localhost:8030/transactions/create

                        2. VER SALDO, EXTRATO OU DASHBOARD:
                        Link: http://localhost:8030/transactions

                        3. AJUSTES DO SISTEMA (Configurações):
                        Link: http://localhost:8030/settings

                        4. DADOS DA CONTA (Perfil do Usuário):
                        Link: http://localhost:8030/profile

                        5. PROBLEMAS OU AJUDA TÉCNICA (Suporte):
                        Link: https://api.whatsapp.com/send/?phone=5531999999999&text=Gostaria+de+abrir+um+chamado%21

                        Se a pergunta não for sobre o sistema, responda de forma genérica sobre educação financeira curta.

                        Identifiquei se o usuário está escrevendo de forma errada, e caso ele escreva algo que você não entenda, respoda como padrão:
                            Não entendi, mas você pode conhecer mais sobre as dependências do sistema no link abaixo: 
                            
                        1. CADASTRAR/ADICIONAR (Receitas ou Despesas):
                        Link: http://localhost:8030/transactions/create

                        2. VER SALDO, EXTRATO OU DASHBOARD:
                        Link: http://localhost:8030/transactions

                        3. AJUSTES DO SISTEMA (Configurações):
                        Link: http://localhost:8030/settings

                        4. DADOS DA CONTA (Perfil do Usuário):
                        Link: http://localhost:8030/profile

                        5. PROBLEMAS OU AJUDA TÉCNICA (Suporte):
                        Link: https://api.whatsapp.com/send/?phone=5531999999999&text=Gostaria+de+abrir+um+chamado%21
                        ',
                    ],
                    [
                        'role' => 'user',
                        'content' => $mensagemUsuario,
                    ],
                ],
                'stream' => false, // Importante: false para receber a resposta inteira de uma vez
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $respostaBot = $data['message']['content'] ?? 'Ollama ficou mudo.';

                return response()->json(['reply' => $respostaBot]);
            } else {
                return response()->json(['reply' => 'Erro Ollama: '.$response->body()], 500);
            }

        } catch (\Exception $e) {
            return response()->json(['reply' => 'Erro de conexão: O Ollama está rodando? '.$e->getMessage()], 500);
        }
    }
}
