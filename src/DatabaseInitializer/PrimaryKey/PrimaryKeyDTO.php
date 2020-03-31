<?php

namespace HalimonAlexander\Entity\DatabaseInitializer\PrimaryKey;

use HalimonAlexander\Entity\DatabaseInitializer\AbstractDTO;

class PrimaryKeyDTO extends AbstractDTO
{
    /** @var string|null */
    public $name;
    
    /** @var string */
    public $primaryKeyField;
    
    /**
     * @param string|null $name
     *
     * @return PrimaryKeyDTO
     */
    public function setName(?string $name): PrimaryKeyDTO
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @param string $primaryKeyField
     *
     * @return PrimaryKeyDTO
     */
    public function setPrimaryKeyField(string $primaryKeyField): PrimaryKeyDTO
    {
        $this->primaryKeyField = $primaryKeyField;
        
        return $this;
    }
}
