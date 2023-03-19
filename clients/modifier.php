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
        //on récupère le numéro de client dans le lien
        $numClient = $_GET['numClient']; 
        //requête afficher les infos d'un client
        $req = mysqli_query($con , "SELECT * from client WHERE numClient = $numClient ");      
        $row = mysqli_fetch_assoc($req);
        

        //vérifier que le bouton ajouter a bien été cliqué
        if(isset($_POST['button'])){
            //extraction des informations envoyé dans des variables par la methode POST
            extract($_POST);
            //verifier que tous les champs ont été remplis
            if(isset($nom) && isset($rs) && isset($adresse) && isset($ville) && isset($pays) && isset($tele)){
                //requête de modification
                $req = mysqli_query($con, "UPDATE client SET  nomClient = '$nom' , raisonSocial = '$rs' , adresseClient = '$adresse' , villeClient = '$ville' , pays = '$pays' , telephone = '$tele' WHERE numClient = $numClient");
                if($req){
                    //si la requête a été effectuée avec succès , on fait une redirection
                    header("location: client.php");
                 }else{
                    //si non
                    $message = "Client non modifié";
                 } 
                
            }else { 
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    ?>


    <div class="form">
        <a href="client.php" class="back_btn"><img src="/projet_php/icons/returnmint.png"> Retour</a>
        <h2>Modifier le client : </h2>
        <p class="erreur_message">
            <?php
                if(isset($message)){
                    echo $message ;
                }
            ?>
        <form action="" method="POST">
            <input type="hidden"  name="num" value=<?=$row['numClient']?>>
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['nomClient']?>">
            <label>Raison Social</label>
            <input type="text" name="rs" value="<?=$row['raisonSocial']?>">
            <label>Adresse</label>
            <input type="text" name="adresse" value="<?=$row['adresseClient']?>">
            <label>Ville</label>
            <input type="text" name="ville" value="<?=$row['villeClient']?>">
            <label>Pays</label>
            <input type="text" name="pays" value="<?=$row['pays']?>">
            <label>Telephone</label>
            <input type="text" name="tele" value="<?=$row['telephone']?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>