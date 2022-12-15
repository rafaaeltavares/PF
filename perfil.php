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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
<style>
    #lado{
    margin-top: 15px;
    margin-left: 80px;
}

#bi{
    margin-left:20px;
    margin-top: 29px;
    width: 95%;
    
}
#bi2{
    margin-left:20px;
    margin-top: 5px;
    width: 95%;
    
}

span{
    font-size: 12px;
}
</style>

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
        <a href="#">
        <i class='bx bx-map-alt'></i>
          <span class="link_name" >Mapa campus</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="mapas/pgmapas.html">Mapa do campus</a></li>
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
      <div class="perfil">
        <div class="topo">
          <div class="fotoPerfil"></div>
        </div>




        

<div id="lado" class="container text-center" z-index="999">
  <div class="row row-cols-4">
    <div class="col"></div>
    <div class="col"></div>
    <div class="col-6">
    
    
<div id="lado" >
<?php if(!isset($_SESSION['visita'])):?>
<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Editar
    </button>
    <ul class="dropdown-menu">
      <li><button type="button" id="a" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#foto">Editar Foto de perfil</button></li>
      <li><button type="button" id="a" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#banner">Editar Banner</button></li>
      <li><button type="button" id="a" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#macacoprego">Editar Perfil</button></li>
    </ul>
  </div>
</div>
</div>
<?php endif;?>
    </div>

  </div>
</div>
<!-- modal -->



<!-- Modal  foto pronto-->
<div class="modal fade" id="foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Alteração</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action='AlterarPerfil.php' method="POST" enctype='multipart/form-data'>
      <div class="modal-body">
                Foto do perfil<br> <input type='file' required name='arquivoFoto' class="form-control" id="customFile"><br>
      </div>
      <div class="modal-footer">
        <input type='submit'class="btn btn-primary" value='Salvar Alterações de imagem'><br>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal banner pronto -->
<div class="modal fade" id="banner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Alteração</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action='AlterarPerfil.php' method="POST" enctype='multipart/form-data'>
                Foto do banner <br> <input type='file' required name='arquivoBanner' class="form-control" id="customFile"><br>
      </div>
      <div class="modal-footer">
        <input type='submit'class="btn btn-primary" value='Salvar Alterações de imagem'><br>
        </form>
      </div>
    </div>
  </div>
</div>




<!-- Modal perfil-->
<div class="modal fade" id="macacoprego" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Alterar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
            <div class="mb-3">
              <form action="AlterarPerfil.php" method='POST'>

                <div class="input-group mb-3">
                <span class="input-group-text">@</span>
                <div class="form-floating">
                    <input type="text" name="usuario" class="form-control"id="floatingInputGroup1" placeholder="Usuario">
                    <label for="floatingInputGroup1">Usuario</label>
                </div>
                </div>

                <label for="formGroupExampleInput" class="form-label">E-mail instituicional</label><br>
                <input type="email" name="emailInstitucional" class="form-control" id="formGroupExampleInput" placeholder="@cefet-rj.br"><br>

                <label for="formGroupExampleInput" class="form-label">E-mail padrão</label><br>
                <input type="email" name="emailComum" class="form-control" id="formGroupExampleInput" placeholder="@exemplo.com"><br>

                
                <div class="input-group">
                <span class="input-group-text">Biografia</span>
                <textarea name="biografia" aria-label="With textarea" class="form-control"  id="floatingTextarea2" style="height: 100px"></textarea>
                </div>

            </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
     <input type='submit'class="btn btn-primary" value='Salvar Alterações'><br>
        </form>
  </div>
</div>
</div>
</div>

<div id="bi"class="alert alert-info" role="alert">
  <div class="informacaoPerfil">
            <div class="bio">
                
                <?php 
                  include('infoBio.php');
                  if(isset($_SESSION['ID'])){
                    
                    echo "<strong>{$_SESSION['nome']}</strong><br>"; 
                    echo "<i>{$perfil['usuario']}</i>";
                    echo "<p>{$perfil['biografia']}</p>";
                    echo "<p>{$perfil['emailInsitucional']}</p>";
                    echo "<p>{$perfil['emailComum']}</p>";
                  }
                ?>

            </div>
            <div class="botao">
              <div class="biografiaBtn">
                
              </div>
            </div>
          </div>
</div>


      <?php
        if(isset($_SESSION['logado'])):
      ?>




        
        <?php
              $query = "select * from postagem inner join cadusuario on postagem.Usrid = cadusuario.Usrid order by hora desc;";
              $resultado = mysqli_query($conexao,$query);
                if(mysqli_num_rows($resultado) > 0){
                        
                  while($linhas = mysqli_fetch_assoc($resultado)){
                        if($linhas['Usrid'] == $_SESSION['ID']){
                            
                            echo "<div id='bi2' class='alert alert-success' role='alert'>

                            <strong>{$_SESSION['nome']}</strong><br>

                            <p>{$linhas['mensagem']}</p>

                            <span>@{$linhas['UsrUsuario']} {$linhas['hora']}</span><br>

                            </div>";
                        }
                  }
                }
        ?>
      <?php
        endif;
      ?>

        </div>
      </div>
     

    <script src='ScriptSideBar.js'></script>
    <script src='ScriptPainel.js'></script>
    <script>

        function mudarFotoPerfil(){
          const foto = "<?php echo $fotoPerfil?>"
          <?php if(isset($_SESSION['visitante'])):?>
          const perfil = document.querySelector('.fotoPerfil');
          perfil.style.backgroundImage = `url(${foto})`
          <?php endif;
          if(isset($_SESSION['ID'])):?>
          const caminho = "upload/";
          const perfil = document.querySelector('.fotoPerfil');
          perfil.style.backgroundImage = `url(${caminho + foto})`
          <?php endif;?>
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
    


      </div>
  </div>
</div>


     
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
    </div>
  </section>
  
  </body>