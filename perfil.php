<?php
session_start();
include('conexao.php');
include('painelScript.php');
$adm ="administrador";
$a = isset($_SESSION['visita']);
include('fotoPerfil.php');

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>

    <link rel="stylesheet" href="css/cssperfil.css">
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
      <div class="perfil">
        <div class="topo">
          <div class="fotoPerfil"></div>
        </div>
      <div class="contentPerfil">
          <div class="informacaoPerfil">
              <strong><?php echo $_SESSION["nome"];?></strong>
              <p>Biografia</p>
              <div class="biografiaBtn">
                <?php 
                  if(isset($_SESSION['visita'])){
                      echo "<a href='pglogin.php' class='linkBio'>Logue-se para editar.</a>";
                    }else{
                      echo "<input type=button value='Editar Perfil' class='editarBtn'>";
                    }?>
              </div>
            </div>
      </div>
      <?php
        if(isset($_SESSION['logado'])):
      ?>
        <div class='post-pai-perfil'>
        <?php
              $query = "select * from postagem inner join cadusuario on postagem.Usrid = cadusuario.Usrid order by hora desc;";
              $resultado = mysqli_query($conexao,$query);
                if(mysqli_num_rows($resultado) > 0){
                        
                  while($linhas = mysqli_fetch_assoc($resultado)){
                        if($linhas['Usrid'] == $_SESSION['ID']){
                            
                            echo "<span>@{$linhas['UsrUsuario']} {$linhas['hora']}</span>" ;
                    
                            echo "<p>{$linhas['mensagem']}</p>";
                        }
                  }
                }
        ?>
      <?php
        endif;
        echo isset($_SESSION['visita']);
        if(isset($_SESSION['visita'])){
          echo 'teste';
        }
      ?>

        </div>
      </div>
      <div class="formularioEditar">
          <div class="formulario">

            <div class="contentUsuario">
              <form action="AlterarPerfil.php" method='POST'>
                Usuário:<br>
                <input type="text" name="usuario" placeholder='@Novo usuário' value=""><br>
                E-mail instituicional:<br>
                <input type="email" name="emailInstitucional" placeholder='1234@cefet-rj.br' value=""><br>
      
                E-mail Comum:<br>
                <input type="email" name="emailComum" placeholder='fulano@siclano.com' value=""><br>
              
                Biografia<br>

                <textarea name="biografia" cols="30" rows="10" placeholder='Conte-nos mais sobre você!'></textarea><br><br>
        
                <input type='submit' value='Salvar alterações'>
              </form>
            </div>

            <div class="contentFiles">
              <form action='AlterarPerfil.php' method="POST" enctype='multipart/form-data'>
                foto do perfil de usuário <br> <input type='file' required name='arquivoFoto'><br>
                <input type='submit' value='Salvar Alterações de imagem'><br>
              </form>
              <form action="AlterarPerfil.php" method="POST" enctype='multipart/form-data'>
                foto do banner <br> <input type='file' required name='arquivoBanner'><br>
                <input type='submit' value='Salvar alterações de imagem'>
              </form>
            </div>
          </div>  
      </div>

    <script src='ScriptSideBar.js'></script>
    <script src='ScriptPainel.js'></script>
    <script>

        function mudarFotoPerfil(){
          const foto = "<?php echo $fotoPerfil?>"
          const caminho = "upload/"
          const perfil = document.querySelector('.fotoPerfil');
          perfil.style.backgroundImage = `url(${caminho + foto})`
        }

        function mudarFotoHeader(){
        const foto = "<?php echo $fotoHeader?>"
        const caminho = "upload/"
        const perfil = document.querySelector('.topo');
        perfil.style.backgroundImage = `url(${caminho + foto})`
        }
        mudarFotoHeader()
        mudarFotoPerfil()


    </script>
    
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
    </div>
  </section>
  
  </body>