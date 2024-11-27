<?php

namespace DAO;

use BO\Bilan1;
use BO\Bilan2;
use BO\Etudiant;
use PDO;
use DateTime;

require_once "DAO.php";

class EtudiantDAO extends DAO
{

    public function create(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Etudiant) {
            $bil1DAO = new Bilan1DAO($this->bdd);
            $bil2DAO = new Bilan2DAO($this->bdd);
            $query = "insert into utilisateur (LogUti, MdpUti, MaiUti, TelUti, NomUti, PreUti, AltUti, AdrUti, CpUti, VilUti, IdEnt, IdMai, IdCla, IdSpe, IdTut, IdTypUti) values (:log, :mdp, :mail, :tel, :nom, :pre, :alt, :adr, :cp, :ville, :idEnt, :idMai, :idCla, :idTut, :idSpe, 1)";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                'log' => $obj->getLogUti(),
                'mdp' => $obj->getMdpUti(),
                'mail' => $obj->getMailUti(),
                'tel' => $obj->getTelUti(),
                'nom' => $obj->getNomUti(),
                'pre' => $obj->getPreUti(),
                'alt' => $obj->getAltEtu(),
                'adr' => $obj->getAdrUti(),
                'cp' => $obj->getCpUti(),
                'ville' => $obj->getVilUti(),
                'idEnt' => $obj->getMonEnt()->getIdEnt(),
                'idMai' => $obj->getMonMaitreAp()->getIdMai(),
                'idCla' => $obj->getMaClasse()->getIdCla(),
                'idTut'=> $obj->getMonTuteur()->getIdUti(),
                'idSpe' => $obj->getMaSpec()->getIdSpec()
            ]);
            $bil1 = new Bilan1("", 0, null, 0, "", 0, 0, $obj);
            $bil2 = new Bilan2("", null, 0, "", 0, 0, $obj);
            $bil1DAO->create($bil1);
            $bil2DAO->create($bil2);
            if ($r){
                $result = true;
            }
        }
        return $result;
    }

    public function update(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Etudiant) {
            $foundObj = $this->find($obj->getIdUti());
            if ($foundObj) {
                if ($obj->getLogUti() == $foundObj->getLogUti()) {
                    $query = "update utilisateur set LogUti = :log, MdpUti = :mdp, MaiUti = :mail, TelUti = :tel, NomUti = :nom, PreUti = :pre, AltUti = :alt, AdrUti = :adr, CpUti = :cp, VilUti = :vil, IdEnt = :idEnt, IdMai = :idMai, IdCla = :idCla, IdSpe = :idSpe, IdTut = :idTut where IdUti = :idUti";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        'log' => $obj->getLogUti(),
                        'mdp' => $obj->getMdpUti(),
                        'mail' => $obj->getMailUti(),
                        'tel' => $obj->getTelUti(),
                        'nom' => $obj->getNomUti(),
                        'pre' => $obj->getPreUti(),
                        'alt' => $obj->getAltEtu(),
                        'adr' => $obj->getAdrUti(),
                        'cp' => $obj->getCpUti(),
                        'ville' => $obj->getVilUti(),
                        'idEnt' => $obj->getMonEnt()->getIdEnt(),
                        'idMai' => $obj->getMonMaitreAp()->getIdMai(),
                        'idCla' => $obj->getMaClasse()->getIdCla(),
                        'idSpe' => $obj->getMaSpec()->getIdSpec(),
                        'idTut'=> $obj->getMonTuteur()->getIdUti(),
                        'idUti' => $obj->getIdUti()
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
        if ($obj instanceof Etudiant) {
            $bil1DAO = new Bilan1DAO($this->bdd);
            $bil2DAO = new Bilan2DAO($this->bdd);
            if ($bil1DAO->find($obj->getIdUti()) !== null && $bil2DAO->find($obj->getIdUti()) !== null){
                $foundObj = $this->find($obj->getIdUti());
                if ($foundObj) {
                    if ($obj->getLogUti() == $foundObj->getLogUti()) {
                        $query = "delete from utilisateur where IdUti = :idUti";
                        $stmt = $this->bdd->prepare($query);
                        $r = $stmt->execute([
                            'idUti' => $foundObj->getIdUti()
                        ]);
                        if ($r){
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
        $entDAO = new EntrepriseDAO($this->bdd);
        $claDAO = new ClasseDAO($this->bdd);
        $maDAO = new MaitreApprentissageDAO($this->bdd);
        $specDAO = new SpecialiteDAO($this->bdd);
        $tutDAO = new TuteurDAO($this->bdd);
        $query = "select * from utilisateur where IdUti = :idUti";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'idUti' => $id
        ]);
        if ($r){
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if ($row){
                $ent = $entDAO->find($row["IdEnt"]);
                $cla = $claDAO->find($row["IdCla"]);
                $spec = $specDAO->find($row["IdSpe"]);
                $ma = $maDAO->find($row["IdMai"]);
                $tut = $tutDAO->find($row["IdTut"]);
                $result = new Etudiant($row['AltUti'],$tut, $spec, $cla, $ma, $ent, $row['IdUti'], $row['LogUti'], $row['MdpUti'], $row['MaiUti'], $row['TelUti'], $row['NomUti'], $row['PreUti'], $row['AdrUti'], $row['CpUti'], $row['VilUti']);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $result = null;
        $entDAO = new EntrepriseDAO($this->bdd);
        $claDAO = new ClasseDAO($this->bdd);
        $maDAO = new MaitreApprentissageDAO($this->bdd);
        $specDAO = new SpecialiteDAO($this->bdd);
        $tutDAO = new TuteurDAO($this->bdd);
        $query = "select * from utilisateur";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $ent = $entDAO->find($row["IdEnt"]);
                $cla = $claDAO->find($row["IdCla"]);
                $spec = $specDAO->find($row["IdSpe"]);
                $ma = $maDAO->find($row["IdMai"]);
                $tut = $tutDAO->find($row["IdTut"]);
                $result[] = new Etudiant($row['AltUti'],$tut, $spec, $cla, $ma, $ent, $row['IdUti'], $row['LogUti'], $row['MdpUti'], $row['MaiUti'], $row['TelUti'], $row['NomUti'], $row['PreUti'], $row['AdrUti'], $row['CpUti'], $row['VilUti']);
            }
        } else {
            $result = [null];
        }
        return $result;
    }


}