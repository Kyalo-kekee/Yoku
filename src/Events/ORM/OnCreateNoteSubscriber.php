<?php

namespace Yoku\Ddd\Events\ORM;

use Doctrine\Common\EventArgs;
use Doctrine\ORM\Event\PostPersistEventArgs;

class OnCreateNoteListener
{

    public function postPersist(PostPersistEventArgs $args)
    {

    }
}