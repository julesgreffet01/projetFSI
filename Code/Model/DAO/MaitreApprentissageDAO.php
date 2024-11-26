<?php

namespace DAO;

use BO\MaitreApprentissage;
use PDO;

require_once 'DAO.php';

class MaitreApprentissageDAO extends DAO
{

    public function create(object $obj): bool
    {
        $result = false;
        if ($obj instanceof MaitreApprentissage) {
                    $query = "INSERT INTO maitreapprentissage(IdMai, NomMai, PreMai, TelMai, MaiMai, IdEnt) VALUES(:idMai, :nomMai, :preMai, :telMai, :mailMai, :monEnt)";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        'idMai' => $obj->getIdMai(),
                        'nomMai' => $obj->getNomMai(),
                        'preMai' => $obj->getPreMai(),
                        'telMai' => $obj->getTelMai(),
                        'mailMai' => $obj->getMailMai(),
                        'monEnt' => $obj->getMonEnt()->getIdEnt()
                    ]);
                    if ($r !== false) {
                        $result = true;
                    }
                }
        return $result;
    }

    public function update(object $obj): bool
    {
        $result = false;
        if ($obj instanceof MaitreApprentissage) {
            $foundObj = $this->find($obj->getIdMai());
            if ($foundObj !== null) {
                if ($obj->getIdMai() == $foundObj->getIdMai()) {
                    $query = "UPDATE maitreapprentissage SET NomMai = :nomMai, PreMai = :preMai, TelMai = :telMai, MaiMai = :mailMai, IdEnt = :monEnt WHERE IdMai = :idMai";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        'idMai' => $obj->getIdMai(),
                        'nomMai' => $obj->getNomMai(),
                        'preMai' => $obj->getPreMai(),
                        'telMai' => $obj->getTelMai(),
                        'mailMai' => $obj->getMailMai(),
                        'monEnt' => $obj->getMonEnt()->getIdEnt()
                    ]);
                    if ($r !== false) {
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
        if ($obj instanceof MaitreApprentissage) {
            $foundObj = $this->find($obj->getIdMai());
            if ($foundObj != null) {
                //faire un find de tous les etudiants qui ont ce mec et si y en a, ne pas accepter la suppression puis mettre le $result a "clé etrangere"
                if($obj->getIdMai() == $foundObj->getIdMai()){
                    $query = "DELETE FROM maitreapprentissage WHERE IdMai = :idMai";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        'idMai' => $obj->getIdMai()
                    ]);
                    if ($r !== false) {
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
        $entDAO = new EntrepriseDAO($this->bdd);
        $query = "SELECT * FROM maitreapprentissage WHERE IdMai = :idMai";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'idMai' => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if ($row != null) {
                $monEnt = $entDAO->find($row['IdEnt']);
                $result = new MaitreApprentissage($row['IdMai'], $row['NomMai'], $row['PreMai'], $row['TelMai'], $row['MaiMai'], $monEnt);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $entDAO = new EntrepriseDAO($this->bdd);
        $query = "SELECT * FROM maitreapprentissage";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $monEnt = $entDAO->find($row['IdEnt']);
                $result[] = new MaitreApprentissage($row['IdMai'], $row['NomMai'], $row['PreMai'], $row['TelMai'], $row['MaiMai'], $monEnt);
            }
        } else {
            $result = [null];
        }
        return $result;
    }
}