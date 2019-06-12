<?php

class DatabaseConnection{
    private $conn=null;

    public function __construct(){
        $this->conn= new mysqli( "35.241.163.89", 'trex', 'trex', 'trex');
        if($this->conn->connect_error){
            die("Failed to connect with MySQL: " . $this->conn->connect_error);
        }
    }

    public function getConnection(){
        return $this->conn;
    }

}


?>
