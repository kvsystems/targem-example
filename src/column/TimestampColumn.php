<?php
namespace Targem\Parser\Column;

class TimestampColumn implements IColumn {

    const TYPE = 'int(11) NOT NULL';
    const NAME = 'created';

    public function transform() {
        // TODO: Implement transform() method.
    }

}