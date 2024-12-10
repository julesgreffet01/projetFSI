<?php
use BO\Administrateur;
use BO\Tuteur;

session_start();

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";
require_once  __DIR__ ."/../Model/BO/Specialite.php";
require_once  __DIR__ ."/../Model/BO/MaitreApprentissage.php";
require_once  __DIR__ ."/../Model/BO/Entreprise.php";
require_once  __DIR__ ."/../Model/BO/Bilan1.php";
require_once  __DIR__ ."/../Model/BO/Bilan2.php";
require_once  __DIR__ ."/../Model/BO/Classe.php";

$titrefichier = "Accueil";
$stylecss = "Blockinfo.css";
$stylecss3 = "Bouton.css";


include_once ('../View/Nav_Bar.php');
include_once ('../View/Bilan1.php');
$uti = unserialize($_SESSION['utilisateur']);

if ($uti){
    if ($uti instanceof Administrateur){
        //TODO finir le html
    } else if ($uti instanceof Tuteur){

    } else {
        header('Location: ControllerConnexion.php');
    }
} else {
    header('Location: ControllerConnexion.php');
}



