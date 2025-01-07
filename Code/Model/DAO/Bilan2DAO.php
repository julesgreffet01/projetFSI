<?php

namespace DAO;

use BO\Bilan2;
use BO\Etudiant;
use DateTime;
use PDO;

require_once __DIR__."/DAO.php";

class Bilan2DAO extends DAO
{

    public function create(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Bilan2) {
            $query = "insert into Bilan2 (LibBilDeux, NotBilDeux, NotOra2, SujBil, IdUti, DatBil2) values (:lib, :not, :ora, :suj, :idUti, :datBil)";
            $stmt = $this->bdd->prepare($query);
            $dat = $obj->getDatBil2() ? $obj->getDatBil2()->format('Y-m-d H:i:s') : null;
            $r = $stmt->execute([
                'lib'=> $obj->getLibBil(),
                'not'=> $obj->getNotBil(),
                'ora'=>$obj->getNotOra(),
                'suj'=> $obj->getSujBil(),
                'idUti'=>$obj->getMonEtu()->getIdUti(),
                'datBil'=>$dat
            ]);
            if ($r){
                $result = true;
            }
        }
        return $result;
    }

    public function update(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Bilan2) {
            $foundObj = $this->find($obj->getIdBil());
            if ($foundObj) {
                if ($obj->getLibBil() == $foundObj->getLibBil()) {
                    $query = "update Bilan2 set LibBilDeux = :lib, NotBilDeux = :not, NotOra2 = :ora, SujBil = :suj, IdUti = :idUti, DatBil2 = :dat where IdBilDeux = :id";
                    $stmt = $this->bdd->prepare($query);
                    $dat = $obj->getDatBil2() ? $obj->getDatBil2()->format('Y-m-d H:i:s') : null;
                    $r = $stmt->execute([
                        'lib'=> $obj->getLibBil(),
                        'not'=> $obj->getNotBil(),
                        'ora'=>$obj->getNotOra(),
                        'suj'=> $obj->getSujBil(),
                        'idUti'=>$obj->getMonEtu()->getIdUti(),
                        'dat'=>$dat,
                        'id'=>$obj->getIdBil()
                    ]);
                    if ($r){
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
        if ($obj instanceof Bilan2) {
            $foundObj = $this->find($obj->getIdBil());
            if ($foundObj) {
                if ($obj->getLibBil() == $foundObj->getLibBil()) {
                    $query = "delete from Bilan2 where IdBilDeux = :id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        'id'=>$obj->getIdBil()
                    ]);
                    if ($r){
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
        $query = "select * from Bilan2 where IdBilDeux = :id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'id'=>$id
        ]);
        if ($r){
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if ($row){
                $etudiantDAO = new EtudiantDAO($this->bdd);
                $monEtu = $etudiantDAO->find($row['IdUti']);
                $date = $row['DatBil2'] != null ? new DateTime($row['DatBil2']) : null;
                $result = new Bilan2($row['SujBil'], $date, $row['IdBilDeux'], $row['LibBilDeux'], $row['NotBilDeux'], $row['NotOra2'], $monEtu);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $query = "select * from Bilan2";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $etudiantDAO = new EtudiantDAO($this->bdd);
            foreach ($stmt as $row) {
                $monEtu = $etudiantDAO->find($row['IdUti']);
                $date = $row['DatBil2'] != null ? new DateTime($row['DatBil2']) : null;
                $result[] = new Bilan2($row['SujBil'], $date, $row['IdBilDeux'], $row['LibBilDeux'], $row['NotBilDeux'], $row['NotOra2'], $monEtu);
            }
        } else {
            $result = [null];
        }
        return $result;
    }

    public function getAllBil2ByEtu(Etudiant $etudiant): ?array {
        $result = [];
        $query = "select * from Bilan2 where IdUti = :idUti";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'idUti' => $etudiant->getIdUti()
        ]);
        if ($r) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $dat = $row['DatBil2'] != null ? new DateTime($row['DatBil2']) : null;
                $result[] = new Bilan2($row['SujBil'], $dat, $row['IdBilDeux'], $row['LibBilDeux'], $row['NotBilDeux'], $row['NotOra2'], $etudiant);
            }
        } else {
            $result = [null];
        }
        return $result;
    }
}