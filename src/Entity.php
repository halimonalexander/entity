<?php

namespace HalimonAlexander\Entity;

abstract class Entity
{
    /** @var DbStorage $dbStorage */
    protected $dbStorage;

    /** @var Repository $repository */
    protected $repository;

    abstract protected function dbStorage();
}
