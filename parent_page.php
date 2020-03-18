<html>
	<style>
		* {
			box-sizing: border-box;
		}
		.column1{
			border-style: solid;
			float: left;
			padding: 10px;
			min-height: 305px;
			height: auto;
			margin-top: 15px;
			margin-bottom: px;
			position: relative;
		}
		.column1 > span {
			position: absolute;
			bottom: 0;
			right: 0;
		}
		p.p1 {
			font: normal 16px Verdana, Geneva, sans-serif;
			margin-left: 10px;
		}
	</style>

	<body>
		<?php
			include "header.php";
			unset($_SESSION['message']);
			$_SESSION['table_view'] = 'default';
			$_SESSION['table_sort'] = 'idAsc';
			$_SESSION['edit_uid'] = $_SESSION['loggedUser']['id'];
			
			$uid = $_SESSION['loggedUser']['id'];
			$name = $_SESSION['loggedUser']['name'];
			$email = $_SESSION['loggedUser']['email'];
			$phone = $_SESSION['loggedUser']['phone'];
		?>
		
		<div class="column1" style="background-color:#f2f2f2; width:40%;">
			<h3 align="center">User Information</h3>
			<p class="p1"><b>Name: </b> <?php echo "$name"; ?> <br>
			<p class="p1"><b>Email: </b> <?php echo "$email"; ?> <br>
			<p class="p1"><b>Phone Number: </b> <?php echo "$phone"; ?> <br>
			<p class="p1"><b>User type: </b>Parent<br>
			<br><br><br>
			<a href='http://localhost/Database2-Project/edit_user_form.php'>Edit Details</a>
		</div>
	
		<div class='column1' style='width:60%;'>
			<div align='center'>
				<h3>Actions</h3>
				<a href='http://localhost/Database2-Project/create_student_form.php'>Create student account</a><br>
				<a href='http://localhost/Database2-Project/view_children_page.php'>View and edit children</a><br>
			</div>
		</div>

	</body
</html>