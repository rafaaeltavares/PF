<?php
session_start();
include('conexao.php');
include('painelScript.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/csspanel.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/4/41/Logotipo_cefet-rj.jpg">
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <title>Comunidade SYFET</title>
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

      <li>
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

      <li>
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
      <div class="form">

        <form action='postagem.php' method='POST'>
            
          <?php $_SESSION['ID']?>
          <textarea name="msg" id="txtArea" cols="30" rows="10" placeholder='Como foi o seu dia <?php echo $_SESSION['usr']?>'></textarea>
          
          <input type="SUBMIT" value="postar">

        </form>
      </div>
  <script src='ScriptSideBar.js'></script>
  <script src='ScriptPainel.js'></script>
  </section>

</body>
</html>