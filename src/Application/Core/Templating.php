<?php

namespace Yoku\Ddd\Application\Core;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class Templating
{

    public function registerTwig(): Environment
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../../views/templates/');
        return new Environment($loader);
    }

    public  function  addExtension(Environment $twig, $extension): void
    {
        $twig ->addExtension($extension);
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function render (Environment $twig, $templatePath, $data): string
    {
        return $twig ->render($templatePath,$data);
    }
}