<?php

use Yoku\Ddd\Application\Services\EntityMangerService;

require_once '../../vendor/autoload.php';

$em = new EntityMangerService();

$db = $em ->getEm();

