<?php

namespace HalimonAlexander\Entity\DatabaseInitializer\PrimaryKey;

use HalimonAlexander\Entity\DatabaseInitializer\AbstractDTO;

class PrimaryKeyDTO extends AbstractDTO
{
    /** @var string|null */
    public $name;
    
    /** @var string */
    public $primaryKeyField;
}
