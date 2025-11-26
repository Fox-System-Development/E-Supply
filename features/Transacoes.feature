# features/transacoes.feature
# language: pt

Funcionalidade: Criar Transações
  Para controlar minhas finanças
  Como um usuário autenticado
  Eu quero registrar novas despesas

  Cenário: Registrar uma despesa de café com sucesso
    Dado que eu sou um usuário autenticado
    E que eu estou na página "/transactions/create"
    Quando eu preencho "description" com "Café Expresso"
    E eu preencho "amount" com "15.50"
    E eu preencho "date" com "2025-10-10"   
    E eu seleciono "Despesa" de "type"
    E eu pressiono "Salvar Transação"
    Então eu devo estar na página "/transactions"
    E eu devo ver "Café Expresso"
    E eu devo ver "R$ 15,50"