<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Clients</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <a href="ajouter.php" class="Btn_add"> <img src="/projet_php/icons/add3.png"> Ajouter</a>

        <table>
            <tr id="items">
                <th>Numéro</th>
                <th>Nom</th>
                <th>Raison Social</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Telephone</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "connexion.php";
                //requête pour afficher la liste des clients
                $req = mysqli_query($con , "SELECT * FROM client");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas de clients dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore de client ajouter !" ;
                    
                }else {
                    //si non , affichons la liste de tous les clients
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['numClient']?></td>
                            <td><?=$row['nomClient']?></td>
                            <td><?=$row['raisonSocial']?></td>
                            <td><?=$row['adresseClient']?></td>
                            <td><?=$row['villeClient']?></td>
                            <td><?=$row['pays']?></td>
                            <td><?=$row['telephone']?></td>
                            <!--Nous alons mettre le numéro de client de chaque client dans ce lien -->
                            <td><a href="modifier.php?numClient=<?=$row['numClient']?>"><img src="/projet_php/icons/modify2.png"></a></td>
                            <td><a href="supprimer.php?numClient=<?=$row['numClient']?>"><img src="/projet_php/icons/delete.png"></a></td>
                        </tr>
                        <?php
                    }
                    
                }
            ?>
      
         
        </table>
        <br>
       

         
         <a href="/projet_php/searchclient.php" class="Btn_add"> <img src="/projet_php/icons/rs.png"> Rechercher</a>       


        <a href="/projet_php/index.php" class="back_btn"><img src="/projet_php/icons/returnmint.png"> Retour</a>
   
   
   
    </div>
</body>
</html>