<?php

namespace app\core;



class Controller {
    
    public Func $func;
    /**
     * @param array $data
     * In this variable  will add title, css file etc
     */
    public $data = [];

    public $model;

    public function __construct($fileModel) {
        $this->func = new Func();
        $this->model = $this->modelFile($fileModel);
    }

    public function modelFile($file) {
       $class =  "\app\model\\" . $file;
        return new $class();
    }

    public function view($file, $params = []) {
        
        include ROOT . "/app/view/" . $file . ".php";
    }

    
    
    public function layoutHeader($admin = null) {
        if($admin == "admin"){
            include ROOT . "/app/view/layout/headerAdmin.php";
        } else{
            include ROOT . "/app/view/layout/header.php";
        }
        
    }

    public function layoutFooter($admin = null) {
        if($admin == "admin"){
            include ROOT . "/app/view/layout/footerAdmin.php";
        } else{
            include ROOT . "/app/view/layout/footer.php";
        }
        
    }
}