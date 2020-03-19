<html>
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
		<div align="center">
			<h2>User Information</h2>
			<p class="p1"><b>Name: </b> <?php echo "$name"; ?> <br>
			<p class="p1"><b>Email: </b> <?php echo "$email"; ?> <br>
			<p class="p1"><b>Phone Number: </b> <?php echo "$phone"; ?> <br>
			<p class="p1"><b>User type: </b>Parent<br><br>
			<a href='<?php echo "$_SESSION[path]";?>edit_user_form.php'>Edit Details</a>
		</div><br><hr>
		
		<div align='center'>
			<h2>Actions</h2>
			<a href='<?php echo "$_SESSION[path]";?>create_student_form.php'>Create student account</a><br>
			<a href='<?php echo "$_SESSION[path]";?>view_children_page.php'>View and edit children</a><br>
		</div><br><hr>
	</body
</html>