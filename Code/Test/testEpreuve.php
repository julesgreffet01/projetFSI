<?php

use DAO\DirecteurDAO;
use DAO\EntrepriseDAO;

require_once "../Model/BDDManager.php";
require_once "../Model/DAO/DirecteurDAO.php";
require_once "../Model/DAO/EntrepriseDAO.php";

$bdd = initialiseConnexionBDD();
$directeurDAO = new DirecteurDAO($bdd);
$entrepriseDAO = new EntrepriseDAO($bdd);

$directeur = $directeurDAO->find(1);
if($directeur->getNom() === "nomDirecteur"){
    var_dump("find de directeur fonctionne");
} else {
    var_dump("find de directeur fonctionne pas");
}

$entreprise = $entrepriseDAO->find(1);
if($entreprise->getDirecteur()->getNom() === "nomDirecteur"){
    var_dump("find de entreprise fonctionne");
} else {
    var_dump("find de entreprise fonctionne pas");
}


