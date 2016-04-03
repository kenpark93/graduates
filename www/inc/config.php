<?
session_start();
if ( !ini_get( 'display_errors' ) ) {
    ini_set( 'display_errors', 1 );
}
ini_set( 'log_errors', 0 );

$IMG_PATH="http://sema.ru/images/users/";
$SITE_PATH="/";
$FULL_SITE_PATH="http://sema.ru";
$USER_SITE_PATH="http://sema.ru/maket/userRoom.php";
$LOCAL_PATH="/home/sema.ru/www";


$db_param=array();
$db_param["server"]="localhost";
$db_param["base"]="graduates";
$db_param["user"]="root";
$db_param["pass"]="";

?>