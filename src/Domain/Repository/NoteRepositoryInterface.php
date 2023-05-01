<?php

namespace Yoku\Ddd\Domain\Repository;

use Yoku\Ddd\Domain\Entity\Note;

interface NoteRepositoryInterface
{
    public function save(Note $note): void;

    public function delete(Note $note): void;
}