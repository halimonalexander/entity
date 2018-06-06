<?php
namespace HaliminAlexander\Entity;

use HalimonAlexander\PDODecorator\PDODecorator;

abstract class DbStorage extends Storage
{
  protected $db;
  
  function __construct(PDODecorator $db)
  {
    $this->db = $db;
  }
  
  abstract protected function findSql(array $conditions): string;
  
  public function find(array $conditions): array
  {
    $sql = $this->findSql($conditions) . ";";
    
    return $this->db->query($sql)->as_array();
  }
  
  public function findOne(array $conditions): ?array
  {
    $sql = $this->findSql($conditions) . " LIMIT 1;";
    
    $result = $this->db->query($sql)->row();
    if (empty($result))
      return null;
    
    return $result;
  }
}
