<?php
namespace Targem\Parser\Column;

/**
 * Class LoginColumn
 * @package Targem\Parser\Column
 */
class LoginColumn implements IColumn {

    /**
     * Database column type.
     * @const string
     */
    const TYPE = 'varchar(255) NOT NULL';

    /**
     * Database field name.
     * @const string
     */
    const NAME = 'login';

    /**
     * Returns formatted string for login column.
     * @param string $value
     * @return string
     */
    public function transform(string $value) : string {
        return preg_match( '/^[A-Za-z0-9-]+$/', $value )
            ? $value : '';
    }

}