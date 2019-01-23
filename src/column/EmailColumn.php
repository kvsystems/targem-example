<?php
namespace Targem\Parser\Column;

/**
 * Class EmailColumn
 * @package Targem\Parser\Column
 */
class EmailColumn implements IColumn {

    /**
     * Database column type.
     * @const string
     */
    const TYPE = 'varchar(255) NOT NULL';

    /**
     * Database field name.
     * @const string
     */
    const NAME = 'email';

    /**
     * Returns formatted string for email column.
     * @param string $value
     * @return string
     */
    public function transform(string $value) : string {
        return preg_match( '/([\w\-]+\@[\w\-]+\.[\w\-]+)/', $value )
            ? $value : '';
    }

}