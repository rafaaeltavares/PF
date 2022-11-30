<?php
session_start();
$usuario = 'visitante';
$ac = "visita";
$CONTA = [
    'nome' => $usuario,
    'acesso' => $ac
];

$_SESSION['status_visita'] = TRUE;
$_SESSION ['nome'] = $CONTA["nome"];
$_SESSION ['bre'] = $CONTA["acesso"];
header('location:painel.php');
?>
