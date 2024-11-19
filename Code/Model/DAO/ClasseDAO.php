<?php

namespace DAO;

use DAO\DAO;

class ClasseDAO extends DAO
{

    public function create(object $obj): bool
    {
        return false;
    }

    public function update(object $obj): bool
    {
        return false;
    }

    public function delete(object $obj): bool
    {
        return false;
    }

    public function find(int $id): ?object
    {
        return null;
    }

    public function getAll(): array
    {
        return [null];
    }
}