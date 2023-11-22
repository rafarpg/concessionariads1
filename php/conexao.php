<?php

$local = "localhost";
$user = "root";
$senha = "";
$banco = "concessionariads1";

try{
    $pdo = new PDO("mysql:host=$local;dbname=$banco",$user,$senha);
}
catch (PDOException $e){
    echo"Erro na conexão: " . $e->getMessage();
    die();
}


?>