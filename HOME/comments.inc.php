<?php
function setComments($conn){
if(isset($_POST['commentSubmit'])){
    $uid=$_POST['uid'];
    $data=$_POST['date'];
    $message=$_POST['message'];

    $sql="INSERT INTO comments (uid ,date,message)  VALUES  ('$uid','$data','$message')";
    $result = $conn->query($sql);
    $sql="SELECT * FROM COMMENTS";
    $result = $conn->query($sql);

    }

function getComments($conn){
 
    $sql="SELECT * FROM COMMENTS order by date desc";
    $result = $conn->query($sql);
    while(  $row = $result->fetch_assoc()){
        echo "<div class='comment'><p>";
            echo $row['uid']."(";
            echo $row['date'].")"."<br>";
            echo nl2br($row['message']);   
        echo "</p></div><br>";

    }
  
    
    }
}