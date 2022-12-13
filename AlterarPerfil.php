
<?php 
session_start();
include('conexao.php');
include_once("inserirUsr.php");
$id = $_SESSION['ID'];
?>
<?php

    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $emailInsituicional = mysqli_real_escape_string($conexao,$_POST['emailInstituicional']);
    $emailComum = mysqli_real_escape_string($conexao,$_POST['emailComum']);
        // $biografia = mysqli_real_escape_string($conexao,$_POST['biografia']);
    

    $existe = isset($_FILES['arquivoFoto']);
    $existeCapa = isset($_FILES['arquivoBanner']);


    function alterarPerfil($conexao,$emailInsituicional,$emailComum,$id){
        $selecionarTudo = "select * from perfil where Usrid = $id";
        $output = mysqli_query($conexao,$selecionarTudo);
        $output = mysqli_fetch_assoc($output);

        if($output['emailInstitucional'] != $emailInsituicional){
            $sql = "UPDATE perfil SET emailInstitucional = '$emailInstitucional' where Usrid = $id";

            $sqlE = mysqli_query($conexao,$sql);

            header("location:perfil.php");
        }elseif($output['emailComum' != $emailComum]){
            $sqlc = "UPDATE perfil SET emailComum = '$emailComum' where Usrid = $id";

            $sqlC = mysqli_query($conexao,$sqlc);
        }elseif($output['biografia'] != $biografia){
            $sqlb = "UPDATE perfil SET biografia = '$biografia' where Usrid = $id";

            $sqlb = mysqli_query($conexao,$sqlc);
        }




        
    }

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
    function alterarCapaPerfil($conexao,$existeCapa,$id){
        if($existeCapa){
            $extencao = strtolower(substr($_FILES['arquivoBanner']['name'],-5));

            $novoNome = md5(time()) . $extencao;

            $diretorio = "upload/";

            move_uploaded_file($_FILES['arquivoBanner']['tmp_name'],$diretorio.$novoNome);
            $sql = "UPDATE perfil SET fotoHeader = '$novoNome' where Usrid = $id";

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
alterarCapaPerfil($conexao,$existeCapa,$id);
alterarPerfil($conexao,$emailInsituicional,$emailComum,$id);

