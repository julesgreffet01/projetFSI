<?php

use BO\Administrateur;
use BO\Specialite;
use DAO\SpecialiteDAO;

session_start();

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Specialite.php";

require_once __DIR__."/../Model/DAO/SpecialiteDAO.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/BDDManager.php";


$titrefichier = "Accueil";
$stylecss = "Parametre.css";
$stylecss3 = "Bouton.css";
$titreparametre = "Spécialité";
$Message = "";
$verif = false;                         //c est pour savoir si on met l affichage en vert ou en rouge
$bdd = initialiseConnexionBDD();


if (unserialize($_SESSION['utilisateur']) instanceof Administrateur) {

    $specDAO = new SpecialiteDAO($bdd);
    $specs = $specDAO->getAll();
    //----- ajout -----
    if (isset($_POST['btnAdd'])) {
        if (isset($_POST['specialité-select'])) {
            $Message = "Veuillez en pas selectionner pour le create";
            $verif = false;
        } else {
            $Message = "";
        }

        if (empty($_POST['specialite-select']) && $_POST['libSpe'] != '') {
            $lib = $_POST['libSpe'];
            $spe = new Specialite(0, $lib);
            if ($specDAO->create($spe)) {
                $Message = "la spécialité a bien été créer";
                $verif = true;
                $specs = $specDAO->getAll();
            } else {
                $Message = "creation echoue";
                $verif = false;
            }
        } else {
            $Message = "Veuillez remplir tous les champs/ne pas selectionner une spécialité";
            $verif = false;
        }
    }
    //----- update ----

    if (isset($_POST['btnUpdate'])) {
        if (isset($_POST['specialité-select']) && $_POST['libSpe'] != '') {
            if ($_POST['specialité-select']) {
                $spe = $specDAO->find($_POST['specialité-select']);
                $lib = $_POST['libSpe'];
                $spe->setNomSpec($lib);
                if ($specDAO->update($spe)) {
                    $Message = "La specialité a bien été modifier";
                    $verif = true;
                    $specs = $specDAO->getAll();
                } else {
                    $Message = "update echoue";
                    $verif = false;
                }
            } else {
                $Message = "Cette specialite n'existe pas";
                $verif = false;
            }
        } else {
            $Message="selectionner une specialité/remplissez tous les champs";
            $verif = false;
        }
    }
    //------------ delete----------
    if (isset($_POST['btnDelete'])) {
        if (isset($_POST['specialité-select'])) {
            if ($_POST['specialité-select']) {
                $spe = $specDAO->find($_POST['specialité-select']);
                if ($spe) {
                    if($specDAO->delete($spe)) {
                        $Message = "la specialité ".$spe->getNomSpec()." a été supprimer";
                        $verif = true;
                        $specs = $specDAO->getAll();
                    } else {
                        $Message = "il y a des etudiants dans cette specialite impossible de la supprimer";
                        $verif = false;
                    }
                }
            } else {
                $Message = "Cette specialite n'existe pas";
                $verif = false;
            }
        } else {
            $Message = "selectionnez une specialité";
            $verif = false;
        }
    }
    include_once ('../View/header_admin.php');
    include_once ('../View/Page_Parametre_Specialite.php');
} else {
    header ('location: ControllerConnexion.php');
}