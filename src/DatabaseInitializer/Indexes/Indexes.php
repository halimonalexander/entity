<?php

namespace HalimonAlexander\Entity\DatabaseInitializer\Indexes;

class Indexes
{
    /** @var string */
    private $schema;
    
    /** @var string */
    private $table;
    
    /** @var IndexDTO[] */
    private $indexes;
    
    /**
     * Indexes constructor.
     *
     * @param string     $schema
     * @param string     $table
     * @param IndexDTO[] $indexes
     */
    public function __construct(string $schema, string $table, array $indexes)
    {
        $this->schema = $schema;
        $this->table = $table;
        $this->indexes = $indexes;
    }
    
    /**
     * @return string[]
     */
    public function addTableIndexes(): array
    {
        $sqls = [];
    
        foreach ($this->indexes as $index) {
            $index->column = $index->doubleQuote($index->column);
            if (is_array($index->column)) {
                $index->column = join(', ', $index->column);
            }
        
            $sqls[] = !empty($index->name) ? $this->getNamedIndexSql($index) : $this->getUnnamedIndexSql($index);
        }
        
        return $sqls;
    }
    
    private function getNamedIndexSql(IndexDTO $index): string
    {
        return sprintf(
            'CREATE %s INDEX IF NOT EXISTS "%s" ON "%s"."%s" USING %s (%s);',
            $index->isUnique ? "UNIQUE" : "",
            $index->name,
            $this->schema,
            $this->table,
            $index->method,
            $index->column
        );
    }
    
    private function getUnnamedIndexSql(IndexDTO $index): string
    {
        return  sprintf(
            'CREATE %s INDEX ON "%s"."%s" USING %s (%s);',
            $index->isUnique ? "UNIQUE" : "",
            $this->schema,
            $this->table,
            $index->method,
            $index->column
        );
    }
}
