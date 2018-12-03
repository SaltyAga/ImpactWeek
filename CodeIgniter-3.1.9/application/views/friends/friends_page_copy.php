<!DOCTYPE html>
<html>
<head>
	<title>Female Friends</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="<? echo base_url('assets/css/style.css');?>" />
</head>
<body>
	<div class="container">
		<div class="row">
			<p>Test info here</p>
		</div>
		<div class="row">
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
				";
			}
			?>
		</div>







	</div><!-- end of container div -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</body>
</html>