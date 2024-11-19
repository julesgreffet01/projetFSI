<?php

namespace DAO;

use BO\Entreprise;
use DAO\DAO;

class EntrepriseDAO extends DAO
{

    public function create(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Entreprise) {
            if ($obj->getIdEnt() !== $this->find($obj->getIdEnt())->getIdEnt()) {
                $query = "INSERT INTO Entreprise(NomEnt, AdrEnt, CpEnt, VilEnt) values (:nomEnt, :adrEnt, :cpEnt, :vilEnt)"; // a finir
                $stmt = $this->bdd->prepare($query);
                $r = $stmt->execute([
                    'nomEnt' => $obj->getNomEnt(),
                    'adrEnt' => $obj->getAdrEnt(),
                    'cpEnt' => $obj->getCpEnt(),
                    'vilEnt' => $obj->getVilEnt()
                ]);
                if ($r !== false) {
                    $result = true;
                }
            }
        }
        return $result;
    }

    public function update(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Entreprise) {
            if ($obj->getIdEnt() == $this->find($obj->getIdEnt())->getIdEnt()) {
                $query = "UPDATE Entreprise SET NomEnt = :nomEnt, AdrEnt = :adrEnt, CpEnt = :cpEnt, VilEnt = :vilEnt WHERE IdEnt = :idEnt ";  //a finir
                $stmt = $this->bdd->prepare($query);
                $r = $stmt->execute([
                    'nomEnt' => $obj->getNomEnt(),
                    'adrEnt' => $obj->getAdrEnt(),
                    'cpEnt' => $obj->getCpEnt(),
                    'vilEnt' => $obj->getVilEnt(),
                    'idEnt' => $obj->getIdEnt()
                ]);
                if ($r !== false) {
                    $result = true;
                }
            }
            return $result;
        }
    }

    public function delete(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Entreprise) {
            if ($obj->getIdEnt() == $this->find($obj->getIdEnt())->getIdEnt()) {
                $query = "DELETE FROM Entreprise WHERE IdEnt = :idEnt ";
                $stmt = $this->bdd->prepare($query);
                $r = $stmt->execute([
                    'idEnt' => $obj->getIdEnt()
                ]);
                if ($r !== false) {
                    $result = true;
                }
            }
        }
        return $result;
    }

    public function find(int $id): ?object
    {
        $result = null;
        $query = "SELECT * FROM Entreprise WHERE IdEnt = :idEnt ";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'idEnt' => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                    // a finir
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }
}