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
        if($etuDAO->auth($login, $decryptedPassword)){

        } else {
            sendJsonResponse("error", "Login ou mot de passe incorrect");
            exit;
        }
    } else {

    }
}

