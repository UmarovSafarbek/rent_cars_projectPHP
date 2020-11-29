<?php 
namespace app\model;

use app\core\Func;
use app\core\Model;

class AdminModel extends Model {

    private Func $func;

    public function __construct()
    {
        $this->func = new Func();
        parent::__construct();
    }

    public function loginAdmin($field)
    {
        $error = [];
        foreach($field as $key => $val) {
            if($field[$key] == "") {
                $error[$key] = "Is empty";
            } else{
                $field[$key] = trim($field[$key]);
            }
        }

        if(count($error) > 0) { 
            $error["message"] = "Please fill all the field";
            $error["error"] = true;
            echo json_encode($error);
        } else {
            $admin = $this->selectWithfield("admin", [
                "name" => $field["nameEmail"],
            ]);
            if($admin) {
                if(password_verify($field['password'], $admin['password'])){
                    json_encode(['message' => "pronle", "error"=>true]);   
                     return ;
                } else {
                    $error["message"] = "Username or password is uncorrect";
                    $error["error"] = true;
                    echo json_encode($error);
                }
            } else{
                json_encode(['message' => "pronle", "error"=>true]);
                return ;
            }

        
        }

    }

}


