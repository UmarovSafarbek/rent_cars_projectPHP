<?php

namespace app\core;

class Controller {
    
    public Func $func;
    /**
     * @param array $data
     * In this variable  will add title, css file etc
     */
    public $data = [];

    public function __construct() {
        $this->func = new Func(); 
    }


    public function view($file, $params = []) {
        
        include ROOT . "/app/view/" . $file . ".php";
    }

    
    
    public function layoutHeader() {
        include ROOT . "/app/view/layout/header.php";
    }

    public function layoutFooter() {
        include ROOT . "/app/view/layout/footer.php";
    }
}