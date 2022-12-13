<?php
session_start();
include('conexao.php');
include('painelScript.php');
include('inserirUsr.php');
include('fotoPerfil.php');
$adm ="administrador";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/4/41/Logotipo_cefet-rj.jpg">
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/csspanel.css">
    <link rel="stylesheet" href="css/csscomunidade.css">
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

      <li id='perfil'>
        <a href="perfil.php" id='mc'>
        <i class='bx bx-user'></i>
          <span class="link_name">Perfil</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="perfil.php" id='cm'>Perfil</a></li>
        </ul>
      </li>

      <li>
    <div class="profile-details">
      <div class="profile-content">
      <?php echo "<img src='upload/$fotoPerfil'>";?>
      </div>
      <div class="name-job">
        <div class="profile_name"><?php echo $_SESSION['usr']; ?></div>
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
</div>
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