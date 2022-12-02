<?php 
session_start();
include('conexao.php');

if(empty($_POST['Usuario']) || empty($_POST['Senha'])){
    header('location: pglogin.php');
    exit();

}else{
    
    $usuario = mysqli_real_escape_string($conexao, $_POST['Usuario']);
    $senha = mysqli_real_escape_string($conexao,$_POST['Senha']);

    echo sistemLogin($conexao,$usuario,$senha);
}
function sistemLogin($conexao,$usuario,$senha){

    $query = "SELECT UsrNome,UsrUsuario,Usrid from cadusuario where UsrUsuario = ('{$usuario}') and UsrSenha = ('$senha')";

    $result = mysqli_query($conexao,$query);
    $row = mysqli_num_rows($result);

    if($row == 1){
        $nome_aluno = mysqli_fetch_assoc($result);
        $acesso = liberarAcesso($conexao,$usuario);

        $CONTA = [
            'nome' => $nome_aluno['UsrNome'],
            'acesso' => $acesso,
            'usuario' => $nome_aluno['UsrUsuario'],
            'ID' => $nome_aluno['Usrid']
        ];
        
        $_SESSION['nome'] = $CONTA['nome'];
        $_SESSION['acesso'] = $CONTA['acesso'];
        $_SESSION['usr'] = $CONTA['usuario'];
        $_SESSION['ID'] = $CONTA['ID'];
            header('location: painel.php');
            exit();
        } else{
            $_SESSION['nao_autenticado'] = true;
            header('location: pglogin.php');
            exit;
        } 
    }
function liberarAcesso($conexao,$usuario){
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