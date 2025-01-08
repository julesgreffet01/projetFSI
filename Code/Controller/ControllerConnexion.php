<?php
session_start();

use DAO\AdministrateurDAO;
use DAO\EntrepriseDAO;
use DAO\EtudiantDAO;
use DAO\TuteurDAO;

require_once __DIR__."/../Model/BDDManager.php";
require_once __DIR__."/../Model/DAO/AdministrateurDAO.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/DAO/EntrepriseDAO.php";

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Tuteur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";

$bdd = initialiseConnexionBDD();
$adminDAO = new AdministrateurDAO($bdd);
$tuteurDAO = new TuteurDAO($bdd);
$etudiantDAO = new EtudiantDAO($bdd);
$entrepriseDAO = new EntrepriseDAO($bdd);

$_SESSION = [];
$errorMessage = "";
$baseUrl = dirname($_SERVER['PHP_SELF']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {     //on verif que ce soit bien une methode post qui nous est envoyé
    $log = $_POST["log"];
    $mdp = $_POST["mdp"];

    if ($log && $mdp) {
        $etu = $etudiantDAO->auth($log, $mdp);
        $tut = $tuteurDAO->auth($log, $mdp);
        $admin = $adminDAO->auth($log, $mdp);
        if ($etu) {
            $_SESSION['utilisateur'] = serialize($etu);         //on met l'objet de l'utilisateur dans un $_SESSION et sa marche pas sans le serialize
            header('Location: ' . $baseUrl . '/ControllerAccueil.php');
            exit;
        }
        else if ($tut) {
            $_SESSION['utilisateur'] = serialize($tut);
            header('Location:'.$baseUrl.'/ControllerAccueil_Admin.php');
            exit;
        }
        else if ($admin) {
            $_SESSION['utilisateur'] = serialize($admin);
            header('Location: ' . $baseUrl . '/ControllerAccueil_Admin.php');
            exit;
        } else {
            $errorMessage = "Login ou mot de passe incorrect";
        }
    } else {
        $errorMessage = "Veuillez remplir tous les champs";
    }
}

include_once "../View/Connexion.php";