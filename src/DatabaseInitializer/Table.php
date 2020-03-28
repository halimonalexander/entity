<?php

namespace HalimonAlexander\Entity\DatabaseInitializer;

use HalimonAlexander\Entity\DatabaseInitializer\{
    ForeignKeys\ForeignKeys,
    ForeignKeys\ForeignKeyDTO,
    Indexes\Indexes,
    Indexes\IndexDTO,
    Uniques\Uniques,
    Uniques\UniqueDTO
};

final class Table
{
    private $primaryKey;
    private $schema;
    private $table;
    
    /** @var ForeignKeys */
    public $foreignKeysSqlGenerator;
    
    /** @var Indexes */
    public $indexesSqlGenerator;
    
    /** @var Uniques */
    public $uniquesSqlGenerator;
    
    /**
     * Table constructor.
     *
     * @param string          $schema
     * @param string          $table
     * @param string|null     $primaryKey
     * @param ForeignKeyDTO[] $foreignKeys
     * @param IndexDTO[]      $indexes
     * @param UniqueDTO[]     $uniques
     */
    public function __construct(
        string $schema,
        string $table,
        ?string $primaryKey,
        array $foreignKeys,
        array $indexes,
        array $uniques
    )
    {
        $this->foreignKeysSqlGenerator = new ForeignKeys($schema, $table, $foreignKeys);
        $this->indexesSqlGenerator = new Indexes($schema, $table, $indexes);
        $this->uniquesSqlGenerator = new Uniques($schema, $table, $uniques);
        
        $this->primaryKey = $primaryKey;
        $this->schema = $schema;
        $this->table  = $table;
    }
    
    public function create(?string $schema, string $fields): string
    {
        if ($schema === null) {
            $schema = $this->schema;
        }
        
        return sprintf(
            'CREATE TABLE IF NOT EXISTS "%s"."%s" (%s);',
            $schema,
            $this->table,
            $fields
        );
    }
    
    public function dropTable(?string $schema): string
    {
        if ($schema === null) {
            $schema = $this->schema;
        }
        
        return sprintf(
            'DROP TABLE IF EXISTS "%s"."%s";',
            $schema,
            $this->table
        );
    }
    
    public function addPrimaryKey(): ?string
    {
        if ($this->primaryKey === null) {
            return null;
        }
        
        return sprintf(
            'ALTER TABLE "%s"."%s" ADD PRIMARY KEY ("%s");',
            $this->schema,
            $this->table,
            $this->primaryKey
        );
    }
}
