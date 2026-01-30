<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;

require_once __DIR__ . '/../vendor/autoload.php';

// Configuración de Doctrine (usando attributes)
$config = ORMSetup::createAttributeMetadataConfiguration(
    [__DIR__ . '/../src/Entity'],
    true
);

// Conexión a la base de datos
$connectionParams = [
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'dbname' => 'clothes',
    'user' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
];

$connection = DriverManager::getConnection($connectionParams, $config);

// Crear y devolver el EntityManager
return new EntityManager($connection, $config);
