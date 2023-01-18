<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Jonas\ListController\Infra\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerCreator())->createEntityManager();

ConsoleRunner::run(
    new SingleManagerProvider($entityManager),
);
