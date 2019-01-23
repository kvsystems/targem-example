<?php
namespace Targem\Parser\Column;

/**
 * Class NoColumn
 * @package Targem\Parser\Column
 */
class NoColumn implements IColumn   {

    /**
     * Wrong type.
     * @const int
     */
    const TYPE = 0;

    /**
     * Wrong name.
     * @const int
     */
    const NAME = 0;

    /**
     * Wrong column.
     * @param string $value
     * @return string
     */
    public function transform(string $value) : string {
        return new \Exception('Unknown column');
    }

}