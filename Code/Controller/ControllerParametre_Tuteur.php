<?php

use BO\Administrateur;
use BO\Tuteur;
use DAO\TuteurDAO;

session_start();

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";

require_once __DIR__."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

$titrefichier = "Paramètre Tuteur";
$stylecss = "Parametre.css";
$titreparametre = "Tuteur";
$stylecss3 = "Bouton.css";

$bdd = initialiseConnexionBDD();
$Message = "";



if (unserialize($_SESSION["utilisateur"]) instanceof Administrateur) {
    $tutDAO = new TuteurDAO($bdd);
    $tuts = $tutDAO->getAll();
//---------------------- créer ---------------------------
    if (isset($_POST['btnAdd'])){
        if (isset($_POST['tuteur-select'])){
            $Message = "veuiller enlever la selection en cas de creation";
        }else {
            $Message = "";
        }
        if ($_POST['preTut'] != "" && $_POST['nomTut'] != "" && $_POST['telTut'] != "" && $_POST['adrTut'] != "" && $_POST['vilTut'] != "" && $_POST['cpTut'] != "" && $_POST['mailTut'] != "" && $_POST['logTut'] != "" && $_POST['mdpTut'] != "" && empty($_POST['tuteur-select'])) {
            $pre = $_POST['preTut'];
            $nom = $_POST['nomTut'];
            $tel = $_POST['telTut'];
            $adr = $_POST['adrTut'];
            $vil = $_POST['vilTut'];
            $cp = $_POST['cpTut'];
            $mail = $_POST['mailTut'];
            $log = $_POST['logTut'];
            $mdp = $_POST['mdpTut'];
            $nbMax3 = ($_POST['nbMaxEtu3'] > 0) ? $_POST['nbMaxEtu3'] : 0;
            $nbMax4 = ($_POST['nbMaxEtu4'] > 0) ? $_POST['nbMaxEtu4'] : 0;
            $nbMax5 = ($_POST['nbMaxEtu5'] > 0) ? $_POST['nbMaxEtu5'] : 0;
            $tuteur = new Tuteur($nbMax3, $nbMax4, $nbMax5, 0, $log, $mdp, $mail, $tel, $nom, $pre, $adr, $cp, $vil);
            if($tutDAO->verifLog($log)){
                $Message = "Log deja utiliser";
            } else {
                if($tutDAO->create($tuteur)){
                    $Message = "le tuteur a bien été créé";
                    $tuts = $tutDAO->getAll();
                }
            }
        } else {
            $Message = "veuillez remplir tous les champs";
        }
    }
    //---------------------- modifier ---------------------------
    if (isset($_POST['btnUpdate'])){
        if ($_POST['preTut'] != "" && $_POST['nomTut'] != "" && $_POST['telTut'] != "" && $_POST['adrTut'] != "" && $_POST['vilTut'] != "" && $_POST['cpTut'] != "" && $_POST['mailTut'] != "" && $_POST['logTut'] != "" && $_POST['mdpTut'] != "" && isset($_POST['tuteur-select'])){
            if ($_POST['tuteur-select'] != ''){
                $tuteur = $tutDAO->find($_POST["tuteur-select"]);
                $pre = $_POST['preTut'];
                $nom = $_POST['nomTut'];
                $tel = $_POST['telTut'];
                $adr = $_POST['adrTut'];
                $vil = $_POST['vilTut'];
                $cp = $_POST['cpTut'];
                $mail = $_POST['mailTut'];
                $log = $_POST['logTut'];
                $mdp = $_POST['mdpTut'];
                $nbMax3 = ($_POST['nbMaxEtu3'] > 0) ? $_POST['nbMaxEtu3'] : 0;
                $nbMax4 = ($_POST['nbMaxEtu4'] > 0) ? $_POST['nbMaxEtu4'] : 0;
                $nbMax5 = ($_POST['nbMaxEtu5'] > 0) ? $_POST['nbMaxEtu5'] : 0;
                if ($tuteur->getLogUti() != $log){                                      //verif si ca a changer : true
                    if ($tutDAO->verifLog($log)){
                        $Message = "Log deja utiliser";
                    } else {
                        $tuteur->setPreUti($pre);
                        $tuteur->setNomUti($nom);
                        $tuteur->setTelUti($tel);
                        $tuteur->setAdrUti($adr);
                        $tuteur->setVilUti($vil);
                        $tuteur->setCpUti($cp);
                        $tuteur->setMailUti($mail);
                        $tuteur->setLogUti($log);
                        $tuteur->setMdpUti($mdp);
                        $tuteur->setNbMax3($nbMax3);
                        $tuteur->setNbMax4($nbMax4);
                        $tuteur->setNbMax5($nbMax5);
                        if($tutDAO->update($tuteur)){
                            $Message = "Le tuteur a bien été modifier";
                        }
                    }
                } else {
                    $tuteur->setPreUti($pre);
                    $tuteur->setNomUti($nom);
                    $tuteur->setTelUti($tel);
                    $tuteur->setAdrUti($adr);
                    $tuteur->setVilUti($vil);
                    $tuteur->setCpUti($cp);
                    $tuteur->setMailUti($mail);
                    $tuteur->setMdpUti($mdp);
                    $tuteur->setNbMax3($nbMax3);
                    $tuteur->setNbMax4($nbMax4);
                    $tuteur->setNbMax5($nbMax5);
                    if($tutDAO->update($tuteur)){
                        $Message = "Le tuteur a bien été modifier";
                        $tuts = $tutDAO->getAll();
                    }
                }
            } else {
                $Message = "Ce tuteur n'existe pas";
            }
        } else {
            $Message = "Veuillez selectionner un tuteur à modifier";
        }
    }
    //--------------------------------- supprimer -------------------------
    if(isset($_POST['btnDelete'])){
        if (isset($_POST['tuteur-select'])){
            if ($_POST['tuteur-select'] != ''){
                $tuteur = $tutDAO->find($_POST["tuteur-select"]);
                if ($tuteur){
                    if ($tutDAO->delete($tuteur)){
                        $Message = 'suppression du tuteur ' . $tuteur->getNomUti();
                        $tuts = $tutDAO->getAll();
                    } else {
                        $Message = "Il y a des etudiants affilié a ce tuteur";
                    }
                } else {
                    $Message = "Ce tuteur n'existe pas";
                }

            } else {
                $Message = "veuillez selectionner un tuteur a supprimer";
            }
        } else {
            $Message = "veuillez selectionner un tuteur a supprimer";
        }
    }

    include_once ('../View/header_admin.php');
    include_once ('../View/Page_Parametre_Tuteur.php');
} else {
    header('Location: ControllerConnexion.php');
}
