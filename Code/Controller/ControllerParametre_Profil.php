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
$stylecss3 = "Bouton.css";
$uti = unserialize($_SESSION['utilisateur']);
$bdd = initialiseConnexionBDD();
$message = "";
$verif = false;                                 //c est pour savoir si on met le message en rouge ou en vert
if($uti instanceof Etudiant || $uti instanceof Tuteur){
$stylecss2 = "Profiletu.css";
}
if ($uti) {
    if (isset($_POST['btnProfil']) && $_POST['identifiant'] !== "" && $_POST['password'] !== "") {
        if ($uti instanceof Administrateur) {
            $adminDAO = new AdministrateurDAO($bdd);
            if ($uti->getLogUti() != $_POST['identifiant']) {
                if ($adminDAO->verifLog($_POST['identifiant'])){
                    $message = "Log deja utiliser";
                    $verif = false;
                } else {
                    $uti->setLogUti($_POST['identifiant']);
                    $uti->setMdpUti($_POST['password']);

                    if ($adminDAO->update($uti)) {
                        $message = "Identifiant et mot de passe modifier";
                        $verif = true;
                    } else {
                        $message = "erreur update";
                        $verif = false;
                    }
                }
            } else {
                $uti->setMdpUti($_POST['password']);

                if ($adminDAO->update($uti)) {
                    $message = "Identifiant et mot de passe modifier";
                    $verif = true;
                } else {
                    $message = "erreur update";
                    $verif = false;
                }
            }

        } else if ($uti instanceof Etudiant) {
            $etuDAO = new EtudiantDAO($bdd);
            if ($uti->getLogUti() != $_POST['identifiant']) {
                if ($etuDAO->verifLog($_POST['identifiant'])){
                    $message = "Log deja utiliser";
                    $verif = false;
                } else {
                    $uti->setLogUti($_POST['identifiant']);
                    $uti->setMdpUti($_POST['password']);

                    if ($etuDAO->update($uti)) {
                        $message = "Identifiant et mot de passe modifier";
                        $verif = true;
                    }
                }
            } else {
                $uti->setMdpUti($_POST['password']);

                if ($etuDAO->update($uti)) {
                    $message = "Identifiant et mot de passe modifier";
                    $verif = true;
                }
            }

        } else if ($uti instanceof Tuteur) {
            $tutDAO = new TuteurDAO($bdd);
            if ($uti->getLogUti() != $_POST['identifiant']) {
                if ($tutDAO->verifLog($_POST['identifiant'])){
                    $message = "Log deja utiliser";
                    $verif = false;
                } else {
                    $uti->setLogUti($_POST['identifiant']);
                    $uti->setMdpUti($_POST['password']);
                    if ($tutDAO->update($uti)) {
                        $message = "Identifiant et mot de passe modifier";
                        $verif = true;
                    }
                }
            } else {
                $uti->setMdpUti($_POST['password']);
                if ($tutDAO->update($uti)) {
                    $message = "Identifiant et mot de passe modifier";
                    $verif = true;
                }
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