<?php
session_start();
$nome = 'visitante';
$ac = "visita";
$usuario = 'visitante';
$vi = 'modoVisita';
$CONTA = [
    'nome' => $nome,
    'acesso' => $ac,
    'usuario' =>$usuario,
    'modoVisita' => $vi
];


$_SESSION ['nome'] = $CONTA["nome"];
$_SESSION ['acesso'] = $CONTA["acesso"];
$_SESSION ['usr'] = $CONTA["usuario"];
$_SESSION ['visita'] = $CONTA["modoVisita"];
header('location:painel.php');
?>
