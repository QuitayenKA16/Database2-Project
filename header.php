<html>
	<body><hr>
		<div align="center">
			<h1> Database Project - Phase 2</h1>
			<p><i><font size="2">(C) 2020 David Nguyen and Karamel Quitayen</font></i></p>
			<?php
				session_start();
				$_SESSION['path'] = 'http://localhost/Database2-Project/';
				if (isset($_SESSION['loggedUser'])){
					$name = $_SESSION['loggedUser']['name'];
					$id = $_SESSION['loggedUser']['id'];
					echo "<p><b>Signed in as: </b>$name (UID$id)<p>";
					echo "<a href='$_SESSION[path]user_page.php'>Profile</a> ";
					echo "<a href='$_SESSION[path]logout.php'>Logout</a><br>";
				}
				else{
					echo "<p>";
					echo "<a href='$_SESSION[path]logout.php'>Home</a>";
				}
			?>
		</div><hr>
	</body>
</html>