<?php

use BO\MaitreApprentissage;
use DAO\EntrepriseDAO;
use DAO\MaitreApprentissageDAO;

session_start();

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/DAO/EntrepriseDAO.php";
require_once __DIR__."/../Model/DAO/MaitreApprentissageDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

$titrefichier = "Accueil";
$stylecss = "Parametre.css";
$titreparametre = "Maitre d'apprentissage";
$stylecss3 = "Bouton.css";
$bdd = initialiseConnexionBDD();
$Message = "";
$verif = false;


if (unserialize($_SESSION['utilisateur'])){
    $entDAO = new EntrepriseDAO($bdd);
    $maDAO = new MaitreApprentissageDAO($bdd);

    $mas = $maDAO->getAll();
    $ents = $entDAO->getAll();

    if (isset($_POST['btnAdd'])){
        if ($_POST['preMA'] != "" && $_POST['nomMa'] != "" && $_POST['telMA'] != "" && $_POST['mailMA'] != "" && $_POST['ent-select'] != "" && empty($_POST['maitre-select'])){
            $preMA = $_POST['preMA'];
            $nomMA = $_POST['nomMa'];
            $telMA = $_POST['telMA'];
            $mailMA = $_POST['mailMA'];
            $entSelect = $entDAO->find($_POST['ent-select']);
            $ma = new MaitreApprentissage(0, $nomMA, $preMA, $telMA, $mailMA, $entSelect);
            if ($maDAO->create($ma)){
                $Message = "Creation reussie";
                $verif = true;
                $mas = $maDAO->getAll();
            } else {
                $Message = "Erreur creation";
            }
        } else {
            $Message = "Veuillez remplir tous les champs/ne pas selectionner un Maitre d'apprentissage";
        }
    }

    if (isset($_POST['btnUpdate'])){
        if ($_POST['preMA'] != "" && $_POST['nomMa'] != "" && $_POST['telMA'] != "" && $_POST['mailMA'] != "" && $_POST['ent-select'] != "" && isset($_POST['maitre-select'])) {
            if($_POST['maitre-select'] != ""){
                $MA = $maDAO->find($_POST['maitre-select']);
                $preMA = $_POST['preMA'];
                $nomMA = $_POST['nomMa'];
                $telMA = $_POST['telMA'];
                $mailMA = $_POST['mailMA'];
                $entSelect = $entDAO->find($_POST['ent-select']);
                $MA->setPreMai($preMA);
                $MA->setNomMai($nomMA);
                $MA->setTelMai($telMA);
                $MA->setMailMai($mailMA);
                $MA->setMonEnt($entSelect);
                if($maDAO->update($MA)){
                    $Message = "Modification reussie";
                    $verif = true;
                    $mas = $maDAO->getAll();
                }

            } else {
                $Message = "veuillez selectionner un Maitre d'apprentissage";
            }
        } else {
            $Message = "Veuillez remplir tous les champs/ selectionner un maitre d'apprentissage a modifier";
        }
    }

    if (isset($_POST['btnDelete'])){
        if (isset($_POST['maitre-select'])){
            if ($_POST['maitre-select'] != ""){
                $MA = $maDAO->find($_POST['maitre-select']);
                if($MA){
                    if ($maDAO->delete($MA)){
                        $Message = "Suppression reussie";
                        $verif = true;
                        $mas = $maDAO->getAll();
                    } else {
                        $Message = "Vous ne pouvez pas supprimer ce maitre d'apprentissage car il possede un/des etudiant(s)";
                    }
                }
            } else {
                $Message = "Pas de Maitre d'apprentissage a cet id";
            }
        } else {
            $Message = "Veuillez selectionner un maitre d'apprentissage";
        }
    }
    include_once ('../View/header_admin.php');
    include_once '../View/Page_Parametre_Maitre_Apprentissage.php';
} else {
    header ('location: ControllerConnexion.php');
}