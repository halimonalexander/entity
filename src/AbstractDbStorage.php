<?php
namespace HalimonAlexander\Entity;

use HalimonAlexander\PDODecorator\PDODecorator;
use HalimonAlexander\Registry\Registry;

abstract class AbstractDbStorage extends Storage
{
    protected $db;

    function __construct()
    {
        $this->db = (Registry::getInstance())->getByClassname(PDODecorator::class);
    }
}
