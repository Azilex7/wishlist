<?php

// Les erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Les fichiers includes

include ("connexionBDD.php");
$title = "Connexion";
include ("head.php");
include ("header.php");

// On récupère les données envoyées par le formulaire
if (!empty($_POST['email']) && !empty($_POST['mdp'])){
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    // Vérification de l'email
    $sql ="SELECT * FROM user WHERE email = :email";
    $query = $db->prepare($sql);
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->execute();
    $verifEmail = $query->fetch(PDO::FETCH_ASSOC);

    // Vérification du mot de passe
    if ($verifEmail && password_verify($mdp, $verifEmail['mdp'])){
        //echo "Connexion réussie";

        include("sessionstart.php");
        $_SESSION["id"] = $verifEmail['id'];
        $_SESSION["nom"] = $verifEmail['nom'];
        $_SESSION["prenom"] = $verifEmail['prenom'];
        $_SESSION["logged"] = true;
        echo $_SESSION["id"], $_SESSION["nom"], $_SESSION["prenom"], $_SESSION["logged"];

        header("Location: espacepersonnel.php");
    } else {
        echo "Adresse mail ou mot de passe incorrect";
    }
}

?>

<form action="" method="post">
    <div class="form-connexion">
        <h1 class="connexion">Connexion</h1>
            <div class="form-margin-bottom">
                <label for="email">Entrez votre Email :</label>
                <input type="email" name="email" id="email" required="required">
            </div>
            <div class="form-margin-bottom">
                <label for="mdp">Entrez votre Mot de passe :</label>
                <input type="password" name="mdp" id="mdp" required="required">
            </div>
            <div class="center">
                <button type="submit" name="connexion" class="btn btn-outline-primary me-2 form-button-connexion"><a class="text-black">Connexion</a></button>
            </div>
    </div>
</form>

<?php 

//include("footer.php");

?>