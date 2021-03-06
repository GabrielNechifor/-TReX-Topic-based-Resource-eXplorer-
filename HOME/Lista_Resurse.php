<?php
include_once 'log_in_buttons.php'
?>
<?php 
include 'functions/dba.inc.php';
include 'functions/bookmarks.php';
include 'tags.inc.php';

$query= $conn->query("SELECT resourceId, AVG(nota) as rating from recomandari GROUP BY resourceId");
$note=[];
while($row=$query->fetch_object()){
    $note[]=$row;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" >
  <head>
    <meta charset="utf-8">
    <title>Operating System</title>
    <link href="css/style22.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
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


          <article>
            <section>
               <?php if(isset($_GET['subdomain'])){ $subdmn = $_GET['subdomain']; } 
                     if(isset($_GET['domain'])){ $dmn = $_GET['domain']; }
                echo "<div class=\"subtitlu\" align=\"center\"><strong>  <a href=\"index.php\">CCS</a> -> <a href=\"".$dmn.".php\">".$dmn."</a> -> <a> ".$subdmn."</a> </strong></div>";
               ?>
          </section>




    <section >
        <ul  class="list">
        <?php
            global $id;
            $xml = new XMLReader();
            $xml->open('XML_Resource.xml');
            while($xml->read()){
                if($xml->nodeType == XMLREADER::ELEMENT && $xml->localName == 'subdomain' && $xml->getAttribute('category') == $subdmn){
                    while($xml->read()){
                        if($xml->localName == 'subdomain'){
                            break;
                        }
                        if($xml->nodeType == XMLREADER::ELEMENT && $xml->localName == 'article'){
                            $id = $xml->getAttribute('id');
                            echo "<li>";
                        }
                            if($xml->nodeType == XMLREADER::ELEMENT && $xml->localName == 'name'){
                                $xml->read();
                                echo "<h3 class='subtitluArticole' align='center'><a href=\"Carte_Algoritmica.php?param=".$id."&subdomain=".$subdmn."&domain=".$dmn."\"><b>".($xml->value)."</b></a></h3>";                  
                            } 
                            if($xml->nodeType == XMLREADER::ELEMENT && $xml->localName == 'review'){
                                $xml->read();

                                $rate=0;
                                foreach($note as $nota){
                                    if($nota->resourceId==$id)
                                    $rate=$nota->rating;
                                }
                               
                            
                                echo "<p id=\"obliqueFont\">".($xml->value)."</p>";
                                
                                getTags($conn,$id);
                                
                                echo "<i class='fa fa-star colorated fa-2x' style='float:right'></i>
                                      <p style='float:right'>Rating:".round($rate,2)." / 5</p><br><br></li>
                                    ";
                            
                                  
                                
                            }           
                    }
                }
                
            }
            $xml->close();
            ?>
            </ul>

        
    </section>
</article>
<footer> Copyright &copy; Faculty of Computer Science, group A7</footer>
</body>
</html>
