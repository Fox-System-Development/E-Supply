# language: pt
Funcionalidade: Teste de acesso as Minhas Transações
  
  Cenário: Acessar a página de transações 
    Dado que eu sou um usuário autenticado
    Quando eu acesso a página "/transactions"
    Então a resposta deve ser sucesso
    E eu devo ver o texto "Minhas Transações"