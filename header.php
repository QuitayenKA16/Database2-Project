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

	</style>
	
	<body>
		<div align="center" style="border:double">
			<h1>  Database Project - Phase 2</h1>
			<p style="font-size:12px"><i></i></p>
			<?php
				session_start();
				if (isset($_SESSION['username'])){
					echo "<p><b>Signed in as: </b>$_SESSION[username] (UID$_SESSION[uid])<p>";
					if ($_SESSION['uid'] != 1)
						echo "<a href='http://localhost/Database2-Project/user_page.php'>Profile</a>";
					else
						echo "<a href='http://localhost/Database2-Project/admin_page.php'>Profile</a>";
					echo " ";
					echo "<a href='http://localhost/Database2-Project/logout.php'>Logout</a><br>";
				}
				else{
					echo "<a href='http://localhost/Database2-Project/landing_page.php'>Home</a>";
				}
			?>
			
		</div>
		
		<footer>
			<p>(C) 2020 David Nguyen and Karamel Quitayen</p>
		</footer>
	</body>
</html>