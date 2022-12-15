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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
      <li id='home'>
        <a href="painel.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Home</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="painel.php">Home</a></li>
        </ul>
      </li>

      <li id="mapaCampus">
        <a href="mapas/pgmapas.html">
        <i class='bx bx-map-alt'></i>
          <span class="link_name" >Mapa campus</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="mapas/assets/pgmapas.php">Mapa do campus</a></li>
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
      <?php include('fotoPerfilvisitante.php');?>
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
      <div class="comunidade">
      <h2>Ultimas postagens dos nossos usuários</h2>
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Abre seu coração, Comente!</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action='postagem.php' method="POST">
            <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name='msg'></textarea>
            <label for="floatingTextarea2">Como foi seu final de semana <?php echo $_SESSION['nome']?></label>
          </div>
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fechar</button>
            <button type="submit" class="btn btn-primary">Postar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
        
      </div>
      <div class="btn">
        
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        +
      </button>
      </div>
      <div class="centro">

          <?php
              $query = "select * from postagem inner join cadusuario on postagem.Usrid = cadusuario.Usrid order by hora desc;";
              $resultado = mysqli_query($conexao,$query);
                if(mysqli_num_rows($resultado) > 0){       
                while($linhas = mysqli_fetch_assoc($resultado)){
                  echo "<div class='card text-bg-info mb-3' style='width: 680px;'>
                      <div class='card-header'>{$linhas['UsrNome']}</div>
                      <div class='card-body'>
                        <h5 class='card-title'>{$linhas['UsrUsuario']} </h5>
                        <p class='card-text'>{$linhas['mensagem']}</p>
                      </div>
                    </div>";
                  }
                }
            ?>

      </div>







<script src='ScriptSideBar.js'></script>
<script src='ScriptPainel.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script>
const Acesso = "<?php echo isset($_SESSION['logado']); ?>"
const pgIdsBloqueados = ['comunidade','mapaCampus','home'];
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