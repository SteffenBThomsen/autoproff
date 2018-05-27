<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'vendor/autoload.php';

use AutoProff\App\Kernel;
use Illuminate\Database\Capsule\Manager as Capsule;

try {

    $capsule = new Capsule();

    $capsule->addConnection([
        'driver'   => 'sqlite',
        'database' => __DIR__ . '/database/autoproff.sqlite',
        'prefix'   => ''
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    $kernel = new Kernel();

    $response = $kernel->handleResponse();
    echo $response->respond();
} catch(Exception $exception) {
    echo $exception->getMessage();
    header("Bad Request", 400);
}
