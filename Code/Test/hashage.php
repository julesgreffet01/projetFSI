<?php
use DAO\AdministrateurDAO;
use DAO\EtudiantDAO;
use DAO\TuteurDAO;
use BO\Etudiant;
use BO\Tuteur;
use BO\Administrateur;

require_once __DIR__."/../Model/DAO/EtudiantDAO.php";
require_once  __DIR__."/../Model/DAO/AdministrateurDAO.php";
require_once  __DIR__."/../Model/DAO/TuteurDAO.php";

require_once __DIR__.'/../Model/BO/Administrateur.php';

require_once __DIR__."/../Model/BDDManager.php";


function hashPasswords() {

    $bdd = initialiseConnexionBDD();
    $etudiantDAO = new EtudiantDAO($bdd);
    $tuteurDAO = new TuteurDAO($bdd);
    $adminDAO = new AdministrateurDAO($bdd);

    echo "<h1>Migration des mots de passe</h1>";

    // Étape 1 : Récupérer et traiter tous les étudiants
    echo "<h2>Étudiants :</h2>";
    $etudiants = $etudiantDAO->getAll();
    foreach ($etudiants as $etudiant) {
        if ($etudiant instanceof Etudiant) {
            if (strlen($etudiant->getMdpUti()) !== 60) { // Si pas encore haché
                $hashedPassword = password_hash($etudiant->getMdpUti(), PASSWORD_DEFAULT);
                $etudiant->setMdpUti($hashedPassword);
                $etudiantDAO->update($etudiant);
                echo "Mot de passe de l'étudiant {$etudiant->getNomUti()} (ID: {$etudiant->getIdUti()}) mis à jour.<br>";
            } else {
                echo "Mot de passe de l'étudiant {$etudiant->getNomUti()} (ID: {$etudiant->getIdUti()}) déjà sécurisé.<br>";
            }
        }
    }

    // Étape 2 : Récupérer et traiter tous les tuteurs
    echo "<h2>Tuteurs :</h2>";
    $tuteurs = $tuteurDAO->getAll();
    foreach ($tuteurs as $tuteur) {
        if ($tuteur instanceof Tuteur) {
            if (strlen($tuteur->getMdpUti()) !== 60) { // Si pas encore haché
                $hashedPassword = password_hash($tuteur->getMdpUti(), PASSWORD_DEFAULT);
                $tuteur->setMdpUti($hashedPassword);
                $tuteurDAO->update($tuteur);
                echo "Mot de passe du tuteur {$tuteur->getNomUti()} (ID: {$tuteur->getIdUti()}) mis à jour.<br>";
            } else {
                echo "Mot de passe du tuteur {$tuteur->getNomUti()} (ID: {$tuteur->getIdUti()}) déjà sécurisé.<br>";
            }
        }
    }

    // Étape 3 : Récupérer et traiter tous les administrateurs
    echo "<h2>Administrateurs :</h2>";
    $admins = $adminDAO->getAll();
    foreach ($admins as $admin) {
        if ($admin instanceof Administrateur) {
            if (strlen($admin->getMdpUti()) !== 60) { // Si pas encore haché
                $hashedPassword = password_hash($admin->getMdpUti(), PASSWORD_DEFAULT);
                $admin->setMdpUti($hashedPassword);
                $adminDAO->update($admin);
                echo "Mot de passe de l'administrateur {$admin->getNomUti()} (ID: {$admin->getIdUti()}) mis à jour.<br>";
            } else {
                echo "Mot de passe de l'administrateur {$admin->getNomUti()} (ID: {$admin->getIdUti()}) déjà sécurisé.<br>";
            }
        }
    }

    echo "<h1>Migration terminée.</h1>";
}



