<html>
	<style>
		* {
			box-sizing: border-box;
		}
		.column1{
			border-style: solid;
			float: left;
			padding: 10px;
			height:300px;
			margin-top:15px;
			width:50%;
		}
		p.p1 {
			font: normal 14px Verdana, Arial, sans-serif;
			margin-left: 10px;
		}
	</style>

	<body>
		<?php
			include "header.php";
			$_SESSION['back'] = "view_groups_page.php";
			$_SESSION['table_view'] = 'default';
			$_SESSION['table_sort'] = 'idAsc';
			$edit_gid = (isset($_POST['edit_gid'])) ? $_POST['edit_gid'] : $_SESSION['group']['gid'];
			
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			$query = "SELECT * FROM groups WHERE gid = $edit_gid";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$_SESSION['group'] = mysqli_fetch_assoc ($result);
			$gid = $_SESSION['group']['gid'];
			$gName = $_SESSION['group']['name'];
			$gLvl = $_SESSION['group']['gradeLvl'];
			$gDesc = $_SESSION['group']['description'];
		?>
		
		<div class="column1" style="background-color:#f2f2f2;">
			<h3 align="center">Group Information</h3>
			<p class="p1"><b>GID: </b> <?php echo "$gid"; ?> <br>
			<p class="p1"><b>Name: </b> <?php echo "$gName"; ?> <br>
			<p class="p1"><b>Grade Level: </b> <?php echo "$gLvl"; ?> <br>
			<p class="p1"><b>Description: </b> <?php echo "$gDesc"; ?> <br>

			<br><br><br>
			<a href='http://localhost/Database2-Project/edit_group_form.php'>Edit Details</a>
		</div>
		
		<div class="column1" style="">
			<h3 align="center">Actions</h3>
			<?php
				echo "<div align='center'>";
				echo "<a href='http://localhost/Database2-Project/group_page.php'>View members</a><br>";
				echo "<a href='http://localhost/Database2-Project/group_page.php'>View meetings</a><br><br>";
				echo "</div>";
			?>
		</div>
	</body
</html>