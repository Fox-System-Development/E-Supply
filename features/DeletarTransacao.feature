# features/DeletarTransacao.feature
# language: pt

Funcionalidade: Deletar Transação
  Como um usuário que cometeu um erro
  Eu quero remover uma transação
  Para que meu extrato fique correto

  Contexto:
    Dado que eu sou um usuário autenticado

  Cenário: Remover uma despesa da listagem
    # 1. PREPARAÇÃO: Criar uma transação (ID 1)
    Dado que eu estou na página "/transactions/create"
    Quando eu preencho "description" com "Gasto Inútil"
    E eu preencho "amount" com "100.00"
    E eu preencho "date" com "2025-10-10"
    E eu seleciono "Despesa" de "type"
    E eu pressiono "Salvar Transação"
    
    # Verifica se ela foi criada antes de apagar
    Então eu devo estar na página "/transactions"
    E eu devo ver "Gasto Inútil"

    # 2. AÇÃO: Apagar
    # O sistema vai simular o clique no botão de apagar da transação #1
    Quando eu pressiono "Apagar"
    
    # 3. VERIFICAÇÃO
    Então eu devo estar na página "/transactions"
    E a resposta deve ser sucesso
    # Novo passo: Verificar que o texto SUMIU
    E eu não devo ver o texto "Gasto Inútil"