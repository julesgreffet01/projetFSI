<?php

namespace BO;


use DateTime;

class Bilan1 extends Bilan
{
    private float $notEnt;
    private string $remBil;
    private DateTime $datVisEnt;

    public function __construct(float $notEnt, float $remBil, int $idBil, float $notOra, float $notBil, string $libBil, Etudiant $monEtu, DateTime $datVisEnt)
    {
        parent::__construct($idBil, $notOra, $notBil, $libBil, $monEtu);


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