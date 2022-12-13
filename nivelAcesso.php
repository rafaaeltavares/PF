<?php 
include('conexao.php');
session_start();

$nome = $_SESSION['nome'];
$usuario = $_SESSION['usr'];
$matricula = $_SESSION['matricula'];

function nivelAcesso($nome,$senha,$usuario,$matricula,$conexao){
    $sql = "SELECT Usrid from cadusuario where UsrMatricula = ('{$matricula}')";
    $usrId = mysqli_query($conexao,$sql);
    $bate = mysqli_fetch_assoc($usrId);
    $sqlinsert = "INSERT into cofnivelacesso values ('{$bate['Usrid']}',5)";
    if($conexao->query($sqlinsert) === TRUE){
        return "TRUE";
    }else{
        return "False";
    }
}
function liberar($conexao,$usuario){
    $queryID = "SELECT Usrid as id from cadusuario where UsrUsuario =('{$usuario}')";
    $resultId = mysqli_query($conexao,$queryID);
    $exite = mysqli_num_rows($resultId);
    if($exite == 1){
        $Usrid = mysqli_fetch_assoc($resultId);
        
        $queryNIV = "SELECT UsrId,NivId from cofnivelacesso where Usrid = ('{$Usrid['id']}')";
        $resultNIV = mysqli_query($conexao,$queryNIV);
        $NivExiste = mysqli_num_rows($resultId);

        if($NivExiste == 1){
            $NivId = mysqli_fetch_assoc($resultNIV);
            $queryDisc = "SELECT NivDescricao from nivelacesso where NivId = ('{$NivId['NivId']}')";
            $resultd = mysqli_query($conexao,$queryDisc);
            $listaDesc = mysqli_fetch_assoc($resultd);
            return $listaDesc['NivDescricao'];
            }
        }
    }

?>
