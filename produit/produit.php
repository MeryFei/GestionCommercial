<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Produits</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <a href="ajouter_produit.php" class="Btn_add"> <img src="/projet_php/icons/add3.png"> Ajouter</a>
        
        <table>
            <tr id="items">
                <th>Ref Produit</th>
                <th>Nom Produit</th>
                <th>Prix unitaire</th>
                <th>Qte Stockee</th>
                <th>Indisponible</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "connexion.php";
                //requête pour afficher la liste des produits
                $req = mysqli_query($con , "SELECT * FROM produit");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas de produits dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore de produit ajouter !" ;
                    
                }else {
                    //si non , affichons la liste de tous les produits
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['refProduit']?></td>
                            <td><?=$row['nomProduit']?></td>
                            <td><?=$row['prixUnitaire']?></td>
                            <td><?=$row['qteStockee']?></td>
                            <td><?=$row['indisponible']?></td>
                            <!--Nous alons mettre le numéro de produit de chaque client dans ce lien -->
                            <td><a href="modifier_produit.php?refProduit=<?=$row['refProduit']?>"><img src="/projet_php/icons/modify2.png"></a></td>
                            <td><a href="supprimer_produit.php?refProduit=<?=$row['refProduit']?>"><img src=/projet_php/icons/delete.png "></a></td>
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