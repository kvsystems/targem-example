<?php
namespace Targem\Parser;

/**
 * Interface IColumn.
 * Basic type of data column.
 * @package Targem\Parser
 */
interface IColumn {

    public function define();
    public function process();
    public function export();
    public function transform();

}