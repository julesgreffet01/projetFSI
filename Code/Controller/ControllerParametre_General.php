<?php
session_start();

use BO\Administrateur;
use BO\Tuteur;
use BO\Etudiant;

require_once __DIR__."/../Model/DAO/AdministrateurDAO.php";
require_once __DIR__."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";


$titrefichier = "Général";
$stylecss = "Parametre.css";
$titreparametre = "Général";


if (unserialize($_SESSION['utilisateur'])){
    if (unserialize($_SESSION['utilisateur']) instanceof Administrateur){
        include('../View/header_admin.php');
        include('../View/Page_Parametre_General.php');
    } else {
        header('location: ControllerConnexion.php');
    }
} else {
    header('location: ControllerConnexion.php');
}
