<?php

namespace HalimonAlexander\Entity;

use ArrayAccess;
use RuntimeException;

abstract class ValueObject implements ArrayAccess
{
    private $asArray = [];

    final public function __toString()
    {
        return json_encode($this->asArray());
    }

    abstract public function asArray(): array;

    /**
     * @param mixed $offset
     *
     * @return bool
     */
    final public function offsetExists($offset): bool
    {
        if (empty($this->asArray)) {
            $this->asArray = $this->asArray();
        }

        return array_key_exists($offset, $this->asArray);
    }

    /**
     * @param mixed $offset
     *
     * @return mixed|null
     */
    final public function offsetGet($offset)
    {
        if (empty($this->asArray)) {
            $this->asArray = $this->asArray();
        }

        return $this->asArray[$offset] ?? null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @throws RuntimeException
     */
    final public function offsetSet($offset, $value)
    {
        throw new RuntimeException('Readonly access');
    }

    /**
     * @param mixed $offset
     * @throws RuntimeException
     */
    final public function offsetUnset($offset)
    {
        throw new RuntimeException('Readonly access');
    }
}
