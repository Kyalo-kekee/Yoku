<?php

namespace Yoku\Ddd\Application\Controllers;

use Yoku\Ddd\Application\Core\BaseController;

class HomeController extends BaseController
{

    public function index()
    {
        return $this ->render('home.html', array(
            'name' => "Alex"
        ));
    }

}