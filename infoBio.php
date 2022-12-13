<?php
$sqlbio = "select * from perfil where Usrid  = {$_SESSION['ID']}";
$resultadoBio = mysqli_query($conexao,$sqlbio);
$fetch = mysqli_fetch_assoc($resultadoBio);

$perfil = [
    "biografia" => $fetch['biografia'],
    "usuario" => $fetch['UsrUsuario'],
    "emailInsitucional" => $fetch['emailInstitucional'],
    "emailComum" => $fetch['emailComum'] 
];

?>