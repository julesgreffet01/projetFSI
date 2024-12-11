<?php

use BO\Administrateur;
use BO\Entreprise;
use DAO\EntrepriseDAO;

session_start();


require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Entreprise.php";

require_once __DIR__."/../Model/DAO/EntrepriseDAO.php";
require_once __DIR__."/../Model/DAO/MaitreApprentissageDAO.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/BDDManager.php";


$titrefichier = "Entreprise";
$stylecss = "Parametre.css";
$stylecss3 = "Bouton.css";

$titreparametre = "Entreprise";
$bdd = initialiseConnexionBDD();
$Message = "";



if (unserialize($_SESSION['utilisateur']) instanceof Administrateur) {
    $entDAO = new EntrepriseDAO($bdd);
    $ents = $entDAO->getAll();

    if (isset($_POST['btnAdd'])){
        if (isset($_POST['entreprise-select'])){
            $Message = "Enlevez l'entreprise selectionner pour la création";
        } else {
            $Message = "";
        }

        if ($_POST['nameEnt'] != '' && $_POST['adrEnt'] != '' && $_POST['vilEnt'] != '' && $_POST['telEnt'] != '' && $_POST['mailEnt'] != '' && $_POST['cpEnt'] != '' && empty($_POST['entreprise-select'])) {
            $name = $_POST['nameEnt'];
            $adr = $_POST['adrEnt'];
            $ville = $_POST['vilEnt'];
            $tel = $_POST['telEnt'];
            $mail = $_POST['mailEnt'];
            $cp = $_POST['cpEnt'];
            $ent = new Entreprise(0, $name, $adr, $cp, $ville, $tel, $mail);
            if($entDAO->create($ent)){
                $Message = "l'entreprise à bien été créé";
                $ents = $entDAO->getAll();
            }
        } else {
            $Message = "Veuillez remplir tous les champs/selectionner une entreprise";
        }
    }

    //----- update ---
    if (isset($_POST['btnUpdate'])){
        if (isset($_POST['entreprise-select']) && $_POST['nameEnt'] != '' && $_POST['adrEnt'] != '' && $_POST['vilEnt'] != '' && $_POST['telEnt'] != '' && $_POST['mailEnt'] != '' && $_POST['cpEnt'] != ''){
            $ent = $entDAO->find($_POST['entreprise-select']);
            $name = $_POST['nameEnt'];
            $adr = $_POST['adrEnt'];
            $ville = $_POST['vilEnt'];
            $tel = $_POST['telEnt'];
            $mail = $_POST['mailEnt'];
            $cp = $_POST['cpEnt'];
            $ent->setNomEnt($name);
            $ent->setAdrEnt($adr);
            $ent->setVilEnt($ville);
            $ent->setTelEnt($tel);
            $ent->setMailEnt($mail);
            $ent->setCpEnt($cp);
            if ($entDAO->update($ent)){
                $Message = "Entreprise mise a jour";
            }
        } else {
            $Message = "Veuillez selectionner une entreprise/remplir tous les champs";
        }
    }

    if (isset($_POST['btnDelete'])){
        if (isset($_POST['entreprise-select'])){
            if ($_POST['entreprise-select'] != '' ){
                $ent = $entDAO->find($_POST['entreprise-select']);
                if ($ent){
                    if ($entDAO->delete($ent)){
                        $Message = "l'entreprise ". $ent->getNomEnt() ." a bien été supprimer";
                        $ents = $entDAO->getAll();
                    } else {
                        $Message = "Il y a des etudiants ou des maitres d'apprentissage dans cet entreprise";
                    }
                } else {
                    $Message = "Cette entreprise n'existe' pas";
                }
            } else {
                $Message = "Veuillez selectionner une entreprise";
            }
        } else {
            $Message = "Veuillez selectionner une entreprise";
        }
    }

    include_once ('../View/header_admin.php');
    include_once ('../View/Page_Parametre_Entreprise.php');
} else {
    header('Location: ControllerConnexion.php');
}
