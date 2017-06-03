<?php 
$conn = new mysqli('localhost' ,'root' , 'WEATHER123' , 'mysql');
$sql = "DELETE from board";
$conn->query($sql);
 ?>