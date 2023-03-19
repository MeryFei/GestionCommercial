<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        //connexion à la base de donnée
         include_once "connexion.php";  
        //on récupère le numéro de produit dans le lien
        $refProduit = $_GET['refProduit']; 
        //requête afficher les infos d'un produit
        $req = mysqli_query($con , "SELECT * from produit WHERE refProduit = $refProduit ");      
        $row = mysqli_fetch_assoc($req);
        

        //vérifier que le bouton ajouter a bien été cliqué
        if(isset($_POST['button'])){
            //extraction des informations envoyé dans des variables par la methode POST
            extract($_POST);
            //verifier que tous les champs ont été remplis
            if(isset($nomProduit) && isset($prixUnitaire) && isset($qteStockee) && isset($indisponible)){
                //requête de modification
                $req = mysqli_query($con, "UPDATE produit SET  nomProduit = '$nomProduit' , prixUnitaire = '$prixUnitaire' , qteStockee = '$qteStockee' , indisponible = '$indisponible'  WHERE refProduit = $refProduit");
                if($req){
                    //si la requête a été effectuée avec succès , on fait une redirection
                    header("location: produit.php");
                 }else{
                    //si non
                    $message = "Produit non modifié";
                 } 
                
            }else { 
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    ?>


    <div class="form">
        <a href="produit.php" class="back_btn"><img src="/projet_php/icons/returnmint.png"> Retour</a>
        <h2>Modifier le Produit : </h2>
        <p class="erreur_message">
            <?php
                if(isset($message)){
                    echo $message ;
                }
            ?>
        <form action="" method="POST">
            <input type="hidden"  name="refProduit" value=<?=$row['refProduit']?>>
            <label>Nom produit</label>
            <input type="text" name="nomProduit" value="<?=$row['nomProduit']?>">
            <label>Prix unitaire</label>
            <input type="text" name="prixUnitaire" value="<?=$row['prixUnitaire']?>">
            <label>Qte stockée</label>
            <input type="text" name="qteStockee" value="<?=$row['qteStockee']?>">
            <label>Indisponible</label>
            <input type="text" name="indisponible" value="<?=$row['indisponible']?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>