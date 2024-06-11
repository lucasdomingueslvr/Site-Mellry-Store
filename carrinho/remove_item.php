<?php
session_start();
include_once('../Back/config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin'])) {
    die("Você precisa estar logado para modificar o carrinho.");
}

if (isset($_GET['id'])) {
    $id_cliente = $_SESSION['id_cliente'];
    $id = intval($_GET['id']);

    // Remove o item específico do carrinho
    $sql = "DELETE FROM carrinho WHERE id = ? AND id_cliente = ?";
    $stmt = $conexao->prepare($sql);

    if ($stmt === false) {
        die("Erro na preparação da consulta: " . htmlspecialchars($conexao->error));
    }

    $stmt->bind_param('ii', $id, $id_cliente);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Produto removido do carrinho.";
    } else {
        echo "Erro ao remover produto do carrinho.";
    }

    $stmt->close();
    header("Location: index.php");
    exit;
}
?>
