<?php

use Yoku\Ddd\Application\Services\EntityMangerService;
use Yoku\Ddd\Application\Services\NoteService;
use Yoku\Ddd\Infrastructure\Persistence\NoteRepository;

require_once '../../vendor/autoload.php';


$id = $argv[1];
$action = $argv[2];

$title = $argv[3];

$content = $argv[4];
/*
 * Doctrine ORM
 * Get the entity manager
 * */
$entityManager = new EntityMangerService();
$em = $entityManager ->getEntityManager();

/*
 * Note repository
 * @param em - entity manager interface
 * DDD Layer - Infrastructure
 * */
$noteRepository = new NoteRepository($em);
/*
 * Note service
 * @param noteRepository - A notes persistence object
 * DDD Layer - Application
 * */
$noteService = new NoteService($noteRepository);

switch ($action){
    case 'create':
        $noteService ->createNote($title,$content);
        break;
    case 'delete' :
        $noteService->deleteNote($id);
        break;
    default:
        echo "DDD is awesome";
}


echo "script finished"; exit(0);