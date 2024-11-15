<?php

namespace BO;

abstract class Utilisateur
{
    protected int $idUti;
    protected string $logUti;
    protected string $mdpUti;
    protected string $mailUti;
    protected string $telUti;
    protected string $nomUti;
    protected string $preUti;
    protected string $vilUti;
    protected string $adrUti;
    protected string $cpUti;

    public function __construct(int $idUti, string $logUti, string $mdpUti, string $mailUti, string $telUti, string $nomUti, string $preUti, string $vilUti, string $adrUti, string $cpUti)
    {
        $this->idUti = $idUti;
        $this->logUti = $logUti;
        $this->mdpUti = $mdpUti;
        $this->mailUti = $mailUti;
        $this->telUti = $telUti;
        $this->nomUti = $nomUti;
        $this->preUti = $preUti;
        $this->vilUti = $vilUti;
        $this->adrUti = $adrUti;
        $this->cpUti = $cpUti;
    }


    public function getIdUti()
    {
        return $this->idUti;
    }


    public function setIdUti($idUti)
    {
        $this->idUti = $idUti;
    }

    public function getCpUti()
    {
        return $this->cpUti;
    }

    public function setCpUti($cpUti)
    {
        $this->cpUti = $cpUti;
    }


    public function getAdrUti()
    {
        return $this->adrUti;
    }


    public function setAdrUti($adrUti)
    {
        $this->adrUti = $adrUti;
    }


    public function getVilUti()
    {
        return $this->vilUti;
    }


    public function setVilUti($vilUti)
    {
        $this->vilUti = $vilUti;
    }


    public function getPreUti()
    {
        return $this->preUti;
    }

    public function setPreUti($preUti)
    {
        $this->preUti = $preUti;
    }

    public function getNomUti()
    {
        return $this->nomUti;
    }


    public function setNomUti($nomUti)
    {
        $this->nomUti = $nomUti;
    }


    public function getTelUti()
    {
        return $this->telUti;
    }


    public function setTelUti($telUti)
    {
        $this->telUti = $telUti;
    }


    public function getMailUti()
    {
        return $this->mailUti;
    }


    public function setMailUti($mailUti)
    {
        $this->mailUti = $mailUti;
    }


    public function getMdpUti()
    {
        return $this->mdpUti;
    }

    public function setMdpUti($mdpUti)
    {
        $this->mdpUti = $mdpUti;
    }


    public function getLogUti()
    {
        return $this->logUti;
    }


    public function setLogUti($logUti)
    {
        $this->logUti = $logUti;
    }




}