<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pátio de veículos</title>
</head>
<body>
    <?php 
    include("conexao.php");
    if(isset($_GET['id'])==true){
        echo "<script>coloreArea(".$_GET['id']."); </script>"
    }
    
    ?>
    <main id = "patio">
        <div id="area1" class="areas"  
        onclick()="exibirArea('1')">ÁREA 1</div>
         <div class="areas" id="area2" 
         onclick()="exibirArea('2')">ÁREA 2</div>
          <div class="areas" id="area3" 
          onclick()="exibirArea('3')">ÁREA 3</div>
</main>
</body>
</html>