<?php
namespace HalimonAlexander\Entity;

abstract class Entity
{
    protected $dbStorage;
  
    abstract protected function dbStorage();
}
