<?php
require_once("../inc/config.php");
require_once("../inc/db_func.php");
require_once($LOCAL_PATH."/maket/htmlHeader.php");

function content_page()
{

    include($GLOBALS["LOCAL_PATH"]."/userInfo.php");

}
?>
<html>
<body class="home">
<div id="all">
    <?
    if(isset($_SESSION["idUser"]))
		{
    include_once($LOCAL_PATH."/maket/userInfo.php");
		}
	else
		{
	include_once($LOCAL_PATH."/maket/contentBlock.php");
		}
    ?>
</div>
</body>
</html>