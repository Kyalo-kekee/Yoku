<?php

namespace Yoku\Ddd\Application\Services;


use Yoku\Ddd\Domain\Entity\Note;
use Yoku\Ddd\Domain\Repository\NoteRepositoryInterface;

class NoteService
{
    private $noteRepository;

    public function __construct(NoteRepositoryInterface $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function createNote(string $title, string $content): void
    {
        $note = new Note();
        $note->setTitle($title);
        $note->setContent($content);
        $note->setId(uniqid());

        $this->noteRepository->save($note);
    }
}
