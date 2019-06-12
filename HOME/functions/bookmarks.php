<?php
function getBookmarks($conn,$id){
 $sql="SELECT resources.name as name, resources.id as id FROM resources join bookmarks on bookmarks.resourceId=resources.id 
 join users on bookmarks.userId=users.id where bookmarks.userId={$id}";
 $result = $conn->query($sql);
 echo "<ol>";
 while($row = $result->fetch_assoc()){
         echo "<li><a href=\"../HOME/searchPage.php?check={$row['id']}\">".$row['name']."</a></li><br>";
     }
     echo "</ol>";
     
 }


 function setBookmarks($conn,$id){
    if(isset($_POST['bookmarkSubmit'])){
        $uid=$_POST['userId'];
        $sql="INSERT INTO bookmarks(userId ,resourceId) VALUES  ('$uid','$id')";
        $result = $conn->query($sql);
      }
    
    }

  function deleteBookmarks($conn,$id){
        if(isset($_POST['bookmarkSubmit'])){
            $uid=$_POST['userId'];
            $sql="DELETE from bookmarks where userId={$uid} and resourceId={$id} ";
            $result = $conn->query($sql);
          }
        
        }
   
?>