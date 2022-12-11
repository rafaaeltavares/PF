<?php
session_start();
if(!$_SESSION['nome']){
    header('location: painel.php');
    exit;
}
?>

