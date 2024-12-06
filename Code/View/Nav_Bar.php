
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
                <li><a href="Accueil_Admin.php">FSI</a></li>
            </div>

            <?php if (unserialize($_SESSION['utilisateur']) instanceof \BO\Tuteur){ ?>
                <li><a href="Controller_Liste_Etudiant">Liste étudiant</a></li>
            <?php } else if (unserialize($_SESSION['utilisateur']) instanceof \BO\Administrateur){?>
                <li><a href="Controller_Liste_Etudiant">Liste étudiant</a></li>
            <?php } ?>

            <?php if (unserialize($_SESSION['utilisateur']) instanceof \BO\Etudiant){?>
            <li><a href="#etudiant">Mes informations</a></li>
            <?php }else if (unserialize($_SESSION['utilisateur']) instanceof \BO\Tuteur){ ?>
            <li><a href="#tuteur">Mes informations</a></li>
            <?php } else if (unserialize($_SESSION['utilisateur']) instanceof \BO\Administrateur){?>
            <li><a href="#admin">Mes informations</a></li>
            <?php } ?>

            <li><a href="Page_Alertes.php">Alertes</a></li>

            <?php if (unserialize($_SESSION['utilisateur']) instanceof \BO\Administrateur){?>
            <li><a href="ControllerParametre_General">Paramètre</a></li>
            <?php } ?>

            <li><a href="Leaves"><img class="logosortie" src="../Img/logout.png"></a></li>
        </ul>
    </nav>
</header>

