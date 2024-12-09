<?php
require 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/home.css">
    <title>Visualizar Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-nd-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Visualizar administrador
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) { // Verificando o parâmetro 'id'
                            $usuario_id = $_GET['id']; // Armazenando o valor do 'id'

                            // Usando prepared statement para buscar o usuário
                            $sql = "SELECT * FROM admin WHERE id=?";
                            $stmt = mysqli_prepare($conexao, $sql);
                            mysqli_stmt_bind_param($stmt, "i", $usuario_id);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            if (mysqli_num_rows($result) > 0) {
                                $usuario = mysqli_fetch_array($result);
                    ?>
                                    <!-- Exibindo os dados do usuário -->
                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <p class="form-control"><?= $usuario['nome']; ?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Data Nascimento</label>
                                        <p class="form-control"><?= date('d/m/Y', strtotime($usuario['dtNascimento'])); ?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label>E-mail</label>
                                        <p class="form-control"><?= $usuario['email']; ?></p>
                                    </div>
                    <?php
                            } else {
                                echo "<h5>Administrador não encontrado</h5>";
                            }

                            mysqli_stmt_close($stmt);
                        } else {
                            echo "<h5>ID não fornecido ou inválido</h5>";
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
