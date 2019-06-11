<?php
function setComments($conn){
if(isset($_POST['commentSubmit'],$_POST['text'])){
    $uid=$_POST['userId'];
    $resourceId=$_POST['resourceId'];
    $data=$_POST['date'];
    if(isset($_POST['text']))
    {$text=$_POST['text'];
    $sql="INSERT INTO comments(userId ,resourceId,text,date) VALUES  ('$uid','$resourceId','$text','$data')";
    $result = $conn->query($sql);
    $sql="SELECT * FROM COMMENTS";
    $result = $conn->query($sql);
  }
}
}

function getComments($conn,$id){
    $sql="SELECT comments.date,comments.text,users.first_name,users.last_name FROM comments 
    join users on comments.userId=users.id where resourceId=".$id;
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
            echo "<div class='dialogbox'>
                   <div class='body'>
                    <span class='tip tip-left'></span>
                      <div class='message'>
                        <span>";
            echo "<a href='Profile.php'>".$row['first_name']." ";
            echo $row['last_name']."</a>(";
            echo "<i class='fa fa-calendar'></i>".$row['date'].")<br><br>";
            echo nl2br($row['text']);   
            echo "</span>
            </div>
          </div>
        </div><br><br>";
    }
      

}
?>