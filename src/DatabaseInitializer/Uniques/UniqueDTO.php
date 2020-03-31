<?php

namespace HalimonAlexander\Entity\DatabaseInitializer\Uniques;

use HalimonAlexander\Entity\DatabaseInitializer\AbstractDTO;

class UniqueDTO extends AbstractDTO
{
    /** @var string|string[] */
    public $fields;
    
    /** @var string|null */
    public $name;
    
    /**
     * @param string|string[] $fields
     *
     * @return UniqueDTO
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
        
        return $this;
    }
    
    /**
     * @param string|null $name
     *
     * @return UniqueDTO
     */
    public function setName(?string $name): UniqueDTO
    {
        $this->name = $name;
        
        return $this;
    }
}
