<?php
session_start();
include_once('../Back/config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin'])) {
    die("Você precisa estar logado para adicionar produtos ao carrinho.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_SESSION['id_cliente'];
    $id_produto = intval($_POST['id_produto']);
    $tabela_produto = $_POST['tabela_produto'];

    // Insere o produto no carrinho
    $sql = "INSERT INTO carrinho (id_cliente, id_produto, tabela_produto) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);

    if ($stmt === false) {
        die("Erro na preparação da consulta: " . htmlspecialchars($conexao->error));
    }

    $stmt->bind_param('iis', $id_cliente, $id_produto, $tabela_produto);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Produto adicionado ao carrinho com sucesso.";
    } else {
        echo "Erro ao adicionar produto ao carrinho.";
    }

    $stmt->close();
    header("Location: ../carrinho/index.php");
    exit;
}
?>
