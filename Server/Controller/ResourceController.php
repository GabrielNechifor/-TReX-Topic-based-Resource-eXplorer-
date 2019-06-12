<?php

require $_SERVER['DOCUMENT_ROOT'].'/-TReX-Topic-based-Resource-eXplorer-/Server/Model/ResourceModel.php';

class ResourceController{

    private $model=null;
    private $method=null;
    private $data=null;
    private $parametru_get=null;

    public function __construct($method,$data,$parametru_get){
        $this->model= new ResourceModel();
        $this->method=$method;
        $this->data=$data;
        $this->parametru_get=$parametru_get;
    }

    public function getResponse(){


        switch ($this->method) {

            case 'GET':
            if(!isset($this->parametru_get[0]) || !isset($this->parametru_get[2]))
                 return $this->model->get($this->parametru_get[0]);
              http_response_code(404);
              break;
              
          }


    }

}

?>