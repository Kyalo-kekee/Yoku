<?php

namespace Yoku\Ddd\Application\Services;

use Doctrine\DBAL\DriverManager;

use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Yoku\Ddd\Application\Config\Database;


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
            'dbname' =>  Database::DB_NAME,
            'user' => Database::DB_USER,
            'password' => Database::DB_PASSWORD,
            'host' => Database::DB_HOST,
            'driver' => Database::DB_DRIVER,
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
    public function getEntityManager(): EntityManager
    {
        return $this->em;
    }

}