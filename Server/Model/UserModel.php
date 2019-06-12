<?php

require $_SERVER['DOCUMENT_ROOT'].'/-TReX-Topic-based-Resource-eXplorer-/Server/Database/DatabaseConnection.php';

class UserModel{
    private $conn=null;

    public function __construct() {
         $databaseConnection=new DatabaseConnection();
         $this->conn=$databaseConnection->getConnection();
        }

    public function get(){
        $sql = "select * from users";
        $result=mysqli_query($this->conn, $sql);
        if($result==false) return "{ \"message\" : \"Eroare la executarea interogarii\"}";
        else {
            $myArray = array();
            while($row=$result->fetch_array(MYSQLI_ASSOC))
            {
            $myArray[] = $row;
            }
            return json_encode($myArray);
        }
    }

}

?>