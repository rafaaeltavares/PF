<?php
session_start();
include('conexao.php');
include('painelScript.php');
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/csspanel.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/4/41/Logotipo_cefet-rj.jpg">
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">SYFET</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="painel.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Home</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="painel.php">Home</a></li>
        </ul>
      </li>

      <li id="mapaCampus">
        <a href="#">
        <i class='bx bx-map-alt'></i>
          <span class="link_name" >Mapa campus</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Mapa do campus</a></li>
        </ul>
      </li>
      <li>
        <a href="pgbaixar.php" id='mc'>
          <i class='bx bx-notepad' ></i>
          <span class="link_name">Provas</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="pgbaixar.php" id='cm'>Provas anteriores</a></li>
        </ul>
      </li>

      <li id="comunidade">
        <a href="pgComunidadeDigital.php">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Comunidade</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="pgComunidadeDigital.php">Comunidade Digital</a></li>
        </ul>
      </li>
      <li>
        <a href="pgcontato.php">
          <i class='bx bx-comment-dots'></i>
          <span class="link_name">Contato</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="pgcontato.php">Contactar desenvolvedores</a></li>
        </ul>
      </li>
    
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="imagens/profile.jpg" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name"><?php echo $_SESSION['usr'];?></div>
        <div class="job"><?php echo $_SESSION["acesso"];?></div>
      </div>
      <a href="logout.php"><i class='bx bx-log-out'></i></a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content"> 
      <i class='bx bx-menu' ></i>
          <div class="nomao">
            <span class="text">Olá <?php echo $_SESSION["nome"];?></span>
          </div>
    </div>
    <div class='post-pai'>
        <?php
          $query = "select * from postagem inner join cadusuario on postagem.Usrid = cadusuario.Usrid order by hora desc;";
          $resultado = mysqli_query($conexao,$query);
            if(mysqli_num_rows($resultado) > 0){
                    
              while($linhas = mysqli_fetch_assoc($resultado)){

                echo "<span>@{$linhas['UsrUsuario']} {$linhas['hora']}</span>" ;
                
                echo "<p>{$linhas['mensagem']}</p>";
              }

            }
        ?>
    </div>

<input type="button" class='myButton' value='+'>
    <?php
        if(isset($_SESSION['logado'])):
      ?>
      <div class="form">

        <form action='postagem.php' method='POST'>
    
          <?php $_SESSION['ID']?>
          <textarea name="msg" id="txtArea" cols="30" rows="10" placeholder='Como foi o seu dia <?php echo $_SESSION['usr']?>'></textarea>
          
          <input type="SUBMIT" value="postar">

        </form>
      </div>
      <?php
      endif;
    ?>
  <script src='ScriptSideBar.js'></script>
  <script src='ScriptPainel.js'></script>
  <script>
    const Acesso = "<?php echo isset($_SESSION['logado']); ?>"
    const pgIdsBloqueados = ['comunidade','mapaCampus'];
  if(!Acesso){
      pgIdsBloqueados.forEach(function(ids){

      let bloqueados = document.getElementById(""+ids);
      bloqueados.addEventListener('click',function(e){
          e.preventDefault();
      
          })
      })
    }
  </script>
  
  </section>
</body>
</html>
<!-- Rafa, terminar de bloquear o acesso dos visitantes às paginas determinadas!
ver como colocar uma variavel em um document.querySelector. boa notieee
-->
<!-- 
<div class="divinha">
  <div class="a2a_kit a2a_kit_size_32 a2a_horizontal" data-a2a-icon-color="transparent,midnightblue";>
    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
    <a class="a2a_button_facebook"></a>
    <a class="a2a_button_twitter"></a>
    <a class="a2a_button_whatsapp"></a>
    <a class="a2a_button_facebook_messenger"></a>
    <a class="a2a_button_telegram"></a>
    <a class="a2a_button_microsoft_teams"></a>
  </div>
</div> -->


<!-- asdasdasd
asda -->
<!-- <bu class="myButton">+</a> -->

      
      <!-- <li>
        <div class="iocn-link">
          <a href="#" id ='sp'>
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Posts</span>
          </a>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#" id='ps'>Posts</a></li>
          
        </ul>
      </li> -->