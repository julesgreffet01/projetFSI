<?php

use BO\Administrateur;
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





$titrefichier = "Accueil";
$stylecss = "Blockinfo.css";
$stylecss2 = "Bouton.css";

if (unserialize($_SESSION['utilisateur']) instanceof Etudiant) {
    $etu = unserialize($_SESSION['utilisateur']);

    $nom = $etu->getNomUti();
    $pre = $etu->getPreUti();
    $tel = $etu->getTelUti();
    $adr = $etu->getAdrUti();
    $mail = $etu->getMailUti();
    if ($etu->getMaClasse()){
        $cla = $etu->getMaClasse()->getLibCla();
    } else {
        $cla = "Pas assigné(e)";
    }
    if ($etu->getMaSpec()){
        $spec = $etu->getMaSpec()->getNomSpec();
    } else {
        $spe = "Pas assigné(e)";
    }

    if ($etu->getMonEnt()){
        $ent = $etu->getMonEnt()->getNomEnt();
        $adrEnt = $etu->getMonEnt()->getAdrEnt();
        if ($etu->getMonMaitreAp()){
            $nomMai = $etu->getMonMaitreAp()->getNomMai();
            $preMai = $etu->getMonMaitreAp()->getPreMai();
            $telMai = $etu->getMonMaitreAp()->getTelMai();
            $mailMai = $etu->getMonMaitreAp()->getMailMai();
        } else {
            $nomMai = "Pas assigné(e)";
            $preMai = "";
            $telMai = "";
            $mailMai = "";
        }
    } else {
        $ent = "Pas assigné(e)";
        $adrEnt = "";
        $nomMai = "Pas assigné(e)";
        $preMai = "";
        $telMai = "";
        $mailMai = "";
    }
    include_once ('../View/Nav_Bar.php');
    include_once ('../View/Page_Info_Etudiant.php');
} else {
    header('Location: ControllerConnexion.php');
}
