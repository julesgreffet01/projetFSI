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
        if (isset($_POST['preTut']) && isset($_POST['nomTut']) && isset ($_POST['telTut']) && isset($_POST['adrTut']) && isset($_POST['vilTut']) && isset($_POST['cpTut']) && isset($_POST['mailTut']) && isset($_POST['logTut']) && isset($_POST['mdpTut']) && empty($_POST['tuteur-select'])) {
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
            if($tutDAO->create($tuteur)){
                $Message = "";
                $tuts = $tutDAO->getAll();
            }
        } else {
            $Message = "veuillez remplir tous les champs";
        }
    }
    //---------------------- modifier ---------------------------
    if (isset($_POST['btnUpdate'])){
        if (isset($_POST['preTut']) && isset($_POST['nomTut']) && isset ($_POST['telTut']) && isset($_POST['adrTut']) && isset($_POST['vilTut']) && isset($_POST['cpTut']) && isset($_POST['mailTut']) && isset($_POST['logTut']) && isset($_POST['mdpTut']) && isset($_POST['tuteur-select'])){
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
        } else {
            $Message = "Veuillez selectionner un tuteur à modifier";
        }
    }
    //--------------------------------- supprimer -------------------------
    if(isset($_POST['btnDelete'])){
        if (isset($_POST['tuteur-select'])){
            if ($_POST['tuteur-select'] != ''){
                $tuteur = $tutDAO->find($_POST["tuteur-select"]);
                if ($tutDAO->delete($tuteur)){
                    $Message = "suppression ok";
                    $tuts = $tutDAO->getAll();
                }
            } else {
                $Message = "veuillez selectionner un tuteur";
            }
        } else {
            $Message = "veuillez selectionner un tuteur";
        }
    }

    include_once ('../View/header_admin.php');
    include_once ('../View/Page_Parametre_Tuteur.php');
}
