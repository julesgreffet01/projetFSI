<?php

namespace DAO;

use BO\Entreprise;
use PDO;
require_once __DIR__."/DAO.php";

class EntrepriseDAO extends DAO
{

    public function create(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Entreprise) {
                $query = "INSERT INTO Entreprise(NomEnt, AdrEnt, CpEnt, VilEnt, TelEnt, MaiEnt ) values (:nomEnt, :adrEnt, :cpEnt, :vilEnt, :telEnt, :mailEnt)";
                $stmt = $this->bdd->prepare($query);
                $r = $stmt->execute([
                    'nomEnt' => $obj->getNomEnt(),
                    'adrEnt' => $obj->getAdrEnt(),
                    'cpEnt' => $obj->getCpEnt(),
                    'vilEnt' => $obj->getVilEnt(),
                    'telEnt' => $obj->getTelEnt(),
                    'mailEnt' => $obj->getMailEnt()
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
        if ($obj instanceof Entreprise) {
            $foundObj = $this->find($obj->getIdEnt());
            if ($foundObj !== null) {
                if ($obj->getIdEnt() == $foundObj->getIdEnt()) {
                    $query = "UPDATE Entreprise SET NomEnt = :nomEnt, AdrEnt = :adrEnt, CpEnt = :cpEnt, VilEnt = :vilEnt, TelEnt = :telEnt, MaiEnt = :mailEnt WHERE IdEnt = :idEnt ";  //a finir
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        'nomEnt' => $obj->getNomEnt(),
                        'adrEnt' => $obj->getAdrEnt(),
                        'cpEnt' => $obj->getCpEnt(),
                        'vilEnt' => $obj->getVilEnt(),
                        'idEnt' => $obj->getIdEnt(),
                        'telEnt' => $obj->getTelEnt(),
                        'mailEnt' => $obj->getMailEnt()
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
        if ($obj instanceof Entreprise) {
            $MaDAO = new MaitreApprentissageDAO($this->bdd);
            $etuDAO = new EtudiantDAO($this->bdd);
            if($MaDAO->getAllMaByEnt($obj) != [] && $etuDAO->getAllEtuByEnt($obj) != []){
                $foundObj = $this->find($obj->getIdEnt());
                if ($foundObj !== null) {
                    if ($obj->getIdEnt() == $foundObj->getIdEnt()) {
                        $query = "DELETE FROM Entreprise WHERE IdEnt = :idEnt ";
                        $stmt = $this->bdd->prepare($query);
                        $r = $stmt->execute([
                            'idEnt' => $obj->getIdEnt()
                        ]);
                        if ($r !== false) {
                            $result = true;
                        }
                    }
                }
            }
        }
        return $result;
    }

    public function find(int $id): ?object
    {
        $result = null;
        $query = "SELECT * FROM Entreprise WHERE IdEnt = :idEnt ";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'idEnt' => $id
        ]);
        if ($r !== false) {
            $directeurDAO = new DirecteurDAO($this->bdd);
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $directeur = $directeurDAO->find($row['idDirecteur']);
                    $result = new Entreprise($row['IdEnt'], $row['NomEnt'], $row['AdrEnt'], $row['CpEnt'],$row['VilEnt'],$row['TelEnt'],$row['MaiEnt'], $directeur);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM Entreprise ";
        $stmt = $this->bdd->query($query);
        if ($stmt){
            $directeurDAO = new DirecteurDAO($this->bdd);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row){
                $directeur = $directeurDAO->find($row['idDirecteur']);
                $result[] = new Entreprise($row['IdEnt'], $row['NomEnt'], $row['AdrEnt'], $row['CpEnt'], $row['VilEnt'],$row['TelEnt'],$row['MaiEnt'], $directeur);
            }
        } else {
            $result = [null];
        }
        return $result;
    }
}