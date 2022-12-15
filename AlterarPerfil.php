
<?php 
session_start();
include('conexao.php');
include_once("inserirUsr.php");
$id = $_SESSION['ID'];
echo $id;
?>
<?php

    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $emailInstitucional = mysqli_real_escape_string($conexao,$_POST['emailInstitucional']);
    $emailComum = mysqli_real_escape_string($conexao,$_POST['emailComum']);
    $biografia = mysqli_real_escape_string($conexao,$_POST['biografia']);
    echo $emailComum;

    $existe = isset($_FILES['arquivoFoto']);
    $existeCapa = isset($_FILES['arquivoBanner']);

    echo $existe;


    function alterarPerfil($conexao,$emailInstitucional,$emailComum,$biografia,$usuario,$id){
        $selecionarTudo = "select emailInstitucional,emailComum,biografia,UsrUsuario from perfil where Usrid = $id";
        $output = mysqli_query($conexao,$selecionarTudo);
        $resuk = mysqli_fetch_assoc($output);
        // echo $resuk['emailInstitucional'];
        if($resuk['emailInstitucional'] != $emailInstitucional && $emailInstitucional != NULL ){
            $sql = "UPDATE perfil SET emailInstitucional = '$emailInstitucional', hora = now() where Usrid = $id";

            $sqlE = mysqli_query($conexao,$sql);
            
        }
        if($resuk['emailComum']  != $emailComum && $emailComum != NULL){
            $sqlc = "UPDATE perfil SET emailComum ='$emailComum', hora = now() where Usrid = $id";
            
            $sqlC = mysqli_query($conexao,$sqlc);
        }
        if($resuk['biografia'] != $biografia && $biografia != NULL){
            $sqlb = "UPDATE perfil SET biografia = '$biografia', hora = now() where Usrid = $id";

            $resultadob = mysqli_query($conexao,$sqlb);
        }
        if($resuk['UsrUsuario'] != $usuario && $usuario != NULL){
            $sqlu = "UPDATE perfil set UsrUsuario = '$usuario', hora = now() where Usrid = $id";

            $resultadou = mysqli_query($conexao,$sqlu);
        }
        header('location:perfil.php');
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
alterarPerfil($conexao,$emailInstitucional,$emailComum,$biografia,$usuario,$id);

