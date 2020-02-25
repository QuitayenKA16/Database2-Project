<html>
	<style>
		body {
			font: normal 16px Verdana, Arial, sans-serif;
		}
		footer {
			font: italic 12px Verdana, Arial, sans-serif;
			position: fixed;
			bottom: 0;
			background-color: white;
			width: 100%;
			height: 34px;
		}
		input {
			font: normal 16px Verdana, Arial, sans-serif;
		}
		form {
			margin-bottom: 35px;
		}
		label {
			display: block;
			margin: 0px 0px 0px 0px;
		}
		label > span {
			width: 125px;
			float: left;
			padding-right: 5px;
		}
		span.required {
			color: red;
		}
		select {
			margin: 0px 0px 10px 0px;
			font: normal 16px Verdana, Arial, sans-serif;
		}
		a {
			color: #2c87f0;
		}
		a:visited {
			color: #2c87f0;
		}
		th {
			background-color: #e6e6e6;
		}
		button[type=submit] {
			font: normal 16px Verdana, Arial, sans-serif;
		}
		button[type=submit].class1 {
			background-color: #bfbfbf;
			color: white;
			text-decoration: none;
			cursor: pointer;
			width: 10%;
			height = 20px;
		}
		button[type=submit].class2 {
			font: normal 14px Verdana, Arial, sans-serif;
			background-color: #e6e6e6;
			color: black;
			border: none
			cursor: pointer;
		}

	</style>
	
	<body>
		<div align="center" style="border:double">
			<h1> F*CK THIS Database Project - Phase 2</h1>
			<p style="font-size:12px"><i></i></p>
			<?php
				session_start();
				if (isset($_SESSION['loggedUser'])){
					$name = $_SESSION['loggedUser']['name'];
					$id = $_SESSION['loggedUser']['id'];
					echo "<p><b>Signed in as: </b>$name (UID$id)<p>";
					echo "<a href='http://localhost/Database2-Project/$_SESSION[back]'>Back</a> ";
					echo "<a href='http://localhost/Database2-Project/user_page.php'>Profile</a> ";
					echo "<a href='http://localhost/Database2-Project/logout.php'>Logout</a><br>";
				}
				else{
					echo "<p>";
					echo "<a href='http://localhost/Database2-Project/landing_page.php'>Home</a>";
				}
			?>
			
		</div>
		
		<footer>
			<p>(C) 2020 David Nguyen and Karamel Quitayen</p>
		</footer>
	</body>
</html>