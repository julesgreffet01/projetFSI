<?php

use DAO\SpecialiteDAO;

require_once "../Model/DAO/SpecialiteDAO.php";
require_once "../Model/BDDManager.php";

//test d une connexion

$bdd = initialiseConnexionBDD();
$specDao = new SpecialiteDAO($bdd);
var_dump($specDao);
