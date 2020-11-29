<?php 
namespace app\model;

use app\core\Model;

class HomeModel extends Model {


    public function setOrder(array $fields) {
        $error = [];
        $fields_inp = [];
        foreach($fields as $key => $val) {
            if(empty($fields[$key])) {
                    $error[$key] = $fields[$key] . " is empty";
            } else {
               $fields_inp[$key] = rtrim($fields[$key]);
            }
        }

        if(count($error) > 0) {
            $error["error"] = true;
            echo json_encode($error);
        } else {
            $this->insesrtData("orders", [
                "name"=> $fields_inp["name"],
                "phone"=> $fields_inp["phone"],
                "message"=> $fields_inp['message'],
                "date"=> date("Y-m-d H:i:s")    
            ]);
            echo json_encode(["message"=>"Спасибо за отзив", "error" => false]);
        }
      
    }


}


?>