<?php

namespace BO;


class Bilan2 extends Bilan
{
    private string $sujBil;

    public function __construct(string $sujBil, int $idBil, float $notOra, float $notBil, string $libBil, Etudiant $monEtu)
    {
        parent::__construct($idBil, $notOra, $notBil, $libBil, $monEtu);

        $this->sujBil = $sujBil;
    }

    public function getSujBil(): string
    {
        return $this->sujBil;
    }

    public function setSujBil(string $sujBil): void
    {
        $this->sujBil = $sujBil;
    }




}