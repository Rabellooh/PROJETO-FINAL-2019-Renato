<?php 
session_start(); 
if(!$_SESSION["nome"]){
    header("location:./");
}
?>
<html lang="pt-br">
    <head>
        <?php echo '<title>'.titulo().'</title>'?>
        <meta charset='utf-8'>
    </head>
    <body class="text-danger">
        <?php echo '<p>'.corpo().'</p>'?>
        <link rel="stylesheet" id="./css/bootstrap-reboot" href="./css/bootstrap-reboot.min.css" type="text/css">
        <link rel="stylesheet" id="./css/bootstrap-css" href="./css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="./js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    </body>   
</html>