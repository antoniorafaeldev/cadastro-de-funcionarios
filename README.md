# Cadastro de Funcionários

Aplicação web em PHP para cadastrar, visualizar, editar e excluir funcionários em um banco de dados MySQL. O projeto foi desenvolvido como estudo de CRUD em PHP puro, com estrutura simples e interface básica para uso local.

## Sobre o projeto

Este sistema permite:

- cadastrar novos funcionários com nome, email, cargo e salário;
- listar todos os funcionários cadastrados;
- editar os dados de um funcionário existente;
- remover registros da base;
- exibir mensagens de sucesso ou erro durante o fluxo de cadastro.

A aplicação usa:

- PHP para a lógica do servidor;
- MySQL para persistência dos dados;
- HTML/CSS/JavaScript para a interface e validações do formulário;
- XAMPP como ambiente local para execução.

## Estrutura do projeto

```text
cadastro-de-funcionarios/
├── index.php
├── worker-register.php
├── edit.php
├── delete.php
├── db_connection.php
├── config.php
├── config.example.php
├── README.md
├── css/
│   ├── shared.css
│   ├── style.css
│   └── worker-register.css
├── js/
│   ├── form-validation.js
│   └── show-modals.js
└── utils/
    └── html_render.php
```

## Requisitos

- XAMPP instalado;
- PHP 7 ou superior;
- MySQL/MariaDB;
- Navegador para testar a aplicação.

## Como rodar localmente com XAMPP

### 1) Clonar ou copiar o projeto para o XAMPP

Copie a pasta do projeto para a pasta htdocs do XAMPP, por exemplo:

C:\xampp\htdocs\cadastro-de-funcionarios

Depois, inicie os serviços do Apache e do MySQL no painel do XAMPP.

### 2) Configurar o banco de dados

Crie um arquivo config.php a partir do exemplo:

1. Abra o arquivo config.example.php;
2. Copie seu conteúdo para um novo arquivo chamado config.php;
3. Ajuste os valores com as credenciais do seu ambiente local, por exemplo:

```php
<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'senha1234');
define('DB_NAME', 'cadastro_funcionarios');
```

### 3) Criar o banco e a tabela

No phpMyAdmin, crie o banco de dados com o nome informado no config.php e execute a seguinte estrutura:

```sql
CREATE TABLE Funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    cargo VARCHAR(255) NOT NULL,
    salario DECIMAL(10,2) NOT NULL,
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Se preferir, você pode usar outro nome de tabela, mas o código da aplicação espera a tabela Funcionarios com esses campos.

### 4) Acessar a aplicação

Abra o navegador e acesse:

http://localhost/cadastro-de-funcionarios/

A página inicial será a listagem dos funcionários. Para cadastrar um novo funcionário, use o link "Cadastrar Funcionário".

## Observações

- O projeto está pensado para uso local e estudo de conceitos básicos de PHP e MySQL.
- O arquivo config.php não deve ser versionado se houver credenciais reais do ambiente.
- O projeto possui validações simples no front-end e no processamento do formulário.
