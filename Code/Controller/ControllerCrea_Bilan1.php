<?php

use BO\Bilan1;
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

if($uti){
    $idEtu = intval($_GET['idEtu']);
    $bil1DAO = new Bilan1DAO($bdd);
    $etuDAO = new EtudiantDAO($bdd);
    $etu = $etuDAO->find($idEtu);
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
