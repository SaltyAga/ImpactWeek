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
		<h2>Welcome to Female Friends Website!</h2>
		<h3><?= $this->session->userdata('welcome'); ?></h3>

	<!-- ----------	Registration form ----------------->
		<div class='row'>
			<div class="col-xs-6" id="reg">
				<h3>Register</h3>
				<form action="registration" method="post">
					<?php echo form_error('first_name'); ?>
					<input type="text" name="first_name" placeholder="First name" value="<?php echo set_value('name'); ?>">
					<?php echo form_error('last_name'); ?>
					<input type="text" name="last_name" placeholder="Last name" value="<?php echo set_value('name'); ?>">
					<?php echo form_error('email'); ?>
					<input type="text" name="email" placeholder="email" value="<?php echo set_value('email'); ?>">
					<?php echo form_error('password'); ?>
					<input type="password" name="password" placeholder="password">
					<?php echo form_error('confirm_password'); ?>
					<input type="password" name="confirm_password" placeholder="confirm pass">
					<input type="submit" value="Register">
				</form>
			</div>
	<!-- ----------	Login form ----------------->		
			<div class="col-xs-6" id="log">
				<h3>Login</h3>
				<form action="login" method="post">
					<?php echo $this->session->userdata('error_email_log'); ?>
					<input type="text" name="email_log" placeholder="email" value="<?php echo set_value('email_log'); ?>">
					<?php echo $this->session->userdata('error_pass_log'); ?>
					<input type="password" name="password_log" placeholder="password"">
					<input type="submit" value="Login">
				</form>
		</div>

	</div><!-- end of container div -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</body>
</html>