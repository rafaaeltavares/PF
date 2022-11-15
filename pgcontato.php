<html>
<head>
    <title>Contate-nos</title>
    <link href="css/csspgcontato.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/4/41/Logotipo_cefet-rj.jpg">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>  
        
    <div class="box">

        <div class="form">
        <img src="imagens/logope.png" class="logo">
            <h2>Contato</h2>
        <form action="" method="POST">

            <div class="inputBox">
                <input name="name" type="text" required>
                <span>Nome</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input name="email" type="email" required>
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

<!--Tecnicamente isso deveria funcionar e enviar um email...-->

<div class="status">
    <?php
    if(isset($_POST['submit'])){
        $User_name = $_POST["name"];
        $user_email = $_POST["email"];
        $user_message = $_POST["message"];

        $email_from="noreply@syfet.com";
        $email_subject = "Nova mensagem de contato";
        $email_body = "Name: $User_name.\n". 
                    "Email: $user_email.\n". 
                    "Mensagem: $user_message.\n";

        $to_email = "contatosyfet@gmail.com";
        $headers = "De: $email_from \r\n";
        $headers .= "Responda: $user_email \r\n";

        $secretKey = "6LenlXciAAAAAJIuL2RHj5HS9RqckVu-ud2OEqaA";
        $responseKey = $_POST["g-recaptcha-response"];
        $User_IP = $_SERVER["REOMTE_ADDR"];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$User_IP";

        $response = file_get_contents($url);
        $response = json_decode($response);

        if($response->sucess){
            mail($to_email,$email_subject,$email_body,$headers);
            echo "Mensagem enviada com sucesso. Agradecemos o contato!";
        }
        else{
            echo "<span>Tente novamente!</span>";
        }
    }
    ?>
</div>

</div>

</body>
</html>