<?php

namespace BO;


class Bilan1 extends Bilan
{
    private float $notEnt;
    private string $remBil;
    public function __construct(float $notEnt, float $remBil, int $idBil, float $notOra, float $notBil, string $libBil, Etudiant $monEtu){
        parent::__construct($idBil,$notOra,$notBil,$libBil, $monEtu);


        $this->notEnt = $notEnt;
        $this->remBil = $remBil;
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
}