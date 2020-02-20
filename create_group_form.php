<html>
	
	<style>
		label {
			display: block;
			margin: 0px 0px 0px 0px;
		}
		label > span{
			width: 125px;
			float: left;
			padding-right: 5px;
		}
		select {
			margin: 0px 0px 10px 0px;
		}
		form {
			margin-bottom: 35px;
		}
		span.required {
			color: red;
		}
	</style>
	
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['error'])){
				echo "<br>$_SESSION[error]";
				$_SESSION['error'] = "";
			}
		?>
		

		<form action="new_group_page.php" method="post">
			<h3>Create new group</h3>
			<label for="field3"><span>Name: <span class="required">*</span></span> <input type="text" name="name"/></label> <br>
			<label for="field4"><span>Description: </span> <input type="text" name="description"/></label> <br>
			<label for="field8"><span>Grade Level: <span class="required">*</span></span></label>
			<select type="number" name="grade">
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select><br><br>
			<input type="submit">
		</form>
		
		
		
	</body>
</html>