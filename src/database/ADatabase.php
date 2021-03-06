<?php
namespace Targem\Parser\Database;

use Targem\Parser\Column\IColumn;

/**
 * Abstract class ADatabase.
 * @package Targem\Parser\Database
 */
abstract class ADatabase {

    /**
     * Columns list.
     * @var $columns array
     */
    protected $columns = [];

    /**
     * Content list.
     * @var $data array
     */
    protected $data = [];

    /**
     * Creates new table.
     * @param string $name
     * @return bool
     */
    public abstract function table(string $name) : bool;

    /**
     * Inserts data in new table.
     * @param string $table
     * @return bool
     */
    public abstract function insert(string $table) : bool;

    /**
     * Sets a new column.
     * @param IColumn $column
     */
    public function column(IColumn $column) {
        $this->columns[] = $column;
    }

    /**
     * Sets new csv row.
     * @param $data array
     */
    public function data(array $data = []) {
        $this->data = $data;
    }
}