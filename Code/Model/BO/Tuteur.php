<?php

namespace BO;
require_once __DIR__.'/Utilisateur.php';

class Tuteur extends Utilisateur
{
    private ?int $nbMax3;
    private ?int $nbMax4;
    private ?int $nbMax5;
    private array $mesEtu;


    public function __construct(?int $nbMax3, ?int $nbMax4, ?int $nbMax5, int $idUti, string $logUti, string $mdpUti, string $mailUti, string $telUti, string $nomUti, string $preUti, string $adrUti, string $cpUti, string $vilUti)
    {
        parent::__construct($idUti, $logUti, $mdpUti, $mailUti, $telUti, $nomUti, $preUti, $adrUti, $cpUti, $vilUti);
        $this->nbMax3 = $nbMax3;
        $this->nbMax4 = $nbMax4;
        $this->nbMax5 = $nbMax5;
        $this->mesEtu = [null];
    }


    public function getNbMax3() {
        return $this->nbMax3;
    }


    public function setNbMax3($nbMax3) {
        $this->nbMax3 = $nbMax3;
    }


    public function getNbMax4() {
        return $this->nbMax4;
    }


    public function setNbMax4($nbMax4)
    {
        $this->nbMax4 = $nbMax4;
    }


    public function getNbMax5()
    {
        return $this->nbMax5;
    }


    public function setNbMax5($nbMax5)
    {
        $this->nbMax5 = $nbMax5;
    }

    public function getMesEtu(): array
    {
        return $this->mesEtu;
    }

    public function setMesEtu(array $mesEtu): void
    {
        $this->mesEtu = $mesEtu;
    }

    public function toArray(): array {
        return[
            'idTut'=> $this->idUti,
            'nomTut'=> $this->nomUti,
            'preTut'=> $this->preUti,
            'adrUti'=> $this->adrUti,
            'cpUti'=> $this->cpUti,
            'vilUti'=> $this->vilUti,
            'telUti'=> $this->telUti,
            'mailUti'=> $this->mailUti,
            'nbMax3'=> $this->nbMax3,
            'nbMax4'=> $this->nbMax4,
            'nbMax5'=> $this->nbMax5
        ];
    }


}