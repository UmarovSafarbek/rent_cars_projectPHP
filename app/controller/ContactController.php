<?php
namespace app\controller;

use app\core\Controller;

class ContactController extends Controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function index(){
       $this->data = ["title" => "Contact", "css" => "contAbout"];
       $this->layoutHeader();
       $this->view("contact/contact", "Contact");
       $this->layoutFooter();
      
    }


}
