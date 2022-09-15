<?php

namespace Tests;

use Core\ASCII;
use Core\Test\Test;

class TestASCII extends Test
{
    public function test_if_array_is_empty() : bool
    {
        $obj = new ASCII([]);
        if($obj instanceof ASCII) {
            return true;
        }
        return false;
    }

    public function test_get_table_if_empty_array() : bool
    {

        $obj = new ASCII([]);
        $result = $obj->getTable();
        if(is_string($result)) {
            return true;
        }
        return false;
    }
}