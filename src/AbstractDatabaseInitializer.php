<?php

namespace HalimonAlexander\Entity;

use HalimonAlexander\Entity\DatabaseInitializer\{
    Sequence,
    Table,
    ForeignKeys\ForeignKeyDTO,
    Indexes\IndexDTO,
    PrimaryKey\PrimaryKeyDTO,
    Uniques\UniqueDTO
};

abstract class AbstractDatabaseInitializer
{
    public const INT2 = 32767;
    public const INT4 = 2147483647;
    public const INT8 = 9223372036854775807;

    /** @var string */
    protected $prefix = '';

    /** @var string */
    protected $schema;

    /** @var string */
    protected $sequence;

    /** @var string */
    protected $table;

    /** @var Sequence */
    public $sequenceSqlGenerator;

    /** @var Table */
    public $tableSqlGenerator;

    /** @return ForeignKeyDTO[] */
    abstract protected function getForeignKeys(): array;

    /** @return IndexDTO[] */
    abstract protected function getIndexes(): array;

    abstract protected function getPrimaryKey(): ?PrimaryKeyDTO;

    /** @return UniqueDTO[] */
    abstract protected function getUniques(): array;

    public function __construct()
    {
        $this->sequenceSqlGenerator = new Sequence($this->schema, $this->prefix . $this->sequence);
        $this->tableSqlGenerator = new Table(
            $this->schema,
            $this->prefix . $this->table,
            $this->getPrimaryKey(),
            $this->getForeignKeys(),
            $this->getIndexes(),
            $this->getUniques()
        );
    }

    /**
     * @param string $schema
     *
     * @return self
     * @throws \RuntimeException
     */
    final public function setSchema(string $schema): self
    {
        if (empty($schema)) {
            throw new \RuntimeException('Schema cannot be empty');
        }

        $this->schema = $schema;

        return $this;
    }

    final public function getSchema(): string
    {
        return $this->schema;
    }

    final public function getSequence(): string
    {
        return $this->sequence;
    }

    final public function getTable(): string
    {
        return $this->prefix . $this->table;
    }
}
