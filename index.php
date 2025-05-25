<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade Avaliativa 2 - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container-fluid">

    <h1>Atividade Avaliativa 2 - Home</h1><br>

    <?php require_once 'menu.php'; ?> <br>

    <h2>Cadastro de Livros</h2><br>

    <form action="estoque.php" method="post">

        <label for="titulo">Título: </label><br>
        <input type="text" name="titulo" id="titulo"><br><br>

        <label for="autor">Autor: </label><br>
        <input type="text" name="autor" id="autor"><br><br>

        <label for="preco">Preço unitário </label><br>
        <input type="number" name="preco" id="preco" step="0.01"><br><br>

        <label for="quantidade">Quantidade </label><br>
        <input type="number" name="quantidade" id="quantidade" step="1"><br><br>

        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>