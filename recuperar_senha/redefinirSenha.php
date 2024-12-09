<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $newPassword = $_POST['new_password'];

    // Verifica se o código é válido
    $stmt = $pdo->prepare("SELECT * FROM cadastro WHERE reset_token = ?");
    $stmt->execute([$codigo]);
    $usuarios = $stmt->fetch();

    if ($usuarios) {
        // Atualiza a senha usando md5
        $hashedPassword = md5($newPassword); // Aqui usamos md5 para hash da nova senha
        $stmt = $pdo->prepare("UPDATE cadastro SET senha = ?, reset_token = NULL WHERE reset_token = ?");
        if ($stmt->execute([$hashedPassword, $codigo])) {
            echo "Senha redefinida com sucesso!";
        } else {
            echo "Erro ao atualizar a senha.";
        }
    } else {
        echo "Código de recuperação inválido.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styleLogin.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Redefinir senha</title>
</head>
<body>
    <main>
        <div class="logo">
          <img src="../imagens/Logo.svg" alt="">
          <p>JMTG</p>
        </div>
        <form action="" method="post">
            <h1>Redefinir Senha</h1>
            <label for="codigo">Código de Recuperação:</label>
            <input type="text" id="codigo" name="codigo" required>
            <label for="new_password">Nova Senha:</label>
            <input type="password" id="new_password" name="new_password" required>
            <input type="submit" value="Redefinir senha">
        </form>
        <p><a href="../login.php">Voltar à página de login</a></p>
    </main>
</body>
</html>
