<?php
namespace app\controller;

use app\core\Controller;

class HomeController extends Controller{
    
    public $model;

    public function __construct() {
        parent::__construct("HomeModel");
    }

    public function index(){
       
        $this->data = ["title" => "Главная", "js" => "main"];
        $cars = $this->model->selectAll("cars");
        $this->layoutHeader();
        $this->view("home/index", $cars);
        $this->layoutFooter();

        
    }

    public function order() {
        $this->model->setOrder($_POST);
    }

}

