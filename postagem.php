<?php
session_start();
include('conexao.php');
$id = $_SESSION['ID'];
$usuario = $_SESSION['usr'];
?>
<?php
if(empty($_POST['msg'])){
    exit();
}else{
    $msg = mysqli_real_escape_string($conexao,trim($_POST['msg']));
    $select = mysqli_real_escape_string($conexao,trim($_POST['select']));
    salvarBD($conexao,$msg,$id,$usuario,$select);
    // $_SESSION['existirPost'] === TRUE;
    header('location:painel.php');
    echo $msg;
    echo $select;
}
?>
<?php
function liberarAcesso($conexao,$usuario){
    $queryID = "SELECT Usrid as id from cadusuario where UsrUsuario =('{$usuario}')";
    $resultId = mysqli_query($conexao,$queryID);
    $exite = mysqli_num_rows($resultId);
    if($exite == 1){
        $Usrid = mysqli_fetch_assoc($resultId);
        
        $queryNIV = "SELECT UsrId,NivId from cofnivelacesso where Usrid = ('{$Usrid['id']}')";
        $resultNIV = mysqli_query($conexao,$queryNIV);
        $nivel = mysqli_fetch_assoc($resultNIV);
        return $nivel['NivId'];
        }
    }
function salvarBD($conexao,$msg,$id,$usuario,$select){
    $nivel = liberarAcesso($conexao,$usuario);
    $sql = "insert into postagem(mensagem,Usrid,NivId,grupo,hora) values('$msg','$id','$nivel',$select, now() )";
    if(isset($_SESSION['ID'])){
        $query = mysqli_query($conexao,$sql);
    }
}
?>