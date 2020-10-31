<?php

namespace HalimonAlexander\Entity;

use RuntimeException;
use HalimonAlexander\PDODecorator\PDODecorator;
use HalimonAlexander\Registry\Registry;

abstract class AbstractDbStorage implements StorageInterface
{
    /** @var PDODecorator */
    protected $db;

    function __construct()
    {
        $this->db = (Registry::getInstance())->getByClassname(PDODecorator::class);

        if ($this->db === null) {
            throw new RuntimeException('PDODecorator not set');
        }
    }
}
