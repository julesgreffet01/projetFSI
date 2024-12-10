<?php

use BO\Etudiant;

session_start();

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";
require_once  __DIR__ ."/../Model/BO/Specialite.php";
require_once  __DIR__ ."/../Model/BO/MaitreApprentissage.php";
require_once  __DIR__ ."/../Model/BO/Entreprise.php";
require_once  __DIR__ ."/../Model/BO/Bilan1.php";
require_once  __DIR__ ."/../Model/BO/Bilan2.php";
require_once  __DIR__ ."/../Model/BO/Classe.php";

$titrefichier = "Mes Bilan";
$stylecss = "Style.css";
$uti = unserialize($_SESSION['utilisateur']);

if ($uti instanceof Etudiant) {
    $bil1 = $uti->getMesBilan1();                            //TODO finir la page html je sais pas ce qu il faut
    var_dump($bil1);
}
include_once ('../View/Nav_Bar.php');
include_once ('../View/Page_Mes_Bilan.php');
