<?php

namespace app\controller;

use app\core\Controller;

class AboutController extends Controller
{


    public function index()
    {
        $this->data = ['title' => "About us", "css" => "contAbout"];
        $this->layoutHeader();
        $this->view("home/about");
        $this->layoutFooter();
    }
}
