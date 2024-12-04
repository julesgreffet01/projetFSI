<?php

namespace DAO;

use BO\Classe;
use PDO;
require_once 'DAO.php';

class ClasseDAO extends DAO
{

    public function create(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Classe) {
            $query = "INSERT INTO Classe(LibCla, NbEtu) VALUES(:libCla, :nbEtu)";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                "libCla" => $obj->getLibCla(),
                "nbEtu" => $obj->getNbMaxEtu()
            ]);
            if ($r !== false) {
                $result = true;
            }
        }
        return $result;
    }

    public function update(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Classe) {
            $foundObj = $this->find($obj->getIdCla());
            if ($foundObj !== null) {
                if ($obj->getIdCla() == $foundObj->getIdCla()) {
                    $query = "UPDATE Classe SET LibCla = :libCla, NbEtu = :nbEtu WHERE IdCla = :idCl";
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
        }
        return $result;
    }

    public function delete(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Classe) {
            $etuDAO = new EtudiantDAO($this->bdd);
            if ($etuDAO->getAllEtuByCla($obj) == []) {
                $foundObj = $this->find($obj->getIdCla());
                if ($foundObj !== null) {
                    if ($obj->getIdCla() == $foundObj->getIdCla()) {
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
        $query = "SELECT * FROM Classe";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $result[] = new Classe($row['IdCla'], $row['LibCla'], $row['NbEtu']);
            }
        } else {
            $result = [null] ;
        }

        return $result;
    }
}