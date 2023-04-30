<?php

namespace Yoku\Ddd\Application\Services;

use Doctrine\DBAL\DriverManager;

use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Yoku\Ddd\Application\Config\DatabaseConfiguration;


class EntityMangerService
{

    private $em;

    public function __construct()
    {

        // Create a simple "default" Doctrine ORM configuration for Attributes
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: array(dirname(__DIR__) . "../../Domain/"),
            isDevMode: true);

        $connectionParams = array(
            'dbname' =>  DatabaseConfiguration::DB_NAME,
            'user' => DatabaseConfiguration::DB_USER,
            'password' => DatabaseConfiguration::DB_PASSWORD,
            'host' => DatabaseConfiguration::DB_HOST,
            'driver' => DatabaseConfiguration::DB_DRIVER,
        );

        try{
            $connection = DriverManager::getConnection($connectionParams, $config);
            $this->em = new EntityManager($connection, $config);
        }catch (Exception $exception){
            throw  new \Exception($exception->getMessage());
        }

    }

    /**
     * @return EntityManager
     */
    public function getEm(): EntityManager
    {
        return $this->em;
    }

}