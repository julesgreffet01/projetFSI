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
            if ($obj->getIdMai() !== $this->find($obj->getIdMai())->getIdMai()) {
                $query = "INSERT INTO MaitreApprentissage(IdMai, NomMai, PreMai, TelMai, MaiMai, MonEnt) VALUES(:idMai, :nomMai, :preMai, :telMai, :mailMai, :monEnt)";
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
        return $result;
    }

    public function update(object $obj): bool
    {
        $result = false;
        if ($obj instanceof MaitreApprentissage) {
            $foundObj = $this->find($obj->getIdMai());
            if ($foundObj !== null) {
                if ($obj->getIdMai() == $foundObj->getIdMai()) {
                    $query = "UPDATE MaitreApprentissage SET NomMai = :nomMai, PreMai = :preMai, TelMai = :telMai, MaiMai = :mailMai, MonEnt = :monEnt WHERE IdMai = :idMai";
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
                if($obj->getIdMai() == $foundObj->getIdMai()){
                    $query = "DELETE FROM MaitreApprentissage WHERE IdMai = :idMai";
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
        $query = "SELECT * FROM MaitreApprentissage WHERE IdMai = :idMai";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'idMai' => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if ($row != null) {
                $monEnt = $entDAO->find($row['IdEnt']);
                $result = new MaitreApprentissage($row['IdMai'], $row['NomMai'], $row['PreMai'], $row['TelMai'], $row['MailMai'], $monEnt);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        return [null];
    }
}