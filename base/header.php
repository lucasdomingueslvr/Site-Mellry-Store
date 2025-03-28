<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header id="header">
        <nav>
            <a href="../home/index.php"><img class="img" src="../assets/logo2.png" alt="logo da loja, uma bolsa com o nome Mellry"></a>
            <div class="header-nav1">
                <a href="../menu-produtos/index.php">Produtos</a>
                <a href="../sobre/index.php">Sobre Nós</a>
            </div>
            <div class="header-nav2">
                <?php
                session_start();
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo '<div style="display:flex; align-items: center; gap: 2rem;">'; 
                    echo '<a href="../carrinho/index.php"><img style="height: 4rem;" src="../assets/car.png"></a>';
                    echo '<a href="../login/index.php?action=logout">Logout</a>';
                    echo '</div>';
                } else {
                    echo '<a href="../login/index.php">Entrar ou criar conta</a>';
                }
                ?>
            </div>
        </nav>
    </header>
</body>
</html>