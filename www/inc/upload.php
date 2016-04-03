<?php
include_once('db_func.php');
include_once('config.php');
	global $db_param;
	$result;
   if($_FILES["filename"]["size"] > 1024*3*1024)
   {
     $result="size";
   }

   $extension=strstr($_FILES["filename"]["size"], "."); 
    $extension=strtoupper($extension); 
    if ($extension!=".JPG" && $extension!=".GIF" && $extension!=".BMP" && $extension!=".JPEG") 
  { 
  $result="form";
   }
   if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
   {
     move_uploaded_file($_FILES["filename"]["tmp_name"], "../photos/".$_SESSION["idUser"].".jpg");
	 header("Location: $USER_SITE_PATH");
   $result="good";
   } else {
      $result="error";
   }
   echo $result;
?>
