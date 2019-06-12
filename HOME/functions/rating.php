<?php
require_once('dba.inc.php');
function setRating($conn){
if(isset($_POST['Submit'],$_POST['rating1'],$_POST['rating2'],$_POST['rating3'],$_POST['rating4'])){
    $uid=$_POST['userId'];
    $resourceId=$_POST['resourceId'];
    $rating1=$_POST['rating1'];
    $rating2=$_POST['rating2'];
    $rating3=$_POST['rating3'];
    $rating4=$_POST['rating4'];
    
    $rating=($rating1+$rating2+$rating3+$rating4)/4;
    $sql="INSERT INTO recomandari(userId ,resourceId,nota) VALUES  ('$uid','$resourceId','$rating')";
    $result = $conn->query($sql);
}
} 
?>