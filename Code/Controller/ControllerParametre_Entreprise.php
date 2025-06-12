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
$verif = false;



if (unserialize($_SESSION['utilisateur']) instanceof Administrateur) {
    $entDAO = new EntrepriseDAO($bdd);
    $ents = $entDAO->getAll();

    if (isset($_POST['btnAdd'])){
        if (isset($_POST['entreprise-select'])){
            $Message = "Enlevez l'entreprise selectionner pour la création";
            $verif = false;
        } else {
            $Message = "";
        }

        if ($_POST['nameEnt'] != '' && $_POST['adrEnt'] != '' && $_POST['vilEnt'] != '' && $_POST['telEnt'] != '' && $_POST['mailEnt'] != '' && $_POST['cpEnt'] != '' && $_POST['SiretEnt'] != '' && empty($_POST['entreprise-select'])) {
            $name = $_POST['nameEnt'];
            $adr = $_POST['adrEnt'];
            $ville = $_POST['vilEnt'];
            $tel = $_POST['telEnt'];
            $mail = $_POST['mailEnt'];
            $cp = $_POST['cpEnt'];
            $Siret = $_POST['SiretEnt'];
            $ent = new Entreprise(0, $name, $adr, $cp, $ville, $tel, $mail, $Siret);
            if($entDAO->create($ent)){
                $Message = "l'entreprise à bien été créé";
                $verif = true;
                $ents = $entDAO->getAll();
            }
        } else {
            $Message = "Veuillez remplir tous les champs/selectionner une entreprise";
            $verif = false;
        }
    }

    //----- update ---
    if (isset($_POST['btnUpdate'])){
        if (isset($_POST['entreprise-select']) && $_POST['nameEnt'] != '' && $_POST['adrEnt'] != '' && $_POST['vilEnt'] != '' && $_POST['telEnt'] != '' && $_POST['mailEnt'] != '' && $_POST['cpEnt'] != '' && $_POST['SiretEnt'] != ''){
           if ($_POST['entreprise-select'] != ""){
               $ent = $entDAO->find($_POST['entreprise-select']);
               $name = $_POST['nameEnt'];
               $adr = $_POST['adrEnt'];
               $ville = $_POST['vilEnt'];
               $tel = $_POST['telEnt'];
               $mail = $_POST['mailEnt'];
               $cp = $_POST['cpEnt'];
               $Siret = $_POST['SiretEnt'];
               $ent->setNomEnt($name);
               $ent->setAdrEnt($adr);
               $ent->setVilEnt($ville);
               $ent->setTelEnt($tel);
               $ent->setMailEnt($mail);
               $ent->setCpEnt($cp);
               $SirenEnt = setSirenEnt($Siret);
               if ($entDAO->update($ent)){
                   $Message = "Entreprise mise a jour";
                   $verif = true;
                   $ents = $entDAO->getAll();
               } else {
                   $Message = 'erreur de modification';
                   $verif = false;
               }
           } else {
               $Message = "Cette entreprise n'existe' pas";
               $verif = false;
           }
        } else {
            $Message = "Veuillez selectionner une entreprise/remplir tous les champs";
            $verif = false;
        }
    }

    if (isset($_POST['btnDelete'])){
        if (isset($_POST['entreprise-select'])){
            if ($_POST['entreprise-select'] != '' ){
                $ent = $entDAO->find($_POST['entreprise-select']);
                if ($ent){
                    if ($entDAO->delete($ent)){
                        $Message = "l'entreprise ". $ent->getNomEnt() ." a bien été supprimer";
                        $verif = true;
                        $ents = $entDAO->getAll();
                    } else {
                        $Message = "Il y a des etudiants ou des maitres d'apprentissage dans cet entreprise";
                        $verif = false;
                    }
                } else {
                    $Message = "Cette entreprise n'existe' pas";
                    $verif = false;
                }
            } else {
                $Message = "Veuillez selectionner une entreprise";
                $verif = false;
            }
        } else {
            $Message = "Veuillez selectionner une entreprise";
            $verif = false;
        }
    }

    include_once ('../View/header_admin.php');
    include_once ('../View/Page_Parametre_Entreprise.php');
} else {
    header('Location: ControllerConnexion.php');
}
