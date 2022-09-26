<?php
   session_start();
   if ($_SESSION['role'] != 'ADMIN') {
       header("location:login.php");
       exit();
   }
   if(date("H")<14)
   {  
       $bienvenue="Bonjour et bienvenue ".$_SESSION["username"]." dans votre espace personnel";
       echo $bienvenue;
   }
  else
   {  
       $bienvenue="Bonsoir et bienvenue ".$_SESSION["username"]." dans votre espace personnel";
       echo $bienvenue;
   }
?>