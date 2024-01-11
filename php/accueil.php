<?php

// Les erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Les fichiers includes
include ("connexionBDD.php");
$title = "Accueil";
include ("head.php");
include ("header.php");

?>

<div class="all-accueil">
    <div class="accueil">
        <h1 class="bienvenue">Bienvenue sur Amazon !</h1>
                <p>Sur Amazon, nous transformons vos envies en réalité. Notre plateforme unique vous permet de créer des listes de souhaits personnalisées en regroupant les articles qui vous font rêver.</p>

        <div class="fonctionne">
            <h2>Comment ça fonctionne :</h2>
            <ol class="ol">
                <li><strong>Explorez notre catalogue :</strong> Parcourez une vaste gamme d'articles soigneusement sélectionnés, des dernières tendances aux classiques intemporels.</li>
                <li><strong>Ajoutez à votre liste de souhaits :</strong> Créez des listes pour chaque occasion, que ce soit une liste de cadeaux d'anniversaire, une liste de mariage ou une simple liste de favoris. Ajoutez-y les articles qui capturent votre imagination.</li>
                <li><strong>Gérez vos listes :</strong> Modifiez, organisez et partagez vos listes avec vos proches. Faites en sorte que chaque moment spécial soit parfait en ayant exactement ce dont vous rêvez.</li>
                <li><strong>Achetez quand le moment est venu :</strong> Une fois que votre liste est prête, passez à l'étape suivante et transformez vos souhaits en réalité. Achetez les articles directement depuis votre liste de souhaits, en toute simplicité.</li>
            </ol>
        </div>

        <div class="pourquoi">
            <h2>Pourquoi choisir Amazon :</h2>
            <ul class="ul">
                <li><strong>Facilité d'utilisation :</strong> Notre interface conviviale rend la gestion de vos listes de souhaits un jeu d'enfant.</li>
                <li><strong>Large sélection :</strong> Explorez une variété d'articles de qualité, adaptés à tous les goûts et à toutes les occasions.</li>
                <li><strong>Achat simplifié :</strong> Économisez du temps et de l'énergie en achetant directement depuis vos listes de souhaits.</li>
            </ul>
        </div>

        <p>Chez Amazon, nous croyons que chaque achat devrait être une expérience agréable. Transformez vos rêves en réalité dès aujourd'hui. Explorez, rêvez, achetez.</p>
    </div>
</div>