<?php

use DAO\EntrepriseDAO;
use DAO\MaitreApprentissageDAO;

session_start();

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/DAO/EntrepriseDAO.php";
require_once __DIR__."/../Model/DAO/MaitreApprentissageDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

$titrefichier = "Accueil";
$stylecss = "Parametre.css";
$titreparametre = "Maitre d'apprentissage";
$bdd = initialiseConnexionBDD();


if (unserialize($_SESSION['utilisateur'])){
    $entDAO = new EntrepriseDAO($bdd);
    $maDAO = new MaitreApprentissageDAO($bdd);

    $mas = $maDAO->getAll();
    $ents = $entDAO->getAll();


    include_once ('../View/header_admin.php');
    include_once '../View/Page_Parametre_Maitre_Apprentissage.php';
} else {
    header ('location: ControllerConnexion.php');
}

