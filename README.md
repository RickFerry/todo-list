
```markdown
# Sistema de Gerenciamento de Tarefas (To-Do List)

## Requisitos

- PHP >= 7.4
- MySQL
- Composer

## Instalação

1. Clone o repositório:
   ```bash
   git clone <repo_url>
   cd todo-list
   ```

2. Instale as dependências do Composer:
   ```bash
   composer install
   ```

3. Configure o banco de dados em `config/db.php`.

4. Execute as migrations:
   ```bash
   php yii migrate
   ```

5. Inicie o servidor:
   ```bash
   php yii serve
   ```

## Funcionalidades

- Registro e Login de usuários.
- Criação, edição, exclusão, e visualização de tarefas.
- Filtros e ordenação de tarefas por data de vencimento e prioridade.
- Notificações de sucesso e erro.

## Testes

Para executar os testes, use o comando:
```bash
php vendor/bin/codecept run
```
