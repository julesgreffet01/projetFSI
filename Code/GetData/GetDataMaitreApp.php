<?php

use DAO\MaitreApprentissageDAO;

require_once __DIR__."/../Model/BO/MaitreApprentissage.php";

require_once __DIR__."/../Model/DAO/MaitreApprentissageDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

$bdd = initialiseConnexionBDD();
$maDAO = new MaitreApprentissageDAO($bdd);

$id = intval($_GET["idMA"]);

try {
    $ma = $maDAO->find($id);
    if (empty($ma)) {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Tuteur introuvable']);
        exit;
    }

    header('Content-Type: application/json');
    echo json_encode([
        'pre' => $ma->getPreMai(),
        'nom' => $ma->getNomMai(),
        'tel' => $ma->getTelMai(),
        'mail' => $ma->getMailMai(),
        'ent' => $ma->getMonEnt()->getIdEnt()
    ]);
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}
