<?php

use BO\Administrateur;
use BO\Bilan;
use BO\Tuteur;
use DAO\Bilan1DAO;

session_start();

require_once __DIR__."/../Model/DAO/AdministrateurDAO.php";
require_once __DIR__."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";


$titrefichier = "Modifier mon bilan";
$stylecss = "Blockinfo.css";
$stylecss3 = "Bouton.css";
$bdd = initialiseConnexionBDD();
$uti = unserialize($_SESSION['utilisateur']);

if($uti instanceof Administrateur || $uti instanceof Tuteur){
        $idBil = intval($_GET['id']);
        $bil1DAO = new Bilan1DAO($bdd);
        $bil1 = $bil1DAO->find($idBil);
        if(isset($_POST['btnValid']) && $_POST['libBil'] != '' && $_POST['datVisEnt'] != '' && $_POST['notEnt'] != '' && $_POST['notOra'] != '' && $_POST['notDos'] != ''){
            //TODO finir la partie modif
        }
} else {
    header('Location: ControllerConnexion.php');
}
include_once ('../View/Nav_Bar.php');
include_once ('../View/Modif_Bilan1.php');