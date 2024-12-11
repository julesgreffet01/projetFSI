<?php

use DAO\EtudiantDAO;

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BDDManager.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";


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

if (isset($_GET['idEtu'])){
    $idEtu = intval($_GET['idEtu']);
    try {
        $etu = $etuDAO->find($idEtu);
        if (empty($etu)) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Tuteur introuvable']);
            exit;
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
            'mdp' => $etu->getMdpUti(),
            'alter' => $etu->getAltEtu()

        ]);
    } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode(['error' => $e->getMessage()]);
        exit;
    }
}