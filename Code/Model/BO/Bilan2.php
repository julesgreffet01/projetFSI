<?php

namespace BO;
use DateTime;


class Bilan2 extends Bilan
{
    private string $sujBil;
    private ?DateTime $datBil2;


    public function __construct(string $sujBil, ?DateTime $datBil2, int $idBil, string $libBil, float $notBil, float $notOra, Etudiant $monEtu)
    {
        parent::__construct($idBil, $libBil, $notBil, $notOra, $monEtu);
        $this->sujBil = $sujBil;
        $this->datBil2 = $datBil2;
    }


    public function getSujBil(): string
    {
        return $this->sujBil;
    }

    public function setSujBil(string $sujBil): void
    {
        $this->sujBil = $sujBil;
    }

    public function getDatBil2(): ?DateTime
    {
        return $this->datBil2;
    }

    public function setDatBil2(DateTime $datBil2): void
    {
        $this->datBil2 = $datBil2;
    }




}