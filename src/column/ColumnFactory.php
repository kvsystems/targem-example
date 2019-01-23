<?php
namespace Targem\Parser\Column;

/**
 * Class ColumnFactory.
 * Factory available column types.
 * @package Targem\Parser
 */
class ColumnFactory {

    /**
     * Login column.
     * @const string
     */
    const LOGIN     = 'Ник';

    /**
     * Email column.
     * @const string
     */
    const EMAIL     = 'Email';

    /**
     * Timestamp column.
     * @const string
     */
    const TIMESTAMP = 'Зарегистрирован';

    /**
     * Status column.
     * @const string
     */
    const STATUS    = 'Статус';
    /**
     * Creates a database column type object.
     * @param string $header
     * @return IColumn
     */
    public static function create(string $header) : IColumn   {
        switch ($header) {
            case self::LOGIN:
                $column = new LoginColumn();
                break;
            case self::EMAIL:
                $column = new EmailColumn();
                break;
            case self::TIMESTAMP:
                $column = new TimestampColumn();
                break;
            case self::STATUS:
                $column = new StatusColumn();
                break;
            default:
                $column = new NoColumn();
        }
        return $column;
    }

}