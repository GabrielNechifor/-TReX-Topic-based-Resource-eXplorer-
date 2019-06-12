<?php

require 'UserController.php';

class Controller{

    private $nume_controller=null;
    private $tip_request=null;
    private $corp_request=null;
    private $parametru_uri=null;

    public function __construct() {
        $this->parse_url();
    }

    private function parse_url(){
         $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
         $uri = explode( '/', $uri );


         if(!isset($uri[3])) { http_response_code(404);  exit;  }
            else $this->nume_controller=$uri[3];

         if(isset($uri[4])) $this->parametru_uri=$uri[4];

         $this->tip_request = $_SERVER["REQUEST_METHOD"];

         $this->corp_request = json_decode(file_get_contents('php://input'), true);
    }

    function getResponse(){

        switch ($this->nume_controller) {
            case 'users':
            $userController=new UserController($this->tip_request,$this->corp_request,$this->parametru_uri);
            return $userController->getResponse();
            break;
            default: 
            http_response_code(404);
            return "{ \"message\" : \"Nu exista un constructor care trateaza constructorul\" }"; 
        }

    }

}

?>