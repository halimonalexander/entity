<?php

namespace HalimonAlexander\Entity;

abstract class Entity
{
    protected DbStorage $dbStorage;
    protected Repository $repository;

    abstract protected function dbStorage();
}
