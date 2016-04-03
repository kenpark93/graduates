<?php
include_once('db_func.php');
include_once('config.php');
header("Content-Type: application/json");
$json = json_decode(stripslashes(file_get_contents("php://input")));
$action=$json->action;
$myClass = new myClass();
if($action=="getRec"){
	$x = $json->x;
	$y = $json->y;
	$test = $myClass->getRecordWithOffset($x,$y);
	echo $test;
}
if($action=="reg"){
	$response = $myClass->saveUser($json);
	echo json_encode($response);
}
if($action=="log"){
	$response = $myClass->logUser($json);
	echo $response;
}
if($action=="check"){
	$response = $myClass->checkUser($json);
	echo json_encode($response);
}
if($action=="search"){
	$response = $myClass->searchUsers($json);
	echo $response;
}
if($action=="getuserInfoById"){
	$response = $myClass->getUserById($json);
	echo $response;
}
if($action=="getOdn"){
	$response = $myClass->getUserOdn($json);
	echo $response;
}
if($action=="updateUserInfo"){
	$response = $myClass->updateUserInfo($json);
	echo json_encode($response);
}
if($action=="opens"){
	$id=$json->id;
	$_SESSION["idUser"]=$id;
	echo "done";
}
if($action=="logout"){
	unset($_SESSION["idUser"]);
	echo "done";
}
?>