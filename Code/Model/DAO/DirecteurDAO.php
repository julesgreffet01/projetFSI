<?php

namespace DAO;

use BO\Directeur;
use DAO\DAO;
use PDO;
require_once __DIR__."/DAO.php";
require_once __DIR__.'/../BO/Directeur.php';

class DirecteurDAO extends DAO
{

    public function create(object $obj): bool
    {
        return false;
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
        $query = "SELECT * FROM Directeur where id = :id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt -> execute(
            [
                ":id"=>$id
            ]
        );
        if($r !== false){
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;       //permet de dire que si il prens pas de valeur le mettre null
            if (!is_null($row)) {
                $result = new Directeur($row['id'], $row['nom'], $row['prenom']);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        return [];
    }
}