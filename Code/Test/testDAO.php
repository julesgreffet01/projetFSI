<?php


use BO\Specialite;
use DAO\SpecialiteDAO;
use DAO\MaitreApprentissageDAO;


require_once "../Model/BDDManager.php";

require_once "../Model/DAO/SpecialiteDAO.php";
require_once "../Model/DAO/MaitreApprentissageDAO.php";
require_once "../Model/DAO/EntrepriseDAO.php";

require_once "../Model/BO/Specialite.php";
require_once "../Model/BO/MaitreApprentissage.php";
require_once "../Model/BO/Entreprise.php";


//test d un DAO simple

$bdd = initialiseConnexionBDD();
$specDao = new SpecialiteDAO($bdd);
//var_dump($specDao);
$spec = new Specialite(1, "jeuAZE");
$spec1 = $specDao->find(1);
//$specDao->update($spec);
if ($spec1 != null) {
    echo $spec1->getNomSpec();
}
var_dump($specDao->getAll());


//------------------test d un DAO avec une cle etrangere-----------------------
$MaDAO = new MaitreApprentissageDAO($bdd);
$ma1 = $MaDAO->getAll();
var_dump($ma1);
//$MA = new MaitreApprentissage(1, "roux", "max", "0663636363", "max@gmail.com", );
