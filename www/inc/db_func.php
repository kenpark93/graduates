<?php
function connect_db($db_param)
{
    $conn = mysqli_connect($db_param["server"], $db_param["user"], $db_param["pass"], $db_param["base"]);
    if ($conn)
      mysqli_set_charset($conn, "utf8");
    return $conn;
}


//Проверяем логин-парль пользователя по MySQLбазе
function checkLogInfo($log, $pas)
{

    global $db_param;
    $status = array();
    if (!checkRegExp($log, "login") || !checkRegExp($pas, "pass")) {
        $status["logStatus"] = false;
        $status["status_string"] = "Некорректные логин или пароль";
        return $status;
    }
    $conn = connect_db($db_param);
    if ($conn != null) {
        if(!($stmt=$conn->prepare("select id from users where login=? and pass=?"))) {
            echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
        }
        if(!$stmt->bind_param('ss',$l,$a)) {
            echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        }
        $l=$log;
        $a = sha1($pas);
        if(!$stmt->execute()) {
            echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
            $status["logStatus"] = false;
            $status["status_string"] = "Неверный пароль";
        }
        if(!($res=$stmt->get_result())) {
            echo "Не удалось получить результат: (" . $stmt->errno . ") " . $stmt->error;
            $status["logStatus"] = false;
            $status["status_string"] = "Неверный пароль";
        } else {
            if($res>0){
                $status["logStatus"] = true;
            } else {
                $status["logStatus"] = false;
                $status["status_string"] = "Неверный пароль";
            }
        }
        $stmt->close();
        /*$query = "select id from users where login=\"$log\" and pass=sha1(\"$pas\")";
        $result = mysqli_query($conn, $query);
        //считать данные о пользователе
        if (mysqli_num_rows($result) > 0)
                 $status["logStatus"] = true;
        else {
            $status["logStatus"] = false;
            $status["status_string"] = "Неверный пароль";
        }
        mysqli_free_result($result);
        mysqli_close($conn);*/
        return $status;
    }
}



//Извлекаем данные о пользловател с указанным логином. Теперь из MySQL-базы
function getUserInfo($logUser)
{
    global $db_param;

    //if (!checkRegExp($logUser, "login"))
      //  return null;

    $conn = connect_db($db_param);
    $query = "select id_graduate, studentname, year, id_faculty, learn_form, learn_type, namedirection, workplace, contacts, comments from users where login=\"$logUser\"";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0)
     {  $userInfo= mysqli_fetch_assoc($result);
        if($userInfo["img"]==null)

                $userInfo["img"]="noname.jpg";
            }
    else {
      $userInfo=null;
    }

    mysqli_free_result($result);
    mysqli_close($conn);
    return $userInfo;

}

//Сохранить информацию о пользлователе в БД
function saveUserInfo($userInfo)
{
    global $db_param;

    $conn = connect_db($db_param);
    if ($conn != null) {
        $imgStrTo="";$imgStrVal="";
        if (isset($_FILES["foto"]) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $filename = $_FILES['foto']['name'];
            { $imgStrTo=" ,img"; $imgStrVal=" ,\"$filename\"";}
            move_uploaded_file($_FILES['foto']['tmp_name'], "../pages/users/" . $_FILES['foto']['name']);
        } else {
            //$imgStrTo = " ,img"
            //$imgStrVal = " ,http://lab6our.ru/lab5_3/images/users/noname.jpg";
        }
        $query = "insert into users  (login, fio, mail, pass $imgStrTo) values (\"{$userInfo["login"]}\", \"{$userInfo["fio"]}\",
        \"{$userInfo["mail"]}\", sha1(\"{$userInfo["pass"]}\") $imgStrVal)";
        return mysqli_query($conn, $query);

    }
    return false;



}

function getLastGrad($count)
{
    global $db_param;
    if (!is_numeric($count))
        return null;
    $conn = connect_db($db_param);
    if ($conn != null) {
        $query = "SELECT id_graduate, studentname, year, id_faculty, learn_form, learn_type, namedirection, workplace, contacts, comments FROM graduates LEFT JOIN directions_old ON (directions_old.id_direction = graduates.id_direction) order by id_graduate desc limit $count";
        $result = mysqli_query($conn, $query);
    if ( mysqli_num_rows($result) > 0) {
        $housesInfo=array();
        while($hi=mysqli_fetch_array($result))
           $housesInfo[]=$hi;
        mysqli_free_result($result);
        return $housesInfo;}


      return null;

    }
    return null;

}

