<?php

namespace DAO;

use BO\Classe;
use DAO\DAO;

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
                $query = "UPDATE Classe SET LibCla = :libCla, NbEtu = :nbEtu WHERE idCl = :idCl";
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
        return false;
    }

    public function find(int $id): ?object
    {
        return null;
    }

    public function getAll(): array
    {
        return [null];
    }
}