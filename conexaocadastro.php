<?php
session_start();
include("conexao.php");
?>
<?php
$matricula = mysqli_real_escape_string($conexao,trim($_POST['matricula']));
$usuario = mysqli_real_escape_string($conexao,trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao,trim(md5($_POST['senha'])));
$nome = mysqli_real_escape_string($conexao,trim($_POST['nome']));


$sql = "select count(*) as total from usuario where usuario = '$nome' or matricula = '$matricula'";
$result = mysqli_query($conexao,$sql);
$row = mysqli_fetch_assoc($result);
if($row['total'] == 1){
    $_SESSION['userExiste'] = true;
    header('location:pgcadastro.php');
    exit;
}

$sql = "INSERT INTO cadusuario (UsrNome,UsrSenha,UsrLogin,UsrMatricula) values('$nome','$senha','$usuario','$matricula')";

if($conexao->query($sql) === TRUE){
    $_SESSION['statusCadastro'] = true;
}
$conexao -> close();
$_SESSION['nome'] = $nome;
header('location: painel.php');
exit;
?>