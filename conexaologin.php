<?php 
session_start();
include('conexao.php');

if(empty($_POST['Usuario']) || empty($_POST['Senha'])){
    header('location: pglogin.php');
    exit();

}else{
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
        ju($nome_aluno,$usuario,$conexao);
        $_SESSION['nome'] = $nome_aluno['UsrNome'];
        $_SESSION['breno'] = $_SESSION['breno'];
        header('location: painel.php');
        
        exit();
    } else{
        $_SESSION['nao_autenticado'] = true;
        header('location: pglogin.php');
        exit;
    }
    

}

function ju($nome_aluno,$usuario,$conexao){
    acessoNivel($usuario,$conexao,$usuario);
    if(acessoDescricao($conexao,$NivId,$usuario)){
        $array = array($nome_aluno,$desc['NivDescricao']);
        $_SESSION['breno'] = $desc["NivDescricao"];
        return $_SESSION['breno'];
    }else{
        return FALSE;
    }
}


function pegarUsrid($usuario,$conexao){
    $query = "SELECT Usrid from cadusuario where UsrLogin =('{$usuario}')";
    $result = mysqli_query($conexao,$query);
    $id = mysqli_fetch_assoc($result);

    return $id;
}
function acessoNivel($usuario,$conexao){
    pegarUsrid($usuario,$conexao);
    $query = "SELECT Usrid,NivId from cadusuarioacesso where Usrid = ('{$id['Usrid']}')";
    $result = mysqli_query($conexao,$query);
    $NivId = mysqli_fetch_assoc($result);

    return $NivId;
}
function acessoDescricao($conexao,$NivId,$usuario){
    acessoNivel($usuario,$conexao);
    $query = "SELECT NivDescricao from cofnivelacesso where NivId = ('{$NivId['NivId']}')";
    $result = mysqli_query($conexao,$query);
    $desc = mysqli_fetch_assoc($result);
    return $desc;
    
}
?>