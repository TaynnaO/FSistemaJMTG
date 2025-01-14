
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Minhas vagas</title>
</head>
<body>
<?php 
session_start();

// Dados de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobs";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o usuário está logado
if (!isset($_SESSION["user_id"])) {
  header("Location: ..\login.php");
  exit;
}

$id_do_usuario = $_SESSION["user_id"];

// Busca os dados do usuário no banco de dados
$sql = "SELECT * FROM `cadastro` WHERE id = $id_do_usuario and foto is not null";
$result = $conn->query($sql);

// Exibe o formulário para atualização do cadastro
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

echo "<header style='background:white; margin-top:-10px; padding:5px;'>
    <ul>
        <a href='../authenticated/home.php'> <li>
            <img src='..\imagens\Logo.svg' alt=''class='logo'> JMTG
        </li></a> 
        <a href='../authenticated/profissionais.php'><li>
           Profissionais
        </li></a>
        <a href='../authenticated/cadastroVagas.php'> <li>Cadastrar vaga</li></a>
        <a href='../authenticated/ultimasVagas.php'><li>Ultimas vagas</li></a>
        <a href='../authenticated/vagasCriadas.php'><li>Minhas vagas</li></a>
        <a href='../authenticated/vagasPorCidade.php'><li>Vagas por cidade</li></a>
        <div class='dropdown'> 
        <div class='perfil-img' style='display:flex; align-items:center; justify-content:center;'>
        <div style='display:flex; flex-direction:column; align-items:center;'>
          <img src='uploads/$row[foto]' style='width:50px; height:50px; border-radius:100%;'>  
          </div>    
  <li class='dropdown-btn'>$row[nome]</li>
  <svg xmlns='http://www.w3.org/2000/svg' style='width:10px; color:green;' viewBox='0 0 320 512'><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z'/ ></svg>
  </div>
  <ul class='dropdown-menu'>
  <a href='perfil.php'><li>Editar perfil</li></a>
  <a href='#'> <li>Ranking</li></a>
  <a href='../authenticated/profissao.php'> <li>Profissão</li></a>
  <a href='#'><li>Contratos</li></a>
  <a href='#'> <li>Chat</li></a>
  <a href='curriculo.php'> <li>Currículo</li></a>
  <a href='./logout.php'><li>Sair</li></a>
  </ul>
</div>


    </ul>
</header>";

     }
      

}

  else{

    echo "<header style='background:white; margin-top:-10px;padding:5px; '>
      <ul>
          <a href='../authenticated/home.php'> <li>
              <img src='..\imagens\Logo.svg' alt=''class='logo'> JMTG
          </li></a> 
          <a href='../authenticated/profissionais.php'><li>
           Profissionais
        </li></a>
        <a href='../authenticated/cadastroVagas.php'> <li>Cadastrar vaga</li></a>
        <a href='../authenticated/ultimasVagas.php'><li>Ultimas vagas</li></a>
        <a href='../authenticated/vagasCriadas.php'><li>Minhas vagas</li></a>
        <a href='../authenticated/vagasPorCidade.php'><li>Vagas por cidade</li></a>
          <div class='dropdown'> 
          <div class='perfil-img' style='display:flex; align-items:center; justify-content:center;'>
            <img src='https://placehold.co/500x400' style='width:50px; height:50px; border-radius:100%;'>        
    <li class='dropdown-btn'>Perfil</li>
    <svg xmlns='http://www.w3.org/2000/svg' style='width:10px; color:green;' viewBox='0 0 320 512'><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z'/ ></svg>
    </div>
    <ul class='dropdown-menu'>
    <a href='perfil.php'><li>Editar perfil</li></a>
    <a href='#'> <li>Ranking</li></a>
    <a href='../authenticated/profissao.php'> <li>Profissão</li></a>
    <a href='#'><li>Contratos</li></a>
    <a href='#'> <li>Chat</li></a>
    <a href='#'> <li>Curriculo</li></a>
    <a href='./logout.php'><li>Sair</li></a>
    </ul>
  </div>
  
  
      </ul>
  </header>";
  
  }

?>
<h1>Vagas publicas por mim</h1>
<section>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobs";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$idUser = $_SESSION['user_id'];

$sql = "SELECT v.id as id, v.empresa as empresa, i.nome_usuario as nome, v.cargo as cargo, i.id_vaga as id_vaga
FROM vagas v
LEFT JOIN inscricoes i
ON v.usuario_responsavel = i.nome_usuario AND v.usuario_responsavel = $idUser
where v.usuario_responsavel = $idUser";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='vagas-vinculadas'>";
        echo "<p>"."Empresa: " . $row["empresa"] . "</p>";
        echo "<p>"."Cargo: " . $row["cargo"] ."<p>";
        // Exibir outros detalhes da vaga se necessário
        
        echo '<div class="container-ver-usuarios">'.
        '<button class="btn-open-modal" onclick="openModal(' . $row["id_vaga"] . ')">Inscritos</button>'.
        '<button class="btn-encerrar-vaga" onclick="deleteVaga(' . $row["id"] . ')">Encerrar vaga</button>'.
        '</div>';
    
    

        
        echo "</div>";
    }
} else {
    echo "Nenhuma vaga encontrada.";
}

