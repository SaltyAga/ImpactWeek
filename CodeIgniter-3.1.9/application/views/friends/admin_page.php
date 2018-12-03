<form action="make_admin" method="post">
	Make a new admin: 
	<select name="nor_email">
		<?php
		if($all_emails_normal){
			foreach ($all_emails_normal as $value)
			{
				echo "<option value='{$value['user_id']}'> {$value['email']} </option>";
			}
		}
		?>
	</select>
	<input type="submit" value="submit">
</form>

<form action="remove_admin" method="post">
	Remove an admin: 
	<select name="adm_email">
		<?php
		if($all_emails_admin){
			foreach ($all_emails_admin as $value)
			{
			echo "<option value='{$value['user_id']}'> {$value['email']} </option>";
			}
		}
		?>
	</select>
	<input type="submit" value="submit">
</form>