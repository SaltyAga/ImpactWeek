<!DOCTYPE html>
<html>
<head>
  <title></title>

</head>
<body>
	<!-- add post + title -->
	<form role="form" method="post" action="<?php echo base_url('friends/add_post'); ?>">
	  <input type="text" placeholder="The Title" name="title">
	  <textarea type="text" placeholder="your post" name="posty" ></textarea>
	  <input type="submit" value=" Add ">
	</form>

	<?php
/*@*/ $user_id=2;
/*@*/ $user_admin=1; //we need here to know if this user admin or not. 
	 if($all_post){
	 foreach ($all_post as $value)
	 {echo "<hr>";
	 ?>

	 <!-- delete the post if this post for you or you are admin -->
	<form method="post" action="<?php echo base_url('friends/delete_post'); ?>">
		<input name="post_id" type="hidden" value="<?php echo $value['post_id']; ?>">
		<input type="<?php if( ($user_admin == 1 )||($value['user_id']==$user_id) ) {echo 'submit';}else{echo 'hidden';} ?>" value="Delete post"  >
	</form>

	<!-- print all the titles with author of Post -->
	<?php
	echo $value['first_name']." at:".$value['pos_time']." The title is: ";
	?>
	<form style="display: inline;" method="post" action="<?php echo base_url('friends/all_comm'); ?>">
	  <input type="hidden" name="post_id" value="<?php  echo $value['post_id']; ?>" >
	  <input type="hidden" name="post" value="<?php echo $value['post']; ?>" >
	  <input type="submit" value="<?php echo $value['post_title']; ?>">
	</form>
	<?php
	} 
	}
	?>
</body>
</html>