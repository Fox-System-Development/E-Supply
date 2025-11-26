# features/EditarPerfil.feature
# language: pt

Funcionalidade: Editar Perfil
  Como um usuário registrado
  Eu quero atualizar meus dados pessoais
  Para manter minhas informações corretas

  Contexto:
    Dado que eu sou um usuário autenticado

  Cenário: Atualizar nome e email com sucesso
    Dado que eu estou na página "/profile"
    
    Quando eu preencho "name" com "Davi Editado"
    E eu preencho "email" com "davi.novo@teste.com"
    
    E eu pressiono "Salvar Perfil"
    E eu devo estar na página "/profile"

    E meu nome deve ser "Davi Editado"
    E meu email deve ser "davi.novo@teste.com"