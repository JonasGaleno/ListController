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

        $connection = DriverManager::getConnection(
            require __DIR__ . '../../../config/config.php', 
            $config);

        return new EntityManager($connection, $config);
    }
}
