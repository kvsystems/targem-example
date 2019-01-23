<?php
namespace Targem\Parser\Column;

/**
 * Interface IColumn.
 * Basic type of data column.
 * @package Targem\Parser
 */
interface IColumn {

    /**
     * Transform value too column format.
     * @param string $value
     * @return string
     */
    public function transform(string $value) : string;

}