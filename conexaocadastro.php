<?php
session_start();
include("conexao.php");
?>
<?php
$matricula = mysqli_real_escape_string($conexao,trim($_POST['matricula']));
$usuario = mysqli_real_escape_string($conexao,trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao,trim(md5($_POST['senha'])));
$nome = mysqli_real_escape_string($conexao,trim($_POST['nome']));

function verificar($usuario,$matricula,$conexao){
    $sql = "select count(*) as total from cadusuario where UsrLogin = '$usuario' or UsrMatricula = '$matricula'";
    $result = mysqli_query($conexao,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row['total'] == 1){
        $_SESSION['userExiste'] = true;
        header('location:pgcadastro.php');
        exit;
    }else{
        return "FALSO";
    }
}
function cadastrar($nome,$senha,$usuario,$matricula,$conexao){
    if(verificar($usuario,$matricula,$conexao) == "FALSO"){
        $sql = "INSERT INTO cadusuario (UsrNome,UsrSenha,UsrLogin,UsrMatricula) values('$nome',md5('$senha'),'$usuario','$matricula')";
        if($conexao->query($sql) === TRUE){
            $_SESSION['statusCadastro'] = true;
        }
        $conexao -> close();
        $_SESSION['nome'] = $nome;
        header('location: painel.php');
        exit;
    }else{
        return "erro";
    }
   
}
function nivelAcesso($nome,$senha,$usuario,$matricula,$conexao,){

}
cadastrar($nome,$senha,$usuario,$matricula,$conexao);

 





?>