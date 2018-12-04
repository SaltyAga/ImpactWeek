
	<div class="container">
		<div class="post-container row">
			
		</div>
		<div class="row">
			<a href='profile'>About</a>
			<a href='my_friends'>Friends</a>
			<ul>
				<li><a href='friend_request_recieved'>Friend requests</a></li>
				<li><a href='friend_request_sent'>Friend requests sent</a></li>
			</ul>
		</div>
		<div>
			<?php foreach($requests as $row){
				echo
				"<img src='" . $row['picture_url'] . "' alt='profile_picture'>
				<p>" . $row['first_name'] . " " . $row['last_name'] . "</p>";
			}
			?>
		</div>
	</div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

