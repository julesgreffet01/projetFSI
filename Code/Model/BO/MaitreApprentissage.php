<?php

namespace BO;

class MaitreApprentissage
{
    private int $idMai;
    private string $nomMai;
    private string $preMai;
    private string $telMai;
    private string $mailMai;
    private Entreprise $monEnt;


    public function __construct(int $idMai, string $nomMai, string $preMai, string $telMai, string $mailMai, Entreprise $monEnt)
    {
        $this->idMai = $idMai;
        $this->nomMai = $nomMai;
        $this->preMai = $preMai;
        $this->telMai = $telMai;
        $this->mailMai = $mailMai;
        $this->monEnt = $monEnt;
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
    public function toArray(): array {
        return[
            'idMA'=> $this->idMai,
            'nomMA'=> $this->nomMai
        ];
    }

}