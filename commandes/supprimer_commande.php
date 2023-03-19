<?php
  //connexion a la base de données
  include_once "connexion.php";
  //récupération de l'id dans le lien
  $numCommande = $_GET['numCommande'];
  //requête de suppression
  $req = mysqli_query($con , "DELETE FROM commande WHERE `commande`.`numCommande` = $numCommande");
  //redirection vers la page commande.php
  header("Location:commande.php")
?>

