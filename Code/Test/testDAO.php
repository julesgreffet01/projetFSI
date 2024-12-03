<?php


use BO\Administrateur;
use BO\Entreprise;
use BO\MaitreApprentissage;
use BO\Specialite;
use BO\Tuteur;
use DAO\AdministrateurDAO;
use DAO\AlerteDAO;
use DAO\Bilan1DAO;
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

$bdd = initialiseConnexionBDD();



//------------------------------------ Specialité -------------------------------
$specDAO = new SpecialiteDAO($bdd);
//$spec1 = new Specialite(3, "testSpeModif");
//var_dump($specDAO->find(2));

//--------------- Administrateur -----------------
$adminDAO = new AdministrateurDAO($bdd);
//$admin1 = new Administrateur(7, "logTestModif", "root", "test@gmail.com", "0111111111", "test", "test", "test", "01120", "lyon");
//var_dump($adminDAO->auth("mgoudet", "password"));

//---------------------tuteur------------------
$tuteurDAO = new TuteurDAO($bdd);
//$tut1 = new Tuteur(8, 2, 5, 8, "testLogTutModif", "test", "test@gmail.com", "0111111111", "test", "test", "iudykqgshc", "01120", "lyon");
//var_dump($tuteurDAO->find(2));

//-------------etudiant--------------
$etuDAO = new EtudiantDAO($bdd);
//$tut1 = $tuteurDAO->find(2);
$etu1 = new Etudiant(false, null, null, null, null, null, 10, "testEtuModif", "c", "s", "00115", "ds", "fd", "aEQ", "zqfs", "fqhsj");
var_dump($etuDAO->assignement(10, 2));

//---------------entreprise------------
$entDAO = new EntrepriseDAO($bdd);
//$ent1 = new Entreprise(3, "testEntModif", "dziohsj", "0200", "test", "02112", "test@km");
//var_dump($entDAO->find(1));




//----------Maitre apprentissage----
$maitreDAO = new MaitreApprentissageDAO($bdd);
//$ent1 = $entDAO->find(1);
//$MA1 = new MaitreApprentissage(3, "testModif", "test", "05120525", "dqscdcsqd", $ent1);
//var_dump($maitreDAO->find(1));

