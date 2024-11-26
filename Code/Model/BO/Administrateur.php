<?php

namespace BO;

require_once "Utilisateur.php";
class Administrateur extends Utilisateur
{

    public function __construct(int $idUti, string $logUti, string $mdpUti, string $mailUti, string $telUti, string $nomUti, string $preUti, string $adrUti, string $cpUti, string $vilUti)
    {
        parent::__construct($idUti, $logUti, $mdpUti, $mailUti, $telUti, $nomUti, $preUti, $adrUti, $cpUti, $vilUti);
    }
}