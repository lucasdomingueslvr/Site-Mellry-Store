<?php
include_once('../Back/config.php');

header('Content-Type: application/json');

// Verifica se o método é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_produto']) && isset($_POST['categoria'])) {
        $id_produto = intval($_POST['id_produto']);
        $categoria = intval($_POST['categoria']);

        // Determinar a tabela correta com base na categoria selecionada
        switch ($categoria) {
            case 1:
                $tabela = "tab_vestidos";
                $id_column = "id_vestidos";
                break;
            case 2:
                $tabela = "tab_camiseta";
                $id_column = "id_camiseta";
                break;
            case 3:
                $tabela = "tab_shorts";
                $id_column = "id_shorts";
                break;
            case 4:
                $tabela = "tab_modaintima";
                $id_column = "id_modaintima";
                break;
            default:
                echo json_encode(['status' => 'error', 'message' => 'Categoria inválida.']);
                exit;
        }

        // Verificar se o produto existe
        $sql = "SELECT imagem FROM $tabela WHERE $id_column = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('i', $id_produto);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imagem = $row['imagem'];

            // Deletar o produto
            $sql = "DELETE FROM $tabela WHERE $id_column = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param('i', $id_produto);

            if ($stmt->execute()) {
                // Deletar a imagem associada
                if (file_exists($imagem)) {
                    unlink($imagem);
                }
                echo json_encode(['status' => 'success', 'message' => 'Produto removido com sucesso!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erro ao remover produto: ' . $stmt->error]);
            }
            $stmt->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Produto não encontrado.']);
        }

        $conexao->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Formulário não enviado corretamente.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método de requisição inválido.']);
}
?>
