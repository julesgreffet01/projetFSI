<?php

namespace BO;
use DateTime;

class Alerte
{
    private int $idAl;
    private DateTime $datVisEnt;
    private DateTime $datLimBil1;
    private DateTime $datBil2;
    private DateTime $datLimBil2;

    /**
     * @param int $idAl
     * @param DateTime $datLimBil2
     * @param DateTime $datBil2
     * @param DateTime $datLimBil1
     * @param DateTime $datVisEnt
     */
    public function __construct(int $idAl, DateTime $datLimBil2, DateTime $datBil2, DateTime $datLimBil1, DateTime $datVisEnt)
    {
        $this->idAl = $idAl;
        $this->datLimBil2 = $datLimBil2;
        $this->datBil2 = $datBil2;
        $this->datLimBil1 = $datLimBil1;
        $this->datVisEnt = $datVisEnt;
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

    public function getDatBil2(): DateTime
    {
        return $this->datBil2;
    }

    public function setDatBil2(DateTime $datBil2): void
    {
        $this->datBil2 = $datBil2;
    }

    public function getDatLimBil1(): DateTime
    {
        return $this->datLimBil1;
    }

    public function setDatLimBil1(DateTime $datLimBil1): void
    {
        $this->datLimBil1 = $datLimBil1;
    }

    public function getDatVisEnt(): DateTime
    {
        return $this->datVisEnt;
    }

    public function setDatVisEnt(DateTime $datVisEnt): void
    {
        $this->datVisEnt = $datVisEnt;
    }




}