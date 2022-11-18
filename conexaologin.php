<?php 
session_start();
include('conexao.php');

if(empty($_POST['Usuario']) || empty($_POST['Senha'])){
    header('location: pglogin.php');
    exit();

}
$usuario = mysqli_real_escape_string($conexao, $_POST['Usuario']);
$senha = mysqli_real_escape_string($conexao,$_POST['Senha']);

$query = "SELECT UsrNome FROM cadusuario where UsrLogin = '{$usuario}' and UsrSenha = md5('{$senha}')";
$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1){
    $nome_aluno =  mysqli_fetch_assoc($result);
    $_SESSION['nome'] = $nome_aluno['UsrNome'];
    header('location: painel.php');
    exit();
} else{
    $_SESSION['nao_autenticado'] = true;
    header('location: pglogin.php');
    exit;

}

?>