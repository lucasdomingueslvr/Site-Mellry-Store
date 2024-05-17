<?php   

    include_once('../Back/config.php');

    
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
            $("#header").load("../base/header.html");
            $("#footer").load("../base/footer.html");
        });
    </script>
</head>
<body>
    <header id="header"></header>
    <main>
        <div class="produtos">
            <h2>Vestidos</h2>
            <div class="card">
                <img class="img-produto" src="../assets/vestido.png" alt="">
                <p>
                    Vestido Feminino De Verão Com Estampa Tie Dye E Decote Nas Costas Para Férias
                </p>
                <span>
                    R$150,00
                </span>
                <strong>
                    R$119,00
                </strong>
                <div class="buttons">
                    <button class="btn-buy">
                        <a href="">Comprar</a>
                    </button>
                    <button>
                        <img src="../assets/car.png" alt="Botão para adicionar produto ao carrinho">
                    </button>
                </div>
            </div>
        </div>
        <div class="produtos">
            <h2>Camisetas</h2>
            <div class="card">
                <img class="img-produto" src="../assets/camisa.png" alt="">
                <p>
                    Zara - Camiseta Básica De Algodão - Preto - Mulher
                </p>
                <span>
                    R$79,99
                </span>
                <strong>
                    R$69,99
                </strong>
                <div class="buttons">
                    <button class="btn-buy">
                        <a href="../produto/index.html">Comprar</a>
                    </button>
                    <button>
                        <img src="../assets/car.png" alt="Botão para adicionar produto ao carrinho">
                    </button>
                </div>
            </div>
        </div>
        <div class="produtos">
            <h2>Shorts</h2>
            <div class="card">
                <img class="img-produto" src="../assets/shorts.png" alt="">
                <p>
                    Short Baggy Jeans Com Bolso Carpinteiro E Cós Elástico Azul
                </p>
                <span>
                    R$159,00
                </span>
                <strong>
                    R$119,90
                </strong>
                <div class="buttons">
                    <button class="btn-buy">
                        <a href="">Comprar</a>
                    </button>
                    <button>
                        <img src="../assets/car.png" alt="Botão para adicionar produto ao carrinho">
                    </button>
                </div>
            </div>
        </div>
        <div class="produtos">
            <h2>Moda Íntima</h2>
            <div class="card last-card">
                <img class="img-produto" src="../assets/intima.png" alt="">
                <p>
                    Conjunto de Calcinha e Sutiã Confort Plus
                </p>
                <span>
                    R$159,90
                </span>
                <strong>
                    R$97,90
                </strong>
                <div class="buttons">
                    <button class="btn-buy">
                        <a href="">Comprar</a>
                    </button>
                    <button>
                        <img src="../assets/car.png" alt="Botão para adicionar produto ao carrinho">
                    </button>
                </div>
            </div>
        </div>
    </main>
    <footer id="footer"></footer>
</body>
</html>