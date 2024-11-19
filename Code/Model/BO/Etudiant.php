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
    private array $mesBilan1;
    private array $mesBilan2;


    public function __construct(bool $altEtu, Tuteur $monTuteur, Specialite $maSpec, Classe $maClasse, Maitre_Apprentissage $monMaitreAp, Entreprise $monEnt, int $idUti, string $logUti, string $mdpUti, string $mailUti, string $telUti, string $nomUti, string $preUti, string $adrUti, string $cpUti, string $vilUti)
    {
        parent::__construct($idUti, $logUti, $mdpUti, $mailUti, $telUti, $nomUti, $preUti, $adrUti, $cpUti, $vilUti);
        $this->altEtu = $altEtu;
        $this->monTuteur = $monTuteur;
        $this->maSpec = $maSpec;
        $this->maClasse = $maClasse;
        $this->monMaitreAp = $monMaitreAp;
        $this->monEnt = $monEnt;
        $this->mesBilan1 = [null];
        $this->mesBilan2 = [null];
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

    public function getMesBilan1(): array
    {
        return $this->mesBilan1;
    }

    public function setMesBilan1(array $mesBilan1): void
    {
        $this->mesBilan1 = $mesBilan1;
    }

    public function getMesBilan2(): array
    {
        return $this->mesBilan2;
    }

    public function setMesBilan2(array $mesBilan2): void
    {
        $this->mesBilan2 = $mesBilan2;
    }



}