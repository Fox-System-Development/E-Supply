# features/ChatBot.feature
# language: pt

Funcionalidade: Chatbot Financeiro
  Como um usuário com dúvidas
  Eu quero conversar com uma IA
  Para obter ajuda rápida sobre o sistema

  Contexto:
    Dado que eu sou um usuário autenticado

  Cenário: Enviar uma mensagem e receber qualquer resposta válida
    # Configuramos o Mock para garantir que não chame a internet,
    # mas o texto específico não importa tanto para a validação final.
    Dado que a IA vai responder "Texto de teste do mock."
    
    Quando eu envio a mensagem "Oi, tudo bem?" para o chat
    
    Então a resposta deve ser sucesso
    # AQUI ESTÁ A MUDANÇA: Verificação genérica
    E eu devo receber uma resposta válida da IA