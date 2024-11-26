<?php


use BO\Administrateur;
use BO\Entreprise;
use BO\MaitreApprentissage;
use BO\Specialite;
use DAO\AdministrateurDAO;
use DAO\EntrepriseDAO;
use DAO\SpecialiteDAO;
use DAO\MaitreApprentissageDAO;


require_once "../Model/BDDManager.php";

require_once "../Model/DAO/SpecialiteDAO.php";
require_once "../Model/DAO/MaitreApprentissageDAO.php";
require_once "../Model/DAO/EntrepriseDAO.php";
require_once "../Model/DAO/AdministrateurDAO.php";

require_once "../Model/BO/Specialite.php";
require_once "../Model/BO/MaitreApprentissage.php";
require_once "../Model/BO/Entreprise.php";
require_once "../Model/BO/Administrateur.php";


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
$entDAO = new EntrepriseDAO($bdd);
$ent = $entDAO->find(1);
$ma1 = $MaDAO->getAll();
var_dump($ma1);
$MA = new MaitreApprentissage(2, "roux", "maxime", "0663636363", "max@gmail.com", $ent);
//var_dump( $MaDAO->delete($MA));
var_dump($MaDAO->getAll());


$admin = new Administrateur(1, "root", "root", "root@gmail.com", "0111111111", "greffet", "jules", "rue des ecoles", "01120", "la boisse");
$adminDAO = new AdministrateurDAO($bdd);
var_dump($adminDAO->getAll());