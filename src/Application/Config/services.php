<?php


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Yoku\Ddd\Application\Services\EntityMangerService;
use Yoku\Ddd\Application\Services\NoteService;
use Yoku\Ddd\Infrastructure\Persistence\NoteRepository;

$services = array(
    'entity_manager' =>[ 'resource' => \Yoku\Ddd\Application\Services\EntityMangerService::class ],
    'notes_service' => ['resource' =>\Yoku\Ddd\Application\Services\NoteService::class,
        'arguments' => NoteRepository::class]
);


$container = new ContainerBuilder();

// Register the entity manager service
$container->register('entity_manager', EntityMangerService::class)
    ->setAutowired(true);

// Register the note repository service
$container->register('note_repository', NoteRepository::class)
    ->addArgument(new Reference('entity_manager'))
    ->setAutowired(true);

// Register the note service with the note repository as a dependency
$container->register('notes_service', NoteService::class)
    ->addArgument(new Reference('note_repository'))
    ->setAutowired(true);

// Compile the container to resolve dependencies
$container->compile();
