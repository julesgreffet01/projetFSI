<?php

use BO\Administrateur;
use DAO\ClasseDAO;
use DAO\EtudiantDAO;
use DAO\TuteurDAO;

session_start();

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";
require_once __DIR__."/../Model/BDDManager.php";
require_once __DIR__."/../Model/DAO/ClasseDAO.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/DAO/TuteurDAO.php";


$titrefichier = "Affectation";
$stylecss = "Parametre.css";
$stylecss3 = "Bouton.css";
$titreparametre = "Affectation";
$bdd = initialiseConnexionBDD();
$Message = "";
$verif = false;

if (unserialize($_SESSION['utilisateur']) instanceof Administrateur){
    $claDAO = new ClasseDAO($bdd);
    $tutDAO = new TuteurDAO($bdd);
    $etuDAO = new EtudiantDAO($bdd);

    $clas = $claDAO->getAll();
    $tuts =  $tutDAO->getAllTutGood();

    if(isset($_POST['btnAffect'])){
        if($_POST['classe-select'] != '' && $_POST['etu-select'] != '' && $_POST['tut-select'] != ''){
            $tut = intval($_POST['tut-select']);
            $etu = intval($_POST['etu-select']);
            if($etuDAO->assignement($etu, $tut)){
                $verif = true;
                $Message = "assignement reussie";
            }
        } else {
            $Message = "Veuillez remplir tous les champs";
            $verif = false;
        }
    }

} else {
    header('Location: ControllerConnexion.php');
}
include_once ('../View/header_admin.php');
include_once ('../View/Page_Parametre_Affectation.php');
