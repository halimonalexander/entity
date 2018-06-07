<?php
namespace HalimonAlexander\Entity;

use ArrayAccess;
use RuntimeException;

abstract class ValueObject implements ArrayAccess
{
  private $asArray = [];
  
  abstract public function asArray(): array;
  
  final public function __toString()
  {
    return json_encode($this->asArray());
  }
  
  final public function offsetExists($offset) {
    if (empty($this->asArray))
      $this->asArray = $this->asArray();
    
    return isset($this->asArray[$offset]);
  }
  
  final public function offsetGet($offset) {
    if (empty($this->asArray))
      $this->asArray = $this->asArray();
    
    return $this->asArray[$offset] ?? null;
  }
  
  final public function offsetSet($offset, $value) {
    throw new RuntimeException('Readonly access');
  }
  
  final public function offsetUnset($offset) {
    throw new RuntimeException('Readonly access');
  }
}
