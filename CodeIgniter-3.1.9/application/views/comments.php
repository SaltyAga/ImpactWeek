<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <a href="<?php echo base_url('friends/all_posts'); ?>"><button>Back</button></a>
  <hr>
  <?php
/*@*/    $user_id=2; //we need here user id.
/*@*/    $user_admin=1; //we need here to know if this user admin or not. 
    $post_id=$this->session->userdata('post_id');
    $post_main=$this->session->userdata('post_main');
    echo "<b>$post_main</b><hr>";
    if($all_comm)
    {
      foreach ($all_comm as $value)
      { ?>
        <form method="post" action="<?php echo base_url('friends/delete_comm'); ?>">
          <input name="comm_id" type="hidden" value="<?php echo $value['comment_id']; ?>">
          <input type="<?php if( ($user_admin == 1 )||($value['user_id']==$user_id) ) {echo 'submit';}else{echo 'hidden';} ?>" value="Delete comment"  >
        </form>

        <?php
        echo $value['first_name']." : ".$value['comment']." at :".$value['comm_time']."<hr>";
        
      }
    }
  ?>
  <form role="form" method="post" action="<?php echo base_url('friends/add_comm'); ?>">
    <textarea type="text" name="comment" ></textarea>
    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
    <input type="hidden" name="user_id" value="<?php echo $user_id;  ?>">
    <input type="submit" value=" Add ">
  </form>
</body>
</html>
