<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Commandes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <a href="ajouter_commande.php" class="Btn_add"> <img src="/projet_php/icons/add3.png  "> Ajouter</a>
        <table>
            <tr id="items">
                <th>Numéro de commande</th>
                <th>Numéro de client</th>
                <th>Date de commande</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "connexion.php";
                //requête pour afficher la liste des clients
                $req = mysqli_query($con , "SELECT * FROM commande");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas de clients dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore de commande ajouter !" ;
                }else {
                    //si non , affichons la liste de tous les commandes
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['numCommande']?></td>
                            <td><?=$row['numClient']?></td>
                            <td><?=$row['dateCommande']?></td>
                            <!--Nous alons mettre l'id de chaque commande dans ce lien -->
                            <td><a href=""></a></td>
                            <td><a href=""></a></td>
                        </tr>
                        <?php
                    }
                    
                }
            ?>
      
         
        </table>
        <br>
        <a href="/projet_php/index.php" class="back_btn"><img src="/projet_php/icons/returnmint.png"> Retour</a>  
    </div>
        
</body>
</html>
