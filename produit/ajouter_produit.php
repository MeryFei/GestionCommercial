<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($nomProduit) && isset($prixUnitaire) && isset($qteStockee) && isset($indisponible)){
                //connexion à la base de donnée
                include_once "connexion.php";
                //requête d'ajout
                $req = mysqli_query($con , "INSERT INTO produit VALUES(NULL, '$nomProduit', '$prixUnitaire','$qteStockee','$indisponible')");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: produit.php");
                }else {//si non
                    $message = "Produit non ajouté";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="produit.php" class="back_btn"><img src="/projet_php/icons/returnmint.png"> Retour</a>
        <h2>Ajouter un produit</h2>
        <p class="erreur_message">
            <?php 
            // si la variable message existe , affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form action="" method="POST">
            <label>Nom Produit</label>
            <input type="text" name="nomProduit">
            <label>Prix unitaire</label>
            <input type="text" name="prixUnitaire">
            <label>Qte produit</label>
            <input type="text" name="qteStockee">
            <label>Indisponible</label>
            <input type="text" name="indisponible">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>