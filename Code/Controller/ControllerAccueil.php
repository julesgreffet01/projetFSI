<?php
session_start();

require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/DAO/TuteurDAO.php";



$titrefichier = "Accueil";
$stylecss = "Style.css";


var_dump(unserialize($_SESSION['utilisateur'])); //to do enlever c est juste un test de comment on gere l objet dans les sessions






include_once ('../View/Nav_Bar.php');
include_once ('../View/Accueil_Etudiant.php');
