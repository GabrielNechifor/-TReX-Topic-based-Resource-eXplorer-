<?php
include_once 'log_in_buttons.php'
?>
<?php
date_default_timezone_set('Europe/Copenhagen');
include 'dba.inc.php';
include 'comments.inc.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" >
  <head>
    <meta charset="utf-8">
    <title>Articol</title>
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
        <li><a href="index.php"><Strong>Home</Strong></a></li>
        <li><a href="#contact"><Strong>Contact</Strong></a></li>
        <li style="float:right"><a><input type="text"  placeholder="Search in page..." id="InputSearch" ></a></li>
      </ul>
      </nav>

 <?php if(isset($_GET['subdomain'])){ $subdmn = $_GET['subdomain']; } 
                     if(isset($_GET['domain'])){ $dmn = $_GET['domain']; }
                        if(isset($_GET['param'])) { $id = $_GET['param']; }
                echo "<div class=\"subtitlu\">  <a href=\"index.php\">CCS</a> -> <a href=\"".$dmn.".php\">".$dmn."</a> -> <a href=\"Lista_Resurse.php?subdomain=".$subdmn."&domain=".$dmn."\"> ".$subdmn."</a> </strong></div>";
               ?>
 
	 <br>
        <article>
            <section>
        <table id="table1">
        <?php
        $xml = new XMLReader();
            $xml->open('XML_Resource.xml');
            while($xml->read()){
                if($xml->nodeType == XMLREADER::ELEMENT && $xml->localName == 'article' && $xml->getAttribute('id') == $id){
                    $youtube = 0;
                    while($xml->read() && $xml->localName != 'article'){
                            echo "<tr>";
                            if($xml->nodeType == XMLREADER::ELEMENT  && $xml->localName != '#text' && $xml->localName != 'resource' && $xml->localName != 'embed_resource'){
                                echo "<td>".strtoupper($xml->localName)."</td>";
                                $xml->read();
                                echo "<td>".($xml->value)."</td>";
                                
                                if($xml->value == 'Youtube Video'){
                                    $youtube = 1;
                                }
                            } 
                            if($xml->nodeType == XMLREADER::ELEMENT && $xml->localName == 'resource'){
                                if($youtube == 0){
                                echo "<td>".strtoupper($xml->localName)."</td>";
                                $xml->read();                               
                                echo "<td> <a href=\"".($xml->value)."\">here<a> </td>";
                                }else{
                                  $nm = $xml->localName;
                                  $xml->read();
                                  $lnk = $xml->value;
                                }
                            }
                            if($xml->nodeType == XMLREADER::ELEMENT && $xml->localName == 'embed_resource'){
                                  $xml->read();
                                 echo "<td>".strtoupper($nm)."</td>";
                                 echo "<td> <div class=\"iframe-container\"> <iframe width=\"560\" height=\"315\" src=\"".($xml->value)."\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe> </div>";
                                   echo "<br> See video on Youtube <a href=\"".$lnk."\">here<a> </td>";
                            }
                            echo "</tr>";           
                    }
                }
                
            }
        ?>
            </table>
           </section>
        </article>
<?php
echo "
        <form method='POST' action='".setComments($conn)."'>
        <input type='hidden' name='uid' value='Anonymus'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <textarea name='message'></textarea>
        <button type='submit' name='commentSubmit'>Comment</button>
        </form>";
        getComments($conn); 

?>
        <br> <br>
            <footer> Copyright &copy; Faculty of Computer Science, group A7</footer>
    </body>
</html>
