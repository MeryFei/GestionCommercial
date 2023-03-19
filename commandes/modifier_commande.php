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
        //on récupère le numéro de commande dans le lien
        $numCommande = $_GET['numCommande']; 
        //requête afficher les infos d'une commande
        $req = mysqli_query($con , "SELECT * from commande WHERE numCommande = $numCommande ");      
        $row = mysqli_fetch_assoc($req);
        

        //vérifier que le bouton ajouter a bien été cliqué
        if(isset($_POST['button'])){
            //extraction des informations envoyé dans des variables par la methode POST
            extract($_POST);
            //verifier que tous les champs ont été remplis
            if(isset($numClient) && isset($dateCommande)){
                //requête de modification
                $req = mysqli_query($con, "UPDATE commande SET  numClient = '$numClient' , dateCommande = '$dateCommande' WHERE numCommande = $numCommande");
                if($req){
                    //si la requête a été effectuée avec succès , on fait une redirection
                    header("location: commande.php");
                 }else{
                    //si non
                    $message = "Commande non modifié";
                 } 
                
            }else { 
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    ?>


    <div class="form">
        <a href="commande.php" class="back_btn"><img src="/projet_php/icons/returnmint.png"> Retour</a>
        <h2>Modifier la Commande : </h2>
        <p class="erreur_message">
            <?php
                if(isset($message)){
                    echo $message ;
                }
            ?>
        <form action="" method="POST">
            <input type="hidden"  name="numCommande" value=<?=$row['numCommande']?>>
            <label>Numéro de client</label>
            <input type="text" name="numClient" value="<?=$row['numClient']?>">
            <label>Date Commande</label>
            <input type="text" name="dateCommande" value="<?=$row['dateCommande']?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>