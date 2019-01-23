<?php
namespace Targem\Parser\Column;

class EmailColumn implements IColumn {

    const TYPE = 'varchar(255) NOT NULL';
    const NAME = 'email';

    public function transform() {
        // TODO: Implement transform() method.
    }

}