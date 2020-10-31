<?php
namespace app\core;

class Func {

    public function debug($var, $pr = 0) {
        if($pr) {
            echo "<pre>";
            echo print_r($var, true);
            echo "</pre>";
        } else {
            echo "<pre>";
            var_dump($var);
            echo "</pre>";
        }
    }

    public function div($text) {
        echo "
        <div><h1>$text</h1></div>
        ";
    }

    public function setStatusCode($code) {
        http_response_code($code);
    }


}

