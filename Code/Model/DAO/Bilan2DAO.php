<?php

namespace DAO;

use BO\Bilan2;
use BO\Etudiant;
use PDO;

require_once 'DAO.php';

class Bilan2DAO extends DAO
{

    public function create(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Bilan2) {
            $query = "insert into bilan2 (LibBilDeux, NotBilDeux, NotOra2, SujBil, IdUti) values (:lib, :not, :ora, :suj, :iduti)";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                'lib'=> $obj->getLibBil(),
                'not'=> $obj->getNotBil(),
                'ora'=>$obj->getNotOra(),
                'suj'=> $obj->getSujBil(),
                'idUti'=>$obj->getMonEtu()->getIdUti()
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
                    date_default_timezone_set('Europe/Paris');
                    $date = date("Y-m-d");
                    $query = "update bilan2 set LibBilDeux = :lib, NotBilDeux = :not, NotOra2 = :ora, SujBil = :suj, IdUti = :idUti, DatBil2 = :dat where IdBilDeux = :id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        'lib'=> $obj->getLibBil(),
                        'not'=> $obj->getNotBil(),
                        'ora'=>$obj->getNotOra(),
                        'suj'=> $obj->getSujBil(),
                        'idUti'=>$obj->getMonEtu()->getIdUti(),
                        'dat'=>$date,
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
                    $query = "delete from bilan2 where IdBilDeux = :id";
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
        $query = "select * from bilan2 where IdBilDeux = :id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'id'=>$id
        ]);
        if ($r){
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if ($row){
                $etudiantDAO = new EtudiantDAO($this->bdd);
                $monEtu = $etudiantDAO->find($row['IdUti']);
                $result = new Bilan2($row['SujBil'], $row['DatBil2'], $row['IdBilDeux'], $row['LibBilDeux'], $row['NotBilDeux'], $row['NotOra2'], $monEtu);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $query = "select * from bilan2";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $etudiantDAO = new EtudiantDAO($this->bdd);
            foreach ($stmt as $row) {
                $monEtu = $etudiantDAO->find($row['IdUti']);
                $result[] = new Bilan2($row['SujBil'], $row['DatBil2'], $row['IdBilDeux'], $row['LibBilDeux'], $row['NotBilDeux'], $row['NotOra2'], $monEtu);
            }
        } else {
            $result = [null];
        }
        return $result;
    }

    public function getAllBil2ByEtu(Etudiant $etudiant): ?array {
        $query = "select * from bilan2 where IdUti = :idUti";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'idUti' => $etudiant->getIdUti()
        ]);
        if ($r) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $etudiantDAO = new EtudiantDAO($this->bdd);
            foreach ($stmt as $row) {
                $monEtu = $etudiantDAO->find($row['IdUti']);
                $result[] = new Bilan2($row['SujBil'], $row['DatBil2'], $row['IdBilDeux'], $row['LibBilDeux'], $row['NotBilDeux'], $row['NotOra2'], $monEtu);
            }
        } else {
            $result = [null];
        }
        return $result;
    }
}