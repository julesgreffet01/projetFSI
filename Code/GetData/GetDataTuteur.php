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
        'pre' => $tuteur->getPreUti()
    ]);
} catch (Exception $ex) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Erreur interne : ' . $ex->getMessage()]);
    exit;
}