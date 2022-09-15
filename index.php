<?php

use Core\File;
use Core\ASCII;

define('ROOT', __DIR__);

require_once 'Core/autoload.php';

$file = new File();
$data = $file->getArrayFromFile('srcArray.php');

if(is_array($data)) {
    $ascii = new ASCII($data);
    echo $ascii->getTable();
}



/*
=========================================================================
|     House |           Leader |            Motto | Q |           Sigil |
-------------------------------------------------------------------------
| Baratheon |                  | Ours is the Fury |   |  A crowned stag |
|     Stark |     Eddard Stark | Winter is Coming |   | A grey direwolf |
| Lannister |  Tywin Lannister |                  |   |   A golden lion |
|           |                  |                  | Z |                 |
=========================================================================
*/
