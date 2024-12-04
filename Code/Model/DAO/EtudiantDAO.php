<?php

namespace DAO;

use BO\Bilan1;
use BO\Bilan2;
use BO\Entreprise;
use BO\Etudiant;
use BO\Specialite;
use BO\Tuteur;
use BO\Classe;
use BO\MaitreApprentissage;
use PDO;

require_once "DAO.php";


class EtudiantDAO extends DAO
{

    public function create(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Etudiant) {
            $bil1DAO = new Bilan1DAO($this->bdd);
            $bil2DAO = new Bilan2DAO($this->bdd);
            $query = "insert into Utilisateur (LogUti, MdpUti, MaiUti, TelUti, NomUti, PreUti, AltUti, AdrUti, CpUti, VilUti, IdEnt, IdMai, IdCla, IdSpe, IdTut, IdTypUti) values (:log, :mdp, :mail, :tel, :nom, :pre, :alt, :adr, :cp, :ville, :idEnt, :idMai, :idCla, :idTut, :idSpe, 1)";
            $stmt = $this->bdd->prepare($query);
            if ($obj->getMonEnt()){
                $idEnt = $obj->getMonEnt()->getIdEnt();
            } else {
                $idEnt = null;
            }
            if ($obj->getMonMaitreAp()){
                $idMai = $obj->getMonMaitreAp()->getIdMai();
            } else {
                $idMai = null;
            }
            if($obj->getMaClasse()){
                $idCla = $obj->getMaClasse()->getIdCla();
            } else {
                $idCla = null;
            }
            if ($obj->getMonTuteur()){
                $idTut = $obj->getMonTuteur()->getIdUti();
            } else {
                $idTut = null;
            }
            if ($obj->getMaSpec()){
                $idSpec = $obj->getMaSpec()->getIdSpec();
            } else {
                $idSpec = null;
            }
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
                'idEnt' => $idEnt,
                'idMai' => $idMai,
                'idCla' => $idCla,
                'idTut'=> $idTut,
                'idSpe' => $idSpec
            ]);
            //creation de ses bilans de bases mais vide
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
                if ($obj->getIdUti() == $foundObj->getIdUti()) {
                    $query = "update Utilisateur set LogUti = :log, MdpUti = :mdp, MaiUti = :mail, TelUti = :tel, NomUti = :nom, PreUti = :pre, AltUti = :alt, AdrUti = :adr, CpUti = :cp, VilUti = :ville, IdEnt = :idEnt, IdMai = :idMai, IdCla = :idCla, IdSpe = :idSpe, IdTut = :idTut where IdUti = :idUti";
                    $stmt = $this->bdd->prepare($query);
                    if ($obj->getMonEnt()){
                        $idEnt = $obj->getMonEnt()->getIdEnt();
                    } else {
                        $idEnt = null;
                    }
                    if ($obj->getMonMaitreAp()){
                        $idMai = $obj->getMonMaitreAp()->getIdMai();
                    } else {
                        $idMai = null;
                    }
                    if($obj->getMaClasse()){
                        $idCla = $obj->getMaClasse()->getIdCla();
                    } else {
                        $idCla = null;
                    }
                    if ($obj->getMonTuteur()){
                        $idTut = $obj->getMonTuteur()->getIdUti();
                    } else {
                        $idTut = null;
                    }
                    if ($obj->getMaSpec()){
                        $idSpec = $obj->getMaSpec()->getIdSpec();
                    } else {
                        $idSpec = null;
                    }
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
                        'idEnt' => $idEnt,
                        'idMai' => $idMai,
                        'idCla' => $idCla,
                        'idSpe' => $idSpec,
                        'idTut'=> $idTut,
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
            if ($bil1DAO->getAllBil1ByEtu($obj) == [null] && $bil2DAO->getAllBil2ByEtu($obj) == [null]){
                $foundObj = $this->find($obj->getIdUti());
                if ($foundObj) {
                    if ($obj->getLogUti() == $foundObj->getLogUti()) {
                        $query = "delete from Utilisateur where IdUti = :idUti";
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
            else {
                $query = "delete from bilan1 where IdUti = :idUti";
                $stmt = $this->bdd->prepare($query);
                $r = $stmt->execute([
                    'idUti' => $obj->getIdUti()
                ]);
                $query2 = "delete from bilan2 where IdUti = :idUti";
                $stmt = $this->bdd->prepare($query2);
                $r2 = $stmt->execute([
                    'idUti' => $obj->getIdUti()
                ]);
                if ($r && $r2){
                    $rTmp = true;
                }

                $foundObj = $this->find($obj->getIdUti());
                if ($foundObj) {
                    if ($obj->getLogUti() == $foundObj->getLogUti()) {
                        $query = "delete from Utilisateur where IdUti = :idUti";
                        $stmt = $this->bdd->prepare($query);
                        $r = $stmt->execute([
                            'idUti' => $foundObj->getIdUti()
                        ]);
                        if ($r && $rTmp){
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
        $bil1DAO = new Bilan1DAO($this->bdd);
        $bil2DAO = new Bilan2DAO($this->bdd);

        $query = "select * from Utilisateur where IdUti = :idUti and IdTypUti = 1";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'idUti' => $id
        ]);
        if ($r){
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if ($row){
                $ent = $cla = $spec = $ma = $tut = null;
                if ($row['IdEnt']){
                    $ent = $entDAO->find($row["IdEnt"]);
                }
                if ($row['IdCla']){
                    $cla = $claDAO->find($row["IdCla"]);

                }
                if ($row['IdSpe']){
                    $spec = $specDAO->find($row["IdSpe"]);
                }
                if ($row['IdMai']){
                    $ma = $maDAO->find($row["IdMai"]);
                }
                if ($row['IdTut']){
                    $tut = $tutDAO->find($row["IdTut"]);
                }
                $result = new Etudiant($row['AltUti'],$tut, $spec, $cla, $ma, $ent, $row['IdUti'], $row['LogUti'], $row['MdpUti'], $row['MaiUti'], $row['TelUti'], $row['NomUti'], $row['PreUti'], $row['AdrUti'], $row['CpUti'], $row['VilUti']);

                $bil1 = $bil1DAO->getAllBil1ByEtu($result);
                if ($bil1 == null){
                    $bil1 = [];
                }
                $result->setMesBilan1($bil1);


                $bil2 = $bil2DAO->getAllBil2ByEtu($result);
                if ($bil2 == null){
                    $bil2 = [];
                }
                $result->setMesBilan2($bil2);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $entDAO = new EntrepriseDAO($this->bdd);
        $claDAO = new ClasseDAO($this->bdd);
        $maDAO = new MaitreApprentissageDAO($this->bdd);
        $specDAO = new SpecialiteDAO($this->bdd);
        $tutDAO = new TuteurDAO($this->bdd);
        $query = "select * from Utilisateur where IdTypUti = 1";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $ent = $cla = $spec = $ma = $tut = null;
                if ($row['IdEnt']){
                    $ent = $entDAO->find($row["IdEnt"]);
                }
                if ($row['IdCla']){
                    $cla = $claDAO->find($row["IdCla"]);

                }
                if ($row['IdSpe']){
                    $spec = $specDAO->find($row["IdSpe"]);
                }
                if ($row['IdMai']){
                    $ma = $maDAO->find($row["IdMai"]);
                }
                if ($row['IdTut']){
                    $tut = $tutDAO->find($row["IdTut"]);
                }
                $result[] = new Etudiant($row['AltUti'],$tut, $spec, $cla, $ma, $ent, $row['IdUti'], $row['LogUti'], $row['MdpUti'], $row['MaiUti'], $row['TelUti'], $row['NomUti'], $row['PreUti'], $row['AdrUti'], $row['CpUti'], $row['VilUti']);
            }
        } else {
            $result = [null];
        }

        //on fait pas la partie avec les bilans car y a aucun moment ou on a besoin d avoir tous les etudiant avec tous leut bilan
        return $result;
    }

    public function assignement(int $etu, int $tut): bool
    {
        $result = false;
        $tuteurDAO = new TuteurDAO($this->bdd);
        $tut = $tuteurDAO->find($tut);
        $etu = $this->find($etu);
        if ($tut && $etu){
            if ($etu->getMonTuteur() == null){
                $etu->setMonTuteur($tut);
                $a = $this->update($etu);
                if($a){
                    $result = true;
                }
            }
        }
        return $result;
    }

    public function auth(string $log, string $mdp) :bool {
        $result = false;
        $query = "SELECT * FROM Utilisateur WHERE LogUti = :log AND MdpUti = :mdp AND IdTypUti = 1";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "log" => $log,
            "mdp" => $mdp
        ]);
        if ($r){
            $result = true;
        }
        return $result;
    }

    public function getAllEtuByTut(Tuteur $tut) : ?array {

        $result = [];
        $entDAO = new EntrepriseDAO($this->bdd);
        $claDAO = new ClasseDAO($this->bdd);
        $maDAO = new MaitreApprentissageDAO($this->bdd);
        $specDAO = new SpecialiteDAO($this->bdd);
        $tutDAO = new TuteurDAO($this->bdd);
        $bil1DAO = new Bilan1DAO($this->bdd);
        $bil2DAO = new Bilan2DAO($this->bdd);

        $query = "select * from Utilisateur where IdTut = :idUti and IdTypUti = 1";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "idUti" => $tut->getIdUti()
        ]);
        if ($r){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $ent = $cla = $spec = $ma = $tut = null;
                if ($row['IdEnt']){
                    $ent = $entDAO->find($row["IdEnt"]);
                }
                if ($row['IdCla']){
                    $cla = $claDAO->find($row["IdCla"]);

                }
                if ($row['IdSpe']){
                    $spec = $specDAO->find($row["IdSpe"]);
                }
                if ($row['IdMai']){
                    $ma = $maDAO->find($row["IdMai"]);
                }
                if ($row['IdTut']){
                    $tut = $tutDAO->find($row["IdTut"]);
                }
                 $e = new Etudiant($row['AltUti'],$tut, $spec, $cla, $ma, $ent, $row['IdUti'], $row['LogUti'], $row['MdpUti'], $row['MaiUti'], $row['TelUti'], $row['NomUti'], $row['PreUti'], $row['AdrUti'], $row['CpUti'], $row['VilUti']);
                $bil1 = $bil1DAO->getAllBil1ByEtu($e);
                if ($bil1 == null){
                    $bil1 = [];
                }
                $e->setMesBilan1($bil1);


                $bil2 = $bil2DAO->getAllBil2ByEtu($e);
                if ($bil2 == null){
                    $bil2 = [];
                }
                $e->setMesBilan2($bil2);
                $result[] = $e;
            }
        } else {
            $result = [null];
        }
        return $result;
    }

    public function getAllEtuByCla(Classe $cla) : array {
        $result = [];

        $entDAO = new EntrepriseDAO($this->bdd);
        $claDAO = new ClasseDAO($this->bdd);
        $maDAO = new MaitreApprentissageDAO($this->bdd);
        $specDAO = new SpecialiteDAO($this->bdd);
        $tutDAO = new TuteurDAO($this->bdd);

        $query = "select * from Utilisateur where IdCla = :idCla";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "idCla" => $cla->getIdCla()
        ]);
        if ($r){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $ent = $entDAO->find($row["IdEnt"]);
                $cla = $claDAO->find($row["IdCla"]);
                $spec = $specDAO->find($row["IdSpe"]);
                $ma = $maDAO->find($row["IdMai"]);
                $tut = $tutDAO->find($row["IdTut"]);
                $result[] = new Etudiant($row['AltUti'],$tut, $spec, $cla, $ma, $ent, $row['IdUti'], $row['LogUti'], $row['MdpUti'], $row['MaiUti'], $row['TelUti'], $row['NomUti'], $row['PreUti'], $row['AdrUti'], $row['CpUti'], $row['VilUti']);
            }
        }
        return $result;
    }

    public function getAllEtuNoTutByCla(Classe $cla) : array {
        $entDAO = new EntrepriseDAO($this->bdd);
        $claDAO = new ClasseDAO($this->bdd);
        $maDAO = new MaitreApprentissageDAO($this->bdd);
        $specDAO = new SpecialiteDAO($this->bdd);
        $tutDAO = new TuteurDAO($this->bdd);
        $query = "select * from Utilisateur where IdCla = :idCla and IdTut is null";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "idCla" => $cla->getIdCla()
        ]);
        if ($r){
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

    public function getAllEtuByEnt(Entreprise $ent) : bool {
        $result = false;
        $query = "select * from Utilisateur where IdEnt = :idEnt";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute([
            "idEnt" => $ent->getIdEnt()
        ]);
        if ($stmt -> rowCount() > 0){
            $result = true;
        }
        return $result;
    }

    public function getAllEtuBySpec(Specialite $spec) : bool {
        $result = false;
        $query = "select * from Utilisateur where IdSpe = :idSpe";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute([
            "idSpe" => $spec->getIdSpec()
        ]);
        if ($stmt->rowCount() > 0){
            $result = true;
        }
        return $result;
    }

    public function getAllEtuByMaiApp(MaitreApprentissage $ma) : bool {
        $result = false;
        $query = "select * from Utilisateur where IdMai = :idMai";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute([
            'idMai'=>$ma->getIdMai()
        ]);
        if ($stmt->rowCount() > 0){
            $result = true;
        }
        return $result;
    }

    public function getAllEtuByTutBool(Tuteur $tut) : bool {
        $result = false;
        $query = "select * from Utilisateur where IdTut = :idTut";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'idTut' => $tut->getIdUti()
        ]);
        if ($r){
            $result = true;
        }
        return $result;
    }
}