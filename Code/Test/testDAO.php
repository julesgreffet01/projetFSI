<?php

use DAO\SpecialiteDAO;
use DAO\MaitreApprentissageDAO;

require_once "../Model/DAO/SpecialiteDAO.php";
require_once "../Model/BDDManager.php";
require_once "../Model/DAO/MaitreApprentissageDAO.php";
require_once "../Model/BO/Specialite.php";

//test d un DAO simple

$bdd = initialiseConnexionBDD();
$specDao = new SpecialiteDAO($bdd);
$spec1 = $specDao->find(1);
echo $spec1->getNomSpec();


//test d un DAO avec une cle etrangere

