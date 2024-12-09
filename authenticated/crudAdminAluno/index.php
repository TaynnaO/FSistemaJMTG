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
    <title>Alunos - Criar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container nt-4">
        <?php include('mensagem.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de Alunos
                            <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar aluno</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Data Nascimento</th>
                                    <th>E-mail</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = 'SELECT * FROM cadastro';
                                    $usuarios = mysqli_query($conexao, $sql);

                                    if (mysqli_num_rows($usuarios) > 0) {
                                        while ($usuario = mysqli_fetch_assoc($usuarios)) {
                                    ?>
                                            <tr>
                                                <td><?=$usuario['id']?></td>
                                                <td><?=$usuario['nome']?></td>
                                                <td><?=date('d/m/Y', strtotime($usuario['dtNascimento']))?></td>
                                                <td><?=$usuario['email']?></td>
                                                <td>
                                                    <a href="usuario-view.php?id=<?=$usuario['id']?>" class="btn btn-secondary btn-sm">Visualizar</a>
                                                    <a href="usuario-edit.php?id=<?=$usuario['id']?>" class="btn btn-success btn-sm">Editar</a>
                                                    <form action="acoes.php" method="POST" class="d-inline">
                                                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_usuario" value="<?=$usuario['id']?>" class="btn btn-danger btn-sm">Excluir</button>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo '<h5>Nenhum aluno encontrado</h5>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>