<?php

namespace Yoku\Ddd\Infrastructure\Persistence;


use Yoku\Ddd\Domain\Entity\Note;
use Yoku\Ddd\Domain\Repository\NoteRepositoryInterface;

class NoteRepository implements NoteRepositoryInterface
{
    private $db; // database connection object

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function save(Note $note): void
    {
        $stmt = $this->db->prepare('INSERT INTO notes (id, title, content, created_at) VALUES (:id, :title, :content, :created_at)');
        $stmt->execute([
            ':id' => $note->getId(),
            ':title' => $note->getTitle(),
            ':content' => $note->getContent(),
            ':created_at' => $note->getCreatedAt()->format('Y-m-d H:i:s'),
        ]);
    }
}
