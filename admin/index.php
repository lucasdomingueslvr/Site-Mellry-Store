<?php
session_start();
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
    <title>Admin - Gerenciamento de Produtos</title>

    <link rel="shortcut icon" href="../assets/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="../base/style.css">
    <link rel="stylesheet" href="style.css">
    <style>
        h2,
        h3 {
            margin: 2rem;
            color: #48392E;
        }

        .switch-buttons {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .switch-buttons button {
            padding: 10px 20px;
            margin: 0 10px;
            font-size: 16px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #48392E;
            color: #fff;
        }

        .switch-buttons button:hover {
            background-color: #352920;
        }

        .input-wrapper {
            margin-bottom: 15px;
        }

        .input-wrapper label {
            display: block;
            margin-bottom: 5px;
        }

        .input-wrapper input,
        .input-wrapper select {
            padding: 8px;
            box-sizing: border-box;
        }

        #add-product-section,
        #remove-product-section,
        #list-product-section {
            display: none;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .product-image {
            width: 50px;
            height: auto;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $("#header").load("../base/header.php");
            $("#footer").load("../base/footer.php");
        });

        function toggleSection(section) {
            document.getElementById('add-product-section').style.display = section === 'add' ? 'block' : 'none';
            document.getElementById('remove-product-section').style.display = section === 'remove' ? 'block' : 'none';
            document.getElementById('list-product-section').style.display = section === 'list' ? 'block' : 'none';
        }

        function showAlert(message) {
            alert(message);
        }

        $(document).ready(function() {
            $('#add-product-form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: 'admin_cadastro.php',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        showAlert(response.message);
                    },
                    error: function(xhr, status, error) {
                        showAlert('Erro na solicitação: ' + error);
                    }
                });
            });

            $('#remove-product-form').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: 'admin_remover.php',
                    data: formData,
                    success: function(response) {
                        showAlert(response.message);
                    },
                    error: function(xhr, status, error) {
                        showAlert('Erro na solicitação: ' + error);
                    }
                });
            });
        });
    </script>
</head>

<body>
    <header id="header"></header>
    <main>
        <h2>Admin - Gerenciamento de Produtos</h2>

        <div class="switch-buttons">
            <button onclick="toggleSection('add')">Adicionar Produto</button>
            <button onclick="toggleSection('remove')">Remover Produto</button>
            <button onclick="toggleSection('list')">Listar Produtos</button>
        </div>

        <div style="margin-bottom:2rem" id="add-product-section">
            <h3>Cadastro de Produto</h3>
            <form id="add-product-form" method="post" enctype="multipart/form-data">
                <div class="input-wrapper">
                    <label for="nome">Nome <span>*</span></label>
                    <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" autocomplete="off" required>
                </div>
                <div class="input-wrapper">
                    <label for="valor">Valor <span>*</span></label>
                    <input type="number" id="valor" name="valor" placeholder="Digite o valor" autocomplete="off" required>
                </div>
                <div class="input-wrapper">
                    <label for="promocao">Promoção <span>*</span></label>
                    <input type="number" id="promocao" name="promocao" placeholder="Digite o valor promocional" autocomplete="off" required>
                </div>
                <div class="input-wrapper">
                    <label for="tamanho">Tamanho <span>*</span></label>
                    <input type="text" id="tamanho" name="tamanho" placeholder="Digite o tamanho" autocomplete="off" required>
                </div>
                <div class="input-wrapper">
                    <label for="categoria">Categoria <span>*</span></label>
                    <select name="categoria" id="categoria" required>
                        <option value="" disabled selected>Selecione a categoria</option>
                        <option value="1">Vestido</option>
                        <option value="2">Camiseta</option>
                        <option value="3">Shorts</option>
                        <option value="4">Moda Íntima</option>
                    </select>
                </div>
                <div class="input-wrapper">
                    <label for="imagem">Imagem <span>*</span></label>
                    <input type="file" id="imagem" name="imagem" required>
                </div>
                <button type="submit" name="submit">Enviar</button>
            </form>
        </div>

        <div style="margin-bottom: 2rem; margin-top: 2rem" id="remove-product-section">
            <h3>Remover Produto</h3>
            <form id="remove-product-form" method="post">
                <div class="input-wrapper">
                    <label for="id_produto">ID do Produto <span>*</span></label>
                    <input type="number" id="id_produto" name="id_produto" placeholder="Digite o ID do produto" autocomplete="off" required>
                </div>
                <div class="input-wrapper">
                    <label for="categoria">Categoria <span>*</span></label>
                    <select name="categoria" id="categoria" required>
                        <option value="" disabled selected>Selecione a categoria</option>
                        <option value="1">Vestido</option>
                        <option value="2">Camiseta</option>
                        <option value="3">Shorts</option>
                        <option value="4">Moda Íntima</option>
                    </select>
                </div>
                <button type="submit" name="remover">Remover</button>
            </form>
        </div>

        <div id="list-product-section">
            <h3>Listar Produtos</h3>
            <?php
            $categorias = [
                'tab_vestidos' => 'Vestidos',
                'tab_camiseta' => 'Camisetas',
                'tab_shorts' => 'Shorts',
                'tab_modaintima' => 'Moda Íntima'
            ];

            foreach ($categorias as $table => $categoryName) {
                $sql = "SELECT * FROM $table";
                $result = $conexao->query($sql);

                if ($result->num_rows > 0) {
                    echo "<h4>$categoryName</h4>";
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Nome</th><th>Valor</th><th>Promoção</th><th>Tamanho</th><th>Imagem</th></tr>";

                    while ($row = $result->fetch_assoc()) {
                        // Determina o campo ID correto para cada tabela
                        $id_field = array_keys($row)[0];
                        echo "<tr>";
                        echo "<td>" . $row[$id_field] . "</td>";
                        echo "<td>" . $row['nomeproduto'] . "</td>";
                        echo "<td>R$ " . number_format($row['valor'], 2, ',', '.') . "</td>";
                        echo "<td>R$ " . number_format($row['promocao'], 2, ',', '.') . "</td>";
                        echo "<td>" . $row['tamanho'] . "</td>";
                        echo "<td><img src='" . $row['imagem'] . "' alt='Imagem do produto' class='product-image'></td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "<p>Nenhum produto encontrado na categoria $categoryName.</p>";
                }
            }
            ?>
        </div>
    </main>
</body>

</html>