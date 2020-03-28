<?php

namespace HalimonAlexander\Entity\DatabaseInitializer\ForeignKeys;

use HalimonAlexander\Entity\AbstractDatabaseInitializer;
use HalimonAlexander\Entity\DatabaseInitializer\AbstractDTO;

class ForeignKeyDTO extends AbstractDTO
{
    public const FIELD_ON_ACTION_CASCADE = 'CASCADE';
    public const FIELD_ON_ACTION_NONE = 'NONE';
    public const FIELD_ON_ACTION_RESTRICT = 'RESTRICT';
    
    /** @var string */
    public $field;
    
    /** @var string */
    public $onDelete;
    
    /** @var string */
    public $onUpdate;
    
    /** @var AbstractDatabaseInitializer */
    public $references;
    
    /** @var string */
    public $referencesField;
}
