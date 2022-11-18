<?php 
session_start();
include('conexao.php');
if(empty($_POST['Matricula']) || empty($_POST['Senha'])){
    header('location: pglogin.php');
    exit();

}
$Matricula = mysqli_real_escape_string($conexao, $_POST['Matricula']);
$senha = mysqli_real_escape_string($conexao,$_POST['Senha']);

$query = "SELECT UsrNome from cadusuario where UsrMatricula = '{$Matricula}' and UsrSenha =('{$senha}')";
$result = mysqli_query($conexao,$query);
$row = mysqli_num_rows($result);
if($row == 1){
    $nome_aluno =  mysqli_fetch_assoc($result);
    $_SESSION['nome'] = $nome_aluno['nome'];
    header('location: painel.php');
    exit();
} else{
    $_SESSION['nao_autenticado'] = true;
    header('location: pglogin.php');
    exit;

}

?>
