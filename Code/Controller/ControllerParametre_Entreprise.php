<?php
session_start();


require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";

$titrefichier = "Entreprise";
$stylecss = "Parametre.css";
$titreparametre = "Entreprise";

include_once ('../View/header_admin.php');
include_once ('../View/Page_Parametre_Entreprise.php');