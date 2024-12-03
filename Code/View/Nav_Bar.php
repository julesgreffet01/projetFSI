<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= isset($titrefichier) ? $titrefichier : "Titre par défaut"; ?></title>
    <link href="../Css/Style_header.css" rel="stylesheet" />
    <link href="../Css/<?= isset($stylecss) ? $stylecss : "Styledefault.css"; ?>" rel="stylesheet" />

</head>
<body>
<header>
    <a href="Acceuil_Admin.php"><img class="logo" src="../Img/logo.jpeg"></a>

    <nav>
        <ul class="liens">
            <div class="nomentreprise">
                <li><a href="Acceuil_Admin.php">FSI</a></li>
            </div>
            <li><a href="Page_Liste_Etudiant.php">Liste étudiant</a></li>
            <li><a href="Page_Info_Admin.php">Mes informations</a></li>
            <li><a href="Page_Alertes.php">Alertes</a></li>
            <li><a href="Page_Parametre_General.php">Paramètre</a></li>
            <li><a href="Leaves"><img class="logosortie"src="../Img/logout.png"></a></li>
        </ul>
    </nav>
</header>

