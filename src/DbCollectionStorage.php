<?php
namespace HalimonAlexander\Entity;

abstract class DbCollectionStorage extends AbstractDbStorage
{
    protected $filter = [];
    protected $groupBy = [];
    protected $limit = "";
    protected $orderBy = [];

    abstract public function fetch(): array;

    public function __flush()
    {
        $this->filter = [];
        $this->groupBy = [];
        $this->limit = "";
        $this->orderBy = [];
    }

    public function addFilter(string $filter, string $value, bool $exact = true)
    {
        if (empty($filter)) {
            return $this;
        }

        if ($exact) {
            $this->filter[$filter] = addslashes($filter) . " = " . $this->db->quote($value);
        } else {
            $this->filter[$filter] = addslashes($filter) . " ILIKE " . $this->db->quote("%{$value}%");
        }

        return $this;
    }

    public function addGroupBy(string $field)
    {
        if (empty($field)) {
            return $this;
        }

        $this->groupBy[] = $field;

        return $this;
    }


    public function addLimit(int $count, int $offset = 0)
    {
        if (empty($count)) {
            return $this;
        }

        $this->limit = "LIMIT {$count}";
        if ( !empty($offset) ) {
            $this->limit .= " OFFSET {$offset}";
        }

        return $this;
    }

    public function addOrderBy(string $field)
    {
        if (empty($field)) {
            return $this;
        }

        $this->orderBy[] = $field;

        return $this;
    }
}
