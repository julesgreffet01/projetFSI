<?php

namespace BO;

class Professeur
{
    private int $idprof ;
    private string $nomprof;
    private string $preprof;
    private string $numprof;


    public function __construct(string $nomprof, string $numprof, string $preprof, int $idprof)
    {
        $this->nomprof = $nomprof;
        $this->numprof = $numprof;
        $this->preprof = $preprof;
        $this->idprof = $idprof;
    }

    public function getIdprof(): int
    {
        return $this->idprof;
    }

    public function setIdprof(int $idprof): void
    {
        $this->idprof = $idprof;
    }

    public function getNomprof(): string
    {
        return $this->nomprof;
    }

    public function setNomprof(string $nomprof): void
    {
        $this->nomprof = $nomprof;
    }

    public function getPreprof(): string
    {
        return $this->preprof;
    }

    public function setPreprof(string $preprof): void
    {
        $this->preprof = $preprof;
    }

    public function getNumprof(): string
    {
        return $this->numprof;
    }

    public function setNumprof(string $numprof): void
    {
        $this->numprof = $numprof;
    }



}