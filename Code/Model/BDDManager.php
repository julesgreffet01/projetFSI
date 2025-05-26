<?php

function initialiseConnexionBDD(): PDO {
    $bdd = null;
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projetFSI;charset=utf8',
            'root',
            ''
        );
//        $bdd = new PDO('mysql:host=db5016837122.hosting-data.io;dbname=dbs13598345;charset=utf8',
//            'dbu2763688',
//            'C@boTESN!ProjetFSI2025'
//        );
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(Exception $e) {
        die('Erreur connexion BDD : '.$e->getMessage());
    }

    return $bdd;
}