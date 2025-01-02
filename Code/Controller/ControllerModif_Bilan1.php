<?php
session_start();

require_once __DIR__."/../Model/DAO/AdministrateurDAO.php";
require_once __DIR__."/../Model/DAO/TuteurDAO.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";


$titrefichier = "Modifier mon bilan";
$stylecss = "Blockinfo.css";
$stylecss3 = "Bouton.css";

include_once ('../View/Nav_Bar.php');
include_once ('../View/Modif_Bilan1.php');