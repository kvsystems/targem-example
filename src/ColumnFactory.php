<?php
namespace Targem\Parser;

class ColumnFactory {

    public static function create()   {
        switch (PHP_SAPI) {
            default:
                $column = new TimestampColumn();
        }
        return $column;
    }

}