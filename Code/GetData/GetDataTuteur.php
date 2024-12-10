<?php

use DAO\TuteurDAO;

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";

require_once __DIR__."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

$bdd = initialiseConnexionBDD();
$tutDAO = new TuteurDAO($bdd);

$id = intval($_GET["idTut"]);
try {
    $tuteur = $tutDAO->find($id);
    if (empty($tuteur)) {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Tuteur introuvable']);
        exit;
    }

    header('Content-Type: application/json');
    echo json_encode([
        'pre' => $tuteur->getPreUti(),
        'nom' => $tuteur->getNomUti(),
        'tel'=> $tuteur->getTelUti(),
        'adr'=> $tuteur->getAdrUti(),
        'mail'=> $tuteur->getMailUti(),
        'nbMax3'=> $tuteur->getNbMax3(),
        'nbMax4'=> $tuteur->getNbMax4(),
        'nbMax5'=> $tuteur->getNbMax5(),
        'cp'=> $tuteur->getCpUti(),
        'ville'=> $tuteur->getVilUti(),
        'login'=>$tuteur->getLogUti(),
        'mdp'=>$tuteur->getMdpUti()
    ]);
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}