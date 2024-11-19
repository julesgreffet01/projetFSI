<?php

namespace BO;
use DateTime;


class Bilan2 extends Bilan
{
    private string $sujBil;
    private DateTime $datBil2;

    public function __construct(string $sujBil, int $idBil, float $notOra, float $notBil, string $libBil, Etudiant $monEtu, DateTime $datBil2)
    {
        parent::__construct($idBil, $notOra, $notBil, $libBil, $monEtu);

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

    public function getDatBil2(): DateTime
    {
        return $this->datBil2;
    }

    public function setDatBil2(DateTime $datBil2): void
    {
        $this->datBil2 = $datBil2;
    }




}