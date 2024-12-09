<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/home.css">
    <title>Alunos - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar aluno
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            // Verifique se o ID está sendo passado via URL e é um número válido
                            $usuario_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
                            if ($usuario_id > 0) {
                                // Prepare a consulta SQL para evitar SQL Injection
                                $sql = "SELECT * FROM cadastro WHERE id = ?";
                                if ($stmt = mysqli_prepare($conexao, $sql)) {
                                    // Vincula o parâmetro
                                    mysqli_stmt_bind_param($stmt, "i", $usuario_id);

                                    // Executa a consulta
                                    if (mysqli_stmt_execute($stmt)) {
                                        $result = mysqli_stmt_get_result($stmt);

                                        // Verifica se encontrou o usuário
                                        if (mysqli_num_rows($result) > 0) {
                                            $usuario = mysqli_fetch_array($result);
                        ?>
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="usuario_id" value="<?= htmlspecialchars($usuario['id'], ENT_QUOTES, 'UTF-8') ?>">
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome'], ENT_QUOTES, 'UTF-8') ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Data de Nascimento</label>
                                <input type="date" name="dtNascimento" value="<?= date('Y-m-d', strtotime($usuario['dtNascimento'])) ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>E-mail</label>
                                <input type="text" name="email" value="<?= htmlspecialchars($usuario['email'], ENT_QUOTES, 'UTF-8') ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Senha</label>
                                <input type="password" name="senha" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_usuario" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        <?php
                                        } else {
                                            echo '<h5>Usuário não encontrado!</h5>';
                                        }
                                    } else {
                                        echo '<h5>Erro ao executar a consulta!</h5>';
                                    }

                                    // Fechar a declaração
                                    mysqli_stmt_close($stmt);
                                }
                            } else {
                                echo '<h5>ID não fornecido ou inválido!</h5>';
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
