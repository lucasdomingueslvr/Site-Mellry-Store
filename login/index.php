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
    </script>
</head>
<body>
    <header id="header"></header>

    <main>
        <div class="container">
            <form action="">
                <h2>Já possuo uma conta</h2>
    
                <div class="input-wrapper">
                    <label for="email-login-input">
                        Email
                    </label>
                    <input 
                    type="email" 
                    name="email" 
                    id="email-login-input" 
                    placeholder="modelo@gmail.com"
                    required
                    />
                </div>
                <div class="input-wrapper">
                    <label for="password-login-input">
                        Senha
                    </label>
                    <input 
                    type="password" 
                    name="password" 
                    id="password-login-input"
                    placeholder="********"
                    required
                    />
                </div>
    
                <a id="forgot-password" href="#">Esqueci minha senha</a>

                <button id="bnt-login">
                    LOGIN
                </button>
            </form>

            <div class="create-account">
                <h2>Quero criar uma conta</h2>
                <button>
                    <a href="../cadastro/index.php">CRIAR</a>
                </button>
            </div>
        </div>
    </main>

    <footer id="footer"></footer>
</body>
</html> 