
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="assets/css/style5.css">
</head>
<body>
	
	<div class="container">
		<div class="top">
			<h2>Members</h2>
		</div>
		<div class="row">
			<?php 
				foreach($users as $row) {
				echo
				"
    				<div class='col-12 col-md-4'>
						<div class='panel panel-default'>
							<div class='panel-heading'>
								<img src='/assets/images/profile/default.jpg' class='img-responsive img-thumbnail img-circle' width='90px'>
							</div>
							<div class='panel-body'>
								<p>" . $row['first_name'] . " " . $row['last_name'] . "</p>
								<p><a href='#'>4 friends</a></p>
							</div>
							<div class='panel-footer'>
								<form action='friend_profile' method='post'>
									<input type='hidden' name='profile_id' value='" . $row['user_id'] . "'>
									<input type='submit' value='View profile' class='btn btn-default '> 
								</form>
								<br>
								<form action='friend_request' method='post'>
									<input type='hidden' name='request_id' value='" . $row['user_id'] . "'>
									<input type='submit' value='Add friend' class='btn btn-info'> 
								</form>
							</div>
						</div>
    				</div>
				";
			}
			?>
		</div>
	</div>
</body>
</html>	






	