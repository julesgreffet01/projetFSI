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


$titrefichier = "Accueil";
$stylecss = "Tableau.css";
$bdd = initialiseConnexionBDD();
$etuDAO = new EtudiantDAO($bdd);
$tutDAO = new TuteurDAO($bdd);


if (unserialize($_SESSION['utilisateur'])){
    if (unserialize($_SESSION['utilisateur']) instanceof Administrateur){   //on verif que ce soit bien un admin ou un tuteur et pas  un etudiant
        $etus = $etuDAO->get4();
    } else if (unserialize($_SESSION['utilisateur']) instanceof Tuteur){
        $tut = $tutDAO->find(unserialize($_SESSION['utilisateur'])->getIdUti());
        $etus = $etuDAO->get4EtuByTut($tut);
    } else {
        header('location: ControllerConnexion.php');
    }
    include_once ('../View/Nav_Bar.php');
    include_once('../View/Accueil_Admin.php');
} else {
    header('location: ControllerConnexion.php');
}

