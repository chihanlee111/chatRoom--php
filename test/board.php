<?php 
if(isset($_POST['username'])){
	$username = $_POST['username'];
	echo "<input id=\"username\" type = \"hidden\" value = \"{$username}\">";
	echo "<input id=\"userid\" type = \"hidden\" value =\"\">";
}else{
	header("Location: askUser.php");
}
 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		body{}
		.block_item div {
			padding:5px 15px;
			border-radius:5px;
			width:40%;	
			border-color:#04B431;
			background-color: #DF3A01;
			margin: 10px;
			color:#ffffff;
		}
	</style>
</head>
<body id = "body">
 <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
	<button onclick="refresh()"> Refresh</button>
	<div class="block_item" id = "block" style="margin-left: 20px;">
	</div>
	<input id = "tosendText"  type="text" value="" onkeydown="if(event.keyCode ==13) submit()" style="width: 100%;">
	<script>
	onLoadUser();
	setInterval(function(){ refresh()}, 1000);
  		function swipeButtom(){
  			var container = $(window),
  		scrollTo = $('#tosendText');

  		container.animate({
  		scrollLeft: scrollTo.offset().left - container.offset().left + container.scrollTop()
 	 	},0);
  	}
		refresh();
		// function clearall(){
		// 	var deleteall = new XMLHttpRequest();
		// 	deleteall.open("GET" , "clear.php" , true);
		// 	deleteall.send();
		// 	refresh();

		// }
		function refresh(){
			var refreshReq = new XMLHttpRequest();
			refreshReq.open("GET" , "refresh.php" , true);
			refreshReq.send();
			var block = document.getElementById('block');
			refreshReq.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
      			document.getElementById('block').innerHTML  = "";
			var myobj = JSON.parse(this.responseText);
			for(var x =1;x<=myobj[0].total;x++){
			var div = document.createElement("div");
			var p = document.createElement("p");
			p.innerText = myobj[x].text;
			var p2 = document.createElement("p");
			p2.innerText = "From "+myobj[x].username+" at "+myobj[x].time_add;
			div.appendChild(p);
			div.appendChild(p2);
			if($("#username").val()==myobj[x].username){
			console.log("tr");
			div.style.float ='right';
			div.style.display = 'block';
			div.style.width = "50%";
			div.style.backgroundColor = "#0B610B";
}
			block.appendChild(div);
}
      			var p = document.createElement("p");
			p.innerText = this.responseText;

    }
 };
		}
		function submit(){
			var textsend = document.getElementById('tosendText').value;
			var user  = document.getElementById('username').value;
			var userid = document.getElementById('userid').value;
			console.log(user);
			var tex = $("#tosendText").val("");
			var xhttp = new XMLHttpRequest();
			var parm = "username="+user+"&"+"text="+textsend+"&userid="+userid;
			console.log(parm);
			xhttp.open("POST", "addboard.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(parm);
			xxx();
			refresh();
		}
		function onLoadUser(){
		var user = document.getElementById('username').value;
		var insertuser = new XMLHttpRequest();
			insertuser.open("POST" , "adduser.php" , true);
			insertuser.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			insertuser.send("username="+user);
		//document.getElementById('form1').send;
		insertuser.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
      			var a = this.responseText;
      			document.getElementById('userid').value = a;
    }
    	else{
    		setInterval(function(){insertuser.onreadystatechange;}, 1000);
    	}
 };
	}
	</script>
</body>
</html>
