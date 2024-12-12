<?php


session_start();

use BO\Etudiant;
use DAO\EntrepriseDAO;
use DAO\EtudiantDAO;

require_once __DIR__."/../Model/BO/Etudiant.php";

require_once  __DIR__ ."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

$titrefichier = "Modification info étudiant";
$stylecss = "Blockinfo.css";
$stylecss2 = "Bouton.css";

$bdd = initialiseConnexionBDD();

if(unserialize($_SESSION['utilisateur'])instanceof Etudiant){
    $etudao = new EtudiantDAO($bdd);
    $utilisateur = $etudao->find(unserialize($_SESSION['utilisateur'])->getIdUti());

}else{
    header('Location: connexion.php');
}


include_once ('../View/Nav_Bar.php');
include_once ('../View/ModifInfo_Etudiant.php');