<?php

use DAO\ClasseDAO;
use DAO\EtudiantDAO;
use DAO\TuteurDAO;

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BDDManager.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/DAO/ClasseDAO.php";
require_once __DIR__."/../Model/DAO/MaitreApprentissageDAO.php";
require_once __DIR__."/../Model/DAO/EntrepriseDAO.php";


require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";
require_once  __DIR__ ."/../Model/BO/Specialite.php";
require_once  __DIR__ ."/../Model/BO/MaitreApprentissage.php";
require_once  __DIR__ ."/../Model/BO/Entreprise.php";
require_once  __DIR__ ."/../Model/BO/Bilan1.php";
require_once  __DIR__ ."/../Model/BO/Bilan2.php";
require_once  __DIR__ ."/../Model/BO/Classe.php";

$bdd = initialiseConnexionBDD();
$etuDAO = new EtudiantDAO($bdd);
$tutDAO = new TuteurDAO($bdd);
$claDAO = new ClasseDAO($bdd);

if(isset($_GET['reset'])){
    $tuts = $tutDAO->getAllTutGood();
     try {
         header("Content-type: application/json");

         $tutsArray = array_map(function ($tut) {
             return $tut->toArray();
         }, $tuts);

         echo json_encode([
             'tuts' => $tutsArray
         ]);

     } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode(['error' => $e->getMessage()]);
        exit;
    }

}

if(isset($_GET['idCla'])){
    $idCla = intval($_GET['idCla']);
    $cla = $claDAO->find($idCla);
    $tuts = $tutDAO->getTutByCla($idCla);
    $etus = $etuDAO->getAllEtuNoTutByCla($cla);
    try {
        header("Content-type: application/json");

        $tutsArray = array_map(function ($tut) {
            return $tut->toArray();
        }, $tuts);

        $etuArray = array_map(function ($etu) {
            return $etu->toArray();
        }, $etus);

        echo json_encode([
            'tuts' => $tutsArray,
            'etus' => $etuArray
        ]);

    } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode(['error' => $e->getMessage()]);
        exit;
    }
}
