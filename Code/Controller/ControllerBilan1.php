<?php
use BO\Administrateur;
use BO\Etudiant;
use BO\Tuteur;
use DAO\Bilan1DAO;
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
require_once  __DIR__ ."/../Model/DAO/Bilan1DAO.php";

$titrefichier = "Accueil";
$stylecss = "Blockinfo.css";
$stylecss3 = "Bouton.css";
$bdd = initialiseConnexionBDD();
$Message = "";
$verif = false;



$uti = unserialize($_SESSION['utilisateur']);

if ($uti){
    if ($uti instanceof Administrateur || $uti instanceof Tuteur) {
        $id = intval($_GET["idEtu"]);
        $etuDAO = new EtudiantDAO($bdd);
        $etu = $etuDAO->find($id);
        $bil1 = $etu->getMesBilan1();
        $compteur = 0;
        if (isset($_POST['btnDelete'])){
            $verif = false;
            $idBil = intval($_GET["id"]);
            $bil1DAO = new Bilan1DAO($bdd);
            $bil1Del = $bil1DAO->find($idBil);
            if($bil1Del){
                if ($bil1DAO->delete($bil1Del)){
                    $verif = true;
                    $Message = "suppression réussie !";
                    $etu = $etuDAO->find($id);
                    $bil1 = $etu->getMesBilan1();
                }
            } else {
                $Message = "Ce bilan n'existe pas";
            }
        }
    } else {
        header('Location: ControllerConnexion.php');
    }
} else {
    header('Location: ControllerConnexion.php');
}

include_once ('../View/Nav_Bar.php');
include_once ('../View/Bilan1.php');



