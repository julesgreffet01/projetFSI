<?php

use DAO\EntrepriseDAO;

require_once __DIR__."/../Model/BO/Entreprise.php";

require_once __DIR__."/../Model/DAO/EntrepriseDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

$bdd = initialiseConnexionBDD();
$entDAO = new EntrepriseDAO($bdd);

$id = intval($_GET["idEnt"]);

try {
    $ent = $entDAO->find($id);
    if (empty($ent)) {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Tuteur introuvable']);
        exit;
    }

    header('Content-Type: application/json');
    echo json_encode([
        'nom' => $ent->getNomEnt(),
        'adr' => $ent->getAdrEnt(),
        'tel' => $ent->getTelEnt(),
        'mail' => $ent->getMailEnt(),
        'cp' => $ent->getCpEnt(),
        'vil' => $ent->getVilEnt(),
        'Siret' => $ent->getSiretEnt(),
    ]);
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}
