<?php
namespace HalimonAlexander\Entity\DatabaseInitializer\Uniques;

use HalimonAlexander\Entity\DatabaseInitializer\AbstractDTO;

class Uniques
{
    /** @var string */
    private $schema;
    
    /** @var string */
    private $table;
    
    /** @var UniqueDTO[]  */
    private $uniques;
    
    /**
     * Uniques constructor.
     *
     * @param string       $schema
     * @param string       $table
     * @param UniqueDTO[]  $uniques
     */
    public function __construct(string $schema, string $table, array $uniques)
    {
        $this->schema = $schema;
        $this->table = $table;
        $this->uniques = $uniques;
    }
    
    /**
     * @param string[] $sqls
     *
     * @return void
     */
    public function addTableUniques(array $sqls): void
    {
        foreach ($this->uniques as $unique) {
            $unique->fields = $unique->doubleQuote($unique->fields);
            if (is_array($unique->fields)) {
                $unique->fields = join(', ', $unique->fields);
            }
        
            $sqls[] = !empty($unique->name) ? $this->getNamedUniqueSql($unique) : $this->getUnnamedUniqueSql($unique);
        }
    }
    
    private function getNamedUniqueSql(UniqueDTO $unique): string
    {
        return sprintf(
            'ALTER TABLE "%s"."%s" ADD CONSTRAINT "%s" UNIQUE (%s);',
            $this->schema,
            $this->table,
            $unique->name,
            $unique->fields
        );
    }
    
    private function getUnnamedUniqueSql(UniqueDTO $unique): string
    {
        return sprintf(
            'ALTER TABLE "%s"."%s" ADD UNIQUE (%s);',
            $this->schema,
            $this->table,
            $unique->fields
        );
    }
}
