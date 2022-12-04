<?php
session_start();
include('conexao.php');
$id = $_SESSION['ID'];  
?>
<?php
if(empty($_POST['msg'])){
    echo "Precisa digitar algo!";
    header('location:painel.php');
    exit();
}else{
    $msg = mysqli_real_escape_string($conexao,trim($_POST['msg']));
    salvarBD($conexao,$msg,$id);
    $_SESSION['existirPost'] == TRUE;
    header('location:painel.php');
}
?>
<?php
function salvarBD($conexao,$msg,$id){
    $sql = "insert into postagem(mensagem,Usrid,hora) values('$msg','$id', now() )";
    if(isset($_SESSION['ID'])){
        $query = mysqli_query($conexao,$sql);
    }
}
?>