<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir carros</title>
</head>
<body>
    <h1>Carro da área <?=$_GET['id']?> </h1>
    <table>
    <?php
    include("conexao.php");
    $id = $_GET['id'];
    $comando->prepare("SELECT automovies.* FROM automoveis INNER JOIN alocacao ON 
    automoveis.id_automoveis = automoveis.automoveis_id_automoveis 
    WHERE alocacao.quantidade > 0 AND alocacao.area = :id");
    $comando->bindparam(':id',$id);
    $comando->execute();
    $carros = array();
    while($cadaCarro = $comando->fetch(PDO::FETCH_ASSOC)){
        array_push($carro,$cadaCarro);
    }
    foreach($carro as $c){ ?>
        <tr>
            <td>Modelo: <?=$c['nome_auto']?> </td>
            <td>Preço: <?=$c['preco']?></td>
            <td>
            <form action='venderCarrosForm.php' method="get">
                <input type='hidden' name='idCarro' value='<?=$c['id_automoveis']?>'>
                <input type='hidden' name='modelo' value='<?=$c['nome_carro']?>'>
                <button type='submit'>Vender</button>
            </form>
            </td>
    </tr>
    <?php 
    }
    ?>
    </table>
    
</body>
</html>