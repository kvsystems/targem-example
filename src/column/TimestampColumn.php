<?php
namespace Targem\Parser\Column;

/**
 * Class TimestampColumn
 * @package Targem\Parser\Column
 */
class TimestampColumn implements IColumn {

    /**
     * Database column type.
     * @const string
     */
    const TYPE = 'int(11) NOT NULL';

    /**
     * Database field name.
     * @const string
     */
    const NAME = 'created';

    /**
     * Returns formatted string for timestamp column.
     * @param string $value
     * @return string
     */
    public function transform(string $value) : string {
        return strtotime($value);
    }

}