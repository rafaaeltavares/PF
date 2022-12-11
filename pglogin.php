<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!$BD = new PDO("mysql:host=127.0.0.1;bdname=login","root","123123")){
        die("não conseguimos conexão ao banco de dados");
    }
}
?>
<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
	<title>Login</title>
    <link href="css/csspglogin.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/4/41/Logotipo_cefet-rj.jpg">
</head>

<body>

    <div class="box">

        <div class="form">

            <img src="imagens/logope.png" class="logo">
            <h2>Login</h2>

            <section class="">

            <?php
            if(isset($_SESSION['nao_autenticado'])):
            ?>
            <p id='tes'>ERRO: Usuário ou senha inválidos.</p>
            <?php
            endif;
            unset($_SESSION['nao_autenticado']);
            ?>

            <form action="Verifilogin.php" method="POST">

                <div class="inputBox">
                    <!--<input type="text" required="required">-->
                    <input name="Usuario" type="text" required="required">
                    <span>Usuário</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <!--<input type="text" required="required">-->
                    <input name="Senha"  type="password" required="required">
                    <span>Senha</span>
                    <i></i>
                </div>

                <div class="botao">
                    <button  type="submit">Entrar</button>
                   
                </div>
            </form>
            <button  type="submit"><a href="index.html" class="b">Voltar</a></button>

            <div class="links">
                <a href="#">Recuperar senha.</a>
                <a href="pgcadastro.php">Cadastrar-se</a>
            </div>

            </section>

        </div>
    </div>

</body>
</html>   