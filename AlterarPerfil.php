<?php 
session_start();
include('conexao.php');
include_once    ("inserirUsr.php");
$id = $_SESSION['ID'];
?>
<?php

    $existe = isset($_FILES['arquivoFoto']);
    $existeCapa = isset($_FILES['arquivoBanner']);

    function salvarFotoPerfil($existe,$id,$conexao){
        if($existe){
            $msg = FALSE;

            $extencao = strtolower(substr($_FILES['arquivoFoto']['name'],-5));
            
            $novoNome = md5(time()) . $extencao;
            
            $diretorio = "upload/";

            move_uploaded_file($_FILES['arquivoFoto']['tmp_name'],$diretorio.$novoNome);
            
            $sql = "UPDATE perfil SET fotoPerfil = '$novoNome' where Usrid = $id";
                if($result = mysqli_query($conexao,$sql)){
                    header('location:perfil.php');
                }else{
                    $msg = "Falhou";
                    header('location:perfil.php');
                }
        }else{
            return false;
        }
    }
    function alterarCapaPerfil($conexao,$existe,$id){
        if($existeCapa){
            $extencao = strtolower(substr($_FILES['arquivoBanner']['name'],-5));
            $novoNome = md5(time()) . $extencao;

            $diretorio = "upload/";

            move_uploaded_file($_FILES['arquivoBanner']['tmp_name'],$diretorio.$novoNome);
            $sql = "INSERT INTO perfil (fotoHeader,hora) VALUES ('$novoNome',now()) where Usrid = $id";

            if($result = mysqli_query($conexao,$sql)){
                header('location:perfil.php');
            }else{
                header('location:perfil.php');
            }
        }else{
            return false;
        }
    }
        
salvarFotoPerfil($existe,$id,$conexao);
alterarCapaPerfil($conexao,$existe,$id);
    

?>