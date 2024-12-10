<?php

use DAO\SpecialiteDAO;

require_once __DIR__."/../Model/BO/Specialite.php";

require_once __DIR__."/../Model/DAO/SpecialiteDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

$bdd = initialiseConnexionBDD();
$speDAO = new SpecialiteDAO($bdd);

$id = intval($_GET["idSpec"]);

try {
    $spe = $speDAO->find($id);
    if(empty($spe)){
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Tuteur introuvable']);
        exit;
    }

    header('Content-Type: application/json');
    echo json_encode([
        'nom' => $spe->getNomSpec()
    ]);
} catch(Exception $e){
    header('Content-Type: application/json');
    echo json_encode(['error' => $e->getMessage()]);
}