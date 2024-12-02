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

$bdd = initialiseConnexionBDD();



//------------------------------------ Specialité -------------------------------
$specDAO = new SpecialiteDAO($bdd);
var_dump($specDAO->getAll());
