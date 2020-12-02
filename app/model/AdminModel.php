<?php

namespace app\model;

use app\core\Model;

class AdminModel extends Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function loginAdmin($field)
    {
        $error = [];
        foreach ($field as $key => $val) {
            if ($field[$key] == "") {
                $error[$key] = "Is empty";
            } else {
                $field[$key] = trim($field[$key]);
            }
        }

        if (count($error) > 0) {
            $error["message"] = "Please fill all the field";
            $error["error"] = true;
            $this->func->doJson($error);
        } else {
            $admin = $this->selectWithfield("admin", [
                "name" => $field["nameEmail"],
            ]);
            if ($admin) {
                if (password_verify($field['password'], $admin['password'])) {
                    $this->func->setSession([
                        "name" => $admin['name'],
                        "allow" => true
                    ], "admin");
                    $this->func->doJson(['message' => "You sucssefully sing", "error" => false]);
                } else {
                    $error["message"] = "Username or password is uncorrect";
                    $error["error"] = true;
                    $this->func->doJson($error);
                }
            } else {
                $this->func->doJson(['message' => "Username or password is uncorrect", "error" => true]);
            }
        }
    }


    public function getOrders()
    {
        $stmt = $this->pdo->query("SELECT o.id_ord, o.name, o.phone, o.message, c.name AS nameCar, o.date FROM orders o INNER JOIN cars c WHERE o.id_car=c.id_car");
        return $stmt->fetchAll();
    }


    public function getCars()
    {
        return $this->selectAll("cars");
    }

    public function createCar($data, $file)
    {
        $error = [];
        foreach ($data as $key => $val) {
            if (empty($data[$key])) {
                $error[$key] = "This field is empty";
            } else {
                $data[$key] = trim($data[$key]);
            }
        }
        $file = $this->func->uploadFile($file, "images/carsImage");
        if ($file['errorFile']) {
            $error = array_merge($error, $file);
        }
        if (count($error) > 0) {
            $error["message"] = "Please fill all fields";
            $error["error"] = true;
            return $error;
        } else {

            $execute =  $this->insesrtData("cars", [
                "name" => $data["nameCar"],
                "price_hour" => $data['priceHour'],
                "price_day" => $data['priceDay'],
                "photo" => $file["fileName"],
                "year" => $data["year"],
                "color" => $data['color']
            ]);

            if ($execute) {
                return array_merge($file, ["message" => "Car was created", "error" => false]);
            } else {
                $error["message"] = "You have some problem";
                $error["error"] = true;
                return $error;
            }
        }
    }

    public function deleteOrder($id)
    {
        $this->delete("orders", [
            "id_ord" => $id["idOrd"],
        ]);
        header("Location: http://localhost/avtoarenda/admin/manager?message=deleted");
    }
    public function deleteCar($id)
    {
        $car = $this->selectId("cars", [
            "id_car" => $id['idCar']
        ]);
        unlink(ROOT . PUBFOL . "images/carsImage/" . $car['photo']);

        $this->delete("cars", [
            "id_car" => $id["idCar"],
        ]);
        header("Location: http://localhost/avtoarenda/admin/manager?messaCar=deleted");
    }
}
