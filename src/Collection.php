<?php
namespace HalimonAlexander\Entity;

abstract class Collection implements CollectionInterface, \Iterator, \Countable
{
    /**
     * @var int
     */
    private $position = 0;

    /**
     * @var ValueObject[]
     */
    private $values = [];

    /** @inheritdoc */
    public function add(ValueObject $value): void
    {
        $this->values[] = $value;
    }

    /** @inheritdoc */
    public function clean(): void
    {
        $this->values = [];
        $this->position = 0;
    }

    /** @inheritdoc */
    public function current(): ValueObject
    {
        return $this->values[$this->position];
    }

    /** @inheritdoc */
    public function key(): int
    {
        return $this->position;
    }

    /** @inheritdoc */
    public function next(): void
    {
        $this->position++;
    }

    /** @inheritdoc */
    public function rewind(): void
    {
        $this->position = 0;
    }

    /** @inheritdoc */
    public function valid(): bool
    {
        return isset($this->values[$this->position]);
    }

    /** @inheritdoc */
    public function count(): int
    {
        return count($this->values);
    }
}
