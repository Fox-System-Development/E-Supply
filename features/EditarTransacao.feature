# features/EditarTransacao.feature
# language: pt

Funcionalidade: Editar Transação
  Como um usuário organizado
  Eu quero corrigir lançamentos errados
  Para manter meu saldo preciso

  Contexto:
    Dado que eu sou um usuário autenticado

  Cenário: Corrigir o valor de uma despesa existente
    # 1. PREPARAÇÃO: Criar uma transação inicial (ID 1)
    Dado que eu estou na página "/transactions/create"
    Quando eu preencho "description" com "Conta de Luz Errada"
    E eu preencho "amount" com "500.00"
    E eu preencho "date" com "2025-10-10"
    E eu seleciono "Despesa" de "type"
    E eu pressiono "Salvar Transação"
    
    # 2. AÇÃO: Ir para a página de edição da transação #1
    # (Como limpamos o banco a cada teste, o primeiro ID é sempre 1)
    Quando eu acesso a página "/transactions/1/edit"
    
    # 3. ALTERAÇÃO: Preencher com os dados corretos
    E eu preencho "description" com "Conta de Luz Corrigida"
    E eu preencho "amount" com "150.00"
    
    # Importante: O botão deve ter um nome diferente ou usaremos lógica no PHP para identificar
    E eu pressiono "Atualizar Transação"
    
    # 4. VERIFICAÇÃO
    Então eu devo estar na página "/transactions"
    E eu devo ver "Conta de Luz Corrigida"
    E eu devo ver "R$ 150,00"