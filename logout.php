<?php
session_start();
session_destroy();
header("location: pglogin.php");
exit();
?>