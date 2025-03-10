<?php

use DAO\EtudiantDAO;

require_once __DIR__."/../Model/BO/Bilan1.php";
require_once __DIR__."/../Model/BO/Bilan2.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

$bdd = initialiseConnexionBDD();


function sendJsonResponse($status, $data = null) {
    header('Content-Type: application/json');
    echo json_encode(['status' => $status, 'data' => $data]);
    exit;
}

if (!isset($_POST['mdp']) || !isset($_POST['login'])) {
    sendJsonResponse("error", "Il manque des informations");
}


$etuDAO = new EtudiantDAO($bdd);
$etu = $etuDAO->auth($_POST['login'], $_POST['mdp']);

if (!$etu) {
    sendJsonResponse("error", "Login ou mot de passe incorrect");
}
$bil1 = current(array_filter($etu->getMesBilan1(), fn($row) => $row instanceof \BO\Bilan1)) ?: null;
$bil2 = current(array_filter($etu->getMesBilan2(), fn($row) => $row instanceof \BO\Bilan2)) ?: null;



$data = [
    'id' => $etu->getIdUti() ?? "",
    'nomUti' => $etu->getNomUti() ?? "",
    'prenomUti' => $etu->getPreUti() ?? "",
    'adresseUti' => $etu->getAdrUti() ?? "",
    'mailUti' => $etu->getMailUti() ?? "",
    'nomMA' => $etu->getMonMaitreAp()?->getNomMai() ?? "pas de maitre d'apprentissage",
    'prenomMA' => $etu->getMonMaitreAp()?->getPreMai() ?? "pas de maitre d'apprentissage",
    'telMA' => $etu->getMonMaitreAp()?->getTelMai() ?? "pas de maitre d'apprentissage",
    'mailMA' => $etu->getMonMaitreAp()?->getMailMai() ?? "pas de maitre d'apprentissage",
    'nomEnt' => $etu->getMonEnt()?->getNomEnt() ?? "pas d'entreprise",
    'adresseEnt' => $etu->getMonEnt()?->getAdrEnt() ?? "pas d'entreprise",
    'telEnt' => $etu->getMonEnt()?->getTelEnt() ?? "pas d'entreprise",
    'mailEnt' => $etu->getMonEnt()?->getMailEnt() ?? "pas d'entreprise",
    'libBil1' => $bil1?->getLibBil() ?? "",
    'notBil1' => $bil1?->getNotBil() ?? "-",
    'remarqueBil1' => $bil1?->getRemBil() ?? "pas de remarque",
    'noteEntBil1' => $bil1?->getNotEnt() ?? "-",
    'noteOralBil1' => $bil1?->getNotOra() ?? "-",
    'dateBil1' => $bil1?->getDatVisEnt() instanceof DateTime ? $bil1->getDatVisEnt()->format('d-m-Y') : "pas encore réalisé",
    'libBil2' => $bil2?->getLibBil() ?? "",
    'noteBil2' => $bil2?->getNotBil() ?? "-",
    'noteOralBil2' => $bil2?->getNotOra() ?? "-",
    'sujMemoire' => $bil2?->getSujBil() ?? "pas de sujet",
    'dateBil2' => $bil2?->getDatBil2() instanceof DateTime ? $bil2->getDatBil2()->format('d-m-Y') : "pas encore réalisé"
];



sendJsonResponse("success", $data);
