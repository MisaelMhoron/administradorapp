<?php
  $link = mysqli_connect('localhost','u493485681_appsonsonate','Golgot@2020','u493485681_appturismo');
 if(!$link){
  echo 'connections field';
 }
   
   $result = mysqli_query($link,"SELECT * FROM eventos WHERE  fecha < curdate();");


     while ($row= mysqli_fetch_array($result)) {
        define("BASE_URL", DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR);
    define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT'] . BASE_URL);
    
    $folder_upload = "uploads/eventos/";
    
    $image_delete = ROOT_PATH . $folder_upload . pathinfo($row['imagen'], PATHINFO_BASENAME);
    
   unlink($image_delete);
 // echo ($image_delete);

    }
 
    
 $resultado = mysqli_query($link,"DELETE from eventos where fecha < curdate()");
  
 //  echo json_encode($image_delete);

  
mysqli_close($link);

