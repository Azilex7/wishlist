<?php

// Les erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Les fichiers includes
include("connexionBDD.php");
$title = "Articles";
include("head.php");
include("header.php");

// Requête SQL pour afficher tous les articles
$sql = "SELECT * FROM article";
$queryAfficherArticles = $db->prepare($sql);
$queryAfficherArticles->execute(); 

echo '<div class="row">';
while ($article = $queryAfficherArticles->fetch(PDO::FETCH_ASSOC)) {
    // Vous pouvez accéder à chaque colonne de la table ici
    echo '<div class="col-md-4">';
    echo '<div class="article">';
    echo '<img src="' . $article['image'] . '" alt="Image article" class="img-fluid">';
    echo '<h2>' . $article['nom'] . '</h2>';
    echo '<p class="price">' . $article['prix'].' €' . '</p>';
    echo '<p class="description">' . $article['description'] . '</p>';
    echo '<button type="button" class="btn btn-outline-danger me-2 like-article" data-article-id="' . $article['id'] . '"><a class="text-black">Like</a></button>';
    echo '</div>';
    echo '</div>';
}
echo '</div>';

$queryAfficherArticles->closeCursor();

?>