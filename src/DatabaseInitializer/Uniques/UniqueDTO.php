<?php

namespace HalimonAlexander\Entity\DatabaseInitializer\Uniques;

use HalimonAlexander\Entity\DatabaseInitializer\AbstractDTO;

class UniqueDTO extends AbstractDTO
{
    /** @var string|string[] */
    public $fields;
    
    /** @var string|null */
    public $name;
}
