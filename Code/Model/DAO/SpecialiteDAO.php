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
        if ($obj->getId()!= $this->find($obj->getId())) {
            $query = "INSERT INTO Specialite (Nom_Spe) values (:libSpe)";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt -> execute(
            [
                ":libSpe"=>$obj->getNom(),
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
        return false;
    }

    public function delete(object $obj): bool
    {
        return false;
    }

    public function find(int $id): ?object
    {
        $result = null;
        $query = "SELECT * FROM Specialite WHERE id = :id";
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
        $result = [null];
        $query = "SELECT * FROM Specialite";
        $stmt = $this->bdd->prepare($query);
        if($stmt){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row){
                $result[] = new Specialite($row['IdSpe'], $row['NomSpe']);
            }
        }
        return $result;
    }
}