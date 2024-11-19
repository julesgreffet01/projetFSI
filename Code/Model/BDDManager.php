<?php

function initialiseConnexionBDD(): PDO {
    $bdd = null;
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projetFSI;charset=utf8',
            'root',
            ''
        );
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(Exception $e) {
        die('Erreur connexion BDD : '.$e->getMessage());
    }

    return $bdd;
}