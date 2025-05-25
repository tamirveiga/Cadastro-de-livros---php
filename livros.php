<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade Avaliativa 2 - Livros Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container-fluid">
    
    <h1>Atividade Avaliativa 2 - Livros Cadastrados</h1>

    <p>
        <a href="index.php">Voltar à Home</a>
    </p>

    <?php

    require_once 'conexao.php';

    $conn = conectar_banco();

    $query = "SELECT * FROM tb_livros";
    $resultado = mysqli_query($conn, $query);

    $linha_afetadas = mysqli_affected_rows($conn);

    if ($linha_afetadas == 0) {
        exit("<h3>Não há livros cadastrados!</h3>");
    }

    if ($linha_afetadas < 0) {
        exit("<h3>Erro ao exibir livros cadastrados. Verifique a estrutura da consulta.</h3>");
    }

    echo '<table class="table table-success table-striped table-hover">';
    echo    '<thead class="table-secondary">';
    echo        '<tr>';
    echo            '<th>ID</th>';
    echo            '<th>Título</th>';
    echo            '<th>Autor</th>';
    echo            '<th>Preço (R$)</th>';
    echo            '<th>Quantidade</th>';
    echo            '<th>Valor Total (R$)</th>';
    echo        '</tr>';
    echo    '</thead>';
    echo    '<tbody>';

    while ($livro = mysqli_fetch_assoc($resultado)) {
        $valorTotal = $livro['preco'] * $livro['quantidade'];

        echo '<tr>';
            echo '<td>' . $livro['id'] . '</td>';
            echo '<td>' . htmlspecialchars($livro['titulo']) . '</td>';
            echo '<td>' . htmlspecialchars($livro['autor']) . '</td>';
            echo '<td>R$ ' . number_format($livro['preco'], 2, ',', '.') . '</td>';
            echo '<td>' . $livro['quantidade'] . '</td>';
            echo '<td>R$ ' . number_format($valorTotal, 2, ',', '.') . '</td>';
        echo '</tr>';
    }

    echo    '</tbody>';
    echo '</table>';

    mysqli_close($conn);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>