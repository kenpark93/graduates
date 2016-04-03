<?
   require_once("../inc/config.php");
   require_once("../inc/service_func.php");
   require_once("../inc/db_func.php");

   $status=checkRegUserInfo($_POST);


   if($status=="ok"){
        if(saveUserInfo($_POST))
         header("Location: $FULL_SITE_PATH");
       else
         header("Location: $FULL_SITE_PATH"."/pages/register.php?status=Ошибка сохранения информации в базе данных");
   }
   else
       header("Location: $FULL_SITE_PATH"."/pages/register.php?status=".$status);

?>