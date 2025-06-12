<?php

use BO\Administrateur;
use BO\Etudiant;
use DAO\EtudiantDAO;

session_start(); // démarrage de la session de l'utilisateur


require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";
require_once  __DIR__ ."/../Model/BO/Specialite.php";
require_once  __DIR__ ."/../Model/BO/MaitreApprentissage.php";
require_once  __DIR__ ."/../Model/BO/Entreprise.php";
require_once  __DIR__ ."/../Model/BO/Bilan1.php";
require_once  __DIR__ ."/../Model/BO/Bilan2.php";
require_once  __DIR__ ."/../Model/BO/Classe.php";

require_once __DIR__ ."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__ ."/../Model/BDDManager.php";



$titrefichier = "Accueil";
$stylecss = "Blockinfo.css";
$stylecss2 = "Bouton.css";
$bdd = initialiseConnexionBDD();

if (unserialize($_SESSION['utilisateur']) instanceof Etudiant) { //vérifie que c'est un étudiant
    $etuDAO = new EtudiantDAO($bdd);
    $etu = $etuDAO->find(unserialize($_SESSION['utilisateur'])->getIdUti());

    $id = $etu->getIdUti();
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
        $spec = "Pas assigné(e)";
    }
    if ($etu->getMonEnt()){
        $ent = $etu->getMonEnt()->getNomEnt();
        $adrEnt = $etu->getMonEnt()->getAdrEnt();
        $directeur = $etu->getMonEnt()->getDirecteur()->getNom();
        $dateAffec = $etu->getDateAffec();
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
        $directeur = "";
        $dateAffec = "";
    }
    include_once ('../View/Nav_Bar.php'); //lien vers les composants de la page
    include_once ('../View/Page_Info_Etudiant.php');
} else {
    header('Location: ControllerConnexion.php');
}
