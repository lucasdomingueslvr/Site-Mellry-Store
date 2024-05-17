<?php
include_once('../Back/config.php');

if (isset($_POST['submit'])) {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $valor = mysqli_real_escape_string($conexao, $_POST['valor']);
    $promocao = mysqli_real_escape_string($conexao, $_POST['promocao']);
    $tamanho = mysqli_real_escape_string($conexao, $_POST['tamanho']);
    $estoque = mysqli_real_escape_string($conexao, $_POST['estoque']);
    $imagem = $_FILES['imagem']['tmp_name'];

    // Ler o conteúdo da imagem em binário
    $imgContent = addslashes(file_get_contents($imagem));

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO produto (nomeProduto, valor, promocao, id_tamanho, estoque, imagem) VALUES ('$nome', '$valor', '$promocao', '$tamanho', '$estoque', '$imgContent')";

    if ($conexao->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conexao->error;
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
                <label for="promocao">Valor Promoção <span>*</span></label>
                <input type="number" id="promocao" name="promocao" placeholder="Digite o valor promocional" required>
            </div>
            <div class="input-wrapper">
                <label for="tamanho">Tamanho <span>*</span></label>
                <input type="text" id="tamanho" name="tamanho" placeholder="Digite o tamanho" required>
            </div>
            <div class="input-wrapper">
                <label for="estoque">Estoque <span>*</span></label>
                <input type="number" id="estoque" name="estoque" placeholder="Digite a quantidade em estoque" required>
            </div>
            <div class="input-wrapper">
                <label for="imagem">Imagem <span>*</span></label>
                <input type="file" id="imagem" name="imagem" required>
            </div>
            <br><br>
            <input type="submit" name="submit" id="submit" value="Cadastrar Produto">
        </form>
    </main>
</body>
</html>