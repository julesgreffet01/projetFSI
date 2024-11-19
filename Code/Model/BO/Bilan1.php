<?php

namespace BO;


use DateTime;

class Bilan1 extends Bilan
{
    private float $notEnt;
    private string $remBil;
    private DateTime $datVisEnt;


    public function __construct(float $notEnt, string $remBil, DateTime $datVisEnt, int $idBil, string $libBil, float $notBil, float $notOra, Etudiant $monEtu)
    {
        parent::__construct($idBil, $libBil, $notBil, $notOra, $monEtu);
        $this->notEnt = $notEnt;
        $this->remBil = $remBil;
        $this->datVisEnt = $datVisEnt;
    }


    public function getNotEnt(): float
    {
        return $this->notEnt;
    }

    public function setNotEnt(float $notEnt): void
    {
        $this->notEnt = $notEnt;
    }

    public function getRemBil(): string
    {
        return $this->remBil;
    }

    public function setRemBil(string $remBil): void
    {
        $this->remBil = $remBil;
    }

    public function getDatVisEnt(): DateTime
    {
        return $this->datVisEnt;
    }

    public function setDatVisEnt(DateTime $datVisEnt): void
    {
        $this->datVisEnt = $datVisEnt;
    }


}