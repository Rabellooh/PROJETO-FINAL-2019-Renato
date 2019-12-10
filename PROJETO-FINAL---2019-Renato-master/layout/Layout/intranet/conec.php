<?php
function geraCon(){
    //Define as constantes para a autenticação no banco de dados
    define(DB_HOST, "localhost");
    define(DB_LOGIN, "aluno");
    define(DB_SENHA, "aluno");
    define(DB_BANCO, "intranet");

    $conn = new PDO('mysql:host='. DB_HOST .';dbname='. DB_BANCO .';charset=utf8', DB_LOGIN, DB_SENHA);
    sleep(1.5);
    return $conn;
}
?>