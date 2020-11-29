<?php

namespace app\core;

use Exception;
use PDO;

class Model
{
    public  $pdo;
    private $DBname = DBNAME;
    private $host = HOSTDB;
    private $user = USER;
    private $pwd = PASSWORD;

    public $table;
    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->DBname}", $this->user, $this->pwd,);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function query($query)
    {
      return  $this->pdo->prepare($query);
    }

    /**
     * @param $table set table which will selected
     */
    public function selectAll($table)
    {
        $data = $this->pdo->query("SELECT *FROM $table");
        return $data->fetchAll();
    }


    /**
     * @param $table set table which will selected
     */
    public function selectId($table, array $field)
    {
        $col = array_keys($field)[0];
        $query = $this->query("SELECT *FROM $table WHERE $col = :$col");
        $query->execute($field);
        return $query->fetch();
    }

    /**
     * @param $fields
     * select whit name 
     */ 

    public  function selectWithfield($table, array $field) {
            $col = array_keys($field)[0];
            $sql = "SELECT *FROM $table WHERE ". $col ."=:name";
            $stmt = $this->query($sql);
            $stmt->execute($field);
            return $stmt->fetch();
    }


    
    public  function selectWithAnd($table, array $fields) {
        $colums = array_keys($fields);

        //max fieldd must be 3
        if(count($colums) < 4){
            $sql = "SELECT *FROM $table WHERE " . $colums[0] . "= :".$colums[0];
            if(isset($colums[1])) {
                $sql.= " AND " . $colums[1]. "= :".$colums[1];
            } 
            if(isset($colums[2])) {
                $sql.= " AND " . $colums[2]."= :".$colums[2];
            }
        } else {
            die("You have problems");
        }
        
        $stmt = $this->query($sql);
        $stmt->execute($fields);
        return $stmt->fetchAll(); 
    }   
      

       
    public  function selectWithOr($table, array $fields) {
        $colums = array_keys($fields);

        //max fieldd must be 3
        if(count($colums) < 4){
            $sql = "SELECT *FROM $table WHERE " . $colums[0] . "= :".$colums[0];
            if(isset($colums[1])) {
                $sql.= " OR " . $colums[1]. "= :".$colums[1];
            } 
            if(isset($colums[2])) {
                $sql.= " OR " . $colums[2]."= :".$colums[2];
            }
        } else {
            die("You have problems");
        }
        
        $stmt = $this->query($sql);
        $stmt->execute($fields);
        return $stmt->fetchAll(); 
    }   

    public function delete($table, array $field) :void { 
        $col = array_keys($field)[0];
        $sql = "DELETE FROM $table WHERE $col = :$col";
        $stmt = $this->query($sql);
        $stmt->execute($field);
    }



    public function update($table, array $fields) {
        $columns = array_keys($fields);
        $sql = "UPDATE $table SET " . $columns[1] . "=:". $columns[1] . " ";
        if(count($columns) <= 5) {
            if(isset($columns[2])){
                $sql .=  ", " .  $columns[2] . "=:". $columns[2] . " " ;
            }
            if(isset($columns[3])){
                $sql .=  ", " . $columns[3] . "=:". $columns[3] . " ";
            }
            if(isset($columns[4])){
                $sql .= ", " .  $columns[4] . "=:". $columns[4] . " ";
            }
            if(isset($columns[5])){
                $sql .= ", " .  $columns[5] . "=:". $columns[5] . " ";
            }
        }
         $sql.= " WHERE " . $columns[0] . "=:" . $columns[0];
         $stmt = $this->query($sql);
         $stmt->execute($fields);
    }


    public function insesrtData($table, array $fields) {

        $columns = array_keys($fields);

        if(count($fields) <= 5){
            $sql1 = "INSERT INTO $table(" . $columns[0] . " " ;
            $sql2 = ") VALUES(:" . $columns[0] . " ";

            if(isset($columns[1])){
                $sql1 .= ", " . $columns[1] . " ";
                $sql2 .= ", :" . $columns[1] .  " ";
            }
            if(isset($columns[2])){
                $sql1 .= ", " . $columns[2] . " ";
                $sql2 .= ", :" . $columns[2] .  " ";
            }
       
            if(isset($columns[3])){
                $sql1 .= ", " . $columns[3] . " ";
                $sql2 .= ", :" .$columns[3] .  " ";
            }

            if(isset($columns[4])){
                $sql1 .= ", " . $columns[4] . " ";
                $sql2 .= ", :" .$columns[4] .  " ";
            }
        }

        $sql = $sql1 . $sql2 . ")";
        $stmt = $this->query($sql);
        return $stmt->execute($fields);
    }



}
