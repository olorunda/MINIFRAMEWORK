<?php


require_once 'vendor/autoload.php';

$class_name="\\App\\$argv[1]";
$method_name=$argv[2];

if(!empty($argv[3])){
    echo  (new $class_name())->$method_name($argv[3]);
    return;
}

echo  (new $class_name())->$method_name();

