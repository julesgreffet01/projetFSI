<?php

use BO\Administrateur;
use BO\Classe;
use DAO\ClasseDAO;
use DAO\EtudiantDAO;

session_start();

require_once __DIR__."/../Model/BO/Administrateur.php";
require_once __DIR__."/../Model/BO/Etudiant.php";
require_once __DIR__."/../Model/BO/Tuteur.php";

require_once __DIR__."/../Model/DAO/ClasseDAO.php";
require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once __DIR__."/../Model/BDDManager.php";

$titrefichier = "Classe";
$stylecss = "Parametre.css";
$titreparametre = "Classe";
$stylecss3 = "Bouton.css";
$bdd = initialiseConnexionBDD();
$Message = "";
$verif = false;

if (unserialize($_SESSION['utilisateur']) instanceof Administrateur) {
    $claDAO = new ClasseDAO($bdd);
    $clas = $claDAO->getAll();

    if (isset($_POST['btnAdd'])){
        if ($_POST['nom'] != "" && $_POST['nb'] != "" && empty($_POST['classe-select'])) {
            $nom = $_POST['nom'];
            $nb = $_POST['nb'];
            $cla = new Classe(0, $nom, $nb);
            if ($claDAO->create($cla)) {
                $Message = "creation reussie";
                $verif = true;
                $clas = $claDAO->getAll();
            } else {
                $Message = "erreur de creation";
                $verif = false;
            }
        } else {
            $Message = "Veuillez remplir tous les champs/ na pas séléctioner une classe";
            $verif = false;
        }
    }

    if (isset($_POST['btnUpdate'])) {
        if ($_POST['nom'] != "" && $_POST['nb'] != "" && isset($_POST['classe-select'])) {
            $etuDAO = new EtudiantDAO($bdd);
            $cla = $claDAO->find($_POST['classe-select']);
            $nom = $_POST['nom'];
            $nb = $_POST['nb'];
            $cla->setLibCla($nom);
            $cla->setNbMaxEtu($nb);
            if (count($etuDAO->getAllEtuByCla($cla)) >= $cla->getNbMaxEtu()) {
                $Message = "il y a trop d'etudiants dans cette classe";
            } else {
                if ($claDAO->update($cla)) {
                    $Message = "modification reussie";
                    $verif = true;
                    $clas = $claDAO->getAll();
                }
            }
        } else {
            $Message = "selectionnez une classe / remplissez tous les champs";
            $verif = false;
        }
    }

    if (isset($_POST['btnDelete'])) {
        if (isset($_POST['classe-select'])) {
            if (!empty($_POST['classe-select'])) {
                $cla = $claDAO->find($_POST['classe-select']);
                if ($claDAO->delete($cla)) {
                    $Message = "suppression reussie";
                    $verif = true;
                    $clas = $claDAO->getAll();
                } else {
                    $Message = "Il y des etudiants dans cette classe";
                    $verif = false;
                }
            } else {
                $Message = "selectionnez une classe";
                $verif = false;
            }
        } else {
            $Message = "selectionnez une classe";
            $verif = false;
        }

    }
    include_once ('../View/header_admin.php');
    include_once ('../View/Page_Parametre_Classe.php');
} else {
    header('location: ControllerConexion.php');
}