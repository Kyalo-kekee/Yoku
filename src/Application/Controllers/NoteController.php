<?php

namespace Yoku\Ddd\Application\Controllers;


use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Yoku\Ddd\Application\Core\BaseController;
use Yoku\Ddd\Application\Services\EntityMangerService;
use Yoku\Ddd\Application\Services\NoteService;
use Yoku\Ddd\Infrastructure\Persistence\NoteRepository;

class NoteController extends BaseController
{

    public function createNote(ContainerInterface $container)
    {

        $title = "The world is spherical! Well or maybe just another myth?";
        $content = "Well, this is not a myths and we have evidence supporting this";

        $noteService->createNote($title,$content);

        $this->createJsonResponse(['posted' =>true]);
    }
}