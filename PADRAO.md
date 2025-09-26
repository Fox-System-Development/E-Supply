# Guia de Contribuição

Este documento define o padrão de criação de **branches**, **commits** e **pull requests** utilizado pela equipe.

---

## Padrão de Branches
- Sempre criar branches em **inglês**.  
- Formato:  TL-<número-da-tarefa>/<descrição-em-inglês>

### Exemplos:
- `TL-001/create-signIn-signUp-pages`

- `TL-003/create-addTransaction-editTransaction-pages`

### Como criar uma branch:

- `git checkout -b <nome-da-branch> <branch-de-origem>`

- `git checkout -b TL-001/create-login-register-page dev`

## Padrão de Commits
Os commits devem ser escritos em português e seguir o formato:

tipo[Escopo]: descrição breve da mudança

### Tipos de commit:
feat: Um novo recurso para a aplicação.

- fix: Correções de bugs.

- docs: Alterações em documentação (README, comentários, manuais, etc).

- style: Alterações de formatação e estilo (indentação, CSS, espaços, etc).

- refactor: Melhorias no código sem alterar funcionalidade.

- perf: Alterações de performance.

- test: Criação ou alteração de testes.

- chore: Alterações em configuração, CI/CD, build, dependências, etc.

### Exemplos de commits:
- `feat[Login]: adicionar páginas de login e cadastro`

- `fix[Transação]: corrigir erro no cálculo do valor total`

- `docs[README]: atualizar instruções de instalação`

- `style[Navbar]: ajustar espaçamento e tamanho da fonte`

- `refactor[UserService]: simplificar lógica de autenticação`

- `perf[Dashboard]: otimizar consulta de listagem de transações`

- `test[Auth]: adicionar testes unitários para validação JWT`

- `chore[CI]: atualizar workflow do GitHub Actions`

## Padrão de Título de Pull Request
- Formato: [TL-<número>] <tipo>: <Descrição resumida>

### Exemplos:
- `[TL-001] feat: implementar páginas de login e cadastro`

- `[TL-003] fix: corrigir validação do formulário de edição de transação`

## Boas Práticas
- Para manter a qualidade e a organização do código, siga também estas boas práticas:

### Commits pequenos e frequentes
- Prefira commits menores e objetivos em vez de grandes commits que misturam várias alterações.

### Mensagens claras
- Sempre escreva mensagens de commit que deixem claro o que foi feito e por que foi feito.

### Pull Requests bem descritos
- Adicione uma descrição clara no PR explicando:

- O que foi feito.

- Qual problema ou tarefa resolve.

- Passos para testar a alteração (se aplicável).

### Revisão obrigatória
- Todo PR deve ser revisado por pelo menos 1 membro da equipe antes do merge.

### Padronização de código
- Evitar código comentado ou trechos mortos.

### Manter a branch atualizada
- Sempre faça git pull origin dev antes de abrir o PR, garantindo que não haja conflitos desnecessários.
