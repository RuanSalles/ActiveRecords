<?php

use Source\Models\Model;
use Source\Models\UserModel;

require __DIR__.'/vendor/autoload.php';

$model = new UserModel();

//$user = $model->load(10);
//$find = $model->find('eleno29@email.com.br');
//$all = $model->all('5', '2');
//var_dump($user);
//echo "<hr>" . PHP_EOL;
//var_dump($find);
//
//echo "<hr>" . PHP_EOL;
//
//foreach ($all as $user) {
//    /** @var UserModel $user */
//    var_dump($user);
//}

$user = $model->bootstrap(
    "Robson",
    "Leite",
    "cursos5@upinside.com.br",
    '34892493349'
);

var_dump($user);

$user->id = 10;
$user->created_at = date("Y/m/d H:i");

if (!$model->find($user->email)) {
    echo "<p class='trigger warning'>Cadastro</p>";
    $user->save();
} else {
    echo "<p class='trigger accept'>Read</p>";
    $user = $model->find($user->email);
}

var_dump($user);