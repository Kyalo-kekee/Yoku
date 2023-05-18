<?php

namespace Yoku\Ddd\bin;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:create-note',description: 'create a note ')]
class CreateNoteCommand extends Command
{

    protected  static $defaultDescription = "Create a new note";


    protected function configure()
    {
        $this->setHelp("This command allows you to create a new note");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        protected static  $defaultDescription = " Create a new note";
        return Command::SUCCESS;
    }
}