<?php 
$conn = new mysqli('localhost' ,'root' , '' , 'mysql');
$sql = "DELETE from board";
$conn->query($sql);
 ?>