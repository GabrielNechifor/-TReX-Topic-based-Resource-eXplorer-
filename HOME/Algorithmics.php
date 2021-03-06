
<?php
include_once 'log_in_buttons.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" >
  <head>
    <meta charset="utf-8">
    <title>Algorithmics</title>
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/style22.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
  </head>
  <body>
      <header class="header">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
          <img class="logo" src="images/lo.png" alt="">
          <div class="move_buttons">
          <?php echo $output; ?>
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
					<li><a href="Contact.php"><Strong>Contact</Strong></a></li>
              <li style="float:right">   <form action="searchPage.php" method="post">
        <input type="text" name="search" placeholder="Search in page ..." id="InputSearch" />
</form>  </li>
        </ul>
				</nav>
  <section>
    <div class="subtitlu" align="center"><strong><a href="index.php">CCS</a> -> <a href="Algorithmics.php">Algorithmics</a></strong></div>
  </section>
  <section  style="display:inline-block; vertical-align: top; width: 350px; height: auto;" >
    <div id="mySidepanel" class="sidepanel">
      
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
      <ul>
        <li><a class="active" href="Algorithmics.php">Algorithmics</a></li>
        <li><a href="Software Engineering.php">Software Engineering</a></li>
        <li><a href="Programming Paradigms.php">Programming Paradigm</a></li>
        <li><a href="Information Security.php">Information Security</a></li>
        <li><a href="Web Technologies.php">Web Technologies</a></li>
        <li><a href="Operating Systems.php">Operating Systems</a></li>
      </ul>
    </div>
    <div>
    <button class="openbtn" onclick="openNav()"><Strong>Domains</Strong></button>  
    </div>
    <script>
    function openNav() {
      document.getElementById("mySidepanel").style.width = "300px";
      document.getElementById("mySidepanel").style.height = "auto";
    }
    function closeNav() {
      document.getElementById("mySidepanel").style.width = "0";
    }
    </script>
  </section> 
    <div id="container" align="center">
        <div class="box">
		     	<a href="Lista_Resurse.php?subdomain=Algorithmic complexity theory&domain=Algorithmics"><div class="boxinside">Algorithmic complexity theory</div></a>
      	</div>
      	<div class="box">
		    	<a href="Lista_Resurse.php?subdomain=Algorithm design&domain=Algorithmics"><div class="boxinside">Algorithm design</div></a>
	      </div>
	      <div class="box">
			    <a href="Lista_Resurse.php?subdomain=Hardness of problems&domain=Algorithmics"><div class="boxinside">Hardness of problems</div></a>
      	</div>
     </div>
  <footer>
    Copyright &copy; Faculty of Computer Science, group A7
  </footer>
</body>
</html>
