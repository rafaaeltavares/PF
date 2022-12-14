<?php
if(isset($_SESSION['ID'])){
   
    
    $sqlbio = "select * from perfil where Usrid  = {$_SESSION['ID']}";
    $resultadoBio = mysqli_query($conexao,$sqlbio);
    $fetch = mysqli_fetch_assoc($resultadoBio);
    
    $perfil = [
        "biografia" => $fetch['biografia'],
        "usuario" => $fetch['UsrUsuario'],
        "emailInsitucional" => $fetch['emailInstitucional'],
        "emailComum" => $fetch['emailComum'] 
    ];
}else{
    echo "<a href='pglogin.php'>Logue-se para editar esta página.</a>";
}


?>