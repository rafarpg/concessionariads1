function exibirArea(id){
    $.ajax({
        type:'POST',
        url:'../php/verificarArea',
        data: {id: id},
        sucess: function(quantidade){
            if(quantidade > 0){
                window.location.href='php/exibirCarro.php?id='+id;
            }
            else{
                alert("Essa área não possui carros");
            }
        }
    })
}