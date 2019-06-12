<?php
include_once 'log_in_buttons.php'
?>
<?php 
include 'functions/search.php';
include 'functions/dba.inc.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" >
  <head>
    <meta charset="utf-8">
    <title>Operating System</title>
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/style22.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
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
          <div class="subtitlu">
      <i class="far fa-id-card"></i><strong> Contact</strong>
    </div>
    <article>
       <section class="div_form">
        <form>
                <br><br>
                <div class="div_title">ANDRONIC N.S. IOANA-ANDRA - andraandronic61@yahoo.com</div>
                <br><br>
                <div class="div_title">BUIMESTRU O. ALEXANDRU - saniok34dh@gmail.com</div>
                <br><br>
                <div class="div_title">CALANCEA V. BIANCA-FELICIA - calancea.bianca15@gmail.com</div>
                <br><br>
                <div class="div_title">NECHIFOR G. GABRIEL-DANIEL - gabriel.nechifor98@gmail.com</div>
                <br><br>
            </form>
          </section>
    </article>
  <br>
    <footer> Copyright &copy; Faculty of Computer Science, group A7</footer>
</body>
</html>
