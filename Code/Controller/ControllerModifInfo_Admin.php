<?php
session_start();

use BO\Tuteur;
use BO\Administrateur;
use DAO\AdministrateurDAO;
use DAO\TuteurDAO;

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Tuteur.php";

require_once  __DIR__ ."/../Model/DAO/AdministrateurDAO.php";
require_once  __DIR__ ."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

$bdd = initialiseConnexionBDD();


if (unserialize($_SESSION['utilisateur']) instanceof Administrateur){
    $nameof = "Admin";
    $Admin = new AdministrateurDAO($bdd);
    $utilisateur = $Admin->find(unserialize($_SESSION['utilisateur'])->getIdUti());
}elseif (unserialize($_SESSION['utilisateur']) instanceof Tuteur){
    $nameof = "Tuteur";
    $Tuteur = new TuteurDAO($bdd);
    $utilisateur = $Tuteur->find(unserialize($_SESSION['utilisateur'])->getIdUti());
}


$titrefichier = "Modification info ".$nameof;
$stylecss = "Blockinfo.css";
$stylecss2 = "Bouton.css";


include_once ('../View/Nav_Bar.php');
include_once ('../View/ModifInfo_Admin.php');