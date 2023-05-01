<?php

namespace Yoku\Ddd\Infrastructure\Persistence;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Yoku\Ddd\Domain\Entity\Note;
use Yoku\Ddd\Domain\Repository\NoteRepositoryInterface;

class NoteRepository implements NoteRepositoryInterface
{
    private EntityManagerInterface $db;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->db = $entityManager;
    }

    public function save(Note $note): void
    {
       $this->db->persist($note);
       $this->db->flush();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function delete($id): void
    {
       $note = $this ->db->find(Note::class,$id);

       $this->db->remove($note);
       $this->db->flush();
    }
}
