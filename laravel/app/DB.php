<?php


//include_once asset('/laravel/vendor/autoload.php');

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
'driver'    => 'mysql',
'host'      => 'localhost',
'database'  => 'k5525viet_db',
'username'  => 'k5525viet',
'password'  => '5(xUN5h^0(.K',
'charset'   => 'utf8',
'collation' => 'utf8_unicode_ci',
'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods
$capsule->setAsGlobal();

// Setup the Eloquent ORM
$capsule->bootEloquent();
return $capsule;