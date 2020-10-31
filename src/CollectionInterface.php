<?php

namespace HalimonAlexander\Entity;

interface CollectionInterface
{
    /**
     * Add new value to the list
     *
     * @param ValueObject $value
     */
    public function add(ValueObject $value): void;

    /**
     * Remove all values from the list
     */
    public function clean(): void;
}
