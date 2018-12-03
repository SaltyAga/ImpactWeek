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
			<a href='friend_profile'>About</a>
			<a href='show_friends'>Friends</a>
		</div>
		<?php 
			echo "<p>First Name</p>
			<p>" . $profile['first_name'] ."
			</p>
			<hr>
			<p>Last Name</p>
			<p>" . $profile['last_name'] ."
			</p>
			<hr>";
			if($profile['city_id'] !== NULL) {
				echo "<p>City</p>
				<p>" . $profile['city_id'] ."
				</p>
				<hr>";
			};
			if($profile['linkedin'] !== NULL) {
				echo "<p>LinkedIn Profile</p>
				<a href='" . $profile['city_id'] ."'>
				</a>
				<hr>";
			};
			if($profile['biography'] !== NULL) {
				echo "<p>Biography</p>
				<p>" . $profile['biography'] ."
				</p>
				<hr>";
			};
			if($profile['work_place'] !== NULL) {
				if($profile['student_professional'] == 0) {
					echo "<p>University</p>
					<p>" . $profile['work_place'] ."
					</p>
					<hr>";
				} else {
					echo "<p>Company</p>
					<p>" . $profile['work_place'] ."
					</p>
					<hr>";
				}
			};
			if($profile['expertise'] !== NULL) {
				echo "<p>Expertise</p>
				<p>" . $profile['expertise'] ."
				</p>
				<hr>";
			};
			if($profile['experience'] !== NULL) {
				echo "<p>Experience</p>
				<p>" . $profile['experience'] ."
				</p>
				<hr>";
			};
			if($profile['support_for'] !== NULL) {
				echo "<p>What kind of support are you looking for?</p>
				<p>" . $profile['support_for'] ."
				</p>
				<hr>";
			};
			if($profile['support'] !== NULL) {
				echo "<p>What kind of support can you give?</p>
				<p>" . $profile['support'] ."
				</p>
				<hr>";
			};
			if($profile['mentor_mentee'] !== NULL) {
				if($profile['mentor_mentee'] == 0) {
					echo "
					<p>Role</p>
					<p>Mentor</p>
					<hr>";
				} else {
					echo "
					<p>Role</p>
					<p>Mentee</p>
					<hr>";
				}
			};
			if($profile['recruitment_no_yes'] !== NULL) {
				if($profile['recruitment_no_yes'] == 0) {
					echo "
					<p>Recruitment</p>
					<p>Interested</p>
					<hr>";
				} else {
					echo "
					<p>Recruitment</p>
					<p>Not interested</p>
					<hr>";
				}
			};
		?>
	</div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</body>
</html>