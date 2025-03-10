<?php

use DAO\EtudiantDAO;

require_once __DIR__."/../Model/DAO/Etudiant.php";
require_once __DIR__."/../Model/BDDManager.php";
$bdd = initialiseConnexionBDD();
function decryptAES($encryptedText, $secretKey, $iv) {
    $cipher = "AES-256-CBC";
    $encryptedText = base64_decode($encryptedText);
    $decryptedText = openssl_decrypt($encryptedText, $cipher, $secretKey, OPENSSL_RAW_DATA, $iv);
    return $decryptedText;
}
$secretKey = "0123456789abcdef0123456789abcdef";
$iv = "abcdef9876543210";

    function sendJsonResponse($status, $data = null) {
    header('Content-Type: application/json');

    $response = [
        'status' => $status,
    ];

    if ($data !== null) {
        $response['data'] = $data;
    }

    echo json_encode($response);
    exit;
}

if($_POST['mdp'] && $_POST['login']){
    $encryptedPasswordFromClient = $_POST['mdp'];
    $decryptedPassword = decryptAES($encryptedPasswordFromClient, $secretKey, $iv);
    $login = $_POST['login'];
    if ($decryptedPassword) {
        $etuDAO = new EtudiantDAO($bdd);
        $etu = $etuDAO->auth($login, $decryptedPassword);
        if($etu != null){
            $data['id'] = $etu->getId();
            $data['nomUti'] = $etu->getNomUti();
            $data['prenomUti'] = $etu->getPrenomUti();
            $data['adresseUti'] = $etu->getAdresseUti();
            $data['mailUti'] = $etu->getMailUti();
            $data['nomMA'] = $etu->getMonMaitreAp() ? $etu->getMonMaitreAp()->getNomMai() : "pas de maitre d'apprentissage";
            $data['prenomMA'] = $etu->getMonMaitreAp() ? $etu->getMonMaitreAp()->getPreMai() : "pas de maitre d'apprentissage";
            $data['telMA'] = $etu->getMonMaitreAp() ? $etu->getMonMaitreAp()->getTelMai() : "pas de maitre d'apprentissage";
            $data['mailMA'] = $etu->getMonMaitreAp() ? $etu->getMonMaitreAp()->getMailMai() : "pas de maitre d'apprentissage";
            $data['nomEnt'] = $etu->getMonEnt() ? $etu->getMonEnt()->getNomEnt() : "pas d'entreprise";
            $data['adresseEnt'] = $etu->getMonEnt() ? $etu->getMonEnt()->getAdrEnt() : "pas d'entreprise";
            $data['telEnt'] = $etu->getMonEnt() ? $etu->getMonEnt()->getTelEnt() : "pas d'entreprise";
            //todo mettre le rest des donnees
        } else {
            sendJsonResponse("error", "Login ou mot de passe incorrect");
            exit;
        }
    } else {

    }
} else {
    sendJsonResponse("error", "il manque des infos");
}

