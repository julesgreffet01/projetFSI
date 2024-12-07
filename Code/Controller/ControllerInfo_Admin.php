<?php
session_start();

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";
require_once __DIR__."/../Model/BO/Specialite.php";
require_once __DIR__."/../Model/BO/Classe.php";


$titrefichier = "Accueil";
$stylecss = "Blockinfo.css";

include_once ('../View/Nav_Bar.php');
include_once ('../View/Page_Info_Admin.php');
