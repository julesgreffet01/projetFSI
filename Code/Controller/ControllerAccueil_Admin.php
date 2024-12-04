<?php
session_start();

use BO\Administrateur;
require_once __DIR__."/../Model/DAO/AdministrateurDAO.php";
require_once __DIR__."/../Model/BO/Administrateur.php";


$titrefichier = "Accueil";
$stylecss = "Tableau.css";


if (unserialize($_SESSION['utilisateur'])){                                 //on verif qu il y ai bien un utilisateur
    if (unserialize($_SESSION['utilisateur']) instanceof Administrateur){   //on verif que ce soit bien un admin et pas un tuteur ou un etudiant
    //if (true){
        include_once ('../View/Nav_Bar.php');
        include_once('../View/Accueil_Admin.php');
    }
}

