<?php
require_once "vendor/autoload.php";

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;


// Charger les variables d'environnement
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
  paths: array(__DIR__ . "/src/classes"),
  isDevMode: true,
);

// configuring the database connection
$connection = DriverManager::getConnection(
  [
    'host'     => $_ENV['DB_HOST'],
    'port'     => $_ENV['DB_PORT'],
    'dbname'   => $_ENV['DB_NAME'],
    'user'     => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
  ],
  $config
);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);