<?php
namespace app\core;
use app\core\Func;

class Router {
    
    public Func $func;
    public  $dir;
    
    private $controller = "Home";
    private $action = "index";
    private $params = [];

    
    public function __construct($dir)
    {   
        $this->dir = $dir;
        $this->func = new Func();
        $this->callController();
        
    }


     /**
      * 
     * Get the URL
     * 
     */


    public function getUrl() {
        return  $_GET['url'] ?? null;
    }

    /**
     * Split url and return array
     */
    public function urlExplode() {
        if($this->getUrl()) {
            return explode("/", rtrim($this->getUrl(), "/"));
        }
        return false;
    }


    public function callController() {
       
        $url = $this->getUrl(); 
       
        if($url){
          
            $url = $this->urlExplode();
           
            $this->controller = count($url) > 0 ? array_shift($url) : "Home";
            $this->action = count($url) > 0 ? array_shift($url) : "index";
            $this->params = count($url) > 0 ? $url : [];
            

            $this->controller = ucfirst($this->controller);
            $obj = "\app\controller\\". $this->controller . "Controller";
            if(class_exists($obj)){
                $obj  = new $obj();
                if(method_exists($obj, $this->action)) {
                    call_user_func_array([$obj, $this->action], $this->params);
                } else {
                    $this->func->setStatusCode(404);
                    include  VIEWFOL. "404.html";
                }

            } else {
                $this->func->setStatusCode(404);
                include  VIEWFOL . "404.html";
            }

        } else {
            $obj = "app\controller\\". $this->controller . "Controller";
            $obj = new $obj();
            call_user_func_array([$obj, $this->action], $this->params);
        }
        
    }

}




