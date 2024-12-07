<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= isset($titrefichier) ? $titrefichier : "Titre par défaut"; ?></title>
    <link href="../Css/Style_header_Admin.css" rel="stylesheet" />
    <link href="../Css/<?= isset($stylecss) ? $stylecss : "Styledefault.css"; ?>" rel="stylesheet" />

</head>
<body>
<header>
    <div class="maison">
    <a href="ControllerAccueil_Admin.php"><img src="../Img/home.svg"></a>
    </div>
    <div class="parametre_title">
        <h1><?= isset($titreparametre) ? $titreparametre : "Paramètre"; ?></h1>
    </div>
    <nav>
        <ul>
            <li><a href="Page_Parametre_Profil.php"><img src="../Img/Profil.svg"> Profil</a> </li>
            <li><a href="Page_Parametre_Etudiant.php"><img src="../Img/Etudiant.svg"> Etudiant</a> </li>
            <li><a href="Page_Parametre_Tuteur.php"><img src="../Img/mentor.svg"> Tuteur</a> </li>
            <li><a href="Page_Parametre_Affectation.php"><img src="../Img/Affectation.svg"> Affectation</a> </li>
            <li><a href="Page_Parametre_Entreprise.php"><img src="../Img/Entreprise.svg"> Entreprise</a> </li>
            <li><a href="Page_Parametre_Classe.php"><img src="../Img/salle-de-cours.svg"> Classe</a> </li>
            <li><a href="Page_Parametre_Maitre_Apprentissage.php"><img src="../Img/Eleve.svg"> Maître d'apprentissage</a> </li>
            <li><a href="Page_Parametre_Specialite.php"><img src="../Img/Enseignant.svg"> Spécialité</a> </li>
        </ul>
    </nav>
</header>
</body>
</html>