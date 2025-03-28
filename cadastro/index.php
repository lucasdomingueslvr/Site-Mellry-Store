<?php
include_once('../Back/config.php');
session_start(); // Inicie a sessão

if(isset($_POST['submit']) && !isset($_SESSION['submitted'])) 
{
    $name = mysqli_real_escape_string($conexao, $_POST['name']);
    $borndate = mysqli_real_escape_string($conexao, $_POST['born-date']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $password = mysqli_real_escape_string($conexao, $_POST['password']);
    $password2 = mysqli_real_escape_string($conexao, $_POST['password2']);
    $telnumber = mysqli_real_escape_string($conexao, $_POST['tel-number']);

    if ($password !== $password2) {
        $_SESSION['message'] = "Erro: As senhas não coincidem.";
    } else {
        $result = mysqli_query($conexao, "INSERT INTO cadastro(nome,dtnascimento,email,senha,telefone) 
        VALUES ('$name','$borndate','$email','$password','$telnumber')");
        if($result) {
            $_SESSION['message'] = "Dados inseridos com sucesso!";
            $_SESSION['submitted'] = true;
        } else {
            $_SESSION['message'] = "Erro ao inserir dados: " . mysqli_error($conexao);
        }
    }
    header("Location: " . $_SERVER['PHP_SELF']); // Redireciona para a mesma página
    exit();
}

if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    unset($_SESSION['submitted']); // Limpa a flag de submissão
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
    <title>Document</title>

    <link rel="shortcut icon" href="../assets/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="../base/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script>
        $(function(){
            $("#header").load("../base/header.php");
            $("#footer").load("../base/footer.php");
        });

        function validateForm() {
            var password = document.getElementById("password").value;
            var password2 = document.getElementById("password2").value;
            if (password !== password2) {
                alert("As senhas não coincidem.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <header id="header"></header>
    <main>
        <form action="" method="post" onsubmit="return validateForm()">
            <h2>
                Cadastro
            </h2>
            <div class="input-wrapper">
                <label for="name">Nome <span>*</span></label>
                <input 
                type="text" 
                id="name" 
                name="name"
                placeholder="Digite seu nome"
                autocomplete="off"
                required
                >
            </div>
            <div class="input-wrapper">
                <label for="born-date">Data de Nascimento <span>*</span></label>
                <input 
                type="date" 
                id="born-date"
                name="born-date"
                autocomplete="off"
                required
                >
            </div>
            <div class="input-wrapper">
                <label for="email">Email <span>*</span></label>
                <input 
                type="email" 
                id="email"
                name="email"
                placeholder="exemplo@gmail.com"
                autocomplete="off"
                required
                >
            </div>
            <div class="input-wrapper">
                <label for="password">Senha <span>*</span></label>
                <input 
                type="password" 
                id="password"
                name="password"
                placeholder="********"
                autocomplete="off"
                required
                >
            </div>
            <div class="input-wrapper">
                <label for="password2">Confirme sua senha <span>*</span></label>
                <input 
                type="password" 
                id="password2"
                name="password2"
                placeholder="********"
                autocomplete="off"
                required
                >
            </div>
            <div class="input-wrapper">
                <label for="tel-number">Telefone<span>*</span></label>
                <input 
                type="tel" 
                id="tel-number"
                name="tel-number" 
                placeholder="(XX) XXXXX-XXXX"
                autocomplete="off"
                required
                >
            </div>
            <br><br>
            <input type="submit" name="submit" id="submit">
        </form>
    </main>
    <footer id="footer"></footer>
</body>
</html>