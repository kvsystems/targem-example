<?php
namespace Targem\Parser;

use Targem\Parser\Database\MysqlDatabase as Mysql;
use Targem\Parser\Column\ColumnFactory as Factory;

/** PHP configuration */
ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
date_default_timezone_set( 'Asia/Yekaterinburg' );

/** Composer psr-4 autoload **/
require_once __DIR__ . '/vendor/autoload.php';

/** Trying main script execution **/
try {

    $parser = new CsvParser(__DIR__ . '/upload/gamers.csv', true);
    $database = new Mysql('', '', '', '');

    $content = $parser->content();

    foreach($parser->headers() as $key => $header)  {
        $obj = Factory::create($header);
        for($i = 0; $i < count($content); $i++) {
            $content[$i][$key] = $obj->transform($content[$i][$key]);
        }
        $database->column($obj);
    }

    $database->data($content);

    if(!$database->table('trg_gamers'))
        throw new \Exception('Could not create table');

    if(!$database->insert('trg_gamers'))
        throw new \Exception('Could not insert into table');

} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}