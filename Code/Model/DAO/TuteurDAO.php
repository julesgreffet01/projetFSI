<?php

namespace DAO;


use BO\Tuteur;
use PDO;
require_once "DAO.php";
class TuteurDAO extends DAO
{

    public function create(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Tuteur) {
            $query = "Insert into Utilisateur (LogUti, MdpUti, MaiUti, TelUti, NomUti, PreUti, AdrUti, CpUti, VilUti, NbMaxEtu3, NbMaxEtu4, NbMaxEtu5, IdTypUti) VALUES (:log, :mdp, :mail, :tel, :nom, :pre, :adr, :cp, :ville, :nbMax3, :nbMax4, :nbMax5, 2)";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                "log" => $obj->getLogUti(),
                "mdp" => $obj->getMdpUti(),
                "mail" => $obj->getMailUti(),
                "tel" => $obj->getTelUti(),
                "nom" => $obj->getNomUti(),
                "pre" => $obj->getPreUti(),
                "adr" => $obj->getAdrUti(),
                "cp" => $obj->getCpUti(),
                "ville" => $obj->getVilUti(),
                "nbMax3" => $obj->getNbMax3(),
                "nbMax4" => $obj->getNbMax4(),
                "nbMax5" => $obj->getNbMax5()
            ]);
            if ($r) {
                $result = true;
            }
        }
        return $result;
    }

    public function update(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Tuteur) {
            $foundObj = $this->find($obj->getIdUti());
            if ($foundObj) {
                if ($obj->getIdUti() == $foundObj->getIdUti()) {
                    $query = "UPDATE Utilisateur SET LogUti = :log, MdpUti = :mdp, MaiUti = :mail, TelUti = :tel, NomUti = :nom, PreUti = :pre, AdrUti = :adr, CpUti = :cp, VilUti = :ville, NbMaxEtu3 = :nbMax3, NbMaxEtu4 = :nbMax4, NbMaxEtu5 = :nbMax5 WHERE IdUti = :id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "log" => $obj->getLogUti(),
                        "mdp" => $obj->getMdpUti(),
                        "mail" => $obj->getMailUti(),
                        "tel" => $obj->getTelUti(),
                        "nom" => $obj->getNomUti(),
                        "pre" => $obj->getPreUti(),
                        "adr" => $obj->getAdrUti(),
                        "cp" => $obj->getCpUti(),
                        "ville" => $obj->getVilUti(),
                        "nbMax3" => $obj->getNbMax3(),
                        "nbMax4" => $obj->getNbMax4(),
                        "nbMax5" => $obj->getNbMax5(),
                        "id" => $obj->getIdUti()
                    ]);
                    if ($r) {
                        $result = true;
                    }
                }
            }
        }
        return $result;
    }

    public function delete(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Tuteur) {
            $etuDAO = new EtudiantDAO($this->bdd);
            if($etuDAO->getAllEtuByTut($obj) == []) {
                $foundObj = $this->find($obj->getIdUti());
                if ($foundObj) {
                    if ($obj->getIdUti() == $foundObj->getIdUti()) {
                        $query = "DELETE FROM Utilisateur WHERE IdUti = :id";
                        $stmt = $this->bdd->prepare($query);
                        $r = $stmt->execute([
                            "id" => $obj->getIdUti()
                        ]);
                        if ($r) {
                            $result = true;
                        }
                    }
                }
            }
        }
        return $result;
    }

    public function find(int $id): ?object
    {
        $result = null;
        $query = "SELECT * FROM Utilisateur WHERE IdUti = :id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "id" => $id
        ]);
        if ($r) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if($row){
                $result = new Tuteur($row['NbMaxEtu3'], $row['NbMaxEtu4'], $row['NbMaxEtu5'], $row['IdUti'], $row['LogUti'], $row['MdpUti'], $row['MaiUti'], $row['TelUti'], $row['NomUti'], $row['PreUti'], $row['AdrUti'], $row['CpUti'], $row['VilUti']);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM Utilisateur where IdTypUti = 2";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $result[] = new Tuteur($row['NbMaxEtu3'], $row['NbMaxEtu4'], $row['NbMaxEtu5'], $row['IdUti'], $row['LogUti'], $row['MdpUti'], $row['MaiUti'], $row['TelUti'], $row['NomUti'], $row['PreUti'], $row['AdrUti'], $row['CpUti'], $row['VilUti']);
            }
        } else {
            $result = [null];
        }
        return $result;
    }

    public function auth(string $login, string $mdp): ?object {
        $result = null;
        $query = "SELECT * FROM Utilisateur WHERE LogUti = :login AND MdpUti = :mdp AND IdTypUti = 2";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "login" => $login,
            "mdp" => $mdp
        ]);
        if ($r) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if($row){
                $result = new Tuteur($row['NbMaxEtu3'], $row['NbMaxEtu4'], $row['NbMaxEtu5'], $row['IdUti'], $row['LogUti'], $row['MdpUti'], $row['MaiUti'], $row['TelUti'], $row['NomUti'], $row['PreUti'], $row['AdrUti'], $row['CpUti'], $row['VilUti']);
            }
        }
        return $result;
    }

    public function verifLog(string $log) : bool {
        $result = false;
        $query = "select * from Utilisateur where LogUti = :logUti";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute([
            "logUti" => $log
        ]);
        if ($stmt->rowCount() > 0){
            $result = true;
        }
        return $result;
    }

    public function verifNbMaxEtu3(Tuteur $tuteur): bool {
        $result = false;
        $etuDAO = new EtudiantDAO($this->bdd);
        $claDAO = new ClasseDAO($this->bdd);
        $cla = $claDAO->find(1);
        $nbEtu = count($etuDAO->getAllEtuByTutAndCla($tuteur, $cla));
        if ($tuteur->getNbMax3()){
            if ($nbEtu && $nbEtu>=$tuteur->getNbMax3()) {
                $result = true;
            }
        } else {
            $result = true;
        }
        return $result;
    }

    public function verifNbMaxEtu4(Tuteur $tuteur): bool {
        $result = false;
        $etuDAO = new EtudiantDAO($this->bdd);
        $claDAO = new ClasseDAO($this->bdd);
        $cla = $claDAO->find(2);
        $nbEtu = count($etuDAO->getAllEtuByTutAndCla($tuteur, $cla));
        if ($tuteur->getNbMax4()){
            if ($nbEtu && $nbEtu>=$tuteur->getNbMax4()) {
                $result = true;
            }
        } else {
            $result = true;
        }
        return $result;
    }

    public function verifNbMaxEtu5(Tuteur $tuteur): bool {
        $result = false;
        $etuDAO = new EtudiantDAO($this->bdd);
        $claDAO = new ClasseDAO($this->bdd);
        $cla = $claDAO->find(3);
        $nbEtu = count($etuDAO->getAllEtuByTutAndCla($tuteur, $cla));
        if ($tuteur->getNbMax5()){
            if ($nbEtu && $nbEtu>=$tuteur->getNbMax5()) {
                $result = true;
            }
        } else {
            $result = true;
        }
        return $result;
    }

    public function getAllTutGood() :array {
        $result = [];
        $mesTuts = $this->getAll();
        foreach ($mesTuts as $tut) {
            if (!$this->verifNbMaxEtu3($tut) || !$this->verifNbMaxEtu4($tut) || !$this->verifNbMaxEtu5($tut)){
                $result[] = $tut;
            }
        }
        return $result;
    }


}