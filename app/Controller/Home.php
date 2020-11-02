<?php
namespace app\controller;

use app\core\Controller;

class Home extends Controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function index(){
       
        $this->data = ["title" => "Главная"];

        $this->layoutHeader();
        $this->view("home/index");
        $this->layoutFooter();
        
    }
}

