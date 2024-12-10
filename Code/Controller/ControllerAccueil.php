<?php
session_start();

require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/DAO/AdministrateurDAO.php";     //on empeche pas l admin de changer l url pour acceder a ces pages la

require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";
require_once __DIR__."/../Model/BO/Administrateur.php";



$titrefichier = "Accueil";
$stylecss = "Blockinfo.css";



if (unserialize($_SESSION['utilisateur'])){
    include_once ('../View/Nav_Bar.php');
    include_once ('../View/Accueil_Etudiant.php');
} else {
    header('location: ControllerConnexion.php');
}



