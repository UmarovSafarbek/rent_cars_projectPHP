<?php

namespace app\core;

class Func
{

    public function debug($var, $pr = 0)
    {
        if ($pr) {
            echo "<pre>";
            echo print_r($var, true);
            echo "</pre>";
        } else {
            echo "<pre>";
            var_dump($var);
            echo "</pre>";
        }
    }

    public function div($text)
    {
        echo "
        <div><h1>$text</h1></div>
        ";
    }

    public function setStatusCode($code)
    {
        http_response_code($code);
    }

    public function sessionStart() : void
    {
        session_start();
    }

    public function sessionDestroy() : void
    {
        session_unset();
        session_destroy();
    }

    public function getSessions()
    {
        return $_SESSION;
    }

    public function setSession(array $data, $name) : void {
        foreach($data as $key => $val) {
            $_SESSION[$name][$key] = $val;
        }
    }

    public function doJson($data, $data2 = null)
    {
        if (isset($data2) &&  count($data2) > 0) {
            $data = array_merge($data, $data2);
        }
        echo  json_encode($data);
    }


    public function uploadFile($file, $folder)
    {
        if (!empty($_FILES['file']['name'])) {
            if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
                $name = $_FILES['file']['name'];
                $tmp = $_FILES['file']['tmp_name'];
                $formFile = array("jpg", "png", 'jpeg', "gif", "pdf", "jfif");
                $fileExeption = explode(".", $name);
                $fileExeption = end($fileExeption);
                if (in_array($fileExeption, $formFile)) {
                    $fileUpload = PUBFOL . $folder . "/" . $name;
                    if (!file_exists($fileUpload)) {
                        if (move_uploaded_file($tmp, $fileUpload)) {
                            return ["messageFile" => "File uploaded", "errorFile" => false, "fileName" => $name];
                        } else {
                            return ['messageFile'=> "Some errorFile try egain!", "errorFile" => true];
                        } 
                    } else {
                        return ["messageFile" => "File with this name already exists!!", "errorFile" => true];
                    }
                } else {
                    return ["messageFile" => "It is not image Please choose image only", "errorFile" => true];
                }
            }
        } else {
            return ["messageFile" => "Please choose file", "errorFile" => true];
        }
    }
}
