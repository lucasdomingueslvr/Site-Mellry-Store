<?php
include_once('../Back/config.php');

if (isset($_POST['submit'])) {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $valor = mysqli_real_escape_string($conexao, $_POST['valor']);
    $promocao = mysqli_real_escape_string($conexao, $_POST['promocao']);
    $tamanho = mysqli_real_escape_string($conexao, $_POST['tamanho']);
    $imagem = $_FILES['imagem']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($imagem);
    $uploadOk = 1;

    // Verificar se o arquivo é uma imagem
    $check = getimagesize($_FILES['imagem']['tmp_name']);
    if($check !== false) {
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
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos.";
        $uploadOk = 0;
    }

    // Verificar se $uploadOk é 0 por algum erro
    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi carregado.";
    // Tentar carregar o arquivo
    } else {
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $target_file)) {
            echo "O arquivo ". htmlspecialchars(basename($_FILES['imagem']['name'])) . " foi carregado.";

            // Inserir os dados no banco de dados
            $sql = "INSERT INTO tab_vestidos (nomeproduto, valor, promocao, tamanho, imagem) VALUES ('$nome', '$valor', '$promocao', '$tamanho', '$target_file')";

            if ($conexao->query($sql) === TRUE) {
                echo "Dados inseridos com sucesso!";
            } else {
                echo "Erro ao inserir dados: " . $conexao->error;
            }
        } else {
            echo "Desculpe, houve um erro ao carregar seu arquivo.";
        }
    }
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
                <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" required>
            </div>
            <div class="input-wrapper">
                <label for="valor">Valor <span>*</span></label>
                <input type="number" id="valor" name="valor" placeholder="Digite o valor" required>
            </div>
            <div class="input-wrapper">
                <label for="promocao">Promoção <span>*</span></label>
                <input type="number" id="promocao" name="promocao" placeholder="Digite o valor promocional" required>
            </div>
            <div class="input-wrapper">
                <label for="tamanho">Tamanho <span>*</span></label>
                <input type="text" id="tamanho" name="tamanho" placeholder="Digite o tamanho" required>
            </div>
            <div class="input-wrapper">
                <label for="imagem">Imagem <span>*</span></label>
                <input type="file" id="imagem" name="imagem" required>
            </div>
            <button type="submit" name="submit">Enviar</button>
        </form>
    </main>
    <footer id="footer"></footer>
</body>
</html>