<?php
use BO\Administrateur;
use BO\Etudiant;
use BO\Tuteur;
use DAO\EtudiantDAO;

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

$titrefichier = "Accueil";
$stylecss = "Blockinfo.css";
$stylecss3 = "Bouton.css";
$bdd = initialiseConnexionBDD();




$uti = unserialize($_SESSION['utilisateur']);

if ($uti){
    if ($uti instanceof Administrateur || $uti instanceof Tuteur) {
        $id = intval($_GET["idEtu"]);
        $etuDAO = new EtudiantDAO($bdd);
        $etu = $etuDAO->find($id);
        $bil1 = $etu->getMesBilan1();
        //modif
        if(isset($_POST['btnUpdate'])){
            //TODO finir
        }
        if(isset($_POST['btnDelete'])){
            //TODO finir
        }
    } else {
        header('Location: ControllerConnexion.php');
    }
    include_once ('../View/Nav_Bar.php');
    include_once ('../View/Bilan1.php');
} else {
    header('Location: ControllerConnexion.php');
}



