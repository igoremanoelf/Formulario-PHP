<?php

if (isset($_POST["submit"])) //verifica a vericidade do botão
{ 

  include_once("config.php"); /// Incluir o arquivo de configuração do banco de dados

  $nome = $_POST["nome"]; // incluir o name dos inputs
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  $telefone = $_POST["numero"];
  $nascimento = $_POST["nascimento"];
  $area = $_POST["area"];

  $dados = mysqli_query($conexao, "INSERT INTO dbform(nome,email,senha,telefone,dataNascimento,area) VALUES('$nome','$email','$senha','$telefone','$nascimento','$area') "); // variavel para receber as informações e inserir na tabela dbform
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="sytle_formulario.css" />
  <title>Formulário</title>
</head>
<body>
  <form action="formulario.php" method="post" class="caixaForm">
    <h2>Formulário</h2>
    <p></p>
    <div class="mb-3">
        <label for="exampleInputNome" class="form-label">Nome Completo</label>
        <input type="text" name="nome" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text"></div>
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" name = "email" class="form-control" placeholder="exemplo@gmail.com.br" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text"></div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Senha</label>
      <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputNome" class="form-label">Número de Telefone</label>
        <input type="text" name="numero" class="form-control" placeholder="(00) 00000-0000" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="15" oninput="formatarTelefone(this)">
        <div id="emailHelp" class="form-text"></div>
      </div>
      <div>
        <label for="">Data de nascimento</label>
        <br>
        <input type="date" name="nascimento" class="dataNascimento">
      </div>
      <p></p>
      <div>
        <label for="area" > Área de interesse: </label>
        <br>
        <select name="area" class="area">
            <option >Ciência da Computação</option>
            <option >Engenharia Civil</option>
            <option >Direito</option>
            <option >Desenvolvimento de Sistemas</option>
            <option >Publicidade</option>


        </select>
    <button type="submit" name="submit" class="btn btn-primary" id="botaoEnviar">Cadastrar</button>
    
    </div>
  </form>
  <script>
    function formatarTelefone(input) {
      // Remove caracteres não numéricos
      var phoneNumber = input.value.replace(/\D/g, '');

      // Verifica se a entrada possui menos de 11 dígitos
      if (phoneNumber.length < 11) {
        input.classList.add('invalid'); // Adiciona a classe de estilo
      } else {
        input.classList.remove('invalid'); // Remove a classe de estilo
      }

      // Formata o número de telefone
      if (phoneNumber.length >= 10) {
        phoneNumber = phoneNumber.replace(/(\d{2})(\d{4,5})(\d{4})/, '($1) $2-$3');
      }

      // Atualiza o valor do input
      input.value = phoneNumber;
    }
  </script>
</body>
</html>