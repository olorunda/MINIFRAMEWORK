<?php


require_once 'vendor/autoload.php';

if (PHP_SAPI !== 'cli') {
    exit("Run from CLI only!\n");
}

$class_name="\\App\\$argv[1]\\$argv[2]";
$method_name=$argv[3];

if(!empty($argv[4])){
    echo  (new $class_name())->$method_name($argv[4]);
    return;
}

(new $class_name())->$method_name();

