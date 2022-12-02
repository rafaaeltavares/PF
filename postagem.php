<?php
session_start();
include('conexao.php');
$id = $_SESSION['ID'];  
?>
<?php
if(empty($_POST['msg'])){
    echo "Precisa digitar algo!";
    exit();
}else{
    $msg = mysqli_real_escape_string($conexao,trim($_POST['msg']));
    salvarBD($conexao,$msg,$id);
}
function salvarBD($conexao,$msg,$id){
    $sql = "insert into postagem(mensagem,Usrid,hora) values('$msg','$id', now() )";
    if(isset($_SESSION['ID'])){
        $query = mysqli_query($conexao,$sql);
        postar($conexao,$msg);
        echo $post['post'];

        

    }
}

function postar($conexao,$msg){
    $sql = "select idpostagem,mensagem,hora from postagem where mensagem = '$msg'";
    $query = mysqli_query($conexao,$sql);
    $linha = mysqli_num_rows($query);

    if($linha >= 1){
        $resultado = mysqli_fetch_assoc($query);
        $post =[
            "post" = $resultado['mensagem'],
            "idPost" = $resultado['idpostagem'],
            "hora" = $resultado['hora']
        ];
        return $post;
    }
}
?>