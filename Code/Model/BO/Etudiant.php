<?php

namespace BO;


class Etudiant extends Utilisateur
{
    private bool $altEtu;
    private Tuteur $monTuteur;
    private Specialite $maSpec;
    private Classe $maClasse;
    private Maitre_Apprentissage $monMaitreAp;
    private Entreprise $monEnt;


    public function __construct(bool $altEtu,Entreprise $monEnt, Maitre_Apprentissage $monMaitreAp, Classe $maClasse, Specialite $maSpec, Tuteur $monTuteur, int $idUti, string $logUti, string $mdpUti, string $mailUti, string $telUti, string $nomUti, string $preUti, string $vilUti, string $adrUti, string $cpUti)
    {
        parent::__construct($idUti, $logUti, $mdpUti, $mailUti, $telUti, $nomUti, $preUti, $vilUti, $adrUti, $cpUti);

        $this->altEtu = $altEtu;
        $this->monEnt = $monEnt;
        $this->monMaitreAp = $monMaitreAp;
        $this->maClasse = $maClasse;
        $this->maSpec = $maSpec;
        $this->monTuteur = $monTuteur;
    }

    public function isAltEtu(): bool
    {
        return $this->altEtu;
    }

    public function setAltEtu(bool $altEtu): void
    {
        $this->altEtu = $altEtu;
    }

    public function getMonMaitreAp(): Maitre_Apprentissage
    {
        return $this->monMaitreAp;
    }

    public function setMonMaitreAp(Maitre_Apprentissage $monMaitreAp): void
    {
        $this->monMaitreAp = $monMaitreAp;
    }

    public function getMaClasse(): Classe
    {
        return $this->maClasse;
    }

    public function setMaClasse(Classe $maClasse): void
    {
        $this->maClasse = $maClasse;
    }

    public function getMaSpec(): Specialite
    {
        return $this->maSpec;
    }

    public function setMaSpec(Specialite $maSpec): void
    {
        $this->maSpec = $maSpec;
    }

    public function getMonTuteur(): Tuteur
    {
        return $this->monTuteur;
    }

    public function setMonTuteur(Tuteur $monTuteur): void
    {
        $this->monTuteur = $monTuteur;
    }

    public function getMonEnt(): Entreprise
    {
        return $this->monEnt;
    }

    public function setMonEnt(Entreprise $monEnt): void
    {
        $this->monEnt = $monEnt;
    }

}