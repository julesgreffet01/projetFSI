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
        if ($_POST['preEtu'] != "" && $_POST['nomEtu'] != "" && $_POST['telEtu'] && $_POST['adrEtu'] && $_POST['vilEtu'] && $_POST['cpEtu'] && $_POST['mailEtu'] && $_POST['logEtu'] && $_POST['altEtu'] && empty($_POST['etu-select'])){

        }
    }
    include_once ('../View/header_admin.php');
    include_once '../View/Page_Parametre_Etudiant.php';
}


