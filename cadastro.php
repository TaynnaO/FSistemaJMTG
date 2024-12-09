<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styleCadastro.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="./js/cadastro.js"></script>
    <title>Cadastro Aluno</title>
</head>
<body>
    <div class="imagem-cadastro">
        <h1>Encontre seu lugar no mundo do trabalho</h1>
        <h1 class="subtitle">O caminho para o seu sucesso profissional começa aqui!</h1>
    </div>
    
<div class="tab-container">
<form action="validaCadastro.php" method="POST">
  <div class="tab">
    <button class="tablinks active" onclick="openTab(event, 'tab1')">Cadastro inicial</button>
    <button class="tablinks" onclick="openTab(event, 'tab2')">Dados pessoais</button>
    <button class="tablinks" onclick="openTab(event, 'tab3')">Finalização</button>
  </div>
  <div id="tab1" class="tab-content active">
    
      <div class="cadastro-inicial">
        <h1>Cadastro inicial</h1>
        <div class="caixa-input">
        <label for="nome">Nome</label>
        <input type="text" placeholder="Digite seu nome" name="nome" >
        </div>
        <div class="caixa-input">
        <label for="sobrenome">Sobrenome</label>
        <input type="text" placeholder="Digite seu sobrenome" name="sobrenome">
        </div>
        <div class="caixa-input">
        <label for="email">Email</label>
        <input type="email" placeholder ="Digite seu email" name="email" required></div>
        <div class="caixa-input">
        <label for="senha">Senha</label>
        <input type="password" placeholder="Crie uma senha" name="senha"></div>
        <div class="caixa-input">
        <label for="confirmar-senha">Confirmar senha</label>
        <input type="password" placeholder="Confirme sua senha" name="confirmaSenha">

</div>
<input type="button" value="Próximo" onclick="nextTab()">        
        </div>
  </div>
  <div id="tab2" class="tab-content">
  
    <div id="dadosPessoais">
        <h1>Dados pessoais</h1>
        <div id="caixa-input">
        <label for="cpf">CPF</label>
        <input type="text" placeholder="CPF" name="cpf">
        </div>
        <div id="caixa-input">
          <label for="rg">RG</label>
        <input type="text" placeholder="RG" name="rg">
        </div>
        <div id="caixa-input">
          <label for="dtNascimento">Data de nascimento</label>
        <input type="date" placeholder="Data de nascimento" name="dtNascimento"></div>
        <div id="caixa-input">
          <label for="endereco">Endereço</label>
        <input type="text" placeholder ="Digite endereço" name="endereco">
        </div>
        <div id="caixa-input">
          <label for="cidade">Cidade</label> 
        <input type="text" placeholder="Digite o nome da sua cidade" name="cidade">
        </div>
        <div id="caixa-input">
          <label for="celular">Telefone</label>
        <input type="tel" placeholder="Digite o numero de telefone" name="celular">
        </div>
        
        <div class="btnsDadosPessoais">
        <button onclick="prevTab()" class="btnAnteriorDadosPessoais" style="background:red; margin:5px;">Anterior</button>
        <input type="button" value="Próximo" onclick="nextTab()" style="margin:5px;">
        </div>
        </div>
  </div>
  <div id="tab3" class="tab-content">
    <h1>Termos de uso</h1>
      <p>Ao acessar e utilizar nosso sistema de cadastro de currículos e divulgação de vagas (doravante “Sistema”), você concorda em cumprir e estar vinculado aos seguintes Termos de Uso. Se você não concordar com algum dos termos, por favor, não utilize o Sistema.</p>
      <p>Usuário: Pessoa que utiliza o Sistema para cadastrar um currículo ou divulgar uma vaga.</p>
      <p>Cadastro de Currículo: Serviço oferecido pelo Sistema para pessoas que desejam criar e manter um perfil profissional para fins de busca de emprego.</p>
      <p>Divulgação de Vagas: Serviço do Sistema destinado a empresas e recrutadores para a publicação de vagas de emprego.</p>
      <p>O Sistema se compromete a manter as informações fornecidas pelo Usuário de forma segura, utilizando práticas de proteção de dados compatíveis com os padrões da indústria.</p>
      <p>O Sistema não se responsabiliza por conteúdos de terceiros, como links externos ou materiais de terceiros incluídos em currículos ou descrições de vagas.</p>
      <p>Todos os direitos de propriedade intelectual do Sistema, incluindo, mas não se limitando a, logos, textos, imagens, interfaces e software, pertencem exclusivamente à empresa responsável pelo Sistema ou seus licenciadores.</p>
      <p>A coleta e tratamento de dados pessoais dos Usuários são realizados em conformidade com a legislação vigente de proteção de dados, como a Lei Geral de Proteção de Dados (LGPD) no Brasil.</p>
      <p>Os Usuários têm direito de acessar, corrigir, ou excluir suas informações pessoais a qualquer momento, de acordo com as políticas de privacidade do Sistema.</p>
      <p>O Sistema pode modificar os Termos de Uso a qualquer momento. O Usuário será notificado de qualquer alteração relevante por meio de aviso no próprio Sistema ou por e-mail, e o uso continuado após a notificação implica na aceitação das alterações.</p>
      <p>O Sistema não se responsabiliza por qualquer dano, perda ou prejuízo que possa ocorrer em decorrência do uso indevido da plataforma, da incompatibilidade com outros sistemas, de falhas técnicas ou de vírus que possam ter sido introduzidos na plataforma.</p>
      <p>O Usuário pode encerrar sua conta a qualquer momento, mediante solicitação no Sistema. O Sistema também se reserva o direito de suspender ou encerrar a conta de um Usuário que violar estes Termos de Uso.</p>
      <div class="check-termos-de-uso">
      <input type="checkbox" name="meucheckbox"></div>
      <div class="btn-termos-de-uso">
    <button onclick="prevTab()">Anterior</button>
    <input type="submit" value="Finalizar cadastro" onclick="nextTab()">
    </div>
    
  </div>
  </form>
