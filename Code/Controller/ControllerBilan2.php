<?php

use DAO\Bilan2DAO;
use DAO\EtudiantDAO;
use BO\Tuteur;
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

require_once  __DIR__ ."/../Model/BDDManager.php";
require_once  __DIR__ ."/../Model/DAO/EtudiantDAO.php";
require_once  __DIR__ ."/../Model/DAO/Bilan1DAO.php";

$titrefichier = "Accueil";
$stylecss = "Blockinfo.css";
$stylecss3 = "Bouton.css";
$uti = unserialize($_SESSION['utilisateur']);
$bdd = initialiseConnexionBDD();
$Message = "";
$verif = false;


if ($uti){
    $id = intval($_GET["idEtu"]);
    $etuDAO = new EtudiantDAO($bdd);
    if ($uti instanceof Etudiant) {
        $etu = $etuDAO->find($uti->getIdUti());
    }

    if ($uti instanceof Tuteur) {
        $mesEtu = [];
        foreach ($uti->getMesEtu() as $e) {
            $mesEtu[] = $e->getIdUti();
        }

        if (in_array($id, $mesEtu)) {
            $etu = $etuDAO->find($id);
        } else {
            header("Location:ControllerAccueil_Admin.php");
        }
    }

    if ($uti instanceof Administrateur) {
        $mesEtu = [];
        foreach ($etuDAO->getAll() as $et) {
            $mesEtu[] = $et->getIdUti();
        }

        if (in_array($id, $mesEtu)) {
            $etu = $etuDAO->find($id);
        } else {
            header("Location:ControllerAccueil_Admin.php");
        }
    }
    $bil2 = $etu->getMesBilan2();
    $compteur = 0;
    if (isset($_POST['btnDelete'])){
        $verif = false;
        $idBil = intval($_GET["id"]);
        $bil2DAO = new Bilan2DAO($bdd);
        $bil2Del = $bil2DAO->find($idBil);
        if($bil2Del){
            if ($bil2DAO->delete($bil2Del)){
                $verif = true;
                $Message = "suppression réussie !";
                $etu = $etuDAO->find($id);
                $bil2 = $etu->getMesBilan2();
            }
        } else {
            $Message = "Ce bilan n'existe pas";
        }
    }
} else {
    header('Location: ControllerConnexion.php');
}


include_once ('../View/Nav_Bar.php');
include_once ('../View/Bilan2.php');