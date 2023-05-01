<?php

namespace Yoku\Ddd\Application\Services;


use DateTime;
use Doctrine\ORM\EntityManagerInterface;
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
        $note->setCreatedAt(new DateTime('now'));

        $this->noteRepository->save($note);
    }

    public function deleteNote($noteId): void
    {
        $this->noteRepository->delete($noteId);
    }

}
