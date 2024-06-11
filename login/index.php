<?php
session_start();

// Conexão com o banco de dados já está estabelecida
include_once('../Back/config.php');

// Lógica de logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset();
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Lógica de login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta para verificar o usuário
    $sql = "SELECT id_cliente, email, senha FROM cadastro WHERE email = ? AND senha = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $user['email'];
        $_SESSION['id_cliente'] = $user['id_cliente'];
    } else {
        $login_error = "Email ou senha incorretos.";
    }

    $stmt->close();
}

// Proteção da página
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    echo "<h2>Bem-vindo, " . htmlspecialchars($_SESSION['email']) . "</h2>";
    echo '<a href="?action=logout">Logout</a>';
    echo '<p>ID do Cliente: ' . htmlspecialchars($_SESSION['id_cliente']) . '</p>';
    $conexao->close();
    exit;
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
    <title>Login</title>
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
            <form method="POST" action="">
                <h2>Já possuo uma conta</h2>
                <div class="input-wrapper">
                    <label for="email-login-input">Email</label>
                    <input type="email" name="email" id="email-login-input" placeholder="modelo@gmail.com" required />
                </div>
                <div class="input-wrapper">
                    <label for="password-login-input">Senha</label>
                    <input type="password" name="password" id="password-login-input" placeholder="********" required />
                </div>
                <button type="submit" name="login" id="bnt-login">LOGIN</button>
            <?php
            if (isset($login_error)) {
                echo "<p style='color:red;'>$login_error</p>";
            }
            ?>
            </form>
            <div class="create-account">
                <h2>Quero criar uma conta</h2>
                <button><a href="../cadastro/index.php">CRIAR</a></button>
            </div>
        </div>
    </main>
    <footer id="footer"></footer>
</body>
</html>
