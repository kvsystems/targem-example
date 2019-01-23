<?php
namespace Targem\Parser\Database;

/**
 * Class MysqlDatabase.
 * @package Targem\Parser\Database
 */
class MysqlDatabase extends ADatabase {

    /**
     * Mysql database resource.
     * @var \mysqli|null
     */
    protected $connection = null;

    /**
     * MysqlDatabase constructor.
     * Trying to connect.
     * @param string $host
     * @param string $user
     * @param string $pwd
     * @param string $db
     */
    public function __construct(string $host, string $user, string $pwd, string $db)   {
        try{
            if( $this->connection = mysqli_connect($host, $user, $pwd) ) {
                mysqli_select_db($this->connection, $db);
                $this->connection->query("SET lc_time_names = 'ru_RU'");
                $this->connection->query("SET NAMES 'utf8'");
            } else throw new \Exception('Could not connect');
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * MysqlDatabase destructor.
     * Disconnect from database.
     */
    public function __destruct()	{
        if($this->connection) $this->connection->close();
    }

    /**
     * Creates new mysql table.
     * @param string $name
     * @return bool
     */
    public function table(string $name) : bool {
        $query = 'CREATE TABLE ' . $name . ' (uniqueId int NOT NULL AUTO_INCREMENT,';
        if(!empty($this->columns)) {
            for($i = 0; $i < count($this->columns); $i++)  {
                $query .= $this->connection->real_escape_string(
                    $this->columns[$i]::NAME . ' ' . $this->columns[$i]::TYPE
                );
                if($i < count($this->columns) - 1) $query .= ',';
            }
        }
        $query .= ', PRIMARY KEY (uniqueId))';
        return $this->connection->query($query) === true
            ? true : false;
    }

    /**
     * Inserts data in new mysql table.
     * @param string $table
     * @return bool
     */
    public function insert(string $table) : bool {
        $query = 'INSERT INTO ' . $table . ' VALUES';
        if(!empty($this->data)) {
            for($i = 0; $i < count($this->data); $i++)   {
                $query .= '(NULL,';
                foreach($this->data[$i] as $key => $cell) {
                    $query .= "'" . $this->connection->real_escape_string($cell) . "'";
                    if($key < (count($this->data[$i])- 1)) $query .= ',';
                }
                $query .= $i == (count($this->data) - 1) ? ')' : '),';
            }
        }
        return $this->connection->query($query) === true
            ? true : false;
    }
}