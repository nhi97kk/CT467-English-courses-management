<?php

define('ROOTDIR', __DIR__ . DIRECTORY_SEPARATOR);

require_once ROOTDIR . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(ROOTDIR);
$dotenv->load();

use Illuminate\Database\Capsule\Manager;

$manager = new Manager();

$manager->addConnection([
	'driver'    => 'mysql',
	'host'      => $_ENV['DB_HOST'],
	'database'  => $_ENV['DB_NAME'],
	'username'  => $_ENV['DB_USER'],
	'password'  => $_ENV['DB_PASS'],
]);

$manager->setAsGlobal();
$manager->bootEloquent();
