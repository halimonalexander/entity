<?php
namespace HalimonAlexander\Entity;

use HalimonAlexander\PDODecorator\PDODecorator;
use HalimonAlexander\Registry\Registry;

abstract class DbStorage extends Storage
{
  protected $db;
  
  function __construct()
  {
    $this->db = (Registry::getInstance())->getByClassname(PDODecorator::class);
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
