<?php

require $_SERVER['DOCUMENT_ROOT'].'/-TReX-Topic-based-Resource-eXplorer-/Server/Model/UserModel.php';

class UserController{

    private $model=null;
    private $method=null;
    private $data=null;
    private $parametru_get=null;

    public function __construct($method,$data,$parametru_get){
        $this->model= new UserModel();
        $this->method=$method;
        $this->data=$data;
        $this->parametru_get=$parametru_get;
    }

    public function getResponse(){


        switch ($this->method) {

            case 'GET':
            return $this->model->get();
              http_response_code(404);
              break;
              
          }


    }

}

?>