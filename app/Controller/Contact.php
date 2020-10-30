<?php
namespace app\controller;

use app\core\Controller;

class Contact extends Controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function index(){
       $this->title = "Contact";
       $this->layoutHeader();
       $this->view("contact/contact", "Contact");
       $this->layoutFooter();
    }



}
