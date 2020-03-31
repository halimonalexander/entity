<?php

namespace HalimonAlexander\Entity\DatabaseInitializer\ForeignKeys;

class ForeignKeys
{
    /** @var ForeignKeyDTO[] */
    private $foreignKeys;
    
    /** @var string */
    private $schema;
    
    /** @var string */
    private $table;
    
    public function __construct(string $schema, string $table, array $foreignKeys)
    {
        $this->foreignKeys = $foreignKeys;
        $this->schema = $schema;
        $this->table = $table;
    }
    
    /**
     * @param string[] $sqls
     *
     * @return void
     */
    public function addTableForeignKeySqls(array &$sqls): void
    {
        foreach ($this->foreignKeys as $foreignKey){
            $foreignKey->onUpdate = !empty($foreignKey->onUpdate) ? "ON UPDATE " . $foreignKey->onUpdate : '';
            $foreignKey->onDelete = !empty($foreignKey->onDelete) ? "ON DELETE " . $foreignKey->onDelete : '';
        
            $foreignKey->field = $foreignKey->doubleQuote($foreignKey->field);
            if (is_array($foreignKey->field)) {
                $foreignKey->field = join(', ', $foreignKey->field);
            }
        
            $foreignKey->referencesField = $foreignKey->doubleQuote($foreignKey->referencesField);
            if (is_array($foreignKey->referencesField)) {
                $foreignKey->referencesField = join(', ', $foreignKey->referencesField);
            }
        
            $sqls[] = $foreignKey->name !== null ?
                $this->getNamedForeignKeySql($foreignKey) :
                $this->getUnnamedForeignKeySql($foreignKey);
        }
    }
    
    private function getNamedForeignKeySql(ForeignKeyDTO $foreignKey): string
    {
        return sprintf('
                ALTER TABLE "%s"."%s"
                ADD CONSTRAINT "%s" FOREIGN KEY (%s)
                REFERENCES "%s"."%s" (%s)
                %s %s;
            ',
            $this->schema,
            $this->table,
            $foreignKey->name,
            $foreignKey->field,
            $foreignKey->references->getSchema(),
            $foreignKey->references->getTable(),
            $foreignKey->referencesField,
            $foreignKey->onDelete,
            $foreignKey->onUpdate
        );
    }
    
    
    private function getUnnamedForeignKeySql(ForeignKeyDTO $foreignKey): string
    {
        return sprintf('
                ALTER TABLE "%s"."%s"
                ADD FOREIGN KEY (%s)
                REFERENCES "%s"."%s" (%s)
                %s %s;
            ',
            $this->schema,
            $this->table,
            $foreignKey->field,
            $foreignKey->references->getSchema(),
            $foreignKey->references->getTable(),
            $foreignKey->referencesField,
            $foreignKey->onDelete,
            $foreignKey->onUpdate
        );
    }
}
