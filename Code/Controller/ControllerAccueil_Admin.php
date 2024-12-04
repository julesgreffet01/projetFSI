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


$titrefichier = "Accueil";
$stylecss = "Tableau.css";


if (unserialize($_SESSION['utilisateur'])){                                 //on verif qu il y ai bien un utilisateur
    if (unserialize($_SESSION['utilisateur']) instanceof Administrateur || unserialize($_SESSION['utilisateur']) instanceof Tuteur){   //on verif que ce soit bien un admin ou un tuteur et pas  un etudiant
        include_once ('../View/Nav_Bar.php');
        include_once('../View/Accueil_Admin.php');
    } else {
        header('location: ControllerConnexion.php');
    }
} else {
    header('location: ControllerConnexion.php');
}

