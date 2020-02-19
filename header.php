<html>
	<style>
		body {
			font: normal 16px Verdana, Arial, sans-serif;
		}
		footer {
			font: italic 12px Verdana, Arial, sans-serif;
			position: fixed;
			left: 0;
			bottom: 0;
		}
	</style>
	
	<body>
		<div align="center" style="border:double">
			<h1>  Database Project - Phase 2</h1>
			<?php
				session_start();
				if (isset($_SESSION['username'])){
					echo "<p><b>Signed in as: </b>$_SESSION[username]<p>";
					echo "<a href='http://localhost/project/user_page.php'>Home</a>";
					echo " ";
					echo "<a href='http://localhost/project/logout.php'>Logout</a><br>";
				}
				else{
					echo "<a href='http://localhost/project/landing_page.php'>Home</a>";
				}
			?>
			
		</div>

		<br></br>
		
		<footer>
			<p>(C) 2020 David Nguyen and Karamel Quitayen</p>
		</footer>
	</body>
</html>