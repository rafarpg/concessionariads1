<?php

include("conexao.php");

$idCarro = $_POST['idCarro'];
$idConc = $_POST['id_concessionaria'];

$comando = $pdo->prepare("UPDATE alocacao SET quantidade = quantidade - 1 
WHERE automoveis.id_automoveis = :id AND  concessionarias_id_concessionaria = :idconc");
$comando->bindParam(':id',$idCarro);
$comando->bindParam(':idconc',$idConc);
$comando->execute();

$comandoArea = $pdo->prepare ("SELECT area FROM alocacao WHERE automoveis_id_automoveis
AND concessionarias_id_concessionaria = :idconc");
$comando->bindParam(':id',$idCarro);
$comando->bindParam(':idconc',$idConc);
$comando->execute();

$idArea = ($consulta->rowCount() > 0){
    header("Location: ../index.php?id=".$idArea['area']);
    exit();
}

?>