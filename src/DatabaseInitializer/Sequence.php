<?php

namespace HalimonAlexander\Entity\DatabaseInitializer;

use HalimonAlexander\Entity\AbstractDatabaseInitializer;

final class Sequence
{
    private $schema;
    private $sequence;
    
    public function __construct(string $schema, string $sequence)
    {
        $this->schema = $schema;
        $this->sequence = $sequence;
    }
    
    public function create(
        ?string $schema,
        int $startValue = 1,
        int $maxValue = AbstractDatabaseInitializer::INT4,
        int $increment = 1
    ): string
    {
        if ($schema === null) {
            $schema = $this->schema;
        }
        
        return sprintf('
            CREATE SEQUENCE IF NOT EXISTS "%s"."%s"
            INCREMENT %s
            MINVALUE  1
            MAXVALUE  %d
            START     %d
            CACHE     1;
            ',
            $schema,
            $this->sequence,
            $increment,
            $maxValue,
            $startValue
        );
    }
    
    public function setValue(
        ?string $schema,
        int $value,
        bool $returnNextValue = true
    ): string
    {
        if ($schema === null) {
            $schema = $this->schema;
        }
        
        return sprintf(
            'SELECT setval("%s"."%s", %d, %s);',
            $schema,
            $this->sequence,
            $value,
            $returnNextValue ? "TRUE" : "FALSE"
        );
    }
    
    public function drop(?string $schema): string
    {
        if ($schema === null) {
            $schema = $this->schema;
        }
        
        return sprintf(
            'DROP SEQUENCE IF EXISTS "%s"."%s";',
            $schema,
            $this->sequence
        );
    }
}
