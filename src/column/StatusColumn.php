<?php
namespace Targem\Parser\Column;

class StatusColumn implements IColumn {

    const TYPE = 'int(1) NOT NULL';
    const NAME = 'state';

    public function transform() {
        // TODO: Implement transform() method.
    }

}