<?php 
$conn = new mysqli('localhost' , 'root' , 'WEATHER123','mysql');
$sql = "SELECT * FROM board";
$background = array('#42f4eb','#a88856','#ebfff0' , '#d358f7' , '#2e2efe' , '#fa5882' , '#b40404');
$result = $conn->query($sql);
$myobj = array();
$i =1;
while ($text = $result->fetch_assoc()) {
	$myobj[$i]->username = $text['user_name'];
	$myobj[$i]->userid =(int) $text['user_id'];
	$myobj[$i]->text = $text['text_add'];
	$myobj[$i]->time_add = $text['time_add'];
	$i++;
}
$myobj[0]->total = $i-1;
$myjson = json_encode($myobj);
echo $myjson;
$conn->close();

 ?>
