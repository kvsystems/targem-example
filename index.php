<?php
namespace Targem\Parser;

/** PHP configuration */
ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
//ini_set('auto_detect_line_endings',true);
date_default_timezone_set( 'Asia/Yekaterinburg' );

/** Composer psr-4 autoload **/
require_once __DIR__ . '/vendor/autoload.php';

try {

    $parser = new CsvParser(__DIR__ . '/upload/gamers.csv', true);
    foreach($parser->headers() as $column)  {
        var_dump($column);
    }

    //ColumnFactory::create();
} catch (\RuntimeException $e) {
    echo $e->getMessage() . PHP_EOL;
}