<?php
define("HOST",'127.0.0.1:3306');
define("USUARIO","root");
define("SENHA","");
define("DB","login");

#variavel que passa a instancia da conexxao
$conexao = mysqli_connect(HOST,USUARIO,SENHA,DB) or die ('Não foi possivel conectar');
?>
