<?php

// Require the Composer autoloader
require_once '../../vendor/autoload.php';


error_reporting(1);
$App = new Yoku\Ddd\Application\Kernel();

$App->run();