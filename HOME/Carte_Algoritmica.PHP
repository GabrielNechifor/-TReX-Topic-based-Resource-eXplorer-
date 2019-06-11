<?php
include_once 'log_in_buttons.php'
?>
<?php
date_default_timezone_set('Europe/Copenhagen');
include 'dba.inc.php';
include 'comments.inc.php';
include 'rate.php';
?>

<?php 
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
    <title>Articol</title>
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
        <li><a href="Acasa.html"><Strong>Home</Strong></a></li>
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
        <?php
        $rate=0;
        foreach($note as $nota){
            if($nota->resourceId==$id)
            $rate=$nota->rating;
        }?>
        
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

        
        <h2 align='center'>Rating Section:
        <?php echo  round($rate,2)." / 5
                                    <i class='fa fa-star colorated fa-2x'></i>";?></h2>
        

        <?php echo "<form method='POST' action='".setRating($conn)."'>";?>
        <?php echo "<input type='hidden' name='resourceId' value='".$id."'>
                  <input type='hidden' name='userId' value='1'>
        <table align='center' class='rateTable'>
        <tr>
        <td>
        <fieldset class='rating'>
        <legend align='center'>How useful do you think the article is?</legend>
        <div align='center'>
          <label for='1'>1
            <input type='checkbox' id='1' name='rating1' value='1'/>
            <span class='checkmark'></span>
          </label>
          <label for='2'>2
            <input type='checkbox' id='2' name='rating1' value='2'>
            <span class='checkmark'></span>
          </label>
          <label for='3'>3
            <input type='checkbox' id='3' name='rating1' value='3'/>
            <span class='checkmark'></span>
          </label>
          <label for='4'>4
            <input type='checkbox' id='4' name='rating1' value='4'/>
            <span class='checkmark'></span>
          </label>
          <label for='5'>5
            <input type='checkbox' id='5' name='rating1' value='5'/>
            <span class='checkmark'></span>
          </label>
          <i class='fa fa-star colorated fa-2x'></i>
          </fieldset>
          <td>
        <br>
        <td>
        <fieldset class='rating'>
        <legend align='center'>How informative do you think the article is?</legend>
        <div align='center'>
          <label for='1'>1
            <input type='checkbox' id='1' name='rating2' value='1'/>
            <span class='checkmark'></span>
          </label>
          <label for='2'>2
            <input type='checkbox' id='2' name='rating2' value='2'/>
            <span class='checkmark'></span>
          </label>
          <label for='3'>3
            <input type='checkbox' id='3' name='rating2' value='3'/>
            <span class='checkmark'></span>
          </label>
          <label for='4'>4
            <input type='checkbox' id='4' name='rating2' value='4'/>
            <span class='checkmark'></span>
          </label>
          <label for='5'>5
            <input type='checkbox' id='5' name='rating2' value='5'/>
            <span class='checkmark'></span>
          </label>
          <i class='fa fa-star colorated fa-2x'></i>
          </div>
          </fieldset>
         </td></tr>
        <br>
        <tr>
        <td>
        <fieldset class='rating'>
        <legend align='center'>How atractive do you think the article is?</legend>
        <div align='center'>
          <label for='1'>1
            <input type='checkbox' id='1' name='rating3' value='1'/>
            <span class='checkmark'></span>
          </label>
          <label for='2'>2
            <input type='checkbox' id='2' name='rating3' value='2'/>
            <span class='checkmark'></span>
          </label>
          <label for='3'>3
            <input type='checkbox' id='3' name='rating3' value='3'/>
            <span class='checkmark'></span>
          </label>
          <label for='4'>4
            <input type='checkbox' id='4' name='rating3' value='4'/>
            <span class='checkmark'></span>
          </label>
          <label for='5'>5
            <input type='checkbox' id='5' name='rating3' value='5'/>
            <span class='checkmark'></span>
            
          </label>
          <i class='fa fa-star colorated fa-2x'></i>
          </div>
          </fieldset>
          <td>
          <br>
          <td>
          <fieldset class='rating'>
        <legend align='center'>Do you recommend this article?</legend>
        <div align='center'>
          <label for='1'>1
            <input type='checkbox' id='1' name='rating4' value='1'/>
            <span class='checkmark'></span>
          </label>
          <label for='2'>2
            <input type='checkbox' id='2' name='rating4' value='2'/>
            <span class='checkmark'></span>
          </label>
          <label for='3'>3
            <input type='checkbox' id='3' name='rating4' value='3'/>
            <span class='checkmark'></span>
          </label>
          <label for='4'>4
            <input type='checkbox' id='4' name='rating4' value='4'/>
            <span class='checkmark'></span>
          </label>
          <label for='5'>5
            <input type='checkbox' id='5' name='rating4' value='5'/>
            <span class='checkmark'></span>
          </label>
          <i class='fa fa-star colorated fa-2x'></i>
          </div>
        </fieldset>
        </td>
        </tr>
        </table>
        
        
        <button type='submit' name='Submit' class='buttonRate'>Submit</button>
        <br>
          </form>"?>
     <br>

<?php
$sql="SELECT id from users where oauth_uid={$userData['oauth_uid']}";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
  $userId=$row['id'];
}?>
<?php
echo "
        <form method='POST' action='".setComments($conn)."'>
        <input type='hidden' name='userId' value='".$userId."'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <input type='hidden' name='resourceId' value='".$id."'>
        <textarea name='text' placeholder='Add a comment..'></textarea>
        <br>
        <button type='submit' name='commentSubmit' class='buttonsComment'>Comment</button>
        </form>";
echo "<br><div class='container'>";
getComments($conn,$id); 
echo "</div>";
?>
        <br> <br>
            <footer> Copyright &copy; Faculty of Computer Science, group A7</footer>
    </body>
</html>
