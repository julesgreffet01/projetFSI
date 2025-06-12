<?php

namespace BO;

class Entreprise
{
    private int $idEnt;
    private string $nomEnt;
    private string $adrEnt;
    private string $cpEnt;
    private string $vilEnt;
    private string $telEnt;
    private string $mailEnt;
    private Directeur $directeur;


    public function __construct(int $idEnt, string $nomEnt, string $adrEnt, string $cpEnt, string $vilEnt, string $telEnt, string $mailEnt, Directeur $directeur)
    {
        $this->idEnt = $idEnt;
        $this->nomEnt = $nomEnt;
        $this->adrEnt = $adrEnt;
        $this->cpEnt = $cpEnt;
        $this->vilEnt = $vilEnt;
        $this->telEnt = $telEnt;
        $this->mailEnt = $mailEnt;
        $this->directeur = $directeur;
    }

    public function getDirecteur(): Directeur
    {
        return $this->directeur;
    }

    public function setDirecteur(Directeur $directeur): void
    {
        $this->directeur = $directeur;
    }


    public function getIdEnt(): int
    {
        return $this->idEnt;
    }

    public function setIdEnt(int $idEnt): void
    {
        $this->idEnt = $idEnt;
    }

    public function getVilEnt(): string
    {
        return $this->vilEnt;
    }

    public function setVilEnt(string $vilEnt): void
    {
        $this->vilEnt = $vilEnt;
    }

    public function getCpEnt(): string
    {
        return $this->cpEnt;
    }

    public function setCpEnt(string $cpEnt): void
    {
        $this->cpEnt = $cpEnt;
    }

    public function getNomEnt(): string
    {
        return $this->nomEnt;
    }

    public function setNomEnt(string $nomEnt): void
    {
        $this->nomEnt = $nomEnt;
    }

    public function getAdrEnt(): string
    {
        return $this->adrEnt;
    }

    public function setAdrEnt(string $adrEnt): void
    {
        $this->adrEnt = $adrEnt;
    }

    public function getTelEnt(): string
    {
        return $this->telEnt;
    }

    public function setTelEnt(string $telEnt): void
    {
        $this->telEnt = $telEnt;
    }

    public function getMailEnt(): string
    {
        return $this->mailEnt;
    }

    public function setMailEnt(string $mailEnt): void
    {
        $this->mailEnt = $mailEnt;
    }


}