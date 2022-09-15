<?php

error_reporting(-1);
ini_set('display_errors', 1);

spl_autoload_register(function($className){
include __DIR__ . '/../'. str_replace('\\', '/', $className) . '.php';
});