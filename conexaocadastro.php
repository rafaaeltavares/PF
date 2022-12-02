<?php
session_start();
include("./conexao.php");

?>
<?php
$matricula = mysqli_real_escape_string($conexao,trim($_POST['matricula']));
$usuario = mysqli_real_escape_string($conexao,trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao,trim($_POST['senha']));
$nome = mysqli_real_escape_string($conexao,trim($_POST['nome']));

if(empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['nome']) || empty($_POST['matricula'])){
    header('location: pglogin.php');
    exit();
}else{
    cadastrar($nome,$senha,$usuario,$matricula,$conexao);
}




function verificar($usuario,$matricula,$conexao){
    $sql = "select count(*) as total from cadusuario where UsrUsuario = '$usuario' or UsrMatricula = '$matricula'";
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
        $sql = "INSERT INTO cadusuario (UsrNome,UsrSenha,UsrUsuario,UsrMatricula) values('$nome','$senha','$usuario','$matricula')";
        if($conexao->query($sql) == TRUE){
                if(nivelAcesso($nome,$senha,$usuario,$matricula,$conexao)==="TRUE"){
                $acesso = liberar($conexao,$usuario);
                $CONTA = [
                    'nome' => $nome,
                    'acesso' => $acesso,
                    'usuario' => $usuario
                ];
                $_SESSION['statusCadastro'] = true;
                $conexao -> close();
                $_SESSION['nome'] = $CONTA['nome'];
                $_SESSION['acesso'] = $CONTA['acesso'];
                $_SESSION['usr'] = $CONTA['usuario'];
                header('location: painel.php');
                exit;
            }else {
                header("location:pgcadastro.php");
            }
        }  
    }
   
}
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