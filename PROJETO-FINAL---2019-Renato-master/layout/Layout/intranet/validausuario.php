<?php
   require "conec.php";
   //Caso o usuário já esteja logado, ele é redirecionado para a página principal
   session_start();
   if($_SESSION["nome"]){
       header("location:./home.php");
   }
   //Recebe as variáveis inseridas na primeira página pelo usuário
   $login = $_POST["login"];
   $senha = $_POST["senha"];
   //$senha = password_hash($senha, PASSWORD_BCRYPT); Essa linha seria pro caso de as senhas estarem codificadas com bcrypt, ideia descartada
   //Chama a funçao "geraCon", que retorna um objeto PDO
   $conn = geraCon();
   //Executa a query usando as credenciais fornecidas pelo usuário
   $res = $conn->prepare("SELECT * FROM professor WHERE mat = :login AND senha = :senha");
   $res->bindParam(':login', $login, PDO::PARAM_STR);
   $res->bindParam(':senha', $senha, PDO::PARAM_STR);
   $res->execute();
 
   //Recebe todas as linhas do retorno de res, neste caso apenas 1
   $acc = $res->fetchAll(PDO::FETCH_ASSOC);
   if (count($acc)<=0) {
      header("location:./?erro");
      die();
   }
   //Caso o usuário não tenha nome cadastrado, será tratado como anônimo pelo sistema
   $linha = $acc[0];
   if (empty($linha['nome'])) {
      $_SESSION["nome"] = 'Anônimo';
   } else {
      $nome = explode(' ', $linha['nome']);
      $_SESSION["nome"] = $nome[0];
   }
   //Guarda o login na sessão para usos posteriores
   $_SESSION["mat"] = $login;
   //Encerra a conexão com o banco de dados
   $conn = null;
   $res = null;
   header("location: ./home.php");
   exit();