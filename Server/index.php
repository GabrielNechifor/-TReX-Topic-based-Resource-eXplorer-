<?php

require 'Controller/controller.php';


require $_SERVER['DOCUMENT_ROOT'].'/-TReX-Topic-based-Resource-eXplorer-/Server/Database/DatabaseConnection.php';

$controller=new Controller();

$response=$controller->getResponse();

echo '<pre>';
print_r($response);
echo '</pre>';



?>