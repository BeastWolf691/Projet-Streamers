<?php
require_once "vendor/autoload.php";

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: array(__DIR__."/src/classes"),
    isDevMode: true,
);

// configuring the database connection
$connection = DriverManager::getConnection(
[
    'driver'    => 'pdo_mysql',
    'user'      => 'root',
    'password'  => '',
    'dbname'    => 'stream',
    'port'      => 3306
  ],
  $config
);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);
//si souci voir si version php en 8.2.18 a mettre et faire composer update, php-v et modifier dans wamp et path