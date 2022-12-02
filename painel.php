<?php
session_start();

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/csspanel.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/4/41/Logotipo_cefet-rj.jpg">
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
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Home</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="painel.php">Home</a></li>
        </ul>
      </li>
      
      <li>
        <div class="iocn-link">
          <a href="#" id ='sp'>
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Posts</span>
          </a>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#" id='ps'>Posts</a></li>
          
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
          <li><a class="link_name" href="pgbaixar.html" id='cm'>Provas anteriores</a></li>
        </ul>
      </li>

      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Comunidade</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Comunidade Digital</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-comment-dots'></i>
          <span class="link_name">Contato</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Contactar desenvolvedores</a></li>
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



<script>
var a2a_config = a2a_config || {};

a2a_config.thanks = {
    postShare: true,
    ad: true,
};
</script>

<script async src="https://static.addtoany.com/menu/page.js"></script>



<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
      <i class='bx bx-menu' ></i>
      <div class="nomao">
      <span class="text">Olá <?php echo $_SESSION["nome"];?></span>
      </div>
      <?php
        $acesso = isset($_SESSION['status_visita']);
      ?>
      <script>
      const acesso = '<?php echo $acesso; ?>'

      if(acesso){
          

        const link = document.getElementById('mc')
        const link1 = document.getElementById('cm')

        const posts = document.getElementById('ps')
        const posts1 = document.getElementById('sp')

        link.addEventListener('click',function(e){
          link.classList.add('nãoClicar')
          e.preventDefault();

          
          
        })
        link1.addEventListener('click',function(e){
          e.preventDefault();
        })

        posts.addEventListener('click',function(e){
          e.preventDefault();
        })
        posts1.addEventListener('click',function(e){
          e.preventDefault();
        })
      }
      </script>


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
<input type="button" class='myButton' value='+'>
<div class="form">
  <form action='postagem.php' method='POST'>
    <?php $_SESSION['ID']?>
    <textarea name="msg" id="txtArea" cols="30" rows="10" placeholder='Como foi o seu dia <?php echo $_SESSION['usr']?>'></textarea>
    <input type="SUBMIT" value="postar">
  </form>
</div>
<!-- asdasdasd
asda -->
<!-- <bu class="myButton">+</a> -->













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
