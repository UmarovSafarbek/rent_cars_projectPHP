<?php
namespace app\controller;

use app\core\Controller;

class AdminController extends Controller{
    
    public function __construct() {
        parent::__construct("AdminModel");
    }

    public function index(){
       $this->data = ["title" => "Admin", "css" => "contAbout", "js"=>"admin/admin"];
       $this->layoutHeader();
       $this->view("admin/sing", "Contact");
       $this->layoutFooter("admin");
      
    }


    public function login() {

        $this->model->loginAdmin($_POST);

    }
   
}
