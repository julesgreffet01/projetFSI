<?php

use BO\Administrateur;
use BO\Etudiant;
use BO\Tuteur;
use DAO\AdministrateurDAO;
use DAO\EtudiantDAO;
use DAO\TuteurDAO;

session_start();

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";
require_once  __DIR__ ."/../Model/BO/Specialite.php";
require_once  __DIR__ ."/../Model/BO/MaitreApprentissage.php";
require_once  __DIR__ ."/../Model/BO/Entreprise.php";
require_once  __DIR__ ."/../Model/BO/Bilan1.php";
require_once  __DIR__ ."/../Model/BO/Bilan2.php";
require_once  __DIR__ ."/../Model/BO/Classe.php";

require_once  __DIR__ ."/../Model/DAO/AdministrateurDAO.php";
require_once  __DIR__ ."/../Model/DAO/EtudiantDAO.php";
require_once  __DIR__ ."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

$titrefichier = "Profil";
$stylecss = "Parametre.css";
$titreparametre = "Profil";
$uti = unserialize($_SESSION['utilisateur']);
$bdd = initialiseConnexionBDD();
$message = "";

if ($uti) {
    if (isset($_POST['btnProfil']) && $_POST['identifiant'] !== "" && $_POST['password'] !== "") {
        if ($uti instanceof Administrateur) {
            $uti->setLogUti($_POST['identifiant']);
            $uti->setMdpUti($_POST['password']);
            $adminDAO = new AdministrateurDAO($bdd);
            $verif = $adminDAO->update($uti);
            if ($verif) {
                $message = "Identifiant et mot de passe modifier";
            }
        } else if ($uti instanceof Etudiant) {
            $uti->setLogUti($_POST['identifiant']);
            $uti->setMdpUti($_POST['password']);
            $etuDAO = new EtudiantDAO($bdd);
            $verif = $etuDAO->update($uti);
            if ($verif) {
                $message = "Identifiant et mot de passe modifier";
            }
        } else if ($uti instanceof Tuteur) {
            $uti->setLogUti($_POST['identifiant']);
            $uti->setMdpUti($_POST['password']);
            $tutDAO = new TuteurDAO($bdd);
            $verif = $tutDAO->update($uti);
            if ($verif) {
                $message = "Identifiant et mot de passe modifier";
            }
        } else {
            header('location: ControllerConnexion.php');
        }
    }
} else {
    header('location: ControllerConnexion.php');
}
include_once ('../View/header_admin.php');
include_once ('../View/Page_Parametre_Profil.php');