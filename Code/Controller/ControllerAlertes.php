<?php
session_start();

use BO\Administrateur;
use BO\Tuteur;
use BO\Etudiant;
use DAO\AlerteDAO;
use DAO\EtudiantDAO;
use DAO\TuteurDAO;

require_once __DIR__."/../Model/DAO/AdministrateurDAO.php";
require_once __DIR__."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/DAO/AlerteDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";
require_once __DIR__."/../Model/BO/Alerte.php";

$bdd = initialiseConnexionBDD();
$etuDAO = new EtudiantDAO($bdd);
$tutDAO = new TuteurDAO($bdd);
$alDAO = new AlerteDAO($bdd);

$titrefichier = "Accueil";
$stylecss = "Tableau.css";
$ojd = date('d/m/Y');             //au cas ou il faut afficher la date d ojd
$date = new DateTime();                 //date d ojd


$al = $alDAO->find(1);
$datLim1 = $al->getDatLimBil1();
$datLim2 = $al->getDatLimBil2();

$dif1 = $datLim1->diff($date);
$dif1Day = $dif1->days;
if ($date > $datLim1) {
    $years1 = $dif1->y;
    $month1 = $dif1->m;
    $day1 = $dif1->d;
} else {
    $years1 = null;
    $month1 = null;
    $day1 = null;
}

$dif2 = $datLim2->diff($date);
$dif2Day = $dif2->days;
if ($date > $datLim2) {
    $years2 = $dif2->y;
    $month2 = $dif2->m;
    $day2 = $dif2->d;
} else {
    $years2 = null;
    $month2 = null;
    $day2 = null;
}



if (unserialize($_SESSION['utilisateur'])) {
    if (unserialize($_SESSION['utilisateur']) instanceof Administrateur) {
        $al1 = $alDAO->getAllAl1();
        $al2 = $alDAO->getAllAl2();
        $messAl = "Aucunes alertes pour aucuns eleves";
    } else if (unserialize($_SESSION['utilisateur']) instanceof Tuteur) {
        $al1 = $alDAO->getAllAl1ByTut(unserialize($_SESSION['utilisateur']));
        $al2 = $alDAO->getAllAl2ByTut(unserialize($_SESSION['utilisateur']));
        $messAl = "Aucunes alertes pour vos eleves";
    } else {
        header('location: ControllerConnexion.php');
    }
} else {
    header('location: ControllerConnexion.php');
}
include_once ('../View/Nav_Bar.php');
include_once ('../View/Page_Alertes.php');