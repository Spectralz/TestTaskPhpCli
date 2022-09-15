<?php

namespace Core\Test;

class Test
{

    public function run()
    {
        $methods = get_class_methods($this);

        foreach ($methods as $method) {
            if($method != 'run') {
                $result = $this->$method() ? 'true' : 'false';
                echo "Result: " . $result . "\t Test : " . $method . "\n";
            }
        }
    }
}