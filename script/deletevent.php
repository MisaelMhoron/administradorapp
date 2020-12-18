<?php
    $link = mysqli_connect('localhost','id14380409_sonsoapp','@Sonsonate20','id14380409_appturistica');
        if(!$link){
             echo 'connections field';
        } 

$result = mysqli_query($link, "DELETE FROM eventos WHERE fecha < CURDATE();");

if(mysqli_num_rows($result)){
   while($row[] = mysqli_fetch_assoc($result)){
       $json = json_encode($row);
   }
} else {
    echo 'result not found';
}

echo $json;

mysqli_close($link);