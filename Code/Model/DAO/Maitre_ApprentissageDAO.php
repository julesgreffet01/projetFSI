<?php

namespace DAO;

use BO\Maitre_Apprentissage;

require_once 'DAO.php';

class Maitre_ApprentissageDAO extends DAO
{

    public function create(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Maitre_Apprentissage) {
            if ($obj->getIdMai() !== $this->find($obj->getIdMai())->getIdMai()) {
                $query = "INSERT INTO MaitreApprentissage(IdMai, NomMai, PreMai, TelMai, MailMai, MonEnt) VALUES(:idMai, :nomMai, :preMai, :telMai, :mailMai, :monEnt)";
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
        if ($obj instanceof Maitre_Apprentissage) {
            if ($obj->getIdMai() == $this->find($obj->getIdMai())->getIdMai()) {
                $query = "UPDATE MaitreApprentissage SET NomMai = :nomMai, PreMai = :preMai, TelMai = :telMai, MailMai = :mailMai, MonEnt = :monEnt WHERE idMai = :idMai";
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

    public function delete(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Maitre_Apprentissage) {
            if($obj->getIdMai() == $this->find($obj->getIdMai())->getIdMai()){
                $query = "DELETE FROM MaitreApprentissage WHERE idMai = :idMai";
                $stmt = $this->bdd->prepare($query);
                $r = $stmt->execute([
                    'idMai' => $obj->getIdMai()
                ]);
                if ($r !== false) {
                    $result = true;
                }
            }
        }
        return $result;
    }

    public function find(int $id): ?object
    {
        $result = null;
        $query = "SELECT * FROM MaitreApprentissage WHERE idMai = :idMai";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'idMai' => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(\PDO::FETCH_ASSOC)) ? $tmp : null;
            if ($row != null) {
                //faire in find de entreprise pour choper un objet

                $result = new Maitre_Apprentissage($row['IdMai'], $row['NomMai'], $row['PreMai'], $row['TelMai'], $row['MailMai'], $row['MonEnt']);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }
}