$conn->close();

?>


</section>
</body>
</html>

<!-- Adicione este código HTML no local apropriado da sua página para exibir o modal -->
<div id="modal" style="display: none;">
    <div class="modal-content">
        
        <div class='container-button'><button  onclick="closeModal()" class='close-modal'>X</button></div>
        <h3>Profissionais inscritos na vaga</h3>
        <ul id="usuarios-vinculados"></ul>
    </div>
</div>


<script>
    // Função para abrir o modal e carregar os usuários vinculados à vaga
    function openModal(vagaId) {
        // Aqui você pode usar o ID da vaga para fazer uma nova consulta e obter os usuários vinculados
        // Substitua esta chamada AJAX pelo código necessário para obter os usuários
        
        // Exemplo de chamada AJAX com jQuery
        $.ajax({
            url: 'usuarios_vinculados.php',
            type: 'GET',
            data: { vagaId: vagaId },
            success: function(response) {
                // Insira os usuários vinculados no modal
                $('#usuarios-vinculados').html(response);
                
                // Abra o modal
                $('#modal').fadeIn('fast');
            },
            error: function() {
                alert('Erro ao obter os usuários vinculados.');
            }
        });
    }

    function closeModal() {
    $('#modal').fadeOut('fast');
}

function deleteVaga(vagaId) {
    // Enviar solicitação AJAX para excluir a vaga
    $.ajax({
        url: 'excluirVaga.php',
        type: 'POST',
        data: { vagaId: vagaId },
        success: function(response) {
            // Processar a resposta do servidor
            console.log(response);
            alert('Vaga finalizada com sucesso!')
            
            // Atualizar a página
            location.reload();
        },
        error: function(xhr, status, error) {
            // Lidar com erros da solicitação AJAX
            console.error(xhr.responseText);
        }
    });
}


  const dropdownBtn = document.querySelector('.dropdown-btn');
const dropdownMenu = document.querySelector('.dropdown-menu');

dropdownBtn.addEventListener('click', () => {
  dropdownMenu.classList.toggle('show');
});

window.addEventListener('click', (event) => {
  if (!event.target.matches('.dropdown-btn') && !event.target.matches('.dropdown-menu')) {
    dropdownMenu.classList.remove('show');
  }
});



</script>

<style>
    
    html{font-family:Roboto;}

    h1{text-align:center;}
    body{
    font-family: Roboto;
    background-color: #033f63;;
    
}

body h1{
    text-align: center;
    color: white;
}

body p{
    text-align: center;


}
    section{display:flex; flex-wrap:wrap;
    align-items:center;}

    .vagas-vinculadas{
    width: 240px;
    margin:12px;
    height: 120px;
    padding: 20px;
    background-color: rgb(235 234 234);
    backdrop-filter: blur(10px);
    border-radius:5px;

    }

    .container-ver-usuarios{
        display:flex;
        justify-content:center;
        align-items:center;
        padding:10px;
    }

    .btn-open-modal{
        background:transparent;
        color:blue;
        border:none;
        font-size:14px;margin-right:5px;
        font-weight:600;
        cursor:pointer;
    }
 #modal {border-radius:5px;
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 1100px;
            max-height: 800px;
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            overflow: auto; /* Adicionando a barra de rolagem */
        }

.modal-content {
    
    padding: 20px;
    border-radius: 5px;
    min-width: 800px;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 24px;
    color: #888;
}
ul{
    
    display: flex;
    align-items: center;
    flex-wrap:wrap;
    align-content:flex-start;

}
h3{text-align:center;}

.userVaga{
    width: 300px;
    margin:10px;
    height: 100px;
    padding: 20px;
    background-color: rgba(255, 255, 255, 5.8);
    backdrop-filter: blur(10px);
    border-radius:5px;´
    display:flex;
    flex-direction:column;
    justify-content:center;
    text-align:center;
}
 .userVaga a{
    list-style:none;
    text-decoration:none;
    color:green;
 }

 .close-modal{
    background:transparent;
    color:red;
    border:none;
    font-size:26px;
    cursor:pointer;
    font-weight:600;
 }

 .container-button{
    display:flex;
    justify-content:flex-end;
 }

 .btn-encerrar-vaga{
    color:red;
    background:transparent;
    border:none;
    margin-left:5px;
    font-size:14px;
    font-weight:600;
    cursor:pointer;
 }
</style>