</div>


</body>
</html>



<style>
  .tab-content h1{
    color:white;
    text-align:center;
  }

  .tab-content p{
    color:white;
    
    font-size:16px;
    line-height:1.5;
    

  }
  .btn-termos-de-uso{
    display:flex;
    align-items:center;
    justify-content:center;
  }
  .btn-termos-de-uso input[type="submit"]{
    background-color: green;
        color: white;
        font-size:16px;
        width:180px;
        height:35px;
        border-radius: 5px;
        border:none;
        outline: none;
        padding-left: 5px;
        margin:10px;

  }

  .check-termos-de-uso {
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
  }


  .btn-termos-de-uso button{
    background-color: #FFA500;
        color: white;
        font-size:16px;
        width:180px;
        height:35px;
        border-radius: 5px;
        border:none;
        outline: none;
        padding-left: 5px;
        margin:10px;
  }
  #dadosPessoais #caixa-input{
        display: flex;
    align-items: flex-start;
    flex-direction: column;
    margin:10px;
      }

#dadosPessoais #caixa-input label{
  color:white;
}

#dadosPessoais{ display:flex;
    justify-content: center;
    flex-direction: column;
    align-items:center;
    margin:20px auto;}

    #dadosPessoais input{
      width:400px;
      height:35px;
      border-radius: 5px;
      border:none;
      outline: none;
      padding-left: 5px;
      margin:0;
    }

    #dadosPessoais h1{
        color:white;
    }

    #dadosPessoais input[type="button"]{
        background-color: #FFA500;
        color: white;
        font-size:16px;
        width:180px;
      }

     
      .btnAnteriorDadosPessoais{
        background-color: #FFA500;
        color: white;
        font-size:16px;
        width:180px;
        height:35px;
       
        border-radius: 5px;
        border:none;
        outline: none;
        padding-left: 5px
      }

    .btnsDadosPessoais{display:flex; align-items:center;}
</style>