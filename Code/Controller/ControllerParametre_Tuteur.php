<?php

use BO\Administrateur;
use DAO\TuteurDAO;

session_start();

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";

require_once __DIR__."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

$titrefichier = "Paramètre Tuteur";
$stylecss = "Parametre.css";
$titreparametre = "Tuteur";
$bdd = initialiseConnexionBDD();



if (unserialize($_SESSION["utilisateur"]) instanceof Administrateur) {
    $tutDAO = new TuteurDAO($bdd);
    $tuts = $tutDAO->getAll();
    include_once ('../View/header_admin.php');
    include_once ('../View/Page_Parametre_Tuteur.php');
}
