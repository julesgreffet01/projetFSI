<?php

namespace DAO;

use BO\Specialite;
use PDO;
require_once 'DAO.php';



class SpecialiteDAO extends DAO
{



    public function create(object $obj): bool
    {
        $result = false;
        if($obj instanceof Specialite){
                $query = "INSERT INTO Specialite (NomSpe) values (:libSpe)";
                $stmt = $this->bdd->prepare($query);
                $r = $stmt -> execute(
                    [
                        ":libSpe"=>$obj->getNomSpec()
                    ]
                );
                if($r !== false){
                    $result = true;
                }
        }
        return $result;
    }

    public function update(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Specialite) {
            $foundObj = $this->find($obj->getIdSpec());
            if ($foundObj != null) {
                if ($obj->getIdSpec() == $foundObj->getIdSpec()) {
                    $query = "UPDATE  Specialite SET NomSpe = :libSpe WHERE IdSpe = :id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt -> execute(
                        [
                            ":libSpe"=>$obj->getNomSpec(),
                            ":id"=>$obj->getIdSpec()
                        ]
                    );
                    if($r !== false){
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
        if($obj instanceof Specialite) {
            $etuDAO = new EtudiantDAO($this->bdd);
            if ($etuDAO->getAllEtuBySpec($obj) !== true) {
                $foundObj = $this->find($obj->getIdSpec());
                if ($foundObj != null) {
                    if ($obj->getIdSpec() == $foundObj->getIdSpec()) {
                        $query = "DELETE FROM Specialite WHERE IdSpe = :id";
                        $stmt = $this->bdd->prepare($query);
                        $r = $stmt -> execute(
                            [
                                ":id"=>$obj->getIdSpec()
                            ]
                        );
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
        $query = "SELECT * FROM Specialite WHERE IdSpe = :id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt -> execute(
            [
                ":id"=>$id
            ]
        );
        if($r !== false){
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;       //permet de dire que si il prens pas de valeur le mettre null
            if (!is_null($row)) {
                $result = new Specialite($row['IdSpe'], $row['NomSpe']);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM Specialite";
        $stmt = $this->bdd->query($query);
        if($stmt){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row){
                $result[] = new Specialite($row['IdSpe'], $row['NomSpe']);
            }
        } else {
            $result = [null];
        }
        return $result;
    }
}