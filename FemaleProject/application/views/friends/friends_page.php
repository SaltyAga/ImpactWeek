
	<div class="container">
		<div class="post-container row">
		</div>
			<?php 
				foreach($users as $row) {
				echo
				"<div>
					<img src='" . $row['picture_url'] . "' alt='profile_pic'> 
				<div>" .
				$row['first_name'] . " " .
				$row['last_name'] . "</div>
				<form action='friend_profile' method='post'>
					<input type='hidden' name='profile_id' value='" . $row['user_id'] . "'>
					<input type='submit' value='View profile'> 
				</form>
				<form action='friend_request' method='post'>
					<input type='hidden' name='request_id' value='" . $row['user_id'] . "'>
					<input type='submit' value='Add friend'> 
				</form>
				<br>
				";
			}
			?>
		
	</div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>







	