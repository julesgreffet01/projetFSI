<?php

namespace DAO;

use BO\Classe;
use DAO\DAO;
use PDO;

class ClasseDAO extends DAO
{

    public function create(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Classe) {
            if ($obj->getIdCla() !== $this->find($obj->getIdCla())->getIdCla()) {
                $query = "INSERT INTO classe(LibCla, NbEtu) VALUES(:libCla, :nbEtu)";
                $stmt = $this->bdd->prepare($query);
                $r = $stmt->execute([
                    "libCla" => $obj->getLibCla(),
                    "nbEtu" => $obj->getNbMaxEtu()
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
        if ($obj instanceof Classe) {
            if ($obj->getIdCla() == $this->find($obj->getIdCla())->getIdCla()) {
                $query = "UPDATE Classe SET LibCla = :libCla, NbEtu = :nbEtu WHERE idCla = :idCl";
                $stmt = $this->bdd->prepare($query);
                $r = $stmt->execute([
                    "libCla" => $obj->getLibCla(),
                    "nbEtu" => $obj->getNbMaxEtu(),
                    "idCl" => $obj->getIdCla()
                ]);
                if ($r !== false) {
                    $result = true;
                }
            }
        }
        return $result;
    }

    public function delete(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Classe) {
            if ($obj->getIdCla() == $this->find($obj->getIdCla())->getIdCla()) {
                $query = "DELETE FROM Classe WHERE IdCla = :idCl";
                $stmt = $this->bdd->prepare($query);
                $r = $stmt->execute([
                    "idCl" => $obj->getIdCla()
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
        $query = "SELECT * FROM Classe WHERE IdCla = :idCl";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "idCl" => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $result = new Classe($row['IdCla'], $row['LibCla'], $row['NbEtu']);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $result = [null];
        $query = "SELECT * FROM Classe";
        $stmt = $this->bdd->prepare($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $result[] = new Classe($row['IdCla'], $row['LibCla'], $row['NbEtu']);
            }
        }

        return $result;
    }
}