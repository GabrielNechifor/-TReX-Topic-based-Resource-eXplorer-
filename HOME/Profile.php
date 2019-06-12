<?php
include_once 'log_in_buttons.php';
?>
<?php
date_default_timezone_set('Europe/Copenhagen');
include 'dba.inc.php';
include 'bookmarks.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" >
  <head>
    <meta charset="utf-8">
		<title>Acasa</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" />
    <link href="style2.css" rel="stylesheet" />
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
	</head>


	<body>
	  <header class="header">
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		    <img class="logo" src="images/lo.png" alt="">
				<div class="move_buttons">
          <a href="Users.php"><?php echo $output; ?></a>
				</div>
		</header>
		<nav id="nav">
				<ul>
				<li>
					<a href="index.php">
					<i class="fas fa-bars"></i>
				</a>
				</li>
					 <li><a href="index.php"><Strong>Home</Strong></a></li>
					<li><a href="#contact"><Strong>Contact</Strong></a></li>
              <li style="float:right">   <form action="searchPage.php" method="post">
        <input type="text" name="search" placeholder="Search in page ..." id="InputSearch" />
</form>  </li>
        </ul>
				</nav>
    <div class="subtitlu">
      <i class="far fa-id-card"></i><strong> Profile Information</strong>
    </div>
    <div id="Shape_user">
    <ul>
      
      <li><img class="img_user" src=<?php echo $userData['picture'];?> alt="Poza cu mine"></li>
      <li>
        <table id='tableUser'>
          <tr> 
              <td><i class="fas fa-user-tie">First Name</i></td>
              <td> <?php echo $userData['first_name'];?> </td>
          </tr>
          <tr>
              <td><i class="fas fa-user-tie">Last Name</i></td>
              <td><?php echo $userData['last_name']; ?></td>
          </tr>
          <tr>
              <td><i class="fas fa-envelope-open">Email</i></td>
              <td><?php echo $userData['email']; ?></td>
          </tr>
              <td><i class='fa fa-bookmark'>Bookmarks</i></td>
              <td>
                <?php
                  $sql="SELECT id from users where oauth_uid={$userData['oauth_uid']}";
                  $result = $conn->query($sql);
                  while($row = $result->fetch_assoc()){
                    $id=$row['id'];
                  }
                  getBookmarks($conn, $id);?>
              </td>
          </tr>
        </table>
      </li>
    </ul>    
  </div>
  <br>
  <footer> Copyright &copy; Faculty of Computer Science, group A7</footer>
</body>
</html>
