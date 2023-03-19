<?php
include "clients/connexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
 integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
     integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />

      <title>Ajouter Client</title>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #2bc48a">
            <h2 style="color:white">  Chercher un client</h2>
    </nav>
    <div class="container">
    <form method="post">

    
  <div class="row">
    <div class="col-5">
    <input type="text" class="form-control"  name="search"  required>
    </div>
  
    <div class="col-5">
  <select name="choice" class="form-select" aria-label="Default select example" >
        <option value="numClient" selected>numero</option>
        <option value="nomClient">nom</option>
        <option value="raisonSocial">raisonSocial</option>
        <option value="adresseClient">adresse</option>
        <option value="villeClient">ville</option>
        <option value="pays">pays</option>
        <option value="telephone">telephone</option>
    </select>
</div>
<div class="col-2">
<div class="d-grid">
  <button type="submit" class="btn btn-success btn-block" name="done">chercher</button>
</div>
</div>

</div>

<br>

</form>
    <?php

    if(isset($_POST['done'])) {
        $choice=$_POST['choice'];
        //echo $choice;
        $name=$_POST['search'];
        $sql="select * from client where ".$choice." like '$name%' order by ".$choice;
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result)>0){
            echo '
               
        <table class="table table-hover text-center">
        <thead class="table-success">
        <tr>
        <th scope="col">id</th>
            <th scope="col">nom et prénom</th>
            <th scope="col">raison_social</th>
            <th scope="col">adresse</th>
            <th scope="col"> ville</th>
            <th scope="col">pays</th>
            <th scope="col">telephone</th>
           


        </tr>
';
        }
        else{
            echo '<h2>aucun client avec ces critéres</h2>';
        }
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr bgcolor="white">
            <th><?php echo $row['numClient'] ?> </th>
            <th><?php echo $row['nomClient'] ?> </th>
            <th><?php echo $row['raisonSocial'] ?> </th>
            <th><?php echo $row['adresseClient'] ?> </th>
            <th><?php echo $row['villeClient'] ?> </th>
            <th><?php echo $row['pays'] ?> </th>
            <th><?php echo $row['telephone'] ?> </th>
        </tr>
        <?php
        }
        }
        ?>
    </table>
    <br>   
<div class="container">
<a href="/projet_php/clients/client.php" class="btn btn-success btn-block"><img src="/projet_php/icons/return.png"> Retour</a> 
    </div>
</body>
</html>