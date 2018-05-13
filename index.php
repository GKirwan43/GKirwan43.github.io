<?php

// Initialize the session

session_start();

 

// If session variable is not set it will redirect to login page

if(!isset($_SESSION['uname']) || empty($_SESSION['uname'])){

  header("location: login.php");

  exit;

}

include('config.php');
session_start();
if(isset($_SESSION['uname'])) {}
else{
	header('location:index.php');
	}

?>

<!DOCTYPE html>

<html>
	<head>
		<title>Trivia Helpers</title>
		<link rel="icon" href="http://www.triviahelpers.com/th.png" type="image/gif" sizes="16x16">
		<link rel="stylesheet" href="css.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
		$(document).ready(function()
			{
				$(document).bind('keypress', function(e) {
					if(e.keyCode==13){
						 $('#my_form').submit();
						 $('#comment').val("");
					 }
				});
			});
		</script>
		<script type="text/javascript">
		function post()
		{
		  var comment = document.getElementById("comment").value;
		  var name = document.getElementById("username").value;
		  if(comment && name)
		  {
			$.ajax
			({
			  type: 'post',
			  url: 'commentajax.php',
			  data: 
			  {
				 user_comm:comment,
				 user_name:name
			  },
			  success: function (response) 
			  {
				document.getElementById("comment").value="";
			  }
			});
		  }
		  
		  return false;
		}
		</script>
		<script>
		 function autoRefresh_div()
		 {
			  $("#result").load("load.php").show();// a function which will load data from other file after x seconds
		  }
		 
		  setInterval('autoRefresh_div()', 0);
		</script>
	</head>
	<body>
		<div class="header">
			<p class="title" style="font-size:100px;"><b>Trivia</b> Helpers</p>
			<p class="title" style="font-size:15px;margin-top:-100px;">Trivia Helpers is not a "bot", all answers posted below are from real people.</p>
		</div>
		<div class="scrollboxSection">
			<div class="scrollbox" style="	height:550px;width:1000px;">
				<div class="chatArea" id="result">
					<p class="Message" id="Message" style="color:#33ccff;">Trivia Helpers: Welcome to Trivia Helpers,<?= $_SESSION['uname'] ?>!</p>
					<p class="Message" id="Message" style="color:#33ccff;">Trivia Helpers: Trivia Helpers is not yet finished, stay tuned!</p>
					<?php
						include("load.php");
					?>
				</div>
				<div class="chatBar">
					<form method='post' action="#" onsubmit="return post();" id="my_form" name="my_form">
						<div class="chatBarBox">
							<div class="resize">
								<input type="text" style="display:none" id="username" value="<?= $_SESSION['uname'] ?>">
								<textarea id="comment" Placeholder="Enter Message Here" class="chatBoxArea"></textarea>
							</div>
						</div>
						<input type="submit" class="chatBarSubmit" value="Send" id="btn" name="btn">
					<form>
				</div>
			</div>
			<center>
			<div class="button" style="border-radius:15px;border:0;background-color:#e6e6e6;font-family:MainFont;height:50px;width:100px;margin-top:10px;">
				<a href="logout.php" style="font-size:25px;text-decoration:none;color:black;line-height:50px;">Logout</a>
			</div>
			</center>
		</div>
	</body>
</html>