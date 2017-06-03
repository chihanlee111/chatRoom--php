<?php 
$username = $_POST['username'];
$conn = new mysqli('localhost','root' ,'WEATHER123' ,'mysql');
$sql ="SELECT * FROM boarduser WHERE username = '{$username}';";
$result = $conn->query($sql);
$myobj  = new stdClass();
while( $a = $result->fetch_assoc()){
	$myobj->userid = $a['userid'];
	$myobj->username = $a['username'];
	$myjson = json_encode($myobj);
	echo $a['userid'];
	exit();
}
$insert = "INSERT INTO boarduser(username) VALUE('{$username}');";
	$conn->query($insert);
$sql ="SELECT * FROM boarduser WHERE username = '{$username}';";
$result = $conn->query($sql);
while($a = $result->fetch_assoc()){
	// $myobj->userid = $a['userid'];
	// $myobj->username = $a['username'];
	// $myjson = json_encode($myobj);
	// echo $myjson;
	echo $a['userid'];
	exit();
}
$conn->close();
 ?>