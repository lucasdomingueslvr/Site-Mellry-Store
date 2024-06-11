<?php
session_start();
include_once('../Back/config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin'])) {
    die("Você precisa estar logado para modificar o carrinho.");
}

$id_cliente = $_SESSION['id_cliente'];

// Remove todos os itens do carrinho para o cliente logado
$sql = "DELETE FROM carrinho WHERE id_cliente = ?";
$stmt = $conexao->prepare($sql);

if ($stmt === false) {
    die("Erro na preparação da consulta: " . htmlspecialchars($conexao->error));
}

$stmt->bind_param('i', $id_cliente);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Todos os produtos foram removidos do carrinho.";
} else {
    echo "Nenhum produto foi removido do carrinho.";
}

$stmt->close();
header("Location: index.php");
exit;
?>
