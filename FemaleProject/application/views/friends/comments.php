<div class="container">
  <div class="post-container">
  <a href="all_posts"><button>Back</button></a>
  </div>
  <?php
      $user_id=$this->session->userdata('id');
/*@*/ $user_admin=$this->session->userdata('admin');
    $post_id=$this->session->userdata('post_id');
    $post_main=$this->session->userdata('post_main');
    echo "
          <h3>" . $post['first_name'] . " " .  $post['last_name'] . "</h3>
          <h4>" . $post['post_title'] . "</h4>
          <p>$post_main</p><hr>";
    if($all_comm)
    {
      foreach ($all_comm as $value)
      { 
        echo "<h4>" . $value['first_name'].":</h4>  <p>".$value['comment']."</p><i> at :".$value['comm_time'] . "</i>";
        ?>
        <form method="post" action="<?php echo base_url('friends/delete_comm'); ?>">
          <input name="comm_id" type="hidden" value="<?php echo $value['comment_id']; ?>">
          <input type="<?php if( ($user_admin == 1 )||($value['user_id']==$user_id) ) {echo 'submit';}else{echo 'hidden';} ?>" value="Delete comment"  ><hr>
        </form>

        <?php
        
        
      }
    }
  ?>
  <form role="form" method="post" action="add_comm">
    <textarea type="text" name="comment" ></textarea>
    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
    <input type="hidden" name="user_id" value="<?php echo $user_id;  ?>">
    <input type="submit" value=" Add ">
  </form>
</div>



