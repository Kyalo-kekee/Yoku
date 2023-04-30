<?php

namespace Yoku\Ddd\Domain\Repository;

interface NoteRepositoryInterface
{
    public function save(Note $note): void;
}