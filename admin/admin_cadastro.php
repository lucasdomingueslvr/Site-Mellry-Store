<?php
session_start();
include_once('../Back/config.php');

header('Content-Type: application/json');

// Verifica se o método é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o formulário foi enviado
    if (isset($_POST['nome']) && isset($_POST['valor']) && isset($_POST['promocao']) && isset($_POST['tamanho']) && isset($_POST['categoria']) && isset($_FILES['imagem'])) {
        // Obtém os dados do formulário
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $valor = mysqli_real_escape_string($conexao, $_POST['valor']);
        $promocao = mysqli_real_escape_string($conexao, $_POST['promocao']);
        $tamanho = mysqli_real_escape_string($conexao, $_POST['tamanho']);
        $categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);

        // Verifica se um arquivo de imagem foi enviado
        if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $imagem_tmp = $_FILES['imagem']['tmp_name'];
            $imagem_nome = $_FILES['imagem']['name'];
            $imagem_tipo = $_FILES['imagem']['type'];
            $imagem_tamanho = $_FILES['imagem']['size'];

            // Diretório para onde a imagem será enviada
            $diretorio_imagens = '../uploads/';
            if (!is_dir($diretorio_imagens)) {
                mkdir($diretorio_imagens, 0777, true);
            }

            // Caminho completo para salvar a imagem
            $imagem_destino = $diretorio_imagens . basename($imagem_nome);

            // Verifica se o arquivo é uma imagem
            $tipos_permitidos = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($imagem_tipo, $tipos_permitidos)) {
                // Move o arquivo para o diretório de destino
                if (move_uploaded_file($imagem_tmp, $imagem_destino)) {
                    // Insere os dados no banco de dados
                    $tabela = '';
                    switch ($categoria) {
                        case '1':
                            $tabela = 'tab_vestidos';
                            break;
                        case '2':
                            $tabela = 'tab_camiseta';
                            break;
                        case '3':
                            $tabela = 'tab_shorts';
                            break;
                        case '4':
                            $tabela = 'tab_modaintima';
                            break;
                        default:
                            echo json_encode(['status' => 'error', 'message' => 'Categoria inválida']);
                            exit;
                    }

                    $sql = "INSERT INTO $tabela (nomeproduto, valor, promocao, tamanho, imagem)
                            VALUES ('$nome', '$valor', '$promocao', '$tamanho', '$imagem_destino')";

                    if ($conexao->query($sql) === TRUE) {
                        echo json_encode(['status' => 'success', 'message' => 'Produto cadastrado com sucesso!']);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Erro ao cadastrar produto: ' . $conexao->error]);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Erro ao mover o arquivo de imagem.']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Tipo de arquivo não permitido. Por favor, envie uma imagem JPEG, PNG ou GIF.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erro no envio do arquivo de imagem.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Formulário não enviado corretamente.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método de requisição inválido.']);
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
