
    <div class="post-container col-12 col-md-8 col-md-offset-4">
        <form role="form" method="post" action="add_post">
            <div class="form-group">
                <input type="text" placeholder="The Title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <textarea type="text" placeholder="your post" name="posty" class="form-control"></textarea>
            </div>
            <input type='radio' name='public_private' value=0>
              <label>Public</label>
            <input type='radio'name='public_private' value=1>
              <label>Private</label>
            <input type="submit" value=" Add " class="btn btn-default" id="bt-add">
        </form>
    </div>
    <!-- add post + title -->
    <?php
    $user_id=$this->session->userdata('id');
/*@*/ $user_admin=$this->session->userdata('admin'); //we need here to know if this user admin or not. 
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
    <form style="display: inline;" method="post" action="<?php echo base_url('all_comm'); ?>">
      <input type="hidden" name="post_id" value="<?php  echo $value['post_id']; ?>" >
      <input type="hidden" name="post" value="<?php echo $value['post']; ?>" >
      <input type="submit" value="<?php echo $value['post_title']; ?>">
    </form>
    <?php
    } 
    }
    ?>
