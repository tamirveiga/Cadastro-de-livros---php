# 📚 Sistema de Cadastro de Livros - PHP + MySQL

Este projeto é um sistema simples de cadastro e controle de estoque de livros, desenvolvido em PHP com integração ao banco de dados MySQL. Ele permite que o usuário cadastre livros com informações básicas, visualize os livros já cadastrados em forma de tabela e veja o valor total em estoque de cada item.

## 🔧 Funcionalidades

* Cadastro de livros com os campos:

  * Título
  * Autor
  * Preço unitário
  * Quantidade em estoque
* Validação dos dados do formulário antes do envio
* Armazenamento dos dados no banco de dados `tb_livros` (MySQL)
* Exibição dos livros cadastrados em uma tabela (Bootstrap)
* Cálculo automático do valor total em estoque (preço × quantidade)
* Interface simples e responsiva utilizando Bootstrap
* Navegação por menu entre a Home e a listagem de livros

## 🥺 Validações

As validações são realizadas no backend:

* Todos os campos devem ser preenchidos
* O preço deve ser um número decimal válido
* A quantidade deve ser um número inteiro maior que zero

## 📃 Estrutura do Banco de Dados

A tabela usada é `tb_livros`, com os seguintes campos:

| Campo      | Tipo          | Detalhes                        |
| ---------- | ------------- | ------------------------------- |
| id         | INT           | Chave primária, auto\_increment |
| titulo     | VARCHAR(255)  |                                 |
| autor      | VARCHAR(255)  |                                 |
| preco      | DECIMAL(10,2) |                                 |
| quantidade | INT           |                                 |

## 📁 Organização dos Arquivos

* `index.php`: Formulário de cadastro dos livros
* `estoque.php`: Processa o formulário, valida os dados e insere no banco
* `livros.php`: Lista todos os livros cadastrados em uma tabela
* `menu.php`: Componente de navegação entre as páginas
* `conexao.php`: Arquivo de conexão com o banco de dados
* `validacoes.php`: Arquivo com funções de validação e cálculo

## ✅ Como usar

1. Instale o XAMPP e inicie o Apache e o MySQL.
2. Crie o banco de dados e a tabela `tb_livros` no phpMyAdmin.
3. Clone este repositório no diretório `htdocs`.
4. Acesse `localhost/nome-da-pasta` no navegador.
5. Use a interface para cadastrar e visualizar livros.

---

> Desenvolvido para fins educacionais e prática com PHP e MySQL.
