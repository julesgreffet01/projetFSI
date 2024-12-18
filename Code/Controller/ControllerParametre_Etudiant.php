<?php

use BO\Administrateur;
use BO\Bilan1;
use BO\Classe;
use BO\Etudiant;
use DAO\ClasseDAO;
use DAO\EntrepriseDAO;
use DAO\EtudiantDAO;
use DAO\MaitreApprentissageDAO;
use DAO\SpecialiteDAO;
use DAO\TuteurDAO;

session_start();

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BDDManager.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";


require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";
require_once  __DIR__ ."/../Model/BO/Specialite.php";
require_once  __DIR__ ."/../Model/BO/MaitreApprentissage.php";
require_once  __DIR__ ."/../Model/BO/Entreprise.php";
require_once  __DIR__ ."/../Model/BO/Bilan1.php";
require_once  __DIR__ ."/../Model/BO/Bilan2.php";
require_once  __DIR__ ."/../Model/BO/Classe.php";


$titrefichier = "Paramètre Etudiant";
$stylecss = "Parametre.css";
$titreparametre = "Etudiant";
$stylecss3 = "Bouton.css";
$bdd = initialiseConnexionBDD();
$Message = "";
$verif = false;

if (unserialize($_SESSION['utilisateur']) instanceof Administrateur) {
    $claDAO = new ClasseDAO($bdd);
    $speDAO = new SpecialiteDAO($bdd);
    $entDAO = new EntrepriseDAO($bdd);
    $maDAO = new MaitreApprentissageDAO($bdd);
    $tutDAO = new TuteurDAO($bdd);
    $etuDAO = new EtudiantDAO($bdd);


    $clas = $claDAO->getAllClaGood();
    $spes = $speDAO->getAll();
    $ents = $entDAO->getAll();
    $mas = $maDAO->getAll();
    $tuts = $tutDAO->getAllTutGood();
    $etus = $etuDAO->getAll();

    if (isset($_POST['btnAdd'])){
        if ($_POST['preEtu'] != "" && $_POST['nomEtu'] != "" && $_POST['telEtu'] && $_POST['adrEtu'] && $_POST['vilEtu'] && $_POST['cpEtu'] && $_POST['mailEtu'] && $_POST['logEtu'] && empty($_POST['etu-select'])){
            $pre = $_POST['preEtu'];
            $nom = $_POST['nomEtu'];
            $tel = $_POST['telEtu'];
            $adr = $_POST['adrEtu'];
            $vil = $_POST['vilEtu'];
            $cp = $_POST['cpEtu'];
            $mail = $_POST['mailEtu'];
            $log = $_POST['logEtu'];
            $mdp = 'password';
            $alt = isset($_POST['altEtu']) ? true : false;
            $monEnt = ($_POST['ent-select'] != '') ? $entDAO->find($_POST['ent-select']) : null;
            $monMA = ($_POST['maitre-select'] != '') ? $maDAO->find($_POST['maitre-select']) : null;
            $monTut = ($_POST['tut-select'] != '') ? $tutDAO->find($_POST['tut-select']) : null;
            $maCla = ($_POST['class-select'] != '') ? $claDAO->find($_POST['class-select']) : null;
            $maSpe = ($_POST['spec-select'] != '') ? $speDAO->find($_POST['spec-select']) : null;
            $etu = new Etudiant($alt, $monTut, $maSpe, $maCla, $monMA, $monEnt, 0, $log, $mdp, $mail, $tel, $nom, $pre, $adr, $cp, $vil);

            if ($etuDAO->verifLog($log)){
                $Message = "Log deja utiliser";
            } else {
                if($etuDAO->create($etu)){
                    $Message = "l etudiant a bien été créé";
                    $verif = true;
                    $etus = $etuDAO->getAll();
                } else {
                    $Message = "creation echoue";
                }
            }
        } else {
            $Message = "Veuillez remplir tous les champs/ne pas selectionner un etudiant";
        }

    }

    if (isset($_POST['btnUpdate'])){
        //TODO finir
    }
    include_once ('../View/header_admin.php');
    include_once '../View/Page_Parametre_Etudiant.php';
}



