<?php 
$conn = new mysqli('localhost' , 'root' , '','mysql');
$sql = "SELECT * FROM board";
$background = array('#42f4eb','#a88856','#ebfff0');
$result = $conn->query($sql);
while ($text = $result->fetch_assoc()) {
	echo "<p style = \"background-color:{$background[$text['user_id']%3]};margin:10px;\">> ";
	echo $text['text_add']."<br>"."From ".$text['user_name']."  at ".$text['time_add'];
	echo "</p>";
}
$conn->close();

 ?>