function getYear()
{
    global $db_param;
    $conn = connect_db($db_param);
    if ($conn != null) {
        $query = "SELECT DISTINCT year FROM `graduates` ORDER BY year DESC";
        $result = mysqli_query($conn, $query);
    if ( mysqli_num_rows($result) > 0) {
        $housesInfo=array();
        while($hi=mysqli_fetch_array($result))
           $housesInfo[]=$hi;
        mysqli_free_result($result);
        return $housesInfo;}


      return null;

    }
    return null;

}

function getNap()
{
    global $db_param;
    $conn = connect_db($db_param);
    if ($conn != null) {
        $query = "SELECT DISTINCT namedirection FROM `directions_old` ORDER BY namedirection";
        $result = mysqli_query($conn, $query);
    if ( mysqli_num_rows($result) > 0) {
        $housesInfo=array();
        while($hi=mysqli_fetch_array($result))
           $housesInfo[]=$hi;
        mysqli_free_result($result);
        return $housesInfo;}


      return null;

    }
    return null;

}

function getCount()
{
    global $db_param;
    $conn = connect_db($db_param);
    if ($conn != null) {
        $query = "SELECT COUNT(*) FROM graduates";
        $result = mysqli_query($conn, $query);
	if( mysqli_num_rows($result) > 0){
		$allCount = array();
		while($hi=mysqli_fetch_array($result))
			$allCount[] = $hi;
		mysqli_free_result($result);
		return $allCount;		
	}
	return null;
        
        
	}
    return null;

}

class myClass {

        function connect_db($db_param)
    {
        $conn = mysqli_connect($db_param["server"], $db_param["user"], $db_param["pass"], $db_param["base"]);
        if ($conn)
          mysqli_set_charset($conn, "utf8");
        return $conn;
    }


