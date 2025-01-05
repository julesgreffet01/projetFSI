<?php

use BO\Administrateur;
use BO\Tuteur;
use DAO\AdministrateurDAO;
use DAO\TuteurDAO;

session_start();
require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";
require_once __DIR__."/../Model/BO/Specialite.php";
require_once __DIR__."/../Model/BO/Classe.php";

require_once  __DIR__ ."/../Model/DAO/AdministrateurDAO.php";
require_once  __DIR__ ."/../Model/DAO/EtudiantDAO.php";
require_once  __DIR__ ."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/BDDManager.php";


$titrefichier = "Accueil";
$stylecss = "Blockinfo.css";
$stylecss2 = "Bouton.css";
$bdd = initialiseConnexionBDD();
$uti = unserialize($_SESSION['utilisateur']);


if ($uti instanceof Tuteur) {
    $tutDAO = new TuteurDAO($bdd);
    $utilisateur = $tutDAO->find($uti->getIdUti());
} else if ($uti instanceof Administrateur) {
    $adminDAO = new AdministrateurDAO($bdd);
    $utilisateur = $adminDAO->find($uti->getIdUti());
} else {
    header('Location: ControllerConnexion.php');
}
include_once ('../View/Nav_Bar.php');
include_once ('../View/Page_Info_Admin.php');
