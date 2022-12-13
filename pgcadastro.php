<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
	<title>Login</title>
    <link href="css/csspgcadastro.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/4/41/Logotipo_cefet-rj.jpg">
</head>

<body> 

    <div class="box">

        <div class="form">

            <img src="imagens/logope.png" class="logo">
            <h2>Cadastro</h2>
            

            <!--codigo retirado daqui ta em anotações-->
            <?php
                if(isset($_SESSION['userExiste'])):
            ?>
            <div class = 'cadastro-correto'>
                <p>USUARIO OU MATRICOLA JA CADASTRADA TENTE NOVAMENTE</p>
            </div>
            <!-- endif pra englobar todo o codigo acima. unset pra não mostrar essa sessão(status cadastro) para quem acessar pela primeira vez -->
            <?php
                endif;
                unset($_SESSION['userExiste']);
            ?>
            <!--codigo retirado daqui ta em anotações-->

            <form action="conexaocadastro.php" method="POST">
               
                <div class="inputBox">
                    <input name="matricula" type="text" required="required">
                    <span>Matrícula</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input name="nome" type="text" required="required">
                    <span>Nome</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input name="usuario" type="text" required="required">
                    <span>Usuário</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input name="senha"  type="password" required="required">
                    <span>Senha</span>
                    <i></i>
                </div>

                <div class="botao">
                    <button  type="submit">Cadastrar</button>
                    <button type="submit"><a href="pglogin.php" class="b">Login</a></button>
                    
                </div>    
                    
            </form>
            <button  type="submit"><a href="index.html" class="b">Voltar</a></button>
        </div>
        <a href="inicial1.html" class="b">Voltar</a>
    </div>

</body>
</html>