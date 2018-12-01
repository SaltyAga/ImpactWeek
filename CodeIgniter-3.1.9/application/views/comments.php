<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
/*@*/    $user_id=1; //we need here user id 
    $post_id=$this->session->userdata('post_id');
    $post_main=$this->session->userdata('post_main');
    echo "<b>$post_main</b>";
    if($all_comm)
    {
      foreach ($all_comm as $value)
      {
        echo "<hr>".$value['comment']." at :".$value['comm_time'];
        
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
