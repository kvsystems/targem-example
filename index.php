<?php
namespace Targem\Parser;

use Targem\Parser\Database\MysqlDatabase as Mysql;

/** PHP configuration */
ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
date_default_timezone_set( 'Asia/Yekaterinburg' );

/** Composer psr-4 autoload **/
require_once __DIR__ . '/vendor/autoload.php';

try {

    $parser = new CsvParser(__DIR__ . '/upload/gamers.csv', true);

    $headers = $parser->headers();
    $contents = $parser->content();

    for($i = 0; $i < count($headers); $i++)  {

    }

    $database = new Mysql('', '', '', '');

    //$database->table();

    //ColumnFactory::create();
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}