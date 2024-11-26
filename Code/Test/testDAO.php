<?php

use BO\Specialite;
use DAO\SpecialiteDAO;
use DAO\MaitreApprentissageDAO;

require_once "../Model/DAO/SpecialiteDAO.php";
require_once "../Model/BDDManager.php";
require_once "../Model/DAO/MaitreApprentissageDAO.php";
require_once "../Model/BO/Specialite.php";

//test d un DAO simple

$bdd = initialiseConnexionBDD();
$specDao = new SpecialiteDAO($bdd);
//var_dump($specDao);
$spec = new Specialite(5, "jeuAZE");
$spec1 = $specDao->find(1);
$specDao->update($spec);
echo $spec1->getNomSpec();
var_dump($specDao->getAll());


//test d un DAO avec une cle etrangere

