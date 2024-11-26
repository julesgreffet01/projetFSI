<?php

namespace BO;

abstract class Bilan
{
    protected int $idBil;
    protected string $libBil;
    protected float $notBil;
    protected float $notOra;
    protected Etudiant $monEtu;

    public function __construct(int $idBil, string $libBil, float $notBil, float $notOra, Etudiant $monEtu)
    {
        $this->idBil = $idBil;
        $this->libBil = $libBil;
        $this->notBil = $notBil;
        $this->notOra = $notOra;
        $this->monEtu = $monEtu;
    }


    public function getIdBil(): int
    {
        return $this->idBil;
    }

    public function setIdBil(int $idBil): void
    {
        $this->idBil = $idBil;
    }

    public function getNotOra(): float
    {
        return $this->notOra;
    }

    public function setNotOra(float $notOra): void
    {
        $this->notOra = $notOra;
    }

    public function getNotBil(): float
    {
        return $this->notBil;
    }

    public function setNotBil(float $notBil): void
    {
        $this->notBil = $notBil;
    }

    public function getLibBil(): string
    {
        return $this->libBil;
    }

    public function setLibBil(string $libBil): void
    {
        $this->libBil = $libBil;
    }

    public function getMonEtu(): Etudiant
    {
        return $this->monEtu;
    }

    public function setMonEtu(Etudiant $monEtu): void
    {
        $this->monEtu = $monEtu;
    }

}