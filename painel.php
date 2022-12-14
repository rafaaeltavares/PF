<?php
session_start();
include('conexao.php');
include('painelScript.php');
include('inserirUsr.php');
include('fotoPerfil.php');
$adm ="administrador";


?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/csspgpost.css">
    <link rel="stylesheet" href="css/csspanel.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/4/41/Logotipo_cefet-rj.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
      <li id="provas">
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
          <?php include('fotoPerfilvisitante.php');?>
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
    
      <div class='tete'>
        <?php
          $query = "select * from postagem inner join cadusuario on postagem.Usrid = cadusuario.Usrid = 1 order by hora desc;";
          $resultado = mysqli_query($conexao,$query);
            if(mysqli_num_rows($resultado) > 0){
                    
              while($linhas = mysqli_fetch_assoc($resultado)){
                if($linhas['NivId'] == 1){
                  if($linhas['grupo'] == 1){
                    echo "<div class='card text-bg-primary mb-3' style='width: 690px;'>
                    <div class='card-header'>{$adm}</div>
                    <div class='card-body'>
                      <h5 class='card-title'>{$linhas['UsrNome']}</h5>
                      <p class='card-text'>{$linhas['mensagem']}</p>
                    </div>
                  </div>";
                  }
                  
                  if(isset($_SESSION['visita']) && $linhas['grupo'] == 2){
                    echo "<div class='card text-bg-warning mb-3' style='max-width: 690px;'>
                            <div class='card-header'>{$adm}</div>
                            <div class='card-body'>
                              <h5 class='card-title'>{$linhas['UsrNome']}</h5>
                              <p class='card-text'>{$linhas['mensagem']}</p>
                            </div>
                        </div>";
                  }
                  if($_SESSION["acesso"] == "aluno" && $linhas['grupo'] == 3 ){
                    echo "<div class='card text-bg-info mb-3' style='max-width: 690px;'>
                            <div class='card-header'>{$adm}</div>
                            <div class='card-body'>
                              <h5 class='card-title'>{$linhas['UsrNome']}</h5>
                              <p class='card-text'>{$linhas['mensagem']}</p>
                            </div>
                          </div>";
                  }
                }
              }
            }
        ?>
        
      </div>
    </div>

    <?php
      if($_SESSION['acesso'] === $adm):
    ?>
  
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Publicar
  </button>

        
    <?php 
      endif;
    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">
            <form action='postagem.php' method='POST'>
              <select class="form-select" aria-label="Default select example" name='select'>
                        <option selected>Escolha para qual grupo voce quer postar</option>
                        <option value="1" >Todos</option>
                        <option value="2">visitantes</option>
                        <option value="3">Alunos</option>
            </select>
          </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class='formulario'>
                  <?php
                      if($_SESSION['acesso'] === $adm):
                    ?>
                    <div class="form">
                        <?php $_SESSION['ID']?>
                        <?php $_SESSION['usr']?>
                        <div class="form-floating">
                            <textarea class="form-control" id="floatingTextarea" name='msg' style="height: 300px"></textarea>
                            <label for="floatingTextarea">Como foi o seu dia <?php echo $_SESSION['usr']?></label>
                        </div>
                    </div>
                <?php
                  endif;
                ?>
              </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="SUBMIT" class="btn btn-primary">Publicar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  

  

  <script src='scriptFazerPostagem.js'></script>
  <script src='ScriptSideBar.js'></script>
  <script src='ScriptPainel.js'></script>
  <script>
    const Acesso = "<?php echo isset($_SESSION['logado']); ?>"
    const pgIdsBloqueados = ['comunidade','mapaCampus'];
  if(!Acesso){
      pgIdsBloqueados.forEach(function(ids){

      let bloqueados = document.getElementById(""+ids);
      bloqueados.addEventListener('click',function(e){
        bloqueados.classlist.add('bloqueado');


        })
      })
    }
  </script>
   <script>
      const container = document.querySelector(".container"),
      privacy = container.querySelector(".post .privacy"),
      arrowBack = container.querySelector(".audience .arrow-back");

      privacy.addEventListener("click", () => {
        container.classList.add("active");
      });

      arrowBack.addEventListener("click", () => {
        container.classList.remove("active");
      });
    </script>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
</div>
 -->

<!-- asdasdasd
asda -->


      
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