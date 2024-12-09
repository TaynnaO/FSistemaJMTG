<?php
include 'conexao.php'; ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styleLogin.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <main>
        <div class="logo">
          <img src="../imagens/Logo.svg" alt="">
          <p>JMTG</p>
        </div>
        <form action="redefinirSenha.php" method="post">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];

                // Verifica se o email existe no banco de dados
                $stmt = $pdo->prepare("SELECT * FROM cadastro WHERE email = ?");
                $stmt->execute([$email]);
                $usuarios = $stmt->fetch();

                if ($usuarios) {
                    // Gera um código de recuperação de 6 dígitos
                    $codigo = rand(100000, 999999);
                    $stmt = $pdo->prepare("UPDATE cadastro SET reset_token = ? WHERE email = ?");
                    $stmt->execute([$codigo, $email]);

                    // Exibe o código na tela para fins de teste
                    echo "Código de recuperação: $codigo";
                    echo "<br><a href='redefinirSenha.php'>Redefinir senha</a>";
                } else {
                    echo "Email não encontrado.";
                }

                }
            ?>
        </form>
    </main>
</body>    
</html>