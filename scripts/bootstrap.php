<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../vendor/autoload.php';
$isDevMode = true;
$config    = Setup::createYAMLMetadataConfiguration( [ __DIR__ . "/../config/yaml" ], $isDevMode );
$dbParams = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => 'root',
    'dbname' => 'app',
    'port' => 33060,
    'host' => '127.0.0.1',
];
$em = EntityManager::create($dbParams, $config);