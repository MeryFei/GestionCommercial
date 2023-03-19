<?php
  //connexion a la base de données
  include_once "connexion.php";
  //récupération de l'id dans le lien
  $numClient = $_GET['numClient'];
  //requête de suppression
  $req = mysqli_query($con , "DELETE FROM client WHERE `client`.`numClient` = $numClient");
  //redirection vers la page client.php
  header("Location:client.php")
?>

