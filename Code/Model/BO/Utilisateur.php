<?php

namespace BO;

abstract class Utilisateur
{
    protected $idUti;
    protected $logUti;
    protected $mdpUti;
    protected $mailUti;
    protected $telUti;
    protected $nomUti;
    protected $preUti;
    protected $vilUti;
    protected $adrUti;
    protected $CPUti;

    public function __construct($idUti, $logUti, $mdpUti, $mailUti, $telUti, $nomUti, $preUti, $vilUti, $adrUti, $CPUti)
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
        $this->CPUti = $CPUti;
    }


    public function getIdUti()
    {
        return $this->idUti;
    }


    public function setIdUti($idUti)
    {
        $this->idUti = $idUti;
    }

    public function getCPUti()
    {
        return $this->CPUti;
    }

    public function setCPUti($CPUti)
    {
        $this->CPUti = $CPUti;
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