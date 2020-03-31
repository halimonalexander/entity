<?php

namespace HalimonAlexander\Entity\DatabaseInitializer\Indexes;

use HalimonAlexander\Entity\DatabaseInitializer\AbstractDTO;

class IndexDTO extends AbstractDTO
{
    /** @var string */
    public $column;
    
    /** @var bool */
    public $isUnique;
    
    /** @var string One of: btree, hash, gist, spgist, gin or brin */
    public $method;
    
    /** @var string|null */
    public $name;
    
    /**
     * @param string $column
     *
     * @return IndexDTO
     */
    public function setColumn(string $column): IndexDTO
    {
        $this->column = $column;
        
        return $this;
    }
    
    /**
     * @param bool $isUnique
     *
     * @return IndexDTO
     */
    public function setIsUnique(bool $isUnique): IndexDTO
    {
        $this->isUnique = $isUnique;
        
        return $this;
    }
    
    /**
     * @param string $method
     *
     * @return IndexDTO
     */
    public function setMethod(string $method): IndexDTO
    {
        $this->method = $method;
        
        return $this;
    }
    
    /**
     * @param string|null $name
     *
     * @return IndexDTO
     */
    public function setName(?string $name): IndexDTO
    {
        $this->name = $name;
        
        return $this;
    }
}
