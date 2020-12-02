<?php
namespace app\controller;

use app\core\Controller;

class AdminController extends Controller{
    
    public function __construct() {
        parent::__construct("AdminModel");
        $this->func->sessionStart();

    }

    public function index(){
       $this->data = ["title" => "Login", "css" => "contAbout"];
       $this->layoutHeader('admin');
       $this->view("admin/sing", "Contact");
       $this->layoutFooter("admin");
      
    }


    public function login() {

        $this->model->loginAdmin($_POST);
        
    }
   
    public function manager() {

        $orders = $this->model->getOrders();
        $cars = $this->model->getCars();
        $params = [
            "cars" => $cars,
            "orders" => $orders
        ];
        $this->data = ["title" => "AdminPanel",  "js"=>"admin/admin"];
        $this->layoutHeader("admin");
        $this->view("admin/panel",  $params);
        $this->layoutFooter("admin");
    }

    public function addcar() {
        $this->data = ["title" => "ADD CAR",  "js"=>"admin/addcar"];
        $this->layoutHeader("admin");
        $this->view("admin/addcar"  );
        $this->layoutFooter("admin");
    }


    public function addCarData() {
       $carsData =  $this->model->createCar($_POST, $_FILES);
       $this->func->doJson($carsData);
    }

    public function deleteCar() {
        $this->model->deleteCar($_GET);
    }

    public function deleteOrd() {
        $this->model->deleteOrder($_GET);
    }

    public function singout() {
        $this->func->sessionDestroy();
        header("Location:" . APP );
    }

}
