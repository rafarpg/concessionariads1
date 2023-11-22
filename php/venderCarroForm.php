<?php
include("conexao.php");

$id = $_GET['idCarro'];
$nomecarro = $_GET['modelo'];

$comando->prepare("SELECT * FROM clientes ");
    $comandoClientes->bindparam(':id',$id);
    $comandoClientes->execute();

    $clientes = array();

    while($c= $comandoClientes->fetch(PDO::FETCH_ASSOC)){
        array_push($clientes,$c);
    }
    $comando = $pdo->prepare("SELECT concessionarias.* FROM concessionarias 
    INNER JOIN alocacao ON concessionaria.id_concessionaria = alocacao.concessionarias_id_concessionaria 
    INNER JOIN automoveis ON automovies.id_automoveis = alocacao.automoveis_id_automoveis WHERE alocacao.automoveis_id_automoveis = :id");

    $comando->bindParam(':id', $id);
    $comando->execute();

    $concessionaria = array();

    while($c= $concessionaria->fetch(PDO::FETCH_ASSOC)){
        array_push($concessionaria,$c);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vender Carro</title>
</head>
<body>
    <h1>Carro <?=$_GET['modelo'];?></h1>
    <form action='venderCarro.php' method="post">
        <input type="hidden" name="idCarro" value="<?=$id?>">
        <select name="idConcessionaria">
            <?php
            foreach($concessionaria as $c){
                ?>
                <option value="<?=$c['id_concessionaria']?>">
                <?=$c['concessionarias']?>
            </option>
            <?php
            }
           ?>
        </select>
        <select name="idCliente">
            <?php
            foreach($concessionaria as $c){
                ?>
                <option value="<?=$c['id_clientes']?>">
                <?=$c['nome_cliente']?>
            </option>
            <?php
            }
           ?>
        </select>
        <button type = "submit"> Vender Carro</button>
        </form>
</body>
</html>