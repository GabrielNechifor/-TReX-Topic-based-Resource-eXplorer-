<?php
function getBookmarks($conn,$id){
 
 $sql="SELECT resources.name as name FROM resources join bookmarks on bookmarks.resourceId=resources.id 
 join users on bookmarks.userId=users.id where bookmarks.userId={$id}";
 $result = $conn->query($sql);

 while($row = $result->fetch_assoc()){
         echo "<a>".$row['name']."</a><br>";
     }
     
 }

?>