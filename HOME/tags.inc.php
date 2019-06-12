<?php
function setTags($conn,$id){
    if(isset($_POST['AddTag']) && isset($_POST['name'] )){
        
        $name=$_POST['name'];
        $resourceID=$_POST['resourceID'];
        if($name && $resourceID){
        $sql="INSERT INTO tags (name,resourceID) VALUES('$name','$resourceID')";
        $result = $conn->query($sql);}
       
    }
}


function getTags($conn,$id){
 
    $sql="SELECT tags.name fROM tags join resources on tags.resourceId=resources.id
     where tags.resourceId={$id}";
    $result = $conn->query($sql);
    while( $row = $result->fetch_assoc()){
        echo $row['name'].",";
    
    }
}
?>