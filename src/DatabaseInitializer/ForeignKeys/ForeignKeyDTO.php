<?php

namespace HalimonAlexander\Entity\DatabaseInitializer\ForeignKeys;

use HalimonAlexander\Entity\AbstractDatabaseInitializer;
use HalimonAlexander\Entity\DatabaseInitializer\AbstractDTO;

class ForeignKeyDTO extends AbstractDTO
{
    public const FIELD_ON_ACTION_CASCADE = 'CASCADE';
    public const FIELD_ON_ACTION_NONE = 'NONE';
    public const FIELD_ON_ACTION_RESTRICT = 'RESTRICT';
    public const FIELD_ON_ACTION_SET_NULL = 'SET NULL';
    
    /** @var string */
    public $field;
    
    /** @var string|null */
    public $name;
    
    /** @var string */
    public $onDelete;
    
    /** @var string */
    public $onUpdate;
    
    /** @var AbstractDatabaseInitializer */
    public $references;
    
    /** @var string */
    public $referencesField;
    
    /**
     * @param string $field
     *
     * @return ForeignKeyDTO
     */
    public function setField(string $field): ForeignKeyDTO
    {
        $this->field = $field;
        
        return $this;
    }
    
    /**
     * @param string|null $name
     *
     * @return ForeignKeyDTO
     */
    public function setName(?string $name): ForeignKeyDTO
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @param string $onDelete
     *
     * @return ForeignKeyDTO
     */
    public function setOnDelete(string $onDelete): ForeignKeyDTO
    {
        $this->onDelete = $onDelete;
        
        return $this;
    }
    
    /**
     * @param string $onUpdate
     *
     * @return ForeignKeyDTO
     */
    public function setOnUpdate(string $onUpdate): ForeignKeyDTO
    {
        $this->onUpdate = $onUpdate;
        
        return $this;
    }
    
    /**
     * @param AbstractDatabaseInitializer $references
     *
     * @return ForeignKeyDTO
     */
    public function setReferences(AbstractDatabaseInitializer $references): ForeignKeyDTO
    {
        $this->references = $references;
        
        return $this;
    }
    
    /**
     * @param string $referencesField
     *
     * @return ForeignKeyDTO
     */
    public function setReferencesField(string $referencesField): ForeignKeyDTO
    {
        $this->referencesField = $referencesField;
        
        return $this;
    }
}
