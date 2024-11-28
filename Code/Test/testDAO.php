<?php


use BO\Administrateur;
use BO\Entreprise;
use BO\MaitreApprentissage;
use BO\Specialite;
use BO\Tuteur;
use DAO\AdministrateurDAO;
use DAO\AlerteDAO;
use DAO\EntrepriseDAO;
use DAO\SpecialiteDAO;
use DAO\MaitreApprentissageDAO;
use DAO\TuteurDAO;
use DAO\EtudiantDAO;
use BO\Etudiant;


require_once "../Model/BDDManager.php";

require_once "../Model/DAO/SpecialiteDAO.php";
require_once "../Model/DAO/MaitreApprentissageDAO.php";
require_once "../Model/DAO/EntrepriseDAO.php";
require_once "../Model/DAO/AdministrateurDAO.php";
require_once "../Model/DAO/TuteurDAO.php";
require_once "../Model/DAO/Bilan1DAO.php";
require_once "../Model/DAO/Bilan2DAO.php";
require_once "../Model/DAO/ClasseDAO.php";
require_once "../Model/DAO/EtudiantDAO.php";
require_once "../Model/DAO/AlerteDAO.php";



require_once "../Model/BO/Specialite.php";
require_once "../Model/BO/MaitreApprentissage.php";
require_once "../Model/BO/Entreprise.php";
require_once "../Model/BO/Administrateur.php";
require_once "../Model/BO/Tuteur.php";
require_once "../Model/BO/Bilan1.php";
require_once "../Model/BO/Bilan2.php";
require_once "../Model/BO/Classe.php";
require_once "../Model/BO/Etudiant.php";
require_once "../Model/BO/Alerte.php";


//test d un DAO simple

echo '------------------------------------ Specialité -------------------------------';
echo '<br>';
$bdd = initialiseConnexionBDD();
/*
$specDao = new SpecialiteDAO($bdd);
//var_dump($specDao);
$spec = new Specialite(1, "jeuAZE");
$spec1 = $specDao->find(1);
//$specDao->update($spec);
if ($spec1 != null) {
    echo $spec1->getNomSpec();
}
var_dump($specDao->getAll());
*/

echo '------------------tuteur-----------------------------';
echo '<br>';
$tut1 = new Tuteur(1, 3, 7, 2, "tuteur", "tuteur", "tuteur@gmail.com", "0666666", "yann", "neuville", "djqnsfj", "0210", "dqs");
/*
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
var_dump($entDAO->delete($ent2)); //false

$tutDAO = new TuteurDAO($bdd);
//var_dump($tutDAO->create($tut1));

*/
echo '----------------------------- etudiant ------------------------------';
$etuDAO = new EtudiantDAO($bdd);
$etu1 = new Etudiant(false, null, null, null, null, null, 24, "test", "test", "test@gmail.com", "01010101", "test", "test", "145 rue test", "01120", "testVille");
var_dump($etuDAO->delete($etu1));
var_dump($etuDAO->getAll());

echo'------------------------------- alerte----------------------';
/*
$alDAO = new AlerteDAO($bdd);
$alDAO->getAllAl1ByTut($tut1);
*/