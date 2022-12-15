<?php 
  session_start();
  include('conexao.php');
  include('painelScript.php');
  include('inserirUsr.php');
  include('fotoPerfil.php');
  $adm ="administrador";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Download</title>
    <link href="css/bob.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/4/41/Logotipo_cefet-rj.jpg">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> <!--icones-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
              <span class="text"><div class="container">
                
                <div class="a2020">
                <!--2020-->
                <a href="https://onedrive.live.com/?authkey=%21AGJBRWKoGVlnof0&cid=AC6D8128E5790924&id=AC6D8128E5790924%21293483&parId=AC6D8128E5790924%2126040&o=OneUp" download>2020 Prova 1° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21AClQrcwf%2DgW3ONQ&cid=AC6D8128E5790924&id=AC6D8128E5790924%21293861&parId=AC6D8128E5790924%2126040&o=OneUp" download>2020 Gabarito 1° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21AHGxWQoT1z8AUIw&cid=AC6D8128E5790924&id=AC6D8128E5790924%21302133&parId=AC6D8128E5790924%2126040&o=OneUp" download>2020 Prova 2° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21AAi8%5F9jPBtiLMMI&cid=AC6D8128E5790924&id=AC6D8128E5790924%21307510&parId=AC6D8128E5790924%2126040&o=OneUp" download>2020 Gabarito 2° Fase</a>
                </div>
                
                <div class="a2019">
                <!--2019-->
                <a href="https://onedrive.live.com/?authkey=%21AFziXx8Xx7WXX5w&cid=AC6D8128E5790924&id=AC6D8128E5790924%21281462&parId=AC6D8128E5790924%2126040&o=OneUp" download>2019 Prova 1° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21AC5n1LS%2DmQfRJQ0&cid=AC6D8128E5790924&id=AC6D8128E5790924%21490703&parId=AC6D8128E5790924%2126040&o=OneUp" download>2019 Gabarito 1° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21AKM0%2DHguNAffMzQ&cid=AC6D8128E5790924&id=AC6D8128E5790924%21332459&parId=AC6D8128E5790924%2126040&o=OneUp" download>2019 Prova 2° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21AJoXDChRkeJuuME&cid=AC6D8128E5790924&id=AC6D8128E5790924%21142152&parId=AC6D8128E5790924%2126040&o=OneUp" download>2019 Gabarito 2° Fase</a>
                </div>
                
                <div class="a2018">
                <!--2018-->
                <a href="https://onedrive.live.com/?authkey=%21APU1TIgQBZr1P10&cid=AC6D8128E5790924&id=AC6D8128E5790924%21285359&parId=AC6D8128E5790924%2126040&o=OneUp" download>2018 Prova 1° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21AKdQuImVYkZfhUQ&cid=AC6D8128E5790924&id=AC6D8128E5790924%21286029&parId=AC6D8128E5790924%2126040&o=OneUp" download>2018 Gabarito 1° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21AP1039znlX2%5Fdjs&cid=AC6D8128E5790924&id=AC6D8128E5790924%21490704&parId=AC6D8128E5790924%2126040&o=OneUp" download>2018 Prova 2° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21APg40cQasHxzWgc&cid=AC6D8128E5790924&id=AC6D8128E5790924%2156139&parId=AC6D8128E5790924%2126040&o=OneUp" download>2018 Gabarito 2° Fase</a>
                </div>
                
                <div class="a2017">
                <!--2017-->
                <a href="https://onedrive.live.com/?authkey=%21AMtdkjFEMV0HXn4&cid=AC6D8128E5790924&id=AC6D8128E5790924%21490705&parId=AC6D8128E5790924%2126040&o=OneUp" download>2017 Prova 1° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21ACnhKgDjoyrnbLg&cid=AC6D8128E5790924&id=AC6D8128E5790924%2126345&parId=AC6D8128E5790924%2126040&o=OneUp" download>2017 Gabarito 1° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21AK7k6oFx0k0wldA&cid=AC6D8128E5790924&id=AC6D8128E5790924%2126359&parId=AC6D8128E5790924%2126040&o=OneUp" download>2017 Prova 2° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21AIs%2D3Bza5ND8wlE&cid=AC6D8128E5790924&id=AC6D8128E5790924%2126349&parId=AC6D8128E5790924%2126040&o=OneUp" download>2017 Gabarito 2° Fase</a>
                </div>
                
                <div class="a2016">
                <!--2016-->
                <a href="https://onedrive.live.com/?authkey=%21AII%5FjJscDSDMlo8&cid=AC6D8128E5790924&id=AC6D8128E5790924%21490706&parId=AC6D8128E5790924%2126040&o=OneUp" download>2016 Prova 1° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21AM5cEwtl5TeHGqA&cid=AC6D8128E5790924&id=AC6D8128E5790924%21490710&parId=AC6D8128E5790924%2126040&o=OneUp" download>2016 Gabarito 1° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21AO6PC4gVokS854w&cid=AC6D8128E5790924&id=AC6D8128E5790924%2126351&parId=AC6D8128E5790924%2126040&o=OneUp" download>2016 Prova 2° Fase</a>
                <a href="https://onedrive.live.com/?authkey=%21AKoRqV5qOaCAMh0&cid=AC6D8128E5790924&id=AC6D8128E5790924%2126347&parId=AC6D8128E5790924%2126040&o=OneUp" download>2016 Gabarito 2° Fase</a>
                </div>
                
                </div>
                </span>
            </div>
          </section>



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
      <script>
      let arrow = document.querySelectorAll(".arrow");
      for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e)=>{
       let arrowParent = e.target.parentElement.parentElement;
       arrowParent.classList.toggle("showMenu");
        });
      }
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".bx-menu");
      console.log(sidebarBtn);
      sidebarBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
      });
      </script>

</body>
</html>
