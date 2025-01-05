<?php

use BO\Bilan2;
use DAO\Bilan2DAO;
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
    $etuDAO = new EtudiantDAO($bdd);
    $bil2DAO = new Bilan2DAO($bdd);
    $etu = $etuDAO->find($idEtu);
    if(isset($_POST['btnCrea']) && $_POST['libBil'] != '' && $_POST['datBil'] != '' && $_POST['notOra'] != '' && $_POST['notDos'] != '' && $_POST['sujBil'] != ''){
        $bil = new Bilan2($_POST['sujBil'], new DateTime($_POST['datBil']), 0, $_POST['libBil'], floatval($_POST['notDos']), floatval($_POST['notOra']), $etu);
        if($bil2DAO->create($bil)){
            header('Location: ControllerBilan2.php?idEtu='.$idEtu);
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
include_once __DIR__ . "/../View/Crea_Bilan2.php";