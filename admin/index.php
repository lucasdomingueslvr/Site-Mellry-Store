<?php
include_once('../Back/config.php');

if (isset($_POST['submit'])) {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $valor = mysqli_real_escape_string($conexao, $_POST['valor']);
    $promocao = mysqli_real_escape_string($conexao, $_POST['promocao']);
    $tamanho = mysqli_real_escape_string($conexao, $_POST['tamanho']);
    $categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
    $imagem = $_FILES['imagem']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($imagem);
    $uploadOk = 1;

    // Verificar se o arquivo é uma imagem
    $check = getimagesize($_FILES['imagem']['tmp_name']);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "O arquivo não é uma imagem.";
        $uploadOk = 0;
    }

    // Verificar se o arquivo já existe
    if (file_exists($target_file)) {
        echo "Desculpe, o arquivo já existe.";
        $uploadOk = 0;
    }

    // Verificar o tamanho do arquivo
    if ($_FILES['imagem']['size'] > 500000) {
        echo "Desculpe, o seu arquivo é muito grande.";
        $uploadOk = 0;
    }

    // Permitir apenas certos formatos de arquivo
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos.";
        $uploadOk = 0;
    }

    // Verificar se $uploadOk é 0 por algum erro
    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi carregado.";
    // Tentar carregar o arquivo
    } else {
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $target_file)) {
            echo "O arquivo " . htmlspecialchars(basename($_FILES['imagem']['name'])) . " foi carregado.";

            // Determinar a tabela correta com base na categoria selecionada
            switch ($categoria) {
                case 1:
                    $tabela = "tab_vestidos";
                    break;
                case 2:
                    $tabela = "tab_camiseta";
                    break;
                case 3:
                    $tabela = "tab_shorts";
                    break;
                case 4:
                    $tabela = "tab_modaintima";
                    break;
                default:
                    echo "Categoria inválida.";
                    exit;
            }

            // Inserir os dados no banco de dados
            $sql = "INSERT INTO $tabela (nomeproduto, valor, promocao, tamanho, imagem) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conexao->prepare($sql);

            if ($stmt === false) {
                echo "Erro na preparação da consulta: " . $conexao->error;
            } else {
                $stmt->bind_param("sssss", $nome, $valor, $promocao, $tamanho, $target_file);
                if ($stmt->execute()) {
                    echo "Dados inseridos com sucesso!";
                } else {
                    echo "Erro ao inserir dados: " . $stmt->error;
                }
                $stmt->close();
            }
        } else {
            echo "Desculpe, houve um erro ao carregar seu arquivo.";
        }
    }

    $conexao->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belgrano&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>

    <link rel="shortcut icon" href="../assets/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="../base/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script>
        $(function(){
            $("#header").load("../base/header.php");
            $("#footer").load("../base/footer.php");
        });
    </script>
</head>
<body>
    <header id="header"></header>
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Cadastro de Produto</h2>
            <div class="input-wrapper">
                <label for="nome">Nome <span>*</span></label>
                <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" autocomplete="off" required>
            </div>
            <div class="input-wrapper">
                <label for="valor">Valor <span>*</span></label>
                <input type="number" id="valor" name="valor" placeholder="Digite o valor" autocomplete="off" required>
            </div>
            <div class="input-wrapper">
                <label for="promocao">Promoção <span>*</span></label>
                <input type="number" id="promocao" name="promocao" placeholder="Digite o valor promocional" autocomplete="off" required>
            </div>
            <div class="input-wrapper">
                <label for="tamanho">Tamanho <span>*</span></label>
                <input type="text" id="tamanho" name="tamanho" placeholder="Digite o tamanho" autocomplete="off" required>
            </div>
            <div class="input-wrapper">
                <label for="categoria">Categoria <span>*</span></label>
                <select name="categoria" id="categoria" required>
                    <option value="" disabled selected>Selecione a categoria</option>
                    <option value="1">Vestido</option>
                    <option value="2">Camiseta</option>
                    <option value="3">Shorts</option>
                    <option value="4">Moda Íntima</option>
                </select>
            </div>
            <div class="input-wrapper">
                <label for="imagem">Imagem <span>*</span></label>
                <input type="file" id="imagem" name="imagem" required>
            </div>
            <button type="submit" name="submit">Enviar</button>
        </form>
    </main>
</body>
</html>
