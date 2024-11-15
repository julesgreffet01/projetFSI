<?php

namespace BO;


class Administrateur extends Utilisateur
{

    public function __construct(int $idUti, string $logUti, string $mdpUti, string $mailUti, string $telUti, string $nomUti, string $preUti, string $vilUti, string $adrUti, string $cpUti)
    {
        parent::__construct($idUti, $logUti, $mdpUti, $mailUti, $telUti, $nomUti, $preUti, $vilUti, $adrUti, $cpUti);
    }
}