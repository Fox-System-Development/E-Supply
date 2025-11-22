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

        $apiKey = env('GEMINI_API_KEY');
        $mensagemUsuario = $request->input('message');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}", [
            'contents' => [
                [
                    'parts' => [
                        ['text' => "Você é um assistente financeiro útil e conciso, que permite cadastro de despesa e receita, edição, oferece ao usuário um dashboard e perfeito controle sobre seu perfil. O usuário disse: " . $mensagemUsuario]
                    ]
                ]
            ]
        ]);

        
        if ($response->successful()) {
            $data = $response->json();
            $respostaBot = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Desculpe, não entendi.';
            
            return response()->json(['reply' => $respostaBot]);
        } else {
            return response()->json(['reply' => 'Erro ao conectar com o Gemini.'], 500);
        }
    }
}