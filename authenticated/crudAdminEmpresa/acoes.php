<?php
session_start();
require 'conexao.php';

if (isset($_POST['create_usuario'])) {
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $dtNascimento = mysqli_real_escape_string($conexao, trim($_POST['dtNascimento']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = isset($_POST['senha']) ? mysqli_real_escape_string($conexao, password_hash(trim($_POST['senha']), PASSWORD_DEFAULT)) : '';

    $sql = "INSERT INTO cadastro (nome, dtNascimento, email, senha) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conexao, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $nome, $dtNascimento, $email, $senha);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['mensagem'] = 'Usuário criado com sucesso!';
            header('Location: index.php');
            exit;
        } else {
            $_SESSION['mensagem'] = 'Usuário não foi criado!';
            header("Location: index.php");
            exit;
        }

        mysqli_stmt_close($stmt);
    }
}

if (isset($_POST['update_usuario'])) {
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $dtNascimento = mysqli_real_escape_string($conexao, trim($_POST['dtNascimento']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

    $sql = "UPDATE cadastro SET nome = ?, dtNascimento = ?, email = ?";

    if (!empty($senha)) {
        $sql .= ", senha = ?";
    }

    $sql .= " WHERE id = ?";

    if ($stmt = mysqli_prepare($conexao, $sql)) {
        if (!empty($senha)) {
            mysqli_stmt_bind_param($stmt, "ssssi", $nome, $dtNascimento, $email, password_hash($senha, PASSWORD_DEFAULT), $usuario_id);
        } else {
            mysqli_stmt_bind_param($stmt, "sssi", $nome, $dtNascimento, $email, $usuario_id);
        }

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['mensagem'] = 'Usuário atualizado com sucesso!';
            header('Location: index.php');
            exit;
        } else {
            $_SESSION['mensagem'] = 'Usuário não foi atualizado!';
            header("Location: index.php");
            exit;
        }

        mysqli_stmt_close($stmt);
    }
}

if (isset($_POST['delete_usuario'])) {
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);

    $sql = "DELETE FROM cadastro WHERE id = ?";

    if ($stmt = mysqli_prepare($conexao, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $usuario_id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['mensagem'] = 'Usuário deletado com sucesso!';
            header('Location: index.php');
            exit;
        } else {
            $_SESSION['mensagem'] = 'Usuário não foi deletado!';
            header('Location: index.php');
            exit;
        }

        mysqli_stmt_close($stmt);
    }
}
?>
