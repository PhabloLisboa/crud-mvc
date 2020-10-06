<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


$paths = array(__DIR__."/Entities");
$isDevMode = false;

$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '123456',
    'dbname'   => 'exemplo',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
