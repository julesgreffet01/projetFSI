<?php

namespace DAO;

use PDO;

abstract class DAO
{
    protected PDO $bdd;

    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public abstract function create(object $obj): bool;

    public abstract function update(object $obj): bool;

    public abstract function delete(object $obj): bool;

    public abstract function find(int $id): ?object;

    public abstract function getAll(): array;


}