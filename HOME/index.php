<?php
include_once 'log_in_buttons.php'
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >
  <head>
    <meta charset="utf-8">
		<title>Acasa</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="style.css" rel="stylesheet" />
		<link href="style22.css" rel="stylesheet" />
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


 <section>
   <div class="subtitlu">
	 <strong>Computing Clasification System(CCS)</strong>
	</div>
	


<div id="container" align="center">

  <div class="box">
			<a href="Algorithmics.php"><div class="boxinside">Algorithmics</div></a>
	</div>
	<div class="box">
			<a href="Software Engineering.php"><div class="boxinside">Software Enigeering</div></a>
	</div>
	<div class="box">
			<a href="Programming Paradigms.php"><div class="boxinside">Programming Paradigms</div></a>
	</div>
	<div class="box">
			<a href="Information Security.php"><div class="boxinside">Information Security</div></a>
	</div>
	<div class="box">
			<a href="Web Technologies.php"><div class="boxinside">Web Technologies</div></a>
	</div>
	<div class="box">
     <a href="Operating Systems.php"> <div class="boxinside">Operating Systems</div></a>
	</div>
</div></section>
<br>
	  <footer> Copyright &copy; Faculty of Computer Science, group A7</footer>
</body>
</html>
