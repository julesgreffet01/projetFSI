<?php

use BO\Administrateur;
use BO\Bilan1;
use BO\Tuteur;
use DAO\Bilan1DAO;
use DAO\EtudiantDAO;

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
$Message = "";

if($uti instanceof Administrateur || $uti instanceof Tuteur){
    $idEtu = intval($_GET['idEtu']);
    $bil1DAO = new Bilan1DAO($bdd);
    $etuDAO = new EtudiantDAO($bdd);


    //probleme de l url
    if ($uti instanceof Tuteur) {
        $mesEtu = [];
        foreach ($uti->getMesEtu() as $e) {
            $mesEtu[] = $e->getIdUti();
        }

        if (in_array($idEtu, $mesEtu)) {
            $etu = $etuDAO->find($idEtu);
        } else {
            header("Location:ControllerAccueil_Admin.php");
        }
    }

    if ($uti instanceof Administrateur) {
        $mesEtu = [];
        foreach ($etuDAO->getAll() as $et) {
            $mesEtu[] = $et->getIdUti();
        }

        if (in_array($idEtu, $mesEtu)) {
            $etu = $etuDAO->find($idEtu);
        } else {
            header("Location:ControllerAccueil_Admin.php");
        }
    }
    if(isset($_POST['btnValid']) && $_POST['libBil'] != '' && $_POST['datVisEnt'] != '' && $_POST['notEnt'] != '' && $_POST['notOra'] != '' && $_POST['notDos'] != ''){
        $remBil = $_POST['remBil'] ?: '';
        $bil = new Bilan1($remBil, $_POST['notEnt'], new DateTime($_POST['datVisEnt']), 0, $_POST['libBil'], floatval($_POST['notDos']), floatval($_POST['notOra']), $etu);
        if($bil1DAO->create($bil)){
            header('Location: ControllerBilan1.php?idEtu='.$idEtu);
        } else {
            $Message = "echec de l ajout du bilan";
        }
    }

    if(isset($_POST['btnCancel'])){
        header('Location: ControllerDetail_Etudiant.php?idEtu='.$idEtu);
    }

} else {
    header('location: ControllerConnexion.php');
}

include_once __DIR__ . "/../View/Nav_Bar.php";
include_once __DIR__ . "/../View/Crea_Bilan1.php";
