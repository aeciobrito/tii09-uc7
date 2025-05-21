# Cardápio de Pizzaria - Pizzas para Todos

Este sistema é uma aplicação PHP para gerenciamento de uma pizzaria, permitindo cadastrar, visualizar, editar e excluir pizzas do cardápio. O projeto segue o padrão de arquitetura MVC (Model-View-Controller) de forma simplificada e utiliza PDO para conexão com o banco de dados MySQL.

## Estrutura do Projeto

```
├── Database.php       # Classe de conexão com o banco de dados
├── Pizza.php          # Modelo (classe) para a entidade Pizza
├── PizzaDAO.php       # Classe de acesso aos dados (Data Access Object)
├── index.php          # Página principal com a listagem de pizzas
├── Pizza_form.php     # Formulário para cadastro e edição de pizzas
├── Pizza_details.php  # Página de detalhes de uma pizza específica
├── Pizza_delete.php   # Script para exclusão de uma pizza
├── pizzaria.sql       # Script SQL para criação do banco e tabelas
└── styles.css         # Folha de estilos CSS para a interface
```

## Fluxo de Navegação e Conexão entre Páginas

1. **index.php** → Página inicial que lista todas as pizzas cadastradas
   - Se conecta com **PizzaDAO.php** para obter os dados das pizzas
   - Possui links para:
     - **Pizza_form.php** (Cadastrar Nova)
     - **Pizza_details.php?id=X** (Detalhes)
     - **Pizza_form.php?id=X** (Editar)
     - **Pizza_delete.php?id=X** (Excluir)

2. **Pizza_form.php** → Formulário para cadastro ou edição de pizzas
   - Se acessado sem parâmetros: modo de cadastro de nova pizza
   - Se acessado com parâmetro id (?id=X): modo de edição da pizza existente
   - Se conecta com **PizzaDAO.php** para salvar (create) ou atualizar (update) dados
   - Após salvar, redireciona para **index.php**
   - Possui link para **index.php** (Cancelar)

3. **Pizza_details.php** → Exibe detalhes de uma pizza específica
   - Recebe o parâmetro id via GET (?id=X)
   - Se conecta com **PizzaDAO.php** para buscar os dados da pizza
   - Possui link para **index.php** (Voltar)

4. **Pizza_delete.php** → Realiza a exclusão de uma pizza
   - Recebe o parâmetro id via GET (?id=X)
   - Se conecta com **PizzaDAO.php** para excluir a pizza do banco de dados
   - Após exclusão, redireciona para **index.php**

## Classes e Componentes

### Database.php
- Classe com método estático para conexão com o banco de dados MySQL
- Implementa o padrão Singleton para conexão com o banco
- Utiliza PDO (PHP Data Objects) para acesso ao banco de dados

### Pizza.php
- Classe modelo que representa a entidade Pizza
- Possui atributos privados (id, sabor, tamanho, preço)
- Implementa métodos getters e setters
- Implementa método mágico __toString

### PizzaDAO.php
- Classe responsável pela comunicação com o banco de dados
- Implementa operações CRUD (Create, Read, Update, Delete)
- Métodos:
  - `getAll()`: Retorna todas as pizzas cadastradas
  - `getById($id)`: Busca uma pizza específica pelo ID
  - `create($pizza)`: Cadastra uma nova pizza
  - `update($pizza)`: Atualiza os dados de uma pizza existente
  - `delete($id)`: Remove uma pizza do banco de dados

## Banco de Dados

O arquivo **pizzaria.sql** contém as instruções para:
- Criar o banco de dados `pizzaria_senac`
- Criar a tabela `pizza` com os campos:
  - `id` (INT, AUTO_INCREMENT, PRIMARY KEY)
  - `sabor` (VARCHAR(100), NOT NULL)
  - `tamanho` (VARCHAR(10), NOT NULL)
  - `preco` (DECIMAL(10, 2), NOT NULL)
- Inserir 31 pizzas iniciais no banco para demonstração

## Instruções de Instalação

1. Importe o arquivo **pizzaria.sql** para o seu servidor MySQL
   ```
   mysql -u root < pizzaria.sql
   ```
   ou utilize o phpMyAdmin para importar o arquivo

2. Configure a conexão com o banco de dados em **Database.php** se necessário
   ```php
   return new PDO("mysql:host=localhost;dbname=pizzaria_senac", "root");
   ```
   Ajuste o host, nome do banco, usuário e senha conforme necessário

3. Copie todos os arquivos para o diretório do seu servidor web

4. Acesse a aplicação através do navegador:
   ```
   http://localhost/pasta_do_projeto/index.php
   ```

## Requisitos

- PHP 7.4 ou superior (utiliza tipagem e nullables)
- MySQL 5.7 ou superior
- Extensão PDO do PHP habilitada

## Funcionalidades

- Listagem de todas as pizzas cadastradas
- Visualização detalhada de uma pizza específica
- Cadastro de novas pizzas
- Edição de pizzas existentes
- Exclusão de pizzas

## Segurança

O sistema implementa:
- Validação de dados antes da inserção/atualização
- Consultas preparadas (prepared statements) para evitar SQL Injection
- Verificação de existência de registros antes de operações críticas

## Melhorias Futuras

- Implementação de sistema de login e controle de acesso
- Adição de imagens para as pizzas
- Categorização de pizzas (salgadas, doces, especiais)
- Implementação de sistema de pedidos
- Relatórios de vendas e estatísticas