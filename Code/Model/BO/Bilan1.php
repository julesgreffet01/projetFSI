<?php

namespace BO;

require_once "Bilan.php";
use DateTime;

class Bilan1 extends Bilan
{
    private string $remBil;
    private float $notEnt;

    private ?DateTime $datVisEnt;


    public function __construct(string $remBil, float $notEnt, ?DateTime $datVisEnt, int $idBil, ?string $libBil, float $notBil, float $notOra, Etudiant $monEtu)
    {
        parent::__construct($idBil, $libBil, $notBil, $notOra, $monEtu);
        $this->remBil = $remBil;
        $this->notEnt = $notEnt;
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

    public function getDatVisEnt(): ?DateTime
    {
        return $this->datVisEnt;
    }

    public function setDatVisEnt(DateTime $datVisEnt): void
    {
        $this->datVisEnt = $datVisEnt;
    }


}