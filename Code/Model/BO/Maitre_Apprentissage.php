<?php

namespace BO;

class Maitre_Apprentissage
{
    private int $idMai;
    private string $nomMai;
    private string $preMai;
    private string $telMai;
    private string $mailMai;
    private Entreprise $monEnt;

    public function __construct(int $idMai, Entreprise $monEnt, string $mailMai, string $telMai, string $preMai, string $nomMai)
    {
        $this->idMai = $idMai;
        $this->monEnt = $monEnt;
        $this->mailMai = $mailMai;
        $this->telMai = $telMai;
        $this->preMai = $preMai;
        $this->nomMai = $nomMai;
    }

    public function getMonEnt(): Entreprise
    {
        return $this->monEnt;
    }

    public function setMonEnt(Entreprise $monEnt): void
    {
        $this->monEnt = $monEnt;
    }

    public function getMailMai(): string
    {
        return $this->mailMai;
    }

    public function setMailMai(string $mailMai): void
    {
        $this->mailMai = $mailMai;
    }

    public function getTelMai(): string
    {
        return $this->telMai;
    }

    public function setTelMai(string $telMai): void
    {
        $this->telMai = $telMai;
    }

    public function getPreMai(): string
    {
        return $this->preMai;
    }

    public function setPreMai(string $preMai): void
    {
        $this->preMai = $preMai;
    }

    public function getIdMai(): int
    {
        return $this->idMai;
    }

    public function setIdMai(int $idMai): void
    {
        $this->idMai = $idMai;
    }

    public function getNomMai(): string
    {
        return $this->nomMai;
    }

    public function setNomMai(string $nomMai): void
    {
        $this->nomMai = $nomMai;
    }


}