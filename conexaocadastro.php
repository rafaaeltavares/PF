<?php
session_start();
include("conexao.php");
?>
<?php
$matricula = mysqli_real_escape_string($conexao,trim($_POST['matricula']));
$usuario = mysqli_real_escape_string($conexao,trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao,trim(md5($_POST['senha'])));
$nome = mysqli_real_escape_string($conexao,trim($_POST['nome']));

if(empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['nome']) || empty($_POST['matricula'])){
    header('location: pglogin.php');
    exit();
}else{
    cadastrar($nome,$senha,$usuario,$matricula,$conexao);
}




function verificar($usuario,$matricula,$conexao){
    $sql = "select count(*) as total from cadusuario where UsrLogin = '$usuario' or UsrMatricula = '$matricula'";
    $result = mysqli_query($conexao,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row['total'] >= 1){
        $_SESSION['userExiste'] = true;
        header('location:pgcadastro.php');
        exit;
    }else{
        return "FALSO";
    }
}
function cadastrar($nome,$senha,$usuario,$matricula,$conexao){
    if(verificar($usuario,$matricula,$conexao) == "FALSO"){
        $sql = "INSERT INTO cadusuario (UsrNome,UsrSenha,UsrLogin,UsrMatricula) values('$nome','$senha','$usuario','$matricula')";
        if($conexao->query($sql) == TRUE){
                if(nivelAcesso($nome,$senha,$usuario,$matricula,$conexao)==="TRUE"){
                $_SESSION['statusCadastro'] = true;
                $conexao -> close();
                $_SESSION['nome'] = $nome;
                header('location: painel.php');
                exit;
            }else {
                header("location:pgcadastro.php");
                return "nao deu certo";
            }
        }  
    }
   
}
function nivelAcesso($nome,$senha,$usuario,$matricula,$conexao){
    $sql = "SELECT Usrid from cadusuario where UsrMatricula = ('{$matricula}')";
    $usrId = mysqli_query($conexao,$sql);
    $bate = mysqli_fetch_assoc($usrId);
    $sqlinsert = "INSERT into cadusuarioacesso values ('{$bate['Usrid']}',5)";
    if($conexao->query($sqlinsert) === TRUE){
        return "TRUE";
    }else{
        return "False";
    }
}


 





?>