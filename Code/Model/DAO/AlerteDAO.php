<?php

namespace DAO;

use BO\Alerte;
use BO\Bilan;
use BO\Bilan1;
use BO\Etudiant;
use BO\Tuteur;
use PDO;
use DateTime;

require_once __DIR__ . "/DAO.php";

class AlerteDAO extends DAO
{

    public function create(object $obj): bool
    {
        return false;
    }

    public function update(object $obj): bool
    {
        $result = false;
        if ($obj instanceof Alerte) {
            $foundObj = $this->find($obj->getIdAl());
            if ($foundObj) {
                if ($obj->getIdAl() == $foundObj->getIdAl()) {
                    $query = "Update Alerte set DatLimUn = :datLim1, DatLimDeux = :datLim2 where IdAle = :idAl";
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
        return false;
    }

    public function find(int $id): ?object
    {
        $result = null;
        $query = "select * from Alerte where IdAle = :idAl";
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
        return [];
    }

    public function getAllAl1ByTut(Tuteur $tut): ?array
    {
        $result = [];
        $al1 = $this->find(1);
        $dateOjd = new DateTime();
        if ($al1->getDatLimBil1() < $dateOjd) {
            $etuDAO = new EtudiantDAO($this->bdd);
            $mesEtu = $etuDAO->getAllEtuByTut($tut);
            foreach ($mesEtu as $et) {
                $bilan = $et->getMesBilan1();
                foreach ($bilan as $bil) {
                    if (is_null($bil->getLibBil())) {
                        $result[] = $et;
                    }
                }
            }
        }
        return $result;
    }

    public function getAllAl2ByTut(Tuteur $tut): ?array
    {
        $result = [];
        $al1 = $this->find(1);
        $dateOjd = new DateTime();
        if ($al1->getDatLimBil2() < $dateOjd) {
            $etuDAO = new EtudiantDAO($this->bdd);
            $mesEtu = $etuDAO->getAllEtuByTut($tut);
            foreach ($mesEtu as $et) {
                $bilan = $et->getMesBilan2();
                foreach ($bilan as $bil) {
                    if (is_null($bil->getLibBil())) {
                        $result[] = $et;
                    }
                }
            }
        }
        return $result;
    }

    public function getAllAl1(): ?array
    {
        $result = [];
        $tutDAO = new TuteurDAO($this->bdd);
        $tuts = $tutDAO->getAll();
        if ($tuts) {
            foreach ($tuts as $tut) {
                $mesEtu = $this->getAllAl1ByTut($tut);
                foreach ($mesEtu as $et) {
                    $result[] = $et;
                }
            }
        }
        return $result;
    }

    public function getAllAl2(): ?array
    {
        $result = [];
        $tutDAO = new TuteurDAO($this->bdd);
        $tuts = $tutDAO->getAll();
        if ($tuts) {
            foreach ($tuts as $tut) {
                $mesEtu = $this->getAllAl2ByTut($tut);
                foreach ($mesEtu as $et) {
                    $result[] = $et;
                }
            }
        }
        return $result;
    }

    public function getAlAccueilEtuByTut(Tuteur $tut): ?array
    {
        $result = [];
        $mesAl1 = $this->getAllAl1ByTut($tut);
        $mesAl2 = $this->getAllAl2ByTut($tut);
        $compteur = 0;
        foreach ($mesAl1 as $al1) {
            $result[] = "La visite en entreprise de " . $al1->getPreUti() . " " . $al1->getNomUti() . " est en retard";
            $compteur++;
            if ($compteur >= 2) {
                break;
            }
        }
        $max = 0;
        switch ($compteur) {
            case 0:
                $max = 2;
                break;
            case 1 :
                $max = 1;
                break;
            case 2 :
                break;
        }

        if ($max != 0) {
            foreach ($mesAl2 as $al2) {
                $result[] = "Le bilan 2 de " . $al2->getPreUti() . " " . $al2->getNomUti() . " est en retard";
                $compteur++;
                if ($compteur >= $max) {
                    break;
                }
            }
        }
        return $result;
    }

    public function getAlAcceuil(): ?array
    {
        $result = [];
        $tutDAO = new TuteurDAO($this->bdd);
        $tuts = $tutDAO->getAll();
        if ($tuts) {
            foreach ($tuts as $tut) {
                $mesEtu = $this->getAlAccueilEtuByTut($tut);
                foreach ($mesEtu as $et) {
                    $result[] = $et;
                }
            }
        }
        return $result;
    }


}