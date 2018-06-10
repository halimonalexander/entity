<?php
namespace HalimonAlexander\Entity;

use HalimonAlexander\PDODecorator\PDODecorator;

abstract class Entity
{
    protected $dbStorage;
  
    abstract protected function dbStorage();
}
