<?php

use Source\Models\Model;
use Source\Models\UserModel;

require __DIR__.'/vendor/autoload.php';

$layer = new ReflectionClass(Model::class);

var_dump(
    $layer->getDefaultProperties(),
    $layer->getMethods(),
);

$model = new UserModel();
var_dump($model, get_class_methods($model));
