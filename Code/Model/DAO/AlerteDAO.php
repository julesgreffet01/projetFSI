<?php

namespace DAO;

use BO\Alerte;
use PDO;

class AlerteDAO extends DAO
{

    public function create(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Alerte) {
            $query = "insert into alerte (DatLimUn, DatLimDeux) values (:datLim1, :datLim2)";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                'datLim1' => $obj->getDatLimBil1(),
                'datLim2' => $obj->getDatLimBil2()
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
        if ($obj instanceof Alerte) {
            $foundObj = $this->find($obj->getIdAl());
            if ($foundObj) {
                if ($obj->getIdAl() == $foundObj->getIdAl()) {
                    $query = "Update uilisateur set DatLimUn = :datLim1, DatLimDeux = :datLim2 where IdAle = :idAl";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        'datLim1' => $obj->getDatLimBil1(),
                        'datLim2' => $obj->getDatLimBil2(),
                        'idAl' => $obj->getIdAl()
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
        if ($obj instanceof Alerte) {
            $foundObj = $this->find($obj->getIdAl());
            if ($foundObj) {
                if ($obj->getIdAl() == $foundObj->getIdAl()) {
                    $query = "Delete from alerte where IdAle = :idAl";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        'idAl' => $obj->getIdAl()
                    ]);
                }
            }
        }
        return $result;
    }

    public function find(int $id): ?object
    {
        $result = null;
        $query = "select * from alerte where IdAle = :idAl";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'idAl' => $id
        ]);
        if ($r) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if ($row) {
                $result = new Alerte($row['IdAle'], $row['DatLimUn'], $row['DatLimDeux']);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $query = "select * from alerte";
        $stmt = $this->bdd->query($query);
        if($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $result[] = new Alerte($row['IdAle'],$row['DatLimUn'], $row['DatLimDeux']);
            }
        } else {
            $result = [null];
        }
        return $result;
    }

    public function VerifAl1(): int{
        $verif = 0;         //a finir avec etudiantDAO
        return $verif;
    }

    public function VerifAl2(): int{
        $verif = 0;
        return $verif;
    }
}