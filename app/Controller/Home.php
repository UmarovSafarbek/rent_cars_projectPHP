<?php
namespace app\controller;

use app\core\Controller;

class Home extends Controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function index($index = null){
        echo $this->func->div("Index method from Home");
        
    }
}

