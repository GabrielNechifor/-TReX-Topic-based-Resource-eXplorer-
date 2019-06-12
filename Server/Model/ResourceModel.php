<?php

class ResourceModel{
    private $conn=null;

    public function __construct() {
         $databaseConnection=new DatabaseConnection();
         $this->conn=$databaseConnection->getConnection();
        }

    public function get($subdmn){
        $subdmn=urldecode($subdmn);
        $query= $this->conn->query("SELECT resourceId, AVG(nota) as rating from recomandari GROUP BY resourceId");
$note=[];
while($row=$query->fetch_object()){
    $note[]=$row;
}

        
            $myArray = array();
            $titlu='';
            $review='';
            $rating='';
            
            $id=null;
            $xml = new XMLReader();
            $xml->open($_SERVER['DOCUMENT_ROOT'].'/-TReX-Topic-based-Resource-eXplorer-/Server/Resources/XML_Resource.xml');
            while($xml->read()){
              
                if($xml->nodeType == XMLREADER::ELEMENT && $xml->localName == 'subdomain' && $xml->getAttribute('category') == $subdmn){
                    while($xml->read()){
                        
                        if($xml->localName == 'subdomain'){
                            break;
                        }
                        if($xml->nodeType == XMLREADER::ELEMENT && $xml->localName == 'article'){
                            $id = $xml->getAttribute('id');
                        }
                            if($xml->nodeType == XMLREADER::ELEMENT && $xml->localName == 'name'){
                                $xml->read();
                                $titlu=$xml->value;
                               } 
                            if($xml->nodeType == XMLREADER::ELEMENT && $xml->localName == 'review'){
                                $xml->read();
                                $review=$xml->value;
                                $rate=0;
                                foreach($note as $nota){
                                    if($nota->resourceId==$id)
                                    $rate=$nota->rating;
                                }
                                $linie=array();
                                $linie['titlu']=$titlu; $linie['review']=$review; $linie['rating']=$rate; $linie['id']=$id;
                                $myArray[]=($linie);
                                }  
                                
                            }           
                    }
                }
                
            $xml->close();


            return json_encode($myArray);
    }

}

?>