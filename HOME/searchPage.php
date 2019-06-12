<?php
include_once 'log_in_buttons.php'
?>
<?php 
include 'dba.inc.php';
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
    <link href="style.css" rel="stylesheet" />
    <link href="style22.css" rel="stylesheet" />
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
					<li><a href="#contact"><Strong>Contact</Strong></a></li>
              <li style="float:right">   <form action="searchPage.php" method="post">
        <input type="text" name="search" placeholder="Search in page ..." id="InputSearch" />
</form>  </li>
        </ul>
				</nav>
          <article>
               <?php include 'search.php'; ?>

    <section >
        <ul  class="list">
        <?php
            $xml = new XMLReader();
            $xml->open('XML_Resource.xml');
                    while($xml->read()){
                        if($xml->localName == 'domain'){
                            $dmn = $xml->getAttribute('category');
                        }
                        if($xml->localName == 'subdomain'){
                            $subdmn = $xml->getAttribute('category');
                        }
                        if($xml->nodeType == XMLREADER::ELEMENT && $xml->localName == 'article'){
                            $id = $xml->getAttribute('id');
                        }
                            if($xml->nodeType == XMLREADER::ELEMENT && $xml->localName == 'name' && (strpos($ids,"s".$id."f") !== false)){
                                $xml->read();
                                echo "<li>";
                                echo "<h3 class='subtitluArticole' align='center'><a href=\"Carte_Algoritmica.php?param=".$id."&subdomain=".$subdmn."&domain=".$dmn."\"><b>".($xml->value)."</b></a> </h3>";                  
                            } 
                            if($xml->nodeType == XMLREADER::ELEMENT && $xml->localName == 'review' && (strpos($ids,"s".$id."f") !== false)){
                                $xml->read();
                                $rate=0;
                                foreach($note as $nota){
                                    if($nota->resourceId==$id)
                                    $rate=$nota->rating;
                                }
                                echo "<p id=\"obliqueFont\">".($xml->value)."</p>";
                                
                                echo "
                                <i class='fa fa-bookmark fa-2x'></i>
                                <i class='fa fa-star colorated fa-2x' style='float:right'></i>
                                <p style='float:right'>Rating:".round($rate,2)." / 5</p></li>";     
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
