<?php

namespace DAO;

use BO\Alerte;
use BO\Bilan;
use BO\Bilan1;
use BO\Etudiant;
use BO\Tuteur;
use PDO;
use DateTime;
require_once "DAO.php";

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
                $result = new Alerte($row['IdAle'], new DateTime($row['DatLimUn']), new DateTime($row['DatLimDeux']));
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

    public function getAllAl1ByTut(Tuteur $tut): ?array {
      $al1 = $this->find(1);
        $dateOjd = date("Y-m-d");
        //if ($al1->getDatLimBil1() > $dateOjd) {
     if (true) {     //to do enlever
            $etuDAO = new EtudiantDAO($this->bdd);
               $mesEtu = $etuDAO->getAllEtuByTut($tut);
            var_dump($mesEtu);
           /*   foreach ($mesEtu as $me) {
                var_dump($me);
                die;
            }*/
        }
        return [];
    }
}