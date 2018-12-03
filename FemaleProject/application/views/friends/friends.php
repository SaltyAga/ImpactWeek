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
			
		</div>
		<div class="row">
			<a href='friend_profile'>About</a>
			<a href='friends'>Friends</a>
		</div>
		<?php
			foreach($friends as $row) {
				echo 
				"<div>" . $row['first_name'] . " " . 
					$row['last_name'] . 
					"<img src='" . $row['picture_url'] . "' alt='profile_pic'>
				</div>" ;
			}
		?>



	</div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</body>
</html>