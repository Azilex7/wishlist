<?php

// Les erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Les fichiers includes

include ("connexionBDD.php");
$title = "Inscription";
include ("head.php");
include ("header.php");

// On récupère les données envoyées par le formulaire
if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['repeatmdp'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $repeatMdp = $_POST['repeatmdp'];

    // On vérifie si l'email est déjà utilisée
    $sql ="SELECT * FROM user WHERE email = :email";
    $query = $db->prepare($sql);
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->execute();
    $verifEmail = $query->fetch();

    // Si l'adresse mail n'est pas dans la bbd on continue l'inscription
    if($verifEmail === false){
        // vérification des 2 mots de passs s'ils sont identiques
        if($mdp === $repeatMdp){
            // On hache le mot de passe
            $motdepassehash = password_hash($mdp, PASSWORD_DEFAULT);

            $sql = "INSERT INTO user (nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)";
            $query = $db->prepare($sql);
            $query->bindValue(':nom', $nom, PDO::PARAM_STR);
            $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':mdp', $motdepassehash, PDO::PARAM_STR);
            $query->execute();
            $query->closeCursor();

            // Redirection vers la page de connexion
            //header("Location: connexion.php");
        } else {
            echo "Les mots de passe ne correspondent pas, veuillez réessayer !";
        }
    } else {
        echo "Adresse mail incorrecte ou déjà utilisée !";
    }
}

?>

<form action="" method="post">
    <div class="form-inscription">
        <h1 class="inscription">Inscription</h1>
            <div class="form-margin-bottom">
                <label for="nom">Entrez votre Nom :</label>
                <input type="text" name="nom" id="nom" required="required">
            </div>
            <div class="form-margin-bottom">
                <label for="prenom">Entrez votre Prénom :</label>
                <input type="text" name="prenom" id="prenom" required="required">
            </div>
            <div class="form-margin-bottom">
                <label for="email">Entrez votre Email :</label>
                <input type="email" name="email" id="email" required="required">
            </div>
            <div class="form-margin-bottom">
                <label for="mdp">Entrez votre Mot de passe :</label>
                <input type="password" name="mdp" id="mdp" required="required">
            </div>
            <div class="form-margin-bottom">
                <label for="repeatmdp">Entrez à nouveau votre Mot de passe :</label>
                <input type="password" name="repeatmdp" id="repeatmdp" required="required">
            </div>
            <div class="center">
                <button type="submit" class="btn btn-outline-primary me-2 form-button-inscription"><a class="text-black">Inscription</a></button>
            </div>
    </div>
</form>

<?php 

include("footer.php");

?>