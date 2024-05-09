<?php
    if(isset($_POST['submit']))
    {
        include_once('config.php');

        $name = $_POST['name'];
        $borndate = $_POST['born-date'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $telnumber = $_POST['tel-number'];

        $result = mysqli_query($conexao, "INSERT INTO cadastro(nome,dtnascimento,email,senha,telefone) 
        VALUES ($name,$borndate,$email,$password,$telnumber)");
    }
?>