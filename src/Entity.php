<?php
namespace HaliminAlexander\Entity;

use HalimonAlexander\PDODecorator\PDODecorator;

abstract class Entity
{
    protected $db;
    protected $dbStorage;
  
    abstract protected function dbStorage();

    public function __construct(PDODecorator $db)
    {
        $this->db = $db;
    }
}