    //Сохранить информацию о новости в БД
function saveUser($json)
{
    global $db_param;

    $conn = connect_db($db_param);
	$hash = substr(sha1($json->pas),0,32);
    if ($conn != null) {
		if(!($stmt=$conn->prepare("insert into graduates (login,password,studentname,year,id_direction) values(?,?,?,?,(SELECT id_direction FROM directions_old WHERE namedirection=? and id_faculty=? and learn_form=? and learn_type=?))"))) {
            echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
        }
		if(!$stmt->bind_param('sssdsddd',$a,$b,$c,$d,$e,$f,$g,$h)) {
            echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        }
		$a=$json->log;
		$b=$hash;
		$c=$json->fio;
		$d=$json->year;
		$e=$json->napr;
		$f=$json->fac;
		$g=$json->form;
		$h=$json->dip;		
	   //$query = "insert into graduates (login,password,studentname,year,id_direction) values(\"$json->log\",sha1(\"$json->pas\"),\"$json->fio\",$json->year,(SELECT id_direction FROM directions_old WHERE namedirection=\"$json->napr\" and id_faculty=\"$json->fac\" and learn_form=\"$json->form\" and learn_type=\"$json->dip\"))";
       	$res = 	$stmt->execute();		
		$stmt->close();
		return $res;
    }
    return false;

}

function logUser($json)
{
    global $db_param;
    $conn = connect_db($db_param);
	$hash = substr(sha1($json->pas),0,32);
    if ($conn != null) {
		if(!($stmt=$conn->prepare("SELECT id_graduate FROM graduates where login=? and password=?"))) {
            echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
        }
		if(!$stmt->bind_param('ss',$l,$p)) {
            echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        }
		$l=$json->log;
        $p = $hash;
		if(!$stmt->execute()) {
            echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
        }
		if(!($res=$stmt->get_result())) {
            echo "Не удалось получить результат: (" . $stmt->errno . ") " . $stmt->error;
        } else {
            if($res>0){
                $gradInfo=array();
				while($bi=mysqli_fetch_array($res))
					$gradInfo[]=$bi;
				
            } else {
                return null;
            }
        }
		$stmt->close();
		return json_encode($gradInfo);
		/*
		        $query = "SELECT id_graduate FROM graduates where login=\"$json->log\" and password=\"$hash\"";
        $result = mysqli_query($conn, $query);
        if ( mysqli_num_rows($result) > 0) {
            $gradInfo=array();
            while($bi=mysqli_fetch_array($result))
                $gradInfo[]=$bi;
            return json_encode($gradInfo);
		}
        mysqli_free_result($result);
        return null;
    }
    return null;*/
}
}


function checkUser($json)
{
    global $db_param;
    $conn = connect_db($db_param);

    if ($conn != null) {
		if(!($stmt=$conn->prepare("SELECT id_graduate FROM graduates where login=?"))) {
            echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
        }
		if(!$stmt->bind_param('s',$l)) {
            echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        }
		$l=$json->log;
		if(!$stmt->execute()) {
            echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
        }
		if(!($res=$stmt->get_result())) {
            echo "Не удалось получить результат: (" . $stmt->errno . ") " . $stmt->error;
        } else {
            if($res>0){
                $gradInfo=array();
				while($bi=mysqli_fetch_array($res))
					$gradInfo[]=$bi;				
            } else {
                return null;
            }
        }
		$stmt->close();
		return json_encode($gradInfo);
        /*$query = "SELECT id_graduate FROM graduates where login=\"$json->log\"";
        $result = mysqli_query($conn, $query);
        if ( mysqli_num_rows($result) > 0) {
            $gradInfo=array();
            while($bi=mysqli_fetch_array($result))
                $gradInfo[]=$bi;
            return json_encode($gradInfo);
		}
        mysqli_free_result($result);
        return null;*/
    }
    //return null;

}

function getRecordWithOffset($x,$y)
{
    global $db_param;
    $conn = connect_db($db_param);

    if ($conn != null) {
		if(!($stmt=$conn->prepare("SELECT id_graduate, studentname, year, id_faculty, learn_form, learn_type, namedirection, workplace, contacts, comments FROM graduates LEFT JOIN directions_old ON (directions_old.id_direction = graduates.id_direction) LIMIT ?,?"))) {
            echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
        }
		if(!$stmt->bind_param('ss',$a,$b)) {
            echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        }
		$a=$x;
		$b=$y;
		if(!$stmt->execute()) {
            echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
        }
		if(!($res=$stmt->get_result())) {
            echo "Не удалось получить результат: (" . $stmt->errno . ") " . $stmt->error;
        } else {
            if($res>0){
                $gradInfo=array();
				while($bi=mysqli_fetch_array($res))
					$gradInfo[]=$bi;				
            } else {
                return null;
            }
        }
		$stmt->close();
		return json_encode($gradInfo);
        /*$query = "SELECT * FROM graduates LEFT JOIN directions_old ON (directions_old.id_direction = graduates.id_direction) LIMIT $x,$y";
        $result = mysqli_query($conn, $query);
        if ( mysqli_num_rows($result) > 0) {
            $gradInfo=array();
            while($bi=mysqli_fetch_array($result))
                $gradInfo[]=$bi;
            return json_encode($gradInfo);
		}
        mysqli_free_result($result);
        return null;*/
    }
    //return null;

}
function getUserById($json)
{
    global $db_param;
    $conn = connect_db($db_param);

    if ($conn != null) {
		if(!($stmt=$conn->prepare("SELECT id_graduate, studentname, year, id_faculty, learn_form, learn_type, namedirection, workplace, contacts, comments FROM graduates LEFT JOIN directions_old ON (directions_old.id_direction = graduates.id_direction) where id_graduate=?"))) {
            echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
        }
		if(!$stmt->bind_param('d',$a)) {
            echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        }
		$a=$json->id;
		if(!$stmt->execute()) {
            echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
        }
		if(!($res=$stmt->get_result())) {
            echo "Не удалось получить результат: (" . $stmt->errno . ") " . $stmt->error;
        } else {
            if($res>0){
                $gradInfo=array();
				while($bi=mysqli_fetch_array($res))
					$gradInfo[]=$bi;				
            } else {
                return null;
            }
        }
		$stmt->close();
		return json_encode($gradInfo);
        /*$query = "SELECT * FROM graduates LEFT JOIN directions_old ON (directions_old.id_direction = graduates.id_direction) where id_graduate=$json->id";
        $result = mysqli_query($conn, $query);
        if ( mysqli_num_rows($result) > 0) {
            $gradInfo=array();
            while($bi=mysqli_fetch_array($result))
                $gradInfo[]=$bi;
            return json_encode($gradInfo);
		}
        mysqli_free_result($result);
        return null;*/
    }
    //return null;

}

function getUserOdn($json)
{
    global $db_param;
    $conn = connect_db($db_param);

    if ($conn != null) {
		if(!($stmt=$conn->prepare("SELECT id_graduate, studentname, year, id_faculty, learn_form, learn_type, namedirection, workplace, contacts, comments FROM graduates LEFT JOIN directions_old ON (directions_old.id_direction = graduates.id_direction) where year=? AND namedirection=?"))) {
            echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
        }
		if(!$stmt->bind_param('ss',$a,$b)) {
            echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        }
		$a=$json->year;
        $b=$json->namedirection;
		if(!$stmt->execute()) {
            echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
        }
		if(!($res=$stmt->get_result())) {
            echo "Не удалось получить результат: (" . $stmt->errno . ") " . $stmt->error;
        } else {
            if($res>0){
                $gradInfo=array();
				while($bi=mysqli_fetch_array($res))
					$gradInfo[]=$bi;				
            } else {
                return null;
            }
        }
		$stmt->close();
		return json_encode($gradInfo);
        /*$query = "SELECT * FROM graduates LEFT JOIN directions_old ON (directions_old.id_direction = graduates.id_direction) where year=$json->year";
        $result = mysqli_query($conn, $query);
        if ( mysqli_num_rows($result) > 0) {
            $gradInfo=array();
            while($bi=mysqli_fetch_array($result))
                $gradInfo[]=$bi;
            return json_encode($gradInfo);
		}
        mysqli_free_result($result);
        return null;*/
    }
    //return null;

}

function updateUserInfo($json)
{
    global $db_param;

    $conn = connect_db($db_param);
    if ($conn != null) {
		if($json->p=="-1"){
			if(!($stmt=$conn->prepare("update graduates set login=?, workplace=?,contacts=?,comments=? where id_graduate=?"))) {
				echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
			}
			if(!$stmt->bind_param('ssssd',$a,$b,$c,$d,$e)) {
				echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
			}
			$a=$json->l;
			$b=$json->w;
			$c=$json->con;
			$d=$json->co;
			$e=$json->id;
			//$query = "update graduates set login=\"$json->l\", workplace=\"$json->w\",contacts=\"$json->con\",comments=\"$json->co\" where id_graduate=$json->id";
		} else {
			$hash = substr(sha1($json->p),0,32);
			if(!($stmt=$conn->prepare("update graduates set login=?,password=?, workplace=?,contacts=?,comments=? where id_graduate=?"))) {
				echo "Не удалось подготовить запрос: (" . $conn->errno . ") " . $conn->error;
			}
			if(!$stmt->bind_param('sssssd',$a,$b,$c,$d,$e,$f)) {
				echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
			}
			$a=$json->l;
			$b=$hash;
			$c=$json->w;
			$d=$json->con;
			$e=$json->co;
			$f=$json->id;
			//$query = "update graduates set login=\"$json->l\",password=\"$hash\",workplace=\"$json->w\",contacts=\"$json->con\",comments=\"$json->co\" where id_graduate=$json->id";
		}
			$res = 	$stmt->execute();		
			$stmt->close();
			return $res;
       //return mysqli_query($conn, $query);
    }
    return false;

}
function searchUsers($json)
{
    global $db_param;
    $conn = connect_db($db_param);
	$query="";
    if ($conn != null) {
		$year=$json->y;
		$type=$json->t;
		$form=$json->f;
		$napr=$json->n;
        $query = "SELECT id_graduate, studentname, year, id_faculty, learn_form, learn_type, namedirection, workplace, contacts, comments FROM graduates LEFT JOIN directions_old ON (directions_old.id_direction = graduates.id_direction) where ";
		if($year!=="0") {
			$query.="year=$year";
		} else {
			$query.="year is not null";
		}
		if($type!=="0") {
			$query.=" and learn_type=$type";
		} else {
			$query.=" and learn_type is not null";
		}
		if($form!=="0") {
			$query.=" and learn_form=$form";
		} else {
			$query.=" and learn_form is not null";
		}
		if($napr!=="0") {
			$query.=" and namedirection=\"$napr\"";
		} else {
			$query.=" and namedirection is not null";
		}
		
        $result = mysqli_query($conn, $query);
        if ( mysqli_num_rows($result) > 0) {
            $gradInfo=array();
            while($bi=mysqli_fetch_array($result))
                $gradInfo[]=$bi;
            return json_encode($gradInfo);
        }
        mysqli_free_result($result);
        return null;
    }
    return null;

}
}


