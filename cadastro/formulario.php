<?php
    if(isset($_POST['submit']))
    {
        include_once('config.php');

        $name = mysqli_real_escape_string($conexao, $_POST['name']);
        $borndate = mysqli_real_escape_string($conexao, $_POST['born-date']);
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $password = mysqli_real_escape_string($conexao, $_POST['password']);
        $telnumber = mysqli_real_escape_string($conexao, $_POST['tel-number']);

        $result = mysqli_query($conexao, "INSERT INTO cadastro(nome,dtnascimento,email,senha,telefone) 
        VALUES ('$name','$borndate','$email','$password','$telnumber')");
        if($result) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . mysqli_error($conexao);
        }
    }
?>