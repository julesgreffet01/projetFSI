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

echo '------------------------------------ Specialité -------------------------------';
echo '<br>';
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
echo "-------------------------- Maitre App -------------------------------";
$MaDAO = new MaitreApprentissageDAO($bdd);
$entDAO = new EntrepriseDAO($bdd);
$ent1 = new Entreprise(1, "technology", "adr", "01110", "lyon", "01545121", "dougqksj");
$ent2 = $entDAO->find(1);
$ma1 = $MaDAO->getAll();
var_dump($ma1);
$MA = new MaitreApprentissage(2, "roux", "maxime", "0663636363", "max@gmail.com", $ent2);
//var_dump( $MaDAO->delete($MA));
var_dump($MaDAO->getAllMaByEnt($ent1));


echo "------------------------------- Administrateur -------------------------------";
$admin = new Administrateur(1, "root", "root", "root@gmail.com", "0111110", "greffet", "jules", "rue des ecoles", "0100", "la boisse");
$adminDAO = new AdministrateurDAO($bdd);
//var_dump($adminDAO->update($admin));
var_dump($adminDAO->getAll());
var_dump($adminDAO->auth("root", "root"));

echo '--------------------------- Entreprise ------------------------------';
var_dump($entDAO->delete($ent2));