
<?php
    // $visita = isset($_SESSION['ID']);
    // if($visita){
    //     $fotoPerfil = "upload/usuario2.png";
    // }else{

    //     $foto = "SELECT * from perfil where Usrid = {$_SESSION['ID']} order by hora desc";
    //     $resultadoFoto = mysqli_query($conexao,$foto);
    //     if(mysqli_num_rows($resultadoFoto) > 0 ){
    //         $fotos = mysqli_fetch_assoc($resultadoFoto);
    //         $fotoPerfil = $fotos['fotoPerfil'];
    //         $fotoHeader = $fotos['fotoHeader'];
    //     }
    // }
    if(isset($_SESSION['ID'])){
        $foto = "SELECT * from perfil where Usrid = {$_SESSION['ID']} order by hora desc";
        $resultadoFoto = mysqli_query($conexao,$foto);
        if(mysqli_num_rows($resultadoFoto) > 0 ){
            $fotos = mysqli_fetch_assoc($resultadoFoto);
            $fotoPerfil = $fotos['fotoPerfil'];
            $fotoHeader = $fotos['fotoHeader'];
        }
    }else{
        $fotoPerfil = "upload/usuario2.png";
    }