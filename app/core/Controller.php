<?php

namespace app\core;

class Controller {
    
    public Func $func;
    
    public $title;

    public function __construct() {
        $this->func = new Func();
    }


    public function view($file, $title) {
        
        include ROOT . "/app/view/" . $file . ".php";
    }

    
    
    public function layoutHeader() {
        include ROOT . "/app/view/layout/header.php";
    }

    public function layoutFooter() {
        include ROOT . "/app/view/layout/footer.php";
    }
}