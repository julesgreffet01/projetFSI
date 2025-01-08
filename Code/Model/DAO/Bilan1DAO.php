<?php

namespace DAO;


use BO\Bilan1;
use BO\Etudiant;
use DateTime;
use PDO;

require_once __DIR__ . "/DAO.php";

class Bilan1DAO extends DAO
{

    public function create(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Bilan1) {
            $query = "insert into Bilan1 (LibBilUn, NotBilUn, RemBilUn, NotEnt, NotOra1, IdUti, DatBil1) VALUES (:lib, :not, :rem, :ent, :o1, :idUti, :dat)";
            $stmt = $this->bdd->prepare($query);
            $dat = $obj->getDatVisEnt()?->format('Y-m-d H:i:s');
            $r = $stmt->execute([
                'lib' => $obj->getLibBil(),
                'not' => $obj->getNotBil(),
                'rem' => $obj->getRemBil(),
                'ent' => $obj->getNotEnt(),
                'o1' => $obj->getNotOra(),
                'idUti' => $obj->getMonEtu()->getIdUti(),
                'dat' => $dat
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
        if ($obj instanceof Bilan1) {
            $foundObj = $this->find($obj->getIdBil());
            if ($foundObj) {
                if ($obj->getIdBil() == $foundObj->getIdBil()) {
                    $query = "update Bilan1 set LibBilUn = :lib, NotBilUn = :not, RemBilUn = :rem, NotEnt = :ent, NotOra1 = :o1, DatBil1 = :dat, IdUti = :idUti where IdBilUn = :idBil";
                    $stmt = $this->bdd->prepare($query);
                    $dat = $obj->getDatVisEnt()?->format('Y-m-d H:i:s');
                    $r = $stmt->execute([
                        'lib' => $obj->getLibBil(),
                        'not' => $obj->getNotBil(),
                        'rem' => $obj->getRemBil(),
                        'ent' => $obj->getNotEnt(),
                        'o1' => $obj->getNotOra(),
                        'dat' => $dat,
                        'idUti' => $obj->getMonEtu()->getIdUti(),
                        'idBil' => $obj->getIdBil()
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
        if ($obj instanceof Bilan1) {
            $foundObj = $this->find($obj->getIdBil());
            if ($foundObj) {
                if ($obj->getIdBil() == $foundObj->getIdBil()) {
                    $query = "delete from Bilan1 where IdBilUn = :idBil";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        'idBil' => $foundObj->getIdBil()
                    ]);
                    if ($r) {
                        $result = true;
                    }
                }
            }
        }
        return $result;
    }

    public function find(int $id): ?object
    {
        $result = null;
        $query = "select * from Bilan1 where IdBilUn = :idBil";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'idBil' => $id
        ]);
        if ($r) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if ($row) {
                $etudiantDAO = new EtudiantDAO($this->bdd);
                $monEtu = $etudiantDAO->find($row['IdUti']);
                $date = $row['DatBil1'] != null ? new DateTime($row['DatBil1']) : null;
                $result = new Bilan1($row['RemBilUn'], $row['NotEnt'], $date, $row['IdBilUn'], $row['LibBilUn'], $row['NotBilUn'], $row['NotOra1'], $monEtu);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $query = "select * from Bilan1";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $etudiantDAO = new EtudiantDAO($this->bdd);
            foreach ($stmt as $row) {
                $monEtu = $etudiantDAO->find($row['IdUti']);
                $date = $row['DatBil1'] != null ? new DateTime($row['DatBil1']) : null;
                $result[] = new Bilan1($row['RemBilUn'], $row['NotEnt'], $date, $row['IdBilUn'], $row['LibBilUn'], $row['NotBilUn'], $row['NotOra1'], $monEtu);
            }
        } else {
            $result = [null];
        }
        return $result;
    }

    public function getAllBil1ByEtu(Etudiant $etudiant): ?array
    {
        $result = [];
        $query = "select * from Bilan1 where IdUti = :idUti";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'idUti' => $etudiant->getIdUti()
        ]);
        if ($r) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $dat = ($row['DatBil1'] != null) ? new DateTime($row['DatBil1']) : null;
                $result[] = new Bilan1($row['RemBilUn'], $row['NotEnt'], $dat, $row['IdBilUn'], $row['LibBilUn'], $row['NotBilUn'], $row['NotOra1'], $etudiant);
            }
        } else {
            $result = [null];
        }
        return $result;
    }
}