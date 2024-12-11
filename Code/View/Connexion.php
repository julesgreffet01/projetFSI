<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../Css/Style_Connexion.css" rel="stylesheet" />
    <title>Connexion</title>
</head>
<body>
<div class="contenu">
    <div class="vert">
        <img class="logo" src="../Img/logo.jpeg">
        <div class="title">
            Bienvenue sur le site FSI
        </div>
        <div class="info">
            <p>
                La plateforme de tutorat FSI permet un suivi<br>
                optimisé des étudiants en alternance, en simplifiant<br>
                les échanges avec leurs tuteurs et la coordinatrice.<br>
                Avec des profils dédiés et des alertes automatiques,<br>
                elle centralise les bilans, évaluations, et rappels<br>
                importants. Cette solution offre un espace sécurisé<br>
                et interactif pour une gestion fluide et efficace<br>
                du tutorat en entreprise.
            </p>
        </div>
    </div>
    <div class="blanc">
        <div class="titleconnect">
            <h1>Connexion</h1>
        </div>
        <form action="../Controller/ControllerConnexion.php" method="POST">
            <input type="text" class="libelle" name="log">
            <input type="text" class="libelle" name="mdp">
            <div class="mdp">
            <a href="#">Mot de passe oublié</a>
            </div>
            <div class="boutton">
<!--                <a href="Accueil_Admin.php">Connexion</a>-->
            <input type="submit" value="Connexion" name="btnConnexion">
            </div>
        </form>

        <?php

        $errorMessage="Veuillez remplir tout les champs";

        if ($errorMessage != ""){
            echo $errorMessage;
        }
        ?>

        <!--        mettre le message d erreur quelque part qui se nomme $errorMessage et qui renvoie si tous les champs ne sont pas remplie ou si le log ou mdp sont faux-->
    </div>
</div>
</body>
</html>