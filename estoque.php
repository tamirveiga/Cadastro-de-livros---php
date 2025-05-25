<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade Avaliativa 2 - Estoque Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container-fluid">
    
    <h1>Atividade Avaliativa 2 - Estoque Livros</h1>

    <p>
        <a href="index.php">Voltar à Home</a>
    </p>

    <?php
    // incluir o arquivo de validações:
    require_once 'validacoes.php';

    // Verificar se o form não foi enviado.
    // Se verdadeiro, exibe msg de erro, e encerra execução do script
    if (form_nao_enviado()) {
        exit("<h3>Formulário não enviado. Por favor,
        retorne à Home</h3>");
    }

    // armazenar dados enviados via POST num array associ.
    $livro = [
        'titulo'     => $_POST['titulo'] ?? '',
        'autor'      => $_POST['autor'] ?? '',
        'preco'      => $_POST['preco'] ?? '',
        'quantidade' => $_POST['quantidade'] ?? ''
    ];

    $livro['preco'] = str_replace(',', '.', $livro['preco']);

    // Verificar se há campos deixados em branco no form.
    // Se verdadeiro, exibe msg de erro, e encerra execução do script
    if (!validar_livro($livro)) {
        exit("<h3>Por favor, os dados são inválidos. Verifique os campos e tente novamente. <a href='index.php'>Voltar</a></h3>");
    }

    // Calcular valor total em estoque
    $valorTotal = calcularValorTotalEstoque($livro);

    // incluir arquivo de conexão
    require_once 'conexao.php';

    // estabelecer uma conexão o BD
    $conn = conectar_banco();

    // criar nosso comando SQL (INSERT)
    $sql = "INSERT INTO tb_livros (titulo, autor, preco, quantidade) VALUES (?, ?, ?, ?)";

    // criar um statement (declarção)
    $stmt = mysqli_prepare($conn, $sql);

    // verificar se houve erro no preparo deste stmt
    if (!$stmt) {
        exit ("<h3>Erro na preparação da consulta</h3>");
    }

    // se estiver tudo certo com a declaração, faremos o bind
    // (associação) dos valores ao stmt
    mysqli_stmt_bind_param($stmt, "ssdi", $livro['titulo'], $livro['autor'], $livro['preco'], $livro['quantidade']);

    // Abaixo, executamos o comando preparado e, caso haja algum erro,
    // exibimos msg de erro e finalizamos a execução do script
    if (!mysqli_stmt_execute($stmt)){
        exit ("<h3>Erro ao cadastrar. 
        Verifique o erro e tente novamente: " 
        . mysqli_stmt_error($stmt) . "</h3>");
    }

    echo "<h3>Livro cadastrado com sucesso!</h3>";

    // Exibir os dados do livro
    echo "<ul>";
    echo "<li><strong>Título:</strong> " . htmlspecialchars($livro['titulo']) . "</li>";
    echo "<li><strong>Autor:</strong> " . htmlspecialchars($livro['autor']) . "</li>";
    echo "<li><strong>Preço:</strong> R$ " . number_format($livro['preco'], 2, ',', '.') . "</li>";
    echo "<li><strong>Quantidade:</strong> " . (int) $livro['quantidade'] . "</li>";
    echo "<li><strong>Valor Total em Estoque:</strong> R$ " . number_format($valorTotal, 2, ',', '.') . "</li>";
    echo "</ul>";

    // Encerrar conexão
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>
</html>