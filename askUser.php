
<form id = "form1" action="board.php" method="post">
	<label for="Who" >Who are you ? </label>
	<input id = "username" type="text" name = "username" onkeydown="if(event.keyCode ==13) submit()">
	<br>
	<label for="cc">Enter to Continue ...</label>
</form>
<script>
	function succc(){
		var user = document.getElementById('username').value;
		var deleteall = new XMLHttpRequest();
			deleteall.open("POST" , "adduser.php" , true);
			deleteall.send("username="+user);
		//document.getElementById('form1').send;
	}
</script>