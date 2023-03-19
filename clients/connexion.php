<?php
  //connexion à la base de données
  $con = mysqli_connect("localhost","root","","gestion_com");
  if(!$con){
     echo "Vous n'êtes pas connecté à la base de donnée";
  }
?>