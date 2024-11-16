<?php

use BO\Specialite;
use DAO\SpecialiteDAO;
require_once "../Model/BDDManager.php";
require_once "../Model/BO/Specialite.php";
require_once "../Model/DAO/SpecialiteDAO.php";


$spec = new Specialite(1, "slam");
echo $spec->getIdSpec();
echo "<br>";
echo $spec->getNomSpec();
var_dump($spec);
$bdd = initialiseConnexionBDD();
$specDao = new SpecialiteDAO($bdd);
var_dump($specDao);