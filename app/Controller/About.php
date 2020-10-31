<?php

namespace app\controller;

use app\core\Controller;

class About extends Controller
{


    public function index()
    {
        $this->layoutHeader();
        $this->view("home/about");
    }
}
