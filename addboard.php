<?php 
$text = $_POST['text'];
$user_name = $_POST['username'];
$user_id = $_POST['userid'];
$conn = new mysqli('localhost' ,'root' ,'','mysql');
$sql = "INSERT INTO board(user_id , user_name ,time_add,text_add) VALUE('{$user_id}' ,'{$user_name}',NOW(),'{$text}')";
$result = $conn->query($sql);

$conn->close();
 ?>
