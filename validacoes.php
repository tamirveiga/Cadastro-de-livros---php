<?php 

function form_nao_enviado() {
    return $_SERVER['REQUEST_METHOD'] != 'POST';
}

function validar_livro($livro) {

    if (
        empty($livro['titulo']) ||
        empty($livro['autor']) ||
        !filter_var($livro['preco'], FILTER_VALIDATE_FLOAT) ||
        !filter_var($livro['quantidade'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]])
    ) {
        return false;
    }

    return true;

}

function calcularValorTotalEstoque($livro) {

    // Multiplica preço unitário pela quantidade
    return $livro['preco'] * $livro['quantidade'];

}

?>