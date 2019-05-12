<?php
include_once 'log_in_buttons.php'
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >
  <head>
    <meta charset="utf-8">
    <title>Feedback</title>
    <link href="style.css" rel="stylesheet" />
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
        <a>
        <span>
          <svg width="30" height="30">
            <path d="M0,5 30,5" stroke="#fff" stroke-width="2"/>
            <path d="M0,14 30,14" stroke="#fff" stroke-width="2"/>
            <path d="M0,23 30,23" stroke="#fff" stroke-width="2"/>
          </svg>
        </span>
      </a>
      </li>
        <li><Strong><a href="Acasa.html">Home</a></Strong></li>
        <li><a href="#news"><Strong>News</Strong></a></li>
        <li><a href="#contact"><Strong>Contact</Strong></a></li>
        <li style="float:right"><a><input type="text"  placeholder="Search in page..." id="InputSearch" ></a></li>
      </ul>
      </nav>

     <section >
      <div class="center">
        <h1>Contact Us</h1>
        <div>
          <div >
            <form >
                <div>
                  <div class="textField">
                    <input type="text" placeholder="Your name ...">
                  </div>
                </div>
                <div >
                  <div class="textField">
                    <input type="text" placeholder="Your Email ...">
                  </div>
                </div>
                <div >
                  <div class="textField">
                    <textarea cols="20" rows="4" placeholder="Your Message ..."></textarea>
                  </div>
                </div>
                <div>
                  <button class="log_button"> <span>Send Message</span> </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
 
    <footer> Copyright &copy; Faculty of Computer Science, group A7
    </footer>
    </body>
</html>
