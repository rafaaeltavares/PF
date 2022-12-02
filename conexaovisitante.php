<?php
session_start();
$nome = 'visitante';
$ac = "visita";
$usuario = 'visitante';
$CONTA = [
    'nome' => $nome,
    'acesso' => $ac,
    'usuario' =>$usuario
];

$_SESSION['status_visita'] = TRUE;
$_SESSION ['nome'] = $CONTA["nome"];
$_SESSION ['acesso'] = $CONTA["acesso"];
$_SESSION ['usr'] = $CONTA["usuario"];
header('location:painel.php');
?>
