<?php 

include("sessionstart.php");

if (isset($_POST["deconnexion"])){
  $_SESSION["logged"] = false;

  session_write_close();

  header("Location: connexion.php");
  exit();
}

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="accueil.php">ACCUEIL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link text-white" href="articles.php">ARTICLES</a>
        <a class="nav-link text-white" href="espacepersonnel.php">ESPACE PERSONNEL</a>
      </div>
      <div class="navbar-nav ms-auto">
        <?php if ($_SESSION["logged"] === true) : ?>
            <div class="button-connexion-inscription">
                <form method="post" action="">
                    <button type="submit" name="deconnexion" class="btn btn-outline-primary me-2 form-button-connexion">
                        <a class="text-black">Se déconnecter</a>
                    </button>
                </form>
            </div>
        <?php else : ?>
            <div class="button-connexion-inscription">
                <button type="button" class="btn btn-outline-primary me-2">
                    <a class="text-black" href="connexion.php">Connexion</a>
                </button>
                <button type="button" class="btn btn-primary">
                    <a class="text-black" href="inscription.php">Inscription</a>
                </button>
            </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>