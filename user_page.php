<html>
	<style>

	</style>
	
	<body>
		<?php
			include "header.php";
			
			echo "<p><b>Logged in as UID: </b>";
			echo "$_SESSION[uid]";
			echo "<br>";
			echo "$_SESSION[username]</p>";
			echo "<br>";
		?>
		
		<div style="border:solid" >
			<p><b>Name: </b> <?php echo "$_SESSION[name]"; ?> </br>
			<p><b>Email: </b> <?php echo "$_SESSION[email]"; ?> </br>
			<p><b>Phone Number: </b> <?php echo "$_SESSION[phone]"; ?> </br>
		</div>
		
	</body
	
</html>