<?php
session_start();
include('conexao.php');
include('painelScript.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name= "viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunidade</title>
    <link rel="stylesheet" href="css/csscomunidade.css">
</head>
<body>

<div class="container">
    <div class="chatbox">
        <div class="col1">

            <div class="msg-row">
                <div class="msg-text">
                    
                        <?php
                            $query = "select * from postagem inner join cadusuario on postagem.Usrid = cadusuario.Usrid order by hora desc;";
                            $resultado = mysqli_query($conexao,$query);
                              if(mysqli_num_rows($resultado) > 0){       
                              while($linhas = mysqli_fetch_assoc($resultado)){
                               echo "<div class='msg-text'>@{$linhas['UsrUsuario']} {$linhas['hora']}<p>{$linhas['mensagem']}</p></div>" ;
                              //  echo "<p>{$linhas['mensagem']}</p>";
                                }
                                }
                          ?>
                     <h2> aqui entra o nome do aluno </h2>
                     <p> aqui entra a mensagem digitada </p>
                </div>
                <img width="100" src="https://greenpng.com/wp-content/uploads/2020/07/20200730_132931-294x300.png" class="msg-img">
            </div>


            <input type="text" placeholder="Digite aqui">

        </div>


        <div class="col2">
            <h3>Oq vai ficar aqui ,mds</h3>
            <ul>
                <li>chuchu</li>
            </ul>
        </div>

    </div>
</div>

</body>
</html>