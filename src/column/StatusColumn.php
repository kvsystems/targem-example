<?php
namespace Targem\Parser\Column;

/**
 * Class StatusColumn
 * @package Targem\Parser\Column
 */
class StatusColumn implements IColumn {

    /**
     * Database column type.
     * @const string
     */
    const TYPE = 'int(1) NOT NULL';

    /**
     * Database field name.
     * @const string
     */
    const NAME = 'state';

    /**
     * Available status.
     * @const string
     */
    const STATUS = 'On';

    /**
     * Returns formatted string for status column.
     * @param string $value
     * @return string
     */
    public function transform(string $value) : string {
        return $value == self::STATUS ? "1" : "0";
    }

}