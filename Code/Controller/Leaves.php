<?php
session_start();

session_unset();            //on enleve les données de session
session_destroy();          //on detruit completement la session

header('location: ControllerConnexion.php');