<?php

namespace BO;

class Specialite
{
    private int $idSpec;
    private string $nomSpec;

    public function __construct(int $idSpec, string $nomSpec)
    {
        $this->idSpec = $idSpec;
        $this->nomSpec = $nomSpec;
    }

    public function getIdSpec(): int
    {
        return $this->idSpec;
    }

    public function setIdSpec(int $idSpec): void
    {
        $this->idSpec = $idSpec;
    }

    public function getNomSpec(): string
    {
        return $this->nomSpec;
    }

    public function setNomSpec(string $nomSpec): void
    {
        $this->nomSpec = $nomSpec;
    }



}