<?php

use BO\Administrateur;
use BO\Tuteur;
use DAO\EtudiantDAO;
use DAO\EntrepriseDAO;

session_start();

require_once __DIR__."/../Model/DAO/AdministrateurDAO.php";
require_once __DIR__."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";

$bdd = initialiseConnexionBDD();
$etuDAO = new EtudiantDAO($bdd);
$entDAO = new EntrepriseDAO($bdd);

$titrefichier = "Accueil";
$stylecss = "Blockinfo.css";
$stylecss3 = "Bouton.css";

$uti = unserialize($_SESSION['utilisateur']);

if ($uti){
    if ($uti instanceof Administrateur || $uti instanceof Tuteur){   //on vérifie que ce soit bien un admin ou un tuteur et pas un étudiant
        $idEtu = $_GET["idEtu"];
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
        $etu = $etuDAO->find($_GET["idEtu"]);
        $id = $etu->getIdUti();
        $nom = $etu->getNomUti();
        $pre = $etu->getPreUti();
        $tel = $etu->getTelUti();
        $adr = $etu->getAdrUti();
        $mail = $etu->getMailUti();
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

    } else {
        header('location: ControllerConnexion.php');
    }
} else {
    header('location: ControllerConnexion.php');
}
include_once ('../View/Nav_Bar.php');
include_once __DIR__."/../View/Page_Detail_Etudiant.php";

