<?php

namespace BO;

class Classe
{
    private int $idCla;
    private string $libCla;
    private int $nbMaxEtu;
    private ?Professeur $prof;


    public function __construct(int $idCla, string $libCla, int $nbMaxEtu, Professeur $prof)
    {
        $this->idCla = $idCla;
        $this->libCla = $libCla;
        $this->nbMaxEtu = $nbMaxEtu;
        $this->prof = $prof;
    }

    public function getProf(): ?Professeur
    {
        return $this->prof;
    }

    public function setProf(?Professeur $prof): void
    {
        $this->prof = $prof;
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

    public function toArray(): array
    {
        return [
            'idCla' => $this->idCla,
            'libCla' => $this->libCla,
            'nbMaxEtu' => $this->nbMaxEtu
        ];
    }
}