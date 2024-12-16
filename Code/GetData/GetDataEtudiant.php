<?php

use DAO\ClasseDAO;
use DAO\EtudiantDAO;
use DAO\TuteurDAO;

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BDDManager.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/DAO/ClasseDAO.php";


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

if (isset($_GET['reset'])) {
    // Récupération des données depuis la base de données ou autre source
    $tuts = $tutDAO->getAllTutGood();
    $clas = $claDAO->getAllClaGood();

    try {
        header('Content-Type: application/json');

        // Utiliser la méthode toArray() pour chaque objet Classe
        $clasArray = array_map(function ($cla) {
            return $cla->toArray();  // Convertir chaque objet Classe en tableau associatif
        }, $clas);

        $tutsArray = array_map(function ($tut) {
            return $tut->toArray();
        }, $tuts);

        // Renvoi du JSON avec les données des classes et tuteurs
        echo json_encode([
            'clas' => $clasArray,
            'tuts' => $tutsArray
        ]);
    } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode(['error' => $e->getMessage()]);
        exit;
    }
}


if (isset($_GET['idEtu'])){

    $idEtu = intval($_GET['idEtu']);
    $tuts = $tutDAO->getAllTutGood();
    $clas = $claDAO->getAllClaGood();
    try {
        $etu = $etuDAO->find($idEtu);


        $clasArray = array_map(function ($cla) {
            return $cla->toArray();
        }, $clas);

        $tutsArray = array_map(function ($tut) {
            return $tut->toArray();
        }, $tuts);


        if (empty($etu)) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Tuteur introuvable']);
            exit;
        }

        if ($etu->getMonEnt()){
            $monEnt = $etu->getMonEnt()->getIdEnt();
        } else {
            $monEnt = null;
        }

        if ($etu->getMonTuteur()){
            $idTut = $etu->getMonTuteur()->getIdUti();
            $nomTut = $etu->getMonTuteur()->getNomUti();
            $preTut = $etu->getMonTuteur()->getPreUti();
        } else {
            $idTut = null;
            $nomTut = null;
            $preTut = null;
        }

        if ($etu->getMaClasse()){
            $idCla = $etu->getMaClasse()->getIdCla();
            $libCla = $etu->getMaClasse()->getLibCla();
        } else {
            $idCla = null;
            $libCla = null;
        }

        if ($etu->getMonMaitreAp()){
            $ma = $etu->getMonMaitreAp()->getIdMai();
        } else {
            $ma = null;
        }

        if ($etu->getMaSpec()){
            $spec = $etu->getMaSpec()->getIdSpec();
        } else {
            $spec = null;
        }

        header('Content-Type: application/json');
        echo json_encode([
            'pre' => $etu->getPreUti(),
            'nom' => $etu->getNomUti(),
            'tel' => $etu->getTelUti(),
            'adr' => $etu->getAdrUti(),
            'vil' => $etu->getVilUti(),
            'cp' => $etu->getCpUti(),
            'mail' => $etu->getMailUti(),
            'login' => $etu->getLogUti(),
            'alter' => $etu->getAltEtu(),
            'idMonTut' => $idTut,
            'nomMonTu'=> $nomTut,
            'preMonTut'=> $preTut,
            'ent'=> $monEnt,
            'MA'=> $ma,
            'Spe'=> $spec,
            'idMaCla'=> $idCla,
            'libMaCla'=> $libCla,
            'clas'=>$clasArray,
            'tuts'=>$tutsArray,
        ]);
    } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode(['error' => $e->getMessage()]);
        exit;
    }
}