<?php

namespace HalimonAlexander\Entity\DatabaseInitializer\PrimaryKey;

class PrimaryKey
{
    /** @var PrimaryKeyDTO|null */
    private $primaryKey;
    
    /** @var string */
    private $schema;
    
    /** @var string */
    private $table;
    
    public function __construct(string $schema, string $table, ?PrimaryKeyDTO $primaryKey)
    {
        $this->primaryKey = $primaryKey;
        $this->schema = $schema;
        $this->table  = $table;
    }
    
    public function addPrimaryKey(): string
    {
        if ($this->primaryKey === null) {
            return '';
        }
        
        return !empty($this->primaryKey->name) ? $this->getNamedPrimaryKeySql() : $this->getUnnamedPrimaryKeySql();
    }
    
    private function getNamedPrimaryKeySql(): string
    {
        return sprintf(
            'ALTER TABLE "%s"."%s" ADD CONSTRAINT "%s" PRIMARY KEY ("%s");',
            $this->schema,
            $this->table,
            $this->primaryKey->name,
            $this->primaryKey->primaryKeyField
        );
    }
    
    private function getUnnamedPrimaryKeySql(): string
    {
        return sprintf(
        'ALTER TABLE "%s"."%s" ADD PRIMARY KEY ("%s");',
            $this->schema,
            $this->table,
            $this->primaryKey->primaryKeyField
        );
    }
}
