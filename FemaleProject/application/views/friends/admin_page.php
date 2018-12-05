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
	<input type="submit" value="Add">
</form>

<form action="remove_admin" method="post">
	Remove an admin: 
	<select name="adm_email">
		<?php
		if($all_emails_admin){
			foreach ($all_emails_admin as $value)
			{
				if($value['email'] !== 'admin@example.com'){
					echo "<option value='{$value['user_id']}'> {$value['email']} </option>";
				}
			}
		}
		?>
	</select>
	<input type="submit" value="Remove">
</form>


<h3>Add Event:</h3>
<form action="add_event" method="post">
	<input type="text" name="title" placeholder="the title"><br>
	<textarea name="event" placeholder="the event"></textarea><br>
	<input type="text" name="location" placeholder="the location"><br>
	<input type="date" name="date"><br>
	<input type="number" name="price" min="0"><br>
	<input type="submit" value="submit" value="0">
</form>
<a href="all_events"> Go to events>> </a>