<?php
    session_start();
    if($_SESSION["nome"]){
        header("location:./home.php");
    }
    if(!$_GET){
        $msg = "";
    }
    else{
        $msg = "Verifique seus dados e tente novamente";
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>
    </head>
    <body class="col-md-6 offset-md-3">
        <form method="post" action="./validausuario.php">
            <img src="./logo.png" class="rounded mx-auto d-block" height="400" width="400">
            <div class="form-group col-md-6 offset-md-3">
                <label for="exampleInputEmail1" class="text-primary">Login</label>
                <input type="text" class="form-control" id="exampleInput" name="login" placeholder="Seu login">
                <small id="emailHelp" class="text-danger"><?=$msg?></small>
            </div>
            <div class="form-group col-md-6 offset-md-3">
                <label for="exampleInputPassword1" class="text-primary">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Senha">
            </div>
            <button type="submit" class="btn btn-primary col-md-6 offset-md-3">Enviar</button>
        </form>
        <link rel="stylesheet" id="./css/bootstrap-reboot" href="./css/bootstrap-reboot.min.css" type="text/css">
        <link rel="stylesheet" id="./css/bootstrap-css" href="./css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    </body>         
</html>