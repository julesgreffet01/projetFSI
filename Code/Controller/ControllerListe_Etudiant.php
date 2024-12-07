<?php
session_start();

use BO\Administrateur;
use BO\Tuteur;
use BO\Etudiant;
use DAO\EtudiantDAO;
use DAO\TuteurDAO;

require_once __DIR__."/../Model/DAO/AdministrateurDAO.php";
require_once __DIR__."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";

$bdd = initialiseConnexionBDD();
$etuDAO = new EtudiantDAO($bdd);
$tutDAO = new TuteurDAO($bdd);

$titrefichier = "Accueil";
$stylecss = "Tableau.css";


if (unserialize($_SESSION['utilisateur'])){
    if (unserialize($_SESSION['utilisateur']) instanceof Administrateur){
        $mesEtus = $etuDAO->getAll();
    } else if (unserialize($_SESSION['utilisateur']) instanceof Tuteur){
        $tut = $tutDAO->find($_SESSION['utilisateur']->getIdUti());
        $mesEtus = $etuDAO->getAllEtuByTut($tut);
    } else {
        header('location: ControllerConnexion.php');
    }
    include_once ('../View/Nav_Bar.php');
    include_once ('../View/Page_Liste_Etudiant.php');
} else {
    header('location: ControllerConnexion.php');
}



