<?php

namespace DAO;
require_once __DIR__ . "/../BO/Professeur.php";

use BO\Professeur;
use PDO;

require_once __DIR__."/DAO.php";

class ProfesseurDAO extends DAO
{

    public function create(object $obj): bool
    {
        //
        return true;
    }

    public function update(object $obj): bool
    {
        return true;
    }

    public function delete(object $obj): bool
    {
        return true;
    }

    public function find(int $id): ?object
    {
        $result = null;
        $query = "SELECT * FROM Professeur WHERE idprof = :idprof ";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'idprof' => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $result = new Professeur($row['idprof'], $row['nomprof'], $row['preprof'], $row['numprof']);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM Professeur";
        $stmt = $this->bdd->query($query);
        if($stmt){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row){
                $result[] = new Professeur($row['idprof'], $row['nomprof'], $row['preprof'], $row['numprof']);
            }
        } else {
            $result = [null];
        }
        return $result;
    }
}