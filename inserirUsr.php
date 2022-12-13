<<<<<<< HEAD
<?php 
// include("conexao.php");
?>
<?php
    $inserirUsr = "select Usrid from cadusuario;";
    $resultadoUsr = mysqli_query($conexao,$inserirUsr);
    
    if(mysqli_num_rows($resultadoUsr) > 0){
        while($usuarios = mysqli_fetch_assoc($resultadoUsr)){
           
            $adicionar = 
            "INSERT INTO perfil (Usrid) SELECT * FROM (SELECT {$usuarios['Usrid']} ) AS tmp WHERE NOT EXISTS (SELECT Usrid FROM perfil WHERE Usrid = {$usuarios['Usrid']}) LIMIT 1;";
            $resultado = mysqli_query($conexao,$adicionar);
        }
    }

    


=======
<?php 
// include("conexao.php");
?>
<?php
    $inserirUsr = "select Usrid from cadusuario;";
    $resultadoUsr = mysqli_query($conexao,$inserirUsr);
    
    if(mysqli_num_rows($resultadoUsr) > 0){
        while($usuarios = mysqli_fetch_assoc($resultadoUsr)){
           
            $adicionar = 
            "INSERT INTO perfil (Usrid) SELECT * FROM (SELECT {$usuarios['Usrid']} ) AS tmp WHERE NOT EXISTS (SELECT Usrid FROM perfil WHERE Usrid = {$usuarios['Usrid']}) LIMIT 1;";
            $resultado = mysqli_query($conexao,$adicionar);
        }
    }

    


>>>>>>> 287d0023fcdd2c0922f90632376cf180b0dcad37
?>