<?php

namespace BO;
use DateTime;

class Alerte
{
    private int $idAl;

    private DateTime $datLimBil1;
    private DateTime $datLimBil2;


    public function __construct(int $idAl, DateTime $datLimBil1, DateTime $datLimBil2)
    {
        $this->idAl = $idAl;
        $this->datLimBil1 = $datLimBil1;
        $this->datLimBil2 = $datLimBil2;
    }


    public function getIdAl(): int
    {
        return $this->idAl;
    }

    public function setIdAl(int $idAl): void
    {
        $this->idAl = $idAl;
    }

    public function getDatLimBil2(): DateTime
    {
        return $this->datLimBil2;
    }

    public function setDatLimBil2(DateTime $datLimBil2): void
    {
        $this->datLimBil2 = $datLimBil2;
    }


    public function getDatLimBil1(): DateTime
    {
        return $this->datLimBil1;
    }

    public function setDatLimBil1(DateTime $datLimBil1): void
    {
        $this->datLimBil1 = $datLimBil1;
    }





}