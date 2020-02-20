<html>
	<style>
		div {
			border-style: solid;
			padding-top: 10px;
			padding-right: 10px;
			padding-bottom: 10px;
			padding-left: 10px;
		}
	</style>
	
	<body>
		<?php
			include "header.php";
			$_SESSION['error'] = "";
			
			echo "<p><b>User type: </b>";
			if ($_SESSION['type'] == 0)
				echo "Parent<br>";
			else
				echo "Student<br><p><b>Grade Level: </b>$_SESSION[grade]<br>";
			
			echo "<br>";
		?>
		
		<div>
			<h4>User Information</h4>
			<p><b>Name: </b> <?php echo "$_SESSION[name]"; ?> <br>
			<p><b>Email: </b> <?php echo "$_SESSION[email]"; ?> <br>
			<p><b>Phone Number: </b> <?php echo "$_SESSION[phone]"; ?> <br>
		</div>
		
		
	</body
	
</html>