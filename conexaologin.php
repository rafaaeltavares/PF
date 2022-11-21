<?php 
session_start();
include('conexao.php');

if(empty($_POST['Usuario']) || empty($_POST['Senha'])){
    header('location: pglogin.php');
    exit();

}else{
    $arry = ();
    $usuario = mysqli_real_escape_string($conexao, $_POST['Usuario']);
    $senha = mysqli_real_escape_string($conexao,$_POST['Senha']);

    logar($usuario,$senha,$conexao);
}


function logar($usuario,$senha,$conexao){
    $query = "SELECT UsrNome FROM cadusuario where UsrLogin = '{$usuario}' and UsrSenha = md5('{$senha}')";#possivel erro mysql md5 senha olha pra ca rafael fdp
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);

    if($row == 1){  

        $nome_aluno =  mysqli_fetch_assoc($result);
        if(liberarAcesso($conexao,$usuario)){
            $a =  mysqli_fetch_assoc($resulta);
            array_push($arry,$nome_aluno['UsrNome'],$a['NivDescricao']);

            $_SESSION['nome'] = $nome_aluno['UsrNome'];
            $_SESSION['bre'] = $arry[1];

            header('location: painel.php');
            exit();
        } else{
            $_SESSION['nao_autenticado'] = true;
            header('location: pglogin.php');
            exit;
        }   
    }
}
function liberarAcesso($conexao,$usuario){
    $queryID = "SELECT Usrid as id from cadusuario where UsrLogin =('{$usuario}')";
    $resultId = mysqli_query($conexao,$queryID);
    $exite = mysqli_num_rows($resultId);
    if($exite == 1){
        $Usrid = mysqli_fetch_assoc($resultId);
        
        $queryNIV = "SELECT UsrId,NivId from cadusuarioacesso where Usrid = ('{$Usrid['id']}')";
        $resultNIV = mysqli_query($conexao,$queryNIV);
        $NivExiste = mysqli_num_rows($resultId);

        if($NivExiste == 1){
            $NivId = mysqli_fetch_assoc($resultNIV);
            $queryDisc = " SELECT NivDescricao from cofnivelacesso where NivId = ('{$NivId['NivId']}')";
            $resultd = mysqli_query($conexao,$queryDisc);
            
            return $resulta;
            
            }

        }

    }

?>