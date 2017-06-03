
<form id = "form1" action="board.php" method="post">
	<label for="Who" >Who are you ? </label>
	<input id = "username" type="text" name = "username" onkeydown="if(event.keyCode ==13) submit()">
	<input type="hidden" id = "userid" name = "userid" value = "">
	<br>
	<label for="cc">Enter to Continue ...</label>
</form>
<script>
	function succc(){
		var user = document.getElementById('username').value;
		var deleteall = new XMLHttpRequest();
			deleteall.open("POST" , "adduser.php" , true);
			deleteall.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			deleteall.send("username="+user);
		refreshReq.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
      			var userid = this.responseText;
      			document.getElementById('userid').value =userid;

    }
	}
</script>