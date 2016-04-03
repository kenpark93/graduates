<?

//функция проверки загруженного изображения (тип, размер по ширине и высоте, размер в байтах)
function check_file($fName, $max_image_width, $max_image_height,  $max_image_size )
{

    $status="";
    $valid_types = array("jpg", "png", "jpeg");

    if (isset($_FILES[$fName]) && is_uploaded_file($_FILES[$fName]['tmp_name'])) {
        $filename = $_FILES[$fName]['tmp_name'];
        $ext = substr($_FILES[$fName]['name'], 1 + strrpos($_FILES[$fName]['name'], "."));
        if (filesize($filename) > $max_image_size) {
            $status.="слишком большой файл, ";
        }
        elseif (!in_array($ext, $valid_types)) {
            $status.="неверный фомат файла, ";
        } else {
            $size = GetImageSize($filename);
            if (!($size) || ($size[0] > $max_image_width) || ($size[1] > $max_image_height)) {
                $status.="неверный размер изображения, ";
            }
        }
        return $status;
    }

}



function checkRegUserInfo($regInfo)
{
    global  $LOCAL_PATH;;
    $status = "";
    if (!isset($regInfo["login"]) || isset($regInfo["login"]) && !checkRegExp($regInfo["login"], "login") )
        $status = "логин, ";
    if (!isset($regInfo["fio"]) || isset($regInfo["fio"]) && !checkRegExp($regInfo["fio"], "fio"))
        $status .= "ФИО, ";
    if (isset($regInfo["mail"]) && $regInfo["mail"]!="" && !checkRegExp($regInfo["mail"], "mail"))
        $status .= "адрес почты, ";
    if (!isset($regInfo["pass"]) || isset($regInfo["pass"]) && !checkRegExp($regInfo["pass"], "pass"))
        $status .= "пароль, ";
    if (!isset($regInfo["pass_confirm"]) || !isset($regInfo["pass"]) || isset($regInfo["pass_confirm"]) &&
        isset($regInfo["pass"]) && $regInfo["pass_confirm"] != $regInfo["pass"])
           $status .= "неверное подтверждение пароля, ";
    global $FULL_SITE_PATH;
    if (isset($regInfo["login"]) && getUserInfo($regInfo["login"])!=null)
       $status .= "уже есть такой логин, ";

   // Проверка загруженного изображения
    //$fileStatus=Ccheck_file("foto", 300, 300, 3 * 1024 * 1024* 1024);
    //if($fileStatus!="Файл не загружен")
    //    $status.=$fileStatus;



    if($status=="")
       return "ok";
    else
        return substr($status,0,-2);
}

function print_error($error_str)
{
   global $SITE_PATH;
   echo <<<err
       <div style="text-align: center; width: 100%">
        <img src="$SITE_PATH/images/error.jpg" alt=""/>
        <p style="margin:30px; auto; color: #293946 ">
          $error_str
        </p>
    </div>
err;
}

function checkRegExp($str, $template, $maxLen=0)
{
    switch($template)
    {
        case "login":
            return preg_match("/^[a-zA-Z0-9_]{1,10}$/u", $str);

        case "pass":
            return preg_match("/^[a-zA-Z0-9_]{1,10}$/u",$str);

        case "mail":
            return preg_match("/^[\-\._a-z0-9]+@(?:[a-z0-9][\-a-z0-9]+\.)+[a-z]{2,6}$/u",$str);

        case "fio":        
            if(substr($str, -1)!=" ") {
                $str .= " ";
            }
            return preg_match("/^([А-ЯЁа-яё]|[A-Za-z]+\s){3}$/u",$str);
        case "cyrReg_1":
            return preg_match("/^[а-яА-ЯёЁ0-9_ ]{1,$maxLen}$/u", $str);
        case "cyrAddr":
            return preg_match("/^[а-яА-ЯёЁ0-9_\-,. ]{1,50}$/u", $str);
        case "cyrReg_2":
            return preg_match("/^[а-яА-ЯёЁ0-9_\-,.<>a-zA-Z\n\r ]{1,$maxLen}$/u", $str);
       default:
            return false;

    }


}
?>