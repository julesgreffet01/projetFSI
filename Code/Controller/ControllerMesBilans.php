<?php

use BO\Etudiant;

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
require_once  __DIR__ ."/../Model/BO/Directeur.php";

$titrefichier = "Mes Bilan";
$stylecss = "Blockinfo.css";
$stylecss3 = "Bouton.css";
$uti = unserialize($_SESSION['utilisateur']);

if ($uti instanceof Etudiant) {
    $bil1 = $uti->getMesBilan1();
    $bil2 = $uti->getMesBilan2();
    $lastBil1 = null;
    $lastBil2 = null;
    $moyenne1 = 0;
    $moyenne2 = 0;
    foreach($bil1 as $bil){
        if($bil->getDatVisEnt()){
            $lastBil1 = $bil->getDatVisEnt()->format("d/m/Y");
            $moyenne1 = ($bil->getNotEnt()*1 + $bil->getNotOra()*2 + $bil->getNotBil()*2)/5;
        }
    }

    foreach($bil2 as $bil){
        if($bil->getDatBil2()){
            $lastBil2 = $bil->getDatBil2()->format("d/m/Y");
            $moyenne2 = ($bil->getNotOra()*2 + $bil->getNotBil()*2)/4;
        }
    }
} else {
    header("Location: ControllerConnexion.php");
}
include_once ('../View/Nav_Bar.php');
include_once ('../View/Page_Mes_Bilan.php');
