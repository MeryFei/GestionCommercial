<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Client</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($nom) && isset($rs) && isset($adresse) && isset($ville)  && isset($pays) && isset($tele)){
                //connexion à la base de donnée
                include_once "connexion.php";
                //requête d'ajout
                $req = mysqli_query($con , "INSERT INTO client VALUES(NULL, '$nom', '$rs','$adresse','$ville','$pays','$tele')");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: client.php");
                }else {//si non
                    $message = "Client non ajouté";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="client.php" class="back_btn"><img src="/projet_php/icons/returnmint.png"> Retour</a>
        <h2>Ajouter un client</h2>
        <p class="erreur_message">
            <?php 
            // si la variable message existe , affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>Raison Social</label>
            <input type="text" name="rs">
            <label>Adresse</label>
            <input type="text" name="adresse">
            <label>Ville</label>
            <input type="text" name="ville">
            <label>Pays</label>
            <input type="text" name="pays">
            <label>Telephone</label>
            <input type="text" name="tele">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>