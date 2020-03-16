<?php
	include "header.php";
	if ($_SESSION['type'] == -1) //admin
		header ("Location:admin_page.php");
			
	else if ($_SESSION['type'] == 0) //parent
		header ("Location:parent_page.php");
				
	else  //student
		header ("Location:student_page.php");
?>