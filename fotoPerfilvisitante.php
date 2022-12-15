<?php 
if(isset($_SESSION['visita'])){
    echo "<img src='$fotoPerfil'>";
}else{
    echo "<img src='upload/$fotoPerfil'>";
}
