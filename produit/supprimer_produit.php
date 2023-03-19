<?php
  //connexion a la base de données
  include_once "connexion.php";
  //récupération de l'id dans le lien
  $refProduit = $_GET['refProduit'];
  //requête de suppression
  $req = mysqli_query($con , "DELETE FROM produit WHERE `produit`.`refProduit` = $refProduit");
  //redirection vers la page client.php
  header("Location:produit.php")
?>

