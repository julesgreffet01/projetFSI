<?php

namespace DAO;

use BO\Administrateur;
use PDO;
require_once 'DAO.php';

class AdministrateurDAO extends DAO
{

    public function create(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Administrateur) {
            $query = "INSERT INTO Utilisateur (LogUti, MdpUti, MaiUti, TelUti, NomUti, PreUti, AdrUti, CpUti, VilUti, IdTypUti) VALUES (:log, :mdp, :mail, :tel, :nom, :pre, :adr, :cp, :ville, 3)";
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
                "ville" => $obj->getVilUti()
            ]);
            if ($r){
                $result = true;
            }
        }
        return $result;
    }

    public function update(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Administrateur) {
            $foundObj = $this->find($obj->getIdUti());
            if ($foundObj) {
                if ($obj->getIdUti() == $foundObj->getIdUti()) {
                    $query = "UPDATE Utilisateur SET LogUti = :log, MdpUti = :mdp, MaiUti = :mail, TelUti = :tel, NomUti = :nom, PreUti = :pre, AdrUti = :adr, CpUti = :cp, VilUti = :ville WHERE IdUti = :id";
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
                        "id" => $obj->getIdUti()
                    ]);
                    if ($r){
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
        if ($obj instanceof Administrateur) {
            $foundObj = $this->find($obj->getIdUti());
            if ($foundObj) {
                if ($obj->getIdUti() == $foundObj->getIdUti()) {
                    $query = "DELETE FROM Utilisateur WHERE IdUti = :id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "id" => $obj->getIdUti()
                    ]);
                    if($r){
                        $result = true;
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
            if ($row) {
                $result = new Administrateur($row['IdUti'], $row['LogUti'], $row['MdpUti'], $row['MaiUti'], $row['TelUti'], $row['NomUti'], $row['PreUti'], $row['AdrUti'], $row['CpUti'], $row['VilUti']);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM Utilisateur where IdTypUti = 3";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $result[] = new Administrateur($row['IdUti'], $row['LogUti'], $row['MdpUti'], $row['MaiUti'], $row['TelUti'], $row['NomUti'], $row['PreUti'], $row['AdrUti'], $row['CpUti'], $row['VilUti']);
            }
        } else {
            $result = [null];
        }
        return $result;
    }

    public function auth(string $log, string $mdp) :?object {
        $result = null;
        $query = "SELECT * FROM Utilisateur WHERE LogUti = :log AND MdpUti = :mdp AND IdTypUti = 3";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "log" => $log,
            "mdp" => $mdp
        ]);
        if ($r) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if ($row) {
                $result = new Administrateur($row['IdUti'], $row['LogUti'], $row['MdpUti'], $row['MaiUti'], $row['TelUti'], $row['NomUti'], $row['PreUti'], $row['AdrUti'], $row['CpUti'], $row['VilUti']);
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
}