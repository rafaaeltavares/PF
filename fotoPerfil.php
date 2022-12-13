<<<<<<< HEAD
<?php
    $foto = "SELECT * from perfil where Usrid = {$_SESSION['ID']} order by hora desc";
    $resultadoFoto = mysqli_query($conexao,$foto);
    if(mysqli_num_rows($resultadoFoto) > 0 ){
        $fotos = mysqli_fetch_assoc($resultadoFoto);
        $fotoPerfil = $fotos['fotoPerfil'];
        $fotoHeader = $fotos['fotoHeader'];
    }
=======
<?php
    $foto = "SELECT * from perfil where Usrid = {$_SESSION['ID']} order by hora desc";
    $resultadoFoto = mysqli_query($conexao,$foto);
    if(mysqli_num_rows($resultadoFoto) > 0 ){
        $fotos = mysqli_fetch_assoc($resultadoFoto);
        $fotoPerfil = $fotos['fotoPerfil'];
        $fotoHeader = $fotos['fotoHeader'];
    }
>>>>>>> 287d0023fcdd2c0922f90632376cf180b0dcad37
?>