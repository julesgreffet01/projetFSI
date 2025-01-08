<?php
session_start();

use BO\Administrateur;
use BO\Bilan;
use BO\Tuteur;
use DAO\Bilan2DAO;


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
$uti = unserialize($_SESSION['utilisateur']);
$Message = "";
$bdd = initialiseConnexionBDD();

if($uti instanceof Administrateur || $uti instanceof Tuteur){
    $idBil = intval($_GET['id']);
    $bil2DAO = new Bilan2DAO($bdd);
    if ($uti instanceof Tuteur){
        $mesBil = [];
        foreach($uti->getMesEtu() as $etu){
            foreach($etu->getMesBilan2() as $bil2){
                $mesBil[] = $bil2->getIdBil();
            }
        }
        if(!in_array($idBil, $mesBil)){
            header('Location: ControllerAccueil_Admin.php');
        }
    }

    if ($uti instanceof Administrateur){
        $mesBil = [];

        foreach ($bil2DAO->getAll() as $bil){
            $mesBil[] = $bil->getIdBil();
        }

        if(!in_array($idBil, $mesBil)){
            header('Location: ControllerAccueil_Admin.php');
        }
    }

    $bil2 = $bil2DAO->find($idBil);

    if(isset($_POST['btnValid']) && $_POST['libBil'] != '' && $_POST['datBil'] != '' && $_POST['notOra'] != '' && $_POST['notDos'] != '' && $_POST['sujBil'] != ''){
        $lib = $_POST['libBil'];
        $dat = new DateTime($_POST['datBil']);
        $not = floatval($_POST['notOra']);
        $notBil = floatval($_POST['notDos']);
        $suj = $_POST['sujBil'];
        $bil2->setLibBil($lib);
        $bil2->setDatBil2($dat);
        $bil2->setNotOra($not);
        $bil2->setNotBil($notBil);
        $bil2->setSujBil($suj);
        if($bil2DAO->update($bil2)){
            header('Location: ControllerBilan2.php?idEtu='.$bil2->getMonEtu()->getIdUti());
        } else {
            $Message = "echec de la modification du bilan";
        }

    }

    if(isset($_POST['btnCancel'])){
        header('Location: ControllerBilan2.php?idEtu='.$bil2->getMonEtu()->getIdUti());
    }
} else {
    header('Location: ControllerConnexion.php');
}
include_once ('../View/Nav_Bar.php');
include_once ('../View/Modif_Bilan2.php');