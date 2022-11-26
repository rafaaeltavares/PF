<html>
<head>
    <title>Contate-nos</title>
    <link href="css/csspgcontato.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/4/41/Logotipo_cefet-rj.jpg">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>  

<main class="box">
    <div class="form">
            <img src="imagens/logope.png" class="logo">
                <h2>Contato</h2>

    <form action="https://formsubmit.co/contatosyfet@gmail.com" method="POST">
      
        <div class="inputBox">
                <input name="name" type="text" id="nome" required>
                <span>Nome</span>
                <i></i>
        </div>

        <div class="inputBox">
                <input type="email" name="email" id="email" required>
                <span>Email</span>
                <i></i>
        </div>

        <div class="inputBox">
                <textarea name="message" placeholder="Digite sua sugestão, elogio ou reclamação." required></textarea>
        </div>
        <div class="robogoogle"> 
        <div class="g-recaptcha" data-sitekey="6LenlXciAAAAAAsBgGZfi_iUzbmz0tI9PvaSNPB8"></div>
        </div>
        <div class="canto">
        <img src="imagens/logope.png" class="pq">
        </div>
        <button type="submit" class="a">Enviar</button>
        </form>
        <button  type="submit"  class="b" onclick='history.go(-1)'>Voltar</button>
        </div>

        <input type="hidden" name="_subject" value="Novo Contato!">
      <input type="text" name="_honey" style="display:none">
      <input type="hidden" name="_captcha" value="false">

      </div>


 