<?php
include_once 'log_in_google/User.php';


function getSimilarity($matrix,$person1,$person2){
    $s1=0;
    $s2=0;
    $ss1=0;
    $ss2=0;
    $n=0;
    $ps=0;
    foreach($matrix[$person1] as $key=>$value){ 
        if(array_key_exists($key,$matrix[$person2])){
            $n++;
            $s1+=$matrix[$person1][$key];
            $s2+=$matrix[$person2][$key];
            $ps+=$matrix[$person1][$key] * $matrix[$person2][$key];
            $ss1+=pow($matrix[$person1][$key],2);
            $ss2+=pow($matrix[$person2][$key],2);
        }
    }
    $num=$n * $ps - ($s1 * $s2);
    $den=sqrt( ( $n * $ss1 - pow($s1,2) ) * ( $n * $ss2 - pow($s2,2) ) );
if($den==0) return 0;
    return $num/$den;

}

function getRecomandation($matrix,$person1){

    $total=array();
    $simsum=array();
    $avg_person1=0;
    $avg_person2=0;
    $count=0;

    foreach($matrix as $person2=>$value){
        if($person2!=$person1){
            $sim=getSimilarity($matrix,$person1,$person2);

            if($sim==0) continue;

            $count=0;
            $avg_person2=0;
            
            foreach($matrix[$person2] as $key=>$value){
                if(array_key_exists($key,$matrix[$person1])){
                      $avg_person2+=$value; $count++;
                }
            }
            $avg_person2/=$count;
        
            foreach($matrix[$person2] as $key=>$value){ 
                if(!array_key_exists($key,$matrix[$person1])){  
                    
                    $sim=2*$sim+3;

                    if(!array_key_exists($key,$total)) $total[$key]=0;

                    $total[$key]+=($matrix[$person2][$key] - $avg_person2 ) * $sim; 

                    if(!array_key_exists($key,$simsum)) $simsum[$key]=0; 
                    
                    $simsum[$key]+=$sim; 
                }

            }
        }
    }

    $count=0;
    foreach($matrix[$person1] as $value){
        $avg_person1+=$value; $count++;
    }
    if($avg_person1<0) $avg_person1= -$avg_person1;
    $avg_person1/=$count;


$ranks=array();
            foreach($total as $key=>$value ){
                $ranks[$key]= $avg_person1 + $value/$simsum[$key];  //pentru fiecare produs la care user1 nu a dat rating se face o estimare (total/simsum)
                if($ranks[$key]>5) $ranks[$key]=5;
                if($ranks[$key]<1) $ranks[$key]=1;
            }
            arsort($ranks,SORT_DESC); // se sorteaza userii descrescator in functie de rating
            return $ranks;
}


//start
$user=new User();
$conn=$user->getConn();


$sql=mysqli_query($conn,"select * from recomandari;");

$matrix=array();

while($sql_line=mysqli_fetch_array($sql)){

    if(isset($sql_line['nota']))
         $matrix[$sql_line['userId']][$sql_line['resourceId']]=$sql_line['nota'];
}

$recomandations=array();

foreach($matrix as $key=>$value){ 
    $recomadations[$key]=getRecomandation($matrix,$key);
}

echo "<pre>";
print_r($recomadations);
echo "</pre>";

?>