<?php

namespace Jonas\ListController\Infra;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: array(__DIR__ . "/.."),
            isDevMode: true,
        );

        $connection = DriverManager::getConnection([
                'dbname' => $_ENV['DATABASE_NAME'],
                'user' => $_ENV['DATABASE_USER'],
                'password' => $_ENV['DATABASE_PASSWORD'],
                'host' => $_ENV['DATABASE_HOST'],
                'driver' => 'pdo_mysql'
            ], $config);

        return new EntityManager($connection, $config);
    }
}
