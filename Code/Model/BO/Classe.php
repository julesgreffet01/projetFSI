<?php

namespace BO;

class Classe
{
    private int $idCla;
    private string $libCla;
    private int $nbMaxEtu;

    public function __construct(int $idCla, int $nbMaxEtu, string $libCla)
    {
        $this->idCla = $idCla;
        $this->nbMaxEtu = $nbMaxEtu;
        $this->libCla = $libCla;
    }

    public function getIdCla(): int
    {
        return $this->idCla;
    }

    public function setIdCla(int $idCla): void
    {
        $this->idCla = $idCla;
    }

    public function getNbMaxEtu(): int
    {
        return $this->nbMaxEtu;
    }

    public function setNbMaxEtu(int $nbMaxEtu): void
    {
        $this->nbMaxEtu = $nbMaxEtu;
    }

    public function getLibCla(): string
    {
        return $this->libCla;
    }

    public function setLibCla(string $libCla): void
    {
        $this->libCla = $libCla;
    }


}