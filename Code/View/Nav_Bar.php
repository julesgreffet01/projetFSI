
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
    <link href="../Css/<?= isset($stylecss2) ? $stylecss2 : "Styledefault.css"; ?>" rel="stylesheet" />
    <link href="../Css/<?= isset($stylecss3) ? $stylecss3 : "Styledefault.css"; ?>" rel="stylesheet" />

</head>
<body>
<header>

    <?php if(unserialize($_SESSION['utilisateur']) instanceof \BO\Tuteur || unserialize($_SESSION['utilisateur']) instanceof \BO\Administrateur){ ?>
    <a href="ControllerAccueil_Admin.php"><img class="logo" src="../Img/logo.jpeg"></a>
    <?php } else { ?>
    <a href="ControllerAccueil.php"><img class="logo" src="../Img/logo.jpeg"></a>
    <?php } ?>

    <nav>
        <div class="nomentreprise">
            <?php if(unserialize($_SESSION['utilisateur']) instanceof \BO\Tuteur || unserialize($_SESSION['utilisateur']) instanceof \BO\Administrateur){ ?>
                <li><a href="ControllerAccueil_Admin.php">FSI</a></li>
            <?php } else { ?>
                <li><a href="ControllerAccueil.php">FSI</a></li>
            <?php } ?>
        </div>
        <?php
            $utilisateur = unserialize($_SESSION['utilisateur']);
            $nomUti = method_exists($utilisateur, 'getNomUti') ? $utilisateur->getNomUti() : '';
            $preUti = method_exists($utilisateur, 'getPreUti') ? $utilisateur->getPreUti() : '';
        ?>
        <div class="utilisateur-connecte">
            Connecté en tant que : <strong><?= ($preUti . ' ' . $nomUti) ?></strong>
        </div>
        <ul class="liens">
            <?php if (unserialize($_SESSION['utilisateur']) instanceof \BO\Tuteur){ ?>
                <li><a href="ControllerListe_Etudiant.php">Liste étudiant</a></li>
            <?php } else if (unserialize($_SESSION['utilisateur']) instanceof \BO\Administrateur){?>
                <li><a href="ControllerListe_Etudiant.php">Liste étudiant</a></li>
            <?php } ?>

            <?php if (unserialize($_SESSION['utilisateur']) instanceof \BO\Etudiant){?>
            <li><a href="ControllerInfo_Etudiant.php">Mes informations</a></li>
            <?php }else if (unserialize($_SESSION['utilisateur']) instanceof \BO\Tuteur){ ?>
            <li><a href="ControllerInfo_Admin.php">Mes informations</a></li>
            <?php } else if (unserialize($_SESSION['utilisateur']) instanceof \BO\Administrateur){?>
            <li><a href="ControllerInfo_Admin.php">Mes informations</a></li>
            <?php } ?>

            <?php if (unserialize($_SESSION['utilisateur']) instanceof \BO\Tuteur || unserialize($_SESSION['utilisateur']) instanceof \BO\Administrateur): ?>
            <li><a href="ControllerAlertes.php">Alertes</a></li>
            <?php endif; ?>

            <?php if (unserialize($_SESSION['utilisateur']) instanceof \BO\Administrateur){?>
            <li><a href="ControllerParametre_General.php">Paramètre</a></li>
            <?php } else if (unserialize($_SESSION['utilisateur']) instanceof \BO\Tuteur || unserialize($_SESSION['utilisateur']) instanceof \BO\Etudiant){ ?>
            <li><a href="ControllerParametre_Profil.php">Profil</a></li>
            <?php } ?>
            <li><a href="Leaves.php"><img class="logosortie" src="../Img/logout.png"></a></li>
        </ul>
    </nav>
</header>

