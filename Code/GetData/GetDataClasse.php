<?php

use DAO\ClasseDAO;

require_once __DIR__."/../Model/BO/Classe.php";

require_once __DIR__."/../Model/DAO/ClasseDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

$bdd = initialiseConnexionBDD();
$claDAO = new ClasseDAO($bdd);

$id = $_GET["idCla"];

try {
    $cla = $claDAO->find($id);
    if (empty($cla)) {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Tuteur introuvable']);
        exit;
    }

    header('Content-Type: application/json');
    echo json_encode([
        'nom' => $cla->getLibCla(),
        'nbMax' => $cla->getNbMaxEtu()
    ]);
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}