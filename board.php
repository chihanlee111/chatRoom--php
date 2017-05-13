<?php 
if(isset($_POST['username'])){
	$username = $_POST['username'];
	echo "<input id=\"username\" type = \"hidden\" value = \"{$username}\">";
}else{
	header("Location: askUser.php");
}
 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.block_item p {
			background-color: #42f4eb;
			margin: 10px;
		}
	</style>
</head>
<body id = "body">
 <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
	<button onclick="refresh()"> Refresh</button>
	<button onclick="clearall()">clear</button>
	<div class="block_item" id = "block" style="margin-left: 20px;">
	</div>
	<input id = "tosendText"  type="text" value="" onkeydown="if(event.keyCode ==13) submit()" style="width: 100%;">
	<script>
	succc();
	setInterval(function(){ refresh()}, 1000);
  		function xxx(){
  			var container = $(window),
  		scrollTo = $('#tosendText');

  		container.animate({
  		scrollLeft: scrollTo.offset().left - container.offset().left + container.scrollTop()
 	 	},0);
  	}
		refresh();
		function clearall(){
			var deleteall = new XMLHttpRequest();
			deleteall.open("GET" , "clear.php" , true);
			deleteall.send();
			refresh();

		}
		function refresh(){
			var refreshReq = new XMLHttpRequest();
			refreshReq.open("GET" , "refresh.php" , true);
			refreshReq.send();
			refreshReq.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
      			document.getElementById('block').innerHTML = this.responseText;
      			xxx();

    }
 };
		}
		function submit(){
			var textsend = document.getElementById('tosendText').value;
			var user  = document.getElementById('username').value;
			console.log(user);
			var tex = $("#tosendText").val("");
			var xhttp = new XMLHttpRequest();
			var parm = "username="+user+"&"+"text="+textsend;
			console.log(parm);
			xhttp.open("POST", "addboard.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(parm);
			xxx();
			refresh();
		}
		function succc(){
		var user = document.getElementById('username').value;
		var insertuser = new XMLHttpRequest();
			insertuser.open("POST" , "adduser.php" , true);
			insertuser.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			insertuser.send("username="+user);
		//document.getElementById('form1').send;
	}
	</script>
</body>
</html>