<?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '1234';
    $dbName = 'mellrystore';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    
    //if($conexao->connect_errno)
    //{
    //    echo "Erro";
    //}
    //else{
    //    echo "Conexão efetuado com sucesso"
    //}
?>