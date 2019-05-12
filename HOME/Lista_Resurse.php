<?php
include_once 'log_in_buttons.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" >
  <head>
    <meta charset="utf-8">
    <title>Operating System</title>
    <link href="style.css" rel="stylesheet" />
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
					<li><a href="Acasa.php"><Strong>Home</Strong></a></li>
					<li><a href="#contact"><Strong>Contact</Strong></a></li>
				  <li style="float:right"><a><input type="text"  placeholder="Search in page..." id="InputSearch" ></a></li>
        </ul>
				</nav>


          <article>
            <section>
               <div class="subtitlu" align="center"><strong>  <a href="index.php">CCS</a> -> <a href="Programming Paradigms.php">Programming Paradigms</a> -> <a> Object Orientated Programming</a> </strong></div>

          </section>




    <section >
        <ul  class="list">
            <li>

                <p><a href="Carte_Algoritmica.php"><b>Design Patterns: Elements of Reuseable Object-Orientate Software</b></a> </p>

                <p id="obliqueFont"> Design patterns, software engineering, object-orientated programming</p>

                <p class="align_left">
                        <i class="fa fa-star colorated"></i>
                        <i class="fa fa-star colorated"></i>
                        <i class="fa fa-star colorated"></i>
                        <i class="fa fa-star colorated"></i>
                        <i class="fa fa-star colorated"></i>
                </p>


            </li>
            <li>

                    <p><a href="Carte_Algoritmica.php"><b>Design Patterns: Elements of Reuseable Object-Orientate Software</b></a> </p>

                    <p id="obliqueFont"> Design patterns, software engineering, object-orientated programming</p>

                    <p class="align_left">
                            <i class="fa fa-star colorated"></i>
                            <i class="fa fa-star colorated"></i>
                            <i class="fa fa-star colorated"></i>
                            <i class="fa fa-star colorated"></i>
                            <i class="fa fa-star"></i>
                         </p>


                </li>

            </ul>
    </section>
</article>
<footer> Copyright &copy; Faculty of Computer Science, group A7</footer>
</body>
</html>
