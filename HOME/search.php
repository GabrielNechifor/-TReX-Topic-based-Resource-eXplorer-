<?php

$servername = "35.241.163.89";
$username = "trex";
$password = "trex";
$dbname = "trex";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$ids = '';
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//collect
if(isset($_POST['search'])){
    $searchq = $_POST['search'];

        $sql = "select * from resources where name like '%$searchq%';";

     try {
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
               $ids .= "s".$row["id"]."f";
    }
} else {
    $ids = "0 results";
}
    } catch (PDOException $e) {
        echo "error listing elements".$e;
        die();
    }
   
}
?>