<?php
use Illuminate\Queue\Capsule\Manager;
$capsule = new Manager();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'db_free',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

//$capsule->setAsGlobal();
$capsule->bootEloquent();

return $capsule;
