<?php

if($argv[1]=='serve'){
    exec('php -S localhost:8000');
}

$class_name="\\App\\Console\\$argv[1]";
if(ucfirst($argv[1])=='Make'){
    $class_name="\\App\\CoreClasses\\$argv[1]";
}

if(ucfirst($argv[1])=='Migrate'){
    $class_name="\\App\\CoreClasses\\Migration\\$argv[1]";

    (new $class_name())->migrate();
    exit('Migration Completed');
}

if(str_contains(ucfirst($argv[1]),'Migrate --path')){
    $class_name="\\App\\CoreClasses\\Migration\\$argv[1]";

    $path=explode('=',$argv[1])[1];
    (new $class_name())->migrate($path);
    exit('Migration Completed');
}

if(ucfirst($argv[1])=='Migrate:rollback'){
    $class_name="\\App\\CoreClasses\\Migration\\Migrate";
    (new $class_name())->rollback();
    exit('Rolling Back Completed');
}
