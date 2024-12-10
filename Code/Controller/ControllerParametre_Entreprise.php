<?php

use BO\Administrateur;
use DAO\EntrepriseDAO;

session_start();


require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Entreprise.php";

require_once __DIR__."/../Model/DAO/EntrepriseDAO.php";
require_once __DIR__."/../Model/BDDManager.php";


$titrefichier = "Entreprise";
$stylecss = "Parametre.css";
$titreparametre = "Entreprise";
$bdd = initialiseConnexionBDD();
$Message = "";



if (unserialize($_SESSION['utilisateur']) instanceof Administrateur) {
    $entDAO = new EntrepriseDAO($bdd);
    $ents = $entDAO->getAll();
    include_once ('../View/header_admin.php');
    include_once ('../View/Page_Parametre_Entreprise.php');
} else {
    header('Location: ControllerConnexion.php');
}
