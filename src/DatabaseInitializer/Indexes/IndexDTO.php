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
}
