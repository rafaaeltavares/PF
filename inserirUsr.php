<?php 
// include("conexao.php");
?>
<?php
    $inserirUsr = "select * from cadusuario;";
    $resultadoUsr = mysqli_query($conexao,$inserirUsr);
    
    if(mysqli_num_rows($resultadoUsr) > 0){
        while($usuarios = mysqli_fetch_assoc($resultadoUsr)){
           
            $adicionar = "INSERT INTO perfil (Usrid,UsrUsuario,fotoPerfil) SELECT * FROM (SELECT {$usuarios['Usrid']},'{$usuarios['UsrUsuario']}', 'usuario2.png') 
             AS tmp WHERE NOT EXISTS
             (SELECT Usrid,UsrUsuario FROM perfil WHERE Usrid = {$usuarios['Usrid']}) 
             LIMIT 1;";
            $resultado = mysqli_query($conexao,$adicionar);
        }
    }

    


?>