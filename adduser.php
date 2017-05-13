<?php 
$username = $_POST['username'];
$conn = new mysqli('localhost','root' ,'' ,'mysql');
$sql ="SELECT * FROM boarduser WHERE username = '{$username}';";
$result = $conn->query($sql);
while($result->fetch_assoc()){
	exit();
}
$insert = "INSERT INTO boarduser(username) VALUE('{$username}');";
	$conn->query($insert);
$conn->close();
 ?>