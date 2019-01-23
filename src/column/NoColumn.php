<?php
namespace Targem\Parser\Column;

class NoColumn implements IColumn   {

    const TYPE = 0;
    const NAME = 0;

    public function transform() {
        return new \Exception('Unknown column');
    